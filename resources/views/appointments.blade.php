@extends('layout.master')

@section('content')

<div class="container-lg" style="margin : 0 auto; ">
    <h2 class="text-center mt-3 mb-3" style ="font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; color:crimson">Appointments</h2>

    <table class="table table-striped table-bordered">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Department Name</th>
            <th scope="col">Appointment Date</th>
            <th scope="col">Status</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($appointments as $appointment)
            <tr>
              <th scope="row">{{$appointment->id}}</th>
              <td>{{$appointment->department_name}}</td>
              <td>{{$appointment->appointment_date}}</td>
              @if ($appointment->status)
              <td>Date has been Booked</td>
              @else
                <td>
                    <form method="post" action="{{route('bookAppointment')}}">
                        @csrf
                        <input type="text" style="display:none"  value="{{$appointment->id}}" name="appointment_id">
                        <input type="text" style="display:none"  value="{{$appointment->department_name}}" name="department_name">
                        <input type="text" style="display:none"  value="{{$appointment->appointment_date}}" name="appointment_date">
                        
                        <input type="submit" value="book" class="btn btn-primary">
                    </form>
                </td>
              @endif
            </tr>
            @endforeach
        </tbody>
    </table>
        
</div>
@endsection