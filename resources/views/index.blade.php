@extends('layout.master')

@section('content')

<div class="container-lg" style="margin : 0 auto; ">
    <div class="row mt-5 ms-5">
        @foreach($departments as $department)
        <div class="col-lg-4 col-md4 col-sm-12 text-center
         mb-3">
         <img src ="{{$department->image}}" style="width:200px"/>
         <div class="card" style="width: 18rem;">
            <img/>
            <div class="card-body">
                <div class="card-title">{{ $department->name }}</div>
                <div class="card-text">{{ $department->description }}</div>
        
        </div>
    </div>
</div>
@endforeach
@endsection