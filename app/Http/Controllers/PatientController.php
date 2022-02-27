<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;
use Illuminate\Support\Facades\Auth;


class PatientController extends Controller

{
    public function Register()
    {
        return "I am a Patient";
        $patient_id = Auth::user()->patient_id;
        $patient_id = Patient::where('patient_id', $patient_id)->first();
        return view('Patient.patient-form');
    }


    public function showAllPatients(Request $request) {
        $patients = Patient::all();
        $patients = $request->input('patient_id');        
        return view('patients',['patients' => $patients])
               ->with('patients.list');

    }  
    //
}

