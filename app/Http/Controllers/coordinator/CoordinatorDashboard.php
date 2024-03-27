<?php

namespace App\Http\Controllers\coordinator;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CoordinatorDashboard extends Controller
{
    public function dashboard_view(){
        $page_title = 'Dashboard';
        $active = 'dashboard';
        return view('coordinator.coordinator_dashboard',compact('page_title','active'));
    }

}
