<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Appointment;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    // 
    //  public function getData(Request $request){
    //     return view('index');
    // }

    public function getAllDepartments(Request $request) {
        $departments = Department::all();
        return view('index',['departments' => $departments]);
    }

    public function showAppointments(Request $request) {
        $department_id = $request->input('department_id');
        $appointments =Appointment::where('department_id',$department_id)->get();
        return view('appointments',['appointments' => $appointments]);


    }
}
