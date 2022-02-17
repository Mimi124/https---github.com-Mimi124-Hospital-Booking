@extends('layout.master')

@section('content')

<div class="container-lg" style="margin : 0 auto; ">

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
              <td>You can take the appointment</td>
              @else
                <td>
                    <form>
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