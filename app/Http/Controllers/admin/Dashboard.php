<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Dashboard extends Controller
{
    public function dashboard_view(){
        $page_title = 'Dashboard';
        $active = 'dashboard';
        return view('admin.dashboard',compact('page_title','active'));
    }
    public function allOrders(){
        $page_title = 'Dashboard';
        $active = 'dashboard';
        return view('admin.order.all_order',compact('page_title','active'));
    }
    public function pendingOrders(){
        $page_title = 'Dashboard';
        $active = 'dashboard';
        return view('admin.order.all_order',compact('page_title','active'));
    }
}
