<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Appointment;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

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
        //$appointments = Appointment::all();
        $department_id = $request->input('department_id');
        $appointments =Appointment::where('department_id',$department_id)->get();
        return \view('appointments',['appointments' => $appointments]);
    }

    public function bookAppointment(Request $request) {
      $appointment_id =  $request->input('appointment_id');
      $department_name =  $request->input('department_name');
      $appointment_date =  $request->input('appointment_date');

      $exists = Booking::where('appointment_id',$appointment_id)->exists();

      if($exists) {
          Session::flash('message', 'Appointment was already taken');
          Session::flash('message', 'alert-class','alert-danger');
          return redirect('/');
      }
    else{
        //bookAppointment

        $booking = new Booking;
        $booking->appointment_id = $appointment_id;
        $booking ->department_name = $department_name;
        $booking ->appointment_date = $appointment_date;
        $booking ->username = Auth::user()->name;
        $booking ->user_id = Auth::user()->user_id;

        $booking ->save();

        //change appointment status
        Appointment::where('id',$appointment_id)->update (['status'=>1]);
               
        //Tell user that the appointment was booked
        Session::flash('message', 'Appointment booked Successfully');
          Session::flash('message', 'alert-class','alert-success');
          return redirect('/');

    }

    }

    public function myBookings(Request $request){
      $bookings =  Booking::where('user_id',Auth::user()->id)->get();
        return \view('myBookings',['bookings'=>$bookings]);

    }

    public function cancelBookings(Request $request){
        $booking_id = $request->input('booking_id');
        $appointment_id = $request->input('appointment_id');
        Booking::where('id',$booking_id)->delete();
        Appointment::where('id',$appointment_id)->update(['status'=>0]);

        Session::flash('message', 'Appointment cancelled Successfully');
          Session::flash('message', 'alert-class','alert-success');
        return redirect('/');

    }

}
