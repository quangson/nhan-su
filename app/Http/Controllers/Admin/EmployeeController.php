<?php

namespace App\Http\Controllers\Admin;

use App\Exports\EmployeeFormatExport;
use App\Models\Employee;
use App\Imports\EmployeeImport;
use App\Repositories\Interfaces\EmployeeRepository;
use App\Repositories\Interfaces\GroupRepository;
use Illuminate\Http\Request;
use Excel;


class EmployeeController extends Controller
{
    private $employeeRepository;
    private $groupRepository;

    public function __construct(EmployeeRepository $employeeRepository, GroupRepository $groupRepository)
    {
        $this->employeeRepository = $employeeRepository;
        $this->groupRepository = $groupRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $groups = $this->groupRepository->all();
        $employees = $this->employeeRepository->with('group')->getWithParams($search);
        return view('Admin.pages.employee.index')->with(['employees' => $employees, 'groups' => $groups]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $groups = $this->groupRepository->all();
        return view('Admin.pages.employee.create')->with(['groups' => $groups]);
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
            $created = $this->employeeRepository->create($data);
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
        $employee = $this->employeeRepository->find($id);
        $groups = $this->groupRepository->get();
        return view('Admin.pages.employee.edit')->with(['employee' => $employee, 'groups' => $groups]);
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
            $updated = $this->employeeRepository->update($data, $id);
            $response = [
                'message' => trans('OK!'),
                'data' => $updated->toArray(),
            ];
            return redirect()->route('employee.list')->with('message', $response['message']);
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
            $deleted = $this->employeeRepository->delete($id);
            $response = [
                'message' => 'OK'
            ];
            return redirect()->route('employee.list')->with('message', $response['message']);
        } catch (\Exception $e) {
            logger($e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    public function exportFormRegister()
    {
        // return (new EmployeeFormatExport())->download('Mẫu đăng ký.csv', \Maatwebsite\Excel\Excel::CSV);
        return (new EmployeeFormatExport())->download('Mẫu đăng ký.xls', \Maatwebsite\Excel\Excel::XLS);
    }

    public function importRegister(Request $request)
    {
        try {
            Excel::import(new EmployeeImport, $request->file);
            $response = [
                'message' => 'Đã tạo thành công!!'
            ];
            return redirect()->route('employee.list')->with('message', $response['message']);
        } catch (\Exception $e) {
            logger($e->getMessage());
            $response = [
                'error' => 'Thất bại!!',
            ];
            return redirect()->route('employee.list')->with('error', $response['error']);
        }
    }
}
