<?php

namespace App\Http\Controllers\Personal;

use Illuminate\Http\Request;
use App\Repositories\Interfaces\EmployeeRepository;
use App\Repositories\Interfaces\DayoffRepository;
class LoginPersonalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $employeeRepository;
    private $dayoffRepository;

    public function __construct(EmployeeRepository $employeeRepository, DayoffRepository $dayoffRepository)
    {
        $this->employeeRepository = $employeeRepository;
        $this->dayoffRepository = $dayoffRepository;
    }

    public function showLoginForm(Request $request)
    {
       // Ta nghĩ sai chổ ni chổ exists
        if ($request->session()->exists('personal_login')) {
            // user value cannot be found in session
            $employeeId = session()->get('personal_login');
            $employee = $this->employeeRepository->find($employeeId);
            return view('personal.index')->with(['employee' => $employee]);

        }
        return view('Personal.login');
    }
    public function postFormLogin(Request $request)
    {

        if (!empty($request->get('user'))) {
            $employee = $this->employeeRepository->where('phone', $request->get('user'))->first();
            // $showAlert = false;
            // $dayOffs = 1;
            // if ($dayOffs <= 1) {
            //     $showAlert = true;
            //     $mesage = '';
            // }


            if (!empty($employee)) {
                if (!empty($request->get('password')) && ($request->get('password') == $employee->pass)) {
                    session()->put('personal_login', $employee->id);
                    return view('personal.index')->with(['employee' => $employee]);
                }
            }
        } else {
            return redirect()->back();
        }
    }
}
