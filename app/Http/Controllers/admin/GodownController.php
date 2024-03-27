<?php

namespace App\Http\Controllers\admin;

use App\Models\admin\Godown;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\admin\location\State;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class GodownController extends Controller
{
    public function index()
    {
        $page_title = 'Godown List';
        $active = 'godown';
        $godowns = Godown::with('godownState')->where('deleted',0)->get();
        $states = State::where('deleted',0)->where('status',1)->get();
        return view('admin.godown', compact('page_title', 'active','states','godowns'));
    }
    public function store(Request $request)
    {
        if ($request->ajax()) {
            $validator = Validator::make($request->all(), [
            'state_id' => 'required',
            'email' => 'required|email',
            'mobile' =>'required|numeric',
            'godown_name' => 'required',
            'address' => 'required',
            ])->setAttributeNames([
                'state_id' => 'State ',
                'godown_name' => 'Godown Name ',
            ]);
            if ($validator->fails()) {
                return response()->json(['response' => 'error', 'message' => $validator->errors()]);
            } else {
               
                $data = Godown::create([
                    'godown_name' => $request->input('godown_name'),
                    'state_id' => $request->input('state_id'),
                    'address' => $request->input('address'),
                    'mobile' => $request->input('mobile'),
                    'email' => $request->input('email'),
                ]);
                if ($data) {
                    return response()->json(['response' => 'success', 'message' => 'Godown Successfully Registered']);
                } else {
                    return response()->json(['response' => 'error', 'message' => 'Something went wrong']);
                }
            }
        } else {
            return Redirect::route('login');
        }  
    }
    // end of controller
}
