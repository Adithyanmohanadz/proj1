<?php

namespace App\Http\Controllers\school;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SchoolDashboardController extends Controller
{
    public function dashboard_view(){
        $page_title = 'Dashboard';
        $active = 'dashboard';
        return view('school.school_dashboard',compact('page_title','active'));
    }
}
