@extends('layouts.master')  

@section('title')
  User's 
@endsection

@section('content')

@foreach($user as $users)

    <div class="row featurette">
        <div class="col-md-7">
            
            <span class="text-muted" style="text-align:centre;"> {{$users}}</span>
    <hr class="featurette-divider">
@endforeach

@endsection