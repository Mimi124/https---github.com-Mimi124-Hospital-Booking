<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;


class PatientController extends Controller

{

    public function showAllPatients(Request $request) {
        $patients = Patient::all();
        $patient_id = $request->input('patient_id');        
        return view('patients',['patients' => $patients])
               ->with('patients.list');

    }  
    //
}
