<?php

namespace App\Http\Controllers\Admin;

use App\Exports\DayoffFormatExport;
use App\Models\Dayoff;
use App\Imports\DayoffImport;
use App\Repositories\Interfaces\EmployeeRepository;
use App\Repositories\Interfaces\DayoffRepository;
use Illuminate\Http\Request;
use Excel;


class DayoffController extends Controller
{
    private $dayoffRepository;
    private $employeeRepository;
    // private $groupRepository;

    public function __construct(DayoffRepository $dayoffRepository, EmployeeRepository $employeeRepository)
    {
        $this->dayoffRepository = $dayoffRepository;
        $this->employeeRepository = $employeeRepository;
       
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = $this->employeeRepository->all();
        $dayoffs = $this->dayoffRepository->with('employee')->get();
        return view('Admin.pages.dayoff.index')->with(['dayoffs' => $dayoffs, 'employees' => $employees]);

    }
 
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
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
            $created = $this->dayoffRepository->create($data);
            $response = [
                'message' => trans('OK'),
                'data' => $created->toArray(),
            ];
            return redirect()->route('dayoff.list')->with(
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
        $dayoff = $this->dayoffRepository->find($id);
        $employees = $this->employeeRepository->get(); 
        return view('Admin.pages.dayoff.edit')->with(['dayoff' => $dayoff, 'employees' => $employees]);
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
            $updated = $this->dayoffRepository->update($data, $id);
            $response = [
                'message' => trans('OK!'),
                'data' => $updated->toArray(),
            ];
            return redirect()->route('dayoff.list')->with('message', $response['message']);
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
            $deleted = $this->dayoffRepository->delete($id);
            $response = [
                'message' => 'OK'
            ];
            return redirect()->route('dayoff.list')->with('message', $response['message']);
        } catch (\Exception $e) {
            logger($e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    public function exportFormRegister()
    {
        
        return (new DayoffFormatExport())->download('Mẫu đăng ký phép.xls', \Maatwebsite\Excel\Excel::XLS);
    }

    public function importRegister(Request $request)
    {
        try {
            Excel::import(new DayoffImport, $request->file);
            $response = [
                'message' => 'Đã tạo thành công!!'
            ];
            return redirect()->route('dayoff.list')->with('message', $response['message']);
        } catch (\Exception $e) {
            logger($e->getMessage());
            $response = [
                'error' => 'Thất bại!!',
            ];
            return redirect()->route('dayoff.list')->with('error', $response['error']);
        }
    }
}
