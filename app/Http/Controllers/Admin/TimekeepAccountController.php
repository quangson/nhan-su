<?php

namespace App\Http\Controllers\Admin;


use App\Models\Employee;
use Illuminate\Http\Request;
use App\Repositories\Interfaces\TimekeepAccountRepository;
use App\Repositories\Interfaces\GroupRepository;
use App\Repositories\Interfaces\EmployeeRepository;
use App\Repositories\Interfaces\TimeKeepStatusRepository;

use Excel;
use function GuzzleHttp\Promise\all;


class TimekeepAccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $timekeepaccountRepository;
    private $groupRepository;
    private $employeeRepository;
    private  $timeKeepStatusRepository;

    public function __construct(TimekeepAccountRepository $timekeepaccountRepository, GroupRepository $groupRepository, EmployeeRepository $employeeRepository, TimeKeepStatusRepository $timeKeepStatusRepository)
    {
        $this->timekeepaccountRepository = $timekeepaccountRepository;
        $this->groupRepository = $groupRepository;
        $this->employeeRepository = $employeeRepository;
        $this->timeKeepStatusRepository = $timeKeepStatusRepository;
    }
    public function index()
    {
        $groups = $this->groupRepository->all();
        $timekeepaccounts = $this->timekeepaccountRepository->with('group')->get();
        return view('Admin.pages.timekeepaccount.index')->with([ 'timekeepaccounts'=>$timekeepaccounts,'groups'=>$groups]);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $groups = $this->groupRepository->all();
        return view('Admin.pages.timekeepaccount.create')->with(['groups' => $groups]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $data = $request->all();
            $created = $this->timekeepaccountRepository->create($data);
            $response = [
                'message' => trans('OK'),
                'data' => $created->toArray(),
            ];
            return redirect()->route('employee.list')->with(
                'message',
                $response['message']
            );
        } catch (\Exception $e) {
            logger($e->getMessage());
            return redirect()->back()->withInput();
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $timekeepaccount = $this->timekeepaccountRepository->find($id);
        $groups = $this->groupRepository->get();
        return view('Admin.pages.timekeepaccount.edit')->with(['timekeepaccount' => $timekeepaccount, 'groups' => $groups]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $data = $request->except('_token');
            $updated = $this->timekeepaccountRepository->update($data, $id);
            $response = [
                'message' => trans('OK!'),
                'data' => $updated->toArray(),
            ];
            return redirect()->route('timekeepaccount.list')->with('message', $response['message']);
        } catch (\Exception $e) {
            logger($e->getMessage());
            return redirect()->back()->withInput();
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $deleted = $this->timekeepaccountRepository->delete($id);
            $response = [
                'message' => 'OK'
            ];
            return redirect()->route('timekeepaccount.list')->with('message', $response['message']);
        } catch (\Exception $e) {
            logger($e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    public function showTimeKeepPersonal(Request $request)
    {
        $search = $request->input('search');
        $employees = $this->employeeRepository->getWithParams($search);
        // $employees = $this->employeeRepository->get();
        return view('Admin.pages.timekeepStatus.list')->with(['employees' => $employees]);


        // $search = $request->input('search');
        // $groups = $this->groupRepository->all();
        // $employees = $this->employeeRepository->with('group')->getWithParams($search);
        // return view('Admin.pages.employee.index')->with(['employees' => $employees, 'groups' => $groups]);
    }

    public function listTimeKeepPersonal($id)
    {
        $employee = $this->employeeRepository->find($id);
        $timekeepStatuses = $this->timeKeepStatusRepository->where('employee_id', $id)->get();

        return view('Admin.pages.timekeepStatus.list_status')->with(['employee' => $employee, 'timekeepStatuses' => $timekeepStatuses]);
    }

    public function editTimeKeepPersonal($statusId)
    {
        $status = $this->timeKeepStatusRepository->find($statusId);

        return view('Admin.pages.timekeepStatus.update_status')->with(['status' => $status]);
    }

    public function updateTimeKeepPersonal(Request $request)
    {
        $statusId = $request->get('id');
        $status = $request->get('status');
        $employeeId = $request->get('employee_id');
        $this->timeKeepStatusRepository->update(['status' => $status], $statusId);

        return redirect()->route('timekeepPersonnal.list', $employeeId);
    }

    public function checkTimekeep()
    {
        $groups = $this->groupRepository->get();
        return view('Admin.pages.checkTimekeep.checkTimekeep')->with(['groups' => $groups]);
    }

    public function checkTimekeepGroup(Request $request, $id)
    {
        $group = $this->groupRepository->find($id);
        $searchDate = null;
        $employees = null;
        if ($request->has('day') && $request->has('month') && $request->has('year')) {
            $searchDate = $request->get('year') . '-' . $request->get('month') . '-' . $request->get('day');
        }

        if (!empty($searchDate)) {
            $employees = $this->employeeRepository->where('group_id', $group->id)->whereHas('timekeepStatuses', function ($query) use ($searchDate) {
                $query->whereDate('created_at', '=', $searchDate);
            })
                ->get();
        }
        if (!empty($employees)) {
            return view('Admin.pages.checkTimekeep.checkTimekeepGroup')->with(['group' => $group, 'employees' => $employees]);
        }

        return view('Admin.pages.checkTimekeep.checkTimekeepGroup')->with(['group' => $group]);
    }
}
