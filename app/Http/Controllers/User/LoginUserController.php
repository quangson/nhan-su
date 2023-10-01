<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use function Termwind\ask;
use App\Repositories\Interfaces\TimekeepAccountRepository;
use App\Repositories\Interfaces\GroupRepository;

class LoginUserController extends Controller
{
    private $timekeepAccountRepository;
    private $groupRepository;

    public function __construct(TimekeepAccountRepository $timekeepAccountRepository, GroupRepository $groupRepository)
    {
        $this->timekeepAccountRepository = $timekeepAccountRepository;
        $this->groupRepository = $groupRepository;
    }

    public function showLoginForm(Request $request)
    {

        if ($request->session()->exists('user_login')) {
            // user value cannot be found in session
            return redirect()->route('user-index');
        }
        return view('User.login');
    }

    public function postFormLogin(Request $request)
    {

        if (!empty($request->get('user'))) {
            $timekeep = $this->timekeepAccountRepository->where('account', $request->get('user'))->first();
            if (!empty($timekeep)) {
                if (!empty($request->get('password')) && ($request->get('password') == $timekeep->pass)) {
                    session()->put('user_login', $timekeep->group_id);
                    $group = $this->groupRepository->find($timekeep->group_id);
                    return view('User.index')->with(['group' => $group]);
                }
            }
        }

        return redirect()->back();
    }
}
