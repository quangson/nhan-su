<?php

namespace App\Http\Controllers\Personal;


use App\Repositories\Interfaces\EmployeeRepository;
use App\Repositories\Interfaces\DayoffRepository;
use App\Repositories\Interfaces\GroupRepository;
use Illuminate\Http\Request;
use function GuzzleHttp\Promise\all;

class PersonalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $employeeRepository;
    private $dayoffRepository;
    private $groupRepository;

    public function __construct(EmployeeRepository $employeeRepository, DayoffRepository $dayoffRepository, GroupRepository $groupRepository)
    {
        $this->employeeRepository = $employeeRepository;
        $this->dayoffRepository = $dayoffRepository;
        $this->groupRepository = $groupRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */



    // public function index()
    // {
    //     $employeeId = session()->get('personal_login');
    //     $personal = $this->employeeRepository->with(['timekeepStatuses', 'dayoffs'])->find($employeeId);
    //     return view('Personal.info')->with(['personal' => $personal, ]);
    // }

    public function index()
    {
        $employeeId = session()->get('personal_login');
        $employee = $this->employeeRepository->with(['timekeepStatuses', 'dayoffs'])->find($employeeId);
        // dd($employee);
        return view('Personal.pages.info')->with(['employee' => $employee, ]);

    }
    public function getCompensatoryDay()
    {
        $employeeId = session()->get('personal_login');
        $employee = $this->employeeRepository->with(['timekeepStatuses' => function ($query) {
            $query->whereIn('status', [5, 6]);
        }])->find($employeeId);
        return view('Personal.pages.compensatory-day')->with(['employee' => $employee]);
    }

    public function getAnnualLeave()
    {
        $employeeId = session()->get('personal_login');
        $employee = $this->employeeRepository->with(['timekeepStatuses' => function ($query) {
            $query->whereIn('status', [3, 4]);
        }])->find($employeeId);
        return view('Personal.pages.annual-leave')->with(['employee' => $employee]);
    }
    public function getSickLeave()
    {
        $employeeId = session()->get('personal_login');
        $employee = $this->employeeRepository->with(['timekeepStatuses' => function ($query) {
            $query->whereIn('status', [7, 8]);
        }])->find($employeeId);
        return view('Personal.pages.sick-leave')->with(['employee' => $employee]);
    }

    public function getUnpaidLeave()
    {

        $employeeId = session()->get('personal_login');
        $employee = $this->employeeRepository->with(['timekeepStatuses' => function ($query) {
            $query->whereIn('status', [9, 10]);
        }])->find($employeeId);
        return view('Personal.pages.unpaid-leave')->with(['employee' => $employee]);
    }


    public function getSchoolLeave()
    {
        $employeeId = session()->get('personal_login');
        $employee = $this->employeeRepository->with(['timekeepStatuses' => function ($query) {
            $query->whereIn('status', [11, 12]);
        }])->find($employeeId);
        return view('Personal.pages.school-leave')->with(['employee' => $employee]);
    }

    public function getRegimeLeave()
    {
        $employeeId = session()->get('personal_login');
        $employee = $this->employeeRepository->with(['timekeepStatuses' => function ($query) {
            $query->whereIn('status', [13]);

        },])->find($employeeId);

        return view('Personal.pages.regime-leave')->with(['employee' => $employee]);
    }


    public function getLeave()
    {
        $employeeId = session()->get('personal_login');
        $employee = $this->employeeRepository->with(['timekeepStatuses' => function ($query) {
            $query->whereIn('status', [14]);
        }])->find($employeeId);
        return view('Personal.pages.leave')->with(['employee' => $employee]);
    }

    public function getNotLeave()
    {
        $employeeId = session()->get('personal_login');
        $employee = $this->employeeRepository->with(['timekeepStatuses' => function ($query) {
            $query->whereIn('status', [15]);
        }])->find($employeeId);
        return view('Personal.pages.not-leave')->with(['employee' => $employee]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * @return void
     */
    public function getListTimeKeep(Request $request, $id)
    {
        $employee = $this->employeeRepository->find($id);

        $group = $this->groupRepository->find($employee->group_id);
        $searchDate = null;
        $employees = null;
        if ($request->has('day') && $request->has('month') && $request->has('year')) {
            $searchDate = $request->get('year') . '-' . $request->get('month') . '-' . $request->get('day');
        }
//        dd($group);
        if (!empty($searchDate)) {
            $employees = $this->employeeRepository->where('group_id', $group->id)->whereHas('timekeepStatuses', function ($query) use ($searchDate) {
                $query->whereDate('created_at', '=', $searchDate);
            })
                ->get();
        }
        if (!empty($employees)) {
//            dd(1);
            return view('Personal.pages.list-time-keep')->with(['employee' => $employee, 'employees' => $employees]);
        }
//dd(1);
        return view('Personal.pages.list-time-keep')->with(['employee' => $employee]);
//        return view('Personal.pages.list-time-keep')->with(['group' => $group]);
    }


}
