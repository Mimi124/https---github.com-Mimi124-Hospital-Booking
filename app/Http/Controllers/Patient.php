<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;

class Patient extends Controller

{

    public function showAllPatients(Request $request) {
        $patients = Patient::all();
        $patient_id = $request->input('patient_id');        
        return view('patients',['patients' => $patients])
               ->with('patients.list');
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        //
    }
}
