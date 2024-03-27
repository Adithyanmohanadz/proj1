<?php

namespace App\Http\Controllers;

use App\Models\admin\examiner\AssignExaminerToUser;
use App\Models\admin\examiner\Examiner;
use App\Models\admin\location\City;
use App\Models\admin\location\State;
use App\Models\admin\school\School_registration;
use Illuminate\Http\Request;

class CommonController extends Controller
{
    // fetch sate based on country id
    public function fetch_state(Request $request)
    {
        $country_id = $request->input('country_id');
        $state = State::active()->where('country_id', $country_id)->pluck('state_id','state');
        $to_send = '<option disabled selected >Select State</option>';
        foreach ($state as $state => $state_id) {
            $to_send .= '<option value="' . $state_id . '">' . $state . '</option>';
        }
        return response()->json(['result' => $to_send]);
    }
    // fetch city based on state id
    public function fetch_city(Request $request)
    {
        $state_id = $request->input('state_id');
        $city = City::active()->where('state_id', $state_id)->pluck('city_id','city');
        $to_send = '<option disabled selected >Select City</option>';
        foreach ($city as $city => $city_id) {
            $to_send .= '<option value="' . $city_id . '">' . $city . '</option>';
        }
        return response()->json(['result' => $to_send]);
    }
    // fetch examiners based on coordinator
    public function fetch_examiners(Request $request)
    {
        $coordinator_id = $request->input('coordinator_id');
        $examiners = AssignExaminerToUser::active()->where('user_id', $coordinator_id)->value('examiner_id');
        if($examiners){
            $examinerList = explode(',',$examiners);
            $to_send = '<option disabled selected >Select Examiner</option>';
            foreach($examinerList as  $key=> $val){
                $examinerData  = Examiner::where('examiner_id',$val)->first();
                $to_send .= '<option value="' . $examinerData->examiner_id . '">' . $examinerData->examiner_name . '</option>';
            }
        return response()->json(['result' => $to_send]);
        }else{
            $to_send = '<option disabled selected >Select Examiner</option>';
            return response()->json(['result' => $to_send]);

        }
    }
    // fetch_coordinator_schools
    public function fetch_coordinator_schools(Request $request)
    {
        $coordinator_id = $request->input('coordinator_id');
        $schools = School_registration::with('school')->eligible()->where('coordinator_id', $coordinator_id)->get();
            $to_send = '<option disabled selected >Select Schools</option>';
            foreach($schools as  $rows){
                $to_send .= '<option value="' . $rows->school->school_id . '">' . $rows->school->school_name . '</option>';
            }
        return response()->json(['result' => $to_send]);
    }

    // end of controller
}
