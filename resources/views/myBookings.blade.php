@extends('layout.master')

@section('content')

<div class="container-lg" style="margin : 0 auto; ">
    <h2 class="text-center mt-3 mb-3" style ="font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; color:crimson">My Bookings</h2>

    <table class="table table-striped table-bordered">
        <thead>
          <tr>
            <th scope="col">Booking ID</th>
            <th scope="col">Appointment ID</th>
            <th scope="col">Department Name</th>
            <th scope="col">Appointment Date</th>
            <th>Want to Cancel?</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($bookings as $booking)
            <tr>
              <th scope="row">{{$booking->id}}</th>
              <td>{{$booking->appointment_id}}</td>
              <td>{{$booking->department_name}}</td>
              <td>{{$booking->appointment_date}}</td>
              {{-- <td>Please Call to cancel : 0244888999</td> --}}
              <td>
                  <form method="post" action="{{ route('cancelBookings') }}">
                    @csrf
                    <input type="text" style="display: none" VALUE="{{$booking->id}}" name="booking_id">
                    <input type="text" style="display: none" VALUE="{{$booking->appointment_id}}" name="appointment_id">
                    <input type="submit" value="cancel" class="btn btn-danger">

              </td>
            </tr>
            @endforeach
        </tbody>
    </table>
        s
</div>
@endsection