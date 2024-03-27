<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\admin\Admin;

class Login extends Controller
{

    public function login_view()
    {
        return view('login.login');
    }

    public function login_check(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
            'role' => 'required|in:admin,coordinator,school', // Validate the role input
        ]);

        $credentials = $request->only('username', 'password');
        $role = $request->input('role');

        if($role == 'admin'){
            if (Auth::guard('admins')->attempt($credentials)) {
                return redirect(route('admin_dashboard'));
            } else {
                return redirect(route('login'))->with("error", 'Login Details for Admin are not valid')->withInput();
            }
        }elseif($role == 'coordinator'){
            if (Auth::guard('coordinators')->attempt($credentials)) {
                return redirect(route('coordinatorDashboard'));
            } else {
                return redirect(route('login'))->with("error", 'Login Details for Coordinator are not valid')->withInput();
            }
        }elseif($role == 'school'){
            if (Auth::guard('schools')->attempt($credentials)) {
                return redirect(route('schoolDashboard'));
            } else {
                return redirect(route('login'))->with("error", 'Login Details for School are not valid')->withInput();
            }
        }
        // try {
        //     switch ($request->input('role')) {
        //         case 'admin':
        //             $guard = 'admins';
        //             $redirectRoute = 'admin_dashboard';
        //             $errorMessage = 'Login Details for Admin are not valid';
        //             break;

        //         case 'coordinator':
        //             $guard = 'coordinators';
        //             $redirectRoute = 'coordinatorDashboard';
        //             $errorMessage = 'Login Details for Coordinator are not valid';
        //             break;

        //         case 'school':
        //             $guard = 'schools';
        //             $redirectRoute = 'schoolDashboard';
        //             $errorMessage = 'Login Details for School are not valid';
        //             break;

        //         default:
        //             throw new \InvalidArgumentException('Invalid role provided');
        //     }

        //     if (Auth::guard($guard)->attempt($credentials)) {
        //         return redirect(route($redirectRoute));
        //     } else {
        //         return redirect(route('login'))->with("error", $errorMessage)->withInput();
        //     }
        // } catch (\Exception $e) {
        //     // Handle unexpected errors
        //     return redirect(route('login'))->with("error", "Unexpected error during login")->withInput();
        // }
    }

    public function student_login()
    {
        return view('login.student_login');
    }
    public function student_login_section(Request $request)
    {
        $request->validate([
            'username' => ['required',],
            'password' => 'required'
        ]);
        $credentials = [
            'student_username' => $request->input('username'),
            'password' => $request->input('password'),
        ];
        if (Auth::guard('students')->attempt($credentials)) {
            return redirect((route('studentDashboard')));
        } else {
            return redirect(route('student.login'))->with("error", "Login Details Are not Valid")->withInput();
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
    public function student_logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect(route('student.login'));
    }

    // end of controller
}
