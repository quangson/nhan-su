<?php

namespace App\Http\Controllers\User;


use Illuminate\Http\Request;
use App\Models\TimekeepAccount;

use App\Repositories\Interfaces\TimekeepAccountRepository;
use App\Repositories\Interfaces\GroupRepository;
use App\Repositories\Interfaces\EmployeeRepository;
use App\Repositories\Interfaces\TimeKeepStatusRepository;
use App\Repositories\Interfaces\DayoffRepository;
use App\Models\Employee;
use App\Models\TimeKeepStatus;

use Carbon\Carbon;
use Excel;


class TimekeepAccountUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $timekeepaccountRepository;
    private $employeeRepository;
    private $groupRepository;
    private $timeKeepStatusRepository;
    private $dayoffRepository;

    
    public function __construct(TimekeepAccountRepository $timekeepaccountRepository, GroupRepository $groupRepository, EmployeeRepository $employeeRepository,
                                TimeKeepStatusRepository $timeKeepStatusRepository, DayoffRepository $dayoffRepository)
    {
        $this->timekeepaccountRepository = $timekeepaccountRepository;
        $this->groupRepository = $groupRepository;
        $this->employeeRepository = $employeeRepository;
        $this->timeKeepStatusRepository = $timeKeepStatusRepository;
        $this->dayoffRepository = $dayoffRepository;
    }

    public function setTimeKeep(Request $request) {

        $groupId = $request->session()->exists('user_login') ? $request->session()->get('user_login') : '';
        $group = $this->groupRepository->find($groupId);
        $currentDate = now()->format('d/m/Y');
        $employees = Employee::where('group_id', $groupId)->get();
        $flag = !empty(TimeKeepStatus::whereDate('created_at', '=', now()->toDateString())->first());
        if ($flag) {
            return view('User.timekeep.after-submit')->with(['employees' => $employees, 'currentDate' => $currentDate]);
        }
        return view('User.timekeep.index')->with(['employees' => $employees, 'currentDate' => $currentDate]);
    }

    public function updateTimekeepStatus(Request $request){
        $currentDate = now()->format('d/m/Y');
        $group = $this->groupRepository->find(session()->get('user_login'));
        $statuses = $request->get('timekeep_status');
        $today = Carbon::now();

        foreach ($statuses as $key => $status) {
            $employee = $this->employeeRepository->find($key);
            $dayOff = $this->dayoffRepository->where('employee_id', $key)->first();
            // Ngày trực
            if ($status == config('constant.timekeep_status_key.Trực')) {
                if ($today->isWeekend()) {
        
                    $compensatory_dayT = $dayOff->Compensatory_Day + 2;
                    $data = ['Compensatory_Day' => $compensatory_dayT];
                    $this->dayoffRepository->update($data, $dayOff->id);
                }else{
                    $compensatory_dayT = $dayOff->Compensatory_Day + 1;
                    $data = ['Compensatory_Day' => $compensatory_dayT];
          
                    $this->dayoffRepository->update($data, $dayOff->id);
                }
                // $compensatory_dayT = $dayOff->Compensatory_Day + 1;
                // $data = ['Compensatory_Day' => $compensatory_dayT];
                // $this->dayoffRepository->update($data, $dayOff->id);

            }
            // Nghỉ ngày Bù
            if ($status == config('constant.timekeep_status_key.Nghỉ bù nguyên ngày')) {
                $compensatory_dayB2 = $dayOff->Compensatory_Day - 1;
                $data = ['Compensatory_Day' => $compensatory_dayB2];
                $this->dayoffRepository->update($data, $dayOff->id);

            }
            if ($status == config('constant.timekeep_status_key.Nghỉ bù nửa ngày')) {
                $compensatory_dayB2 = $dayOff->Compensatory_Day - 0.5;
                $data = ['Compensatory_Day' => $compensatory_dayB2];
                $this->dayoffRepository->update($data, $dayOff->id);

            }

            // Nghỉ ngày phép
            if ($status == config('constant.timekeep_status_key.Nghỉ phép nguyên ngày')) {
                $annual_leaveP1 = $dayOff->Annual_Leave - 1;
                $data = ['Annual_Leave' => $annual_leaveP1];
                $this->dayoffRepository->update($data, $dayOff->id);

            }
            if ($status == config('constant.timekeep_status_key.Nghỉ phép nữa ngày')) {
                $annual_leaveP2 = $dayOff->Annual_Leave - 0.5;
                $data = ['Annual_Leave' => $annual_leaveP2];
                $this->dayoffRepository->update($data, $dayOff->id);

            }

            // Nghỉ ốm
            if ($status == config('constant.timekeep_status_key.Nghỉ ốm nguyên ngày')) {
                $sick_leaveP1 = $dayOff->sick_leave + 1;
                $data = ['sick_leave' => $sick_leaveP1];
                $this->dayoffRepository->update($data, $dayOff->id);
            }
            if ($status == config('constant.timekeep_status_key.Nghỉ ốm nữa ngày')) {
                $sick_leaveP2 = $dayOff->sick_leave + 0.5;
                $data = ['sick_leave' => $sick_leaveP2];
                $this->dayoffRepository->update($data, $dayOff->id);
            }

             // Nghỉ không lương
            if ($status == config('constant.timekeep_status_key.Nghỉ không lương nguyên ngày')) {
                $unpaid_leaveP1 = $dayOff->unpaid_leave + 1;
                $data = ['unpaid_leave' => $unpaid_leaveP1];
                $this->dayoffRepository->update($data, $dayOff->id);
            }
            if ($status == config('constant.timekeep_status_key.Nghỉ không lương nữa ngày')) {
                $unpaid_leaveP2 = $dayOff->unpaid_leave + 0.5;
                $data = ['unpaid_leave' => $unpaid_leaveP2];
                $this->dayoffRepository->update($data, $dayOff->id);
            }

            // Nghỉ đi học
            if ($status == config('constant.timekeep_status_key.Nghỉ đi học nguyên ngày')) {
                $school_leaveP1 = $dayOff->school_leave + 1;
                $data = ['school_leave' => $school_leaveP1];
                $this->dayoffRepository->update($data, $dayOff->id);
            }
            if ($status == config('constant.timekeep_status_key.Nghỉ đi học nữa ngày')) {
                $school_leaveP2 = $dayOff->school_leave + 0.5;
                $data = ['school_leave' => $school_leaveP2];
                $this->dayoffRepository->update($data, $dayOff->id);
            }
            // Nghỉ chế độ
            if ($status == config('constant.timekeep_status_key.Nghỉ chế độ')) {
                $regime_leave = $dayOff->regime_leave + 1;
                $data = ['regime_leave' => $regime_leave];
                $this->dayoffRepository->update($data, $dayOff->id);
            }
            // Nghỉ

            if ($status == config('constant.timekeep_status_key.Nghỉ')) {
                $leave = $dayOff->leave + 1;
                $data = ['leave' => $leave];
                $this->dayoffRepository->update($data, $dayOff->id);
            }
            // Nghỉ không phép
            if ($status == config('constant.timekeep_status_key.Nghỉ không phép')) {
                $not_leave = $dayOff->not_leave + 1;
                $data = ['not_leave' => $not_leave];
                $this->dayoffRepository->update($data, $dayOff->id);
            }

            $this->timeKeepStatusRepository->create([
                'employee_id' => $key,
                'status'      => $status,
            ]);
        }

        $employees = Employee::where('group_id', $group->id)->get();

        return view('User.timekeep.after-submit')->with(['employees' => $employees, 'currentDate' => $currentDate]);
    }
}
