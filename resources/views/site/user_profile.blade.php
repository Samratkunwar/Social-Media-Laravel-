@extends('layouts.master')  

@section('title')
  User's Profile
@endsection

@section('content')

<br>
<div class="container">
    @foreach($posts as $post)
        <div class="row featurette">
            <div class="col-md-7">
                <a href="{{url("user_profile/$post->username")}}"><div id="User-icon1" style="background-image:url({{asset("images/$pro_pic")}});""></div></a>
                <span class="text-muted"> {{$post->username}}</span>
                <h2 class="featurette-heading">{{$post->title}}: <span class="text-muted"> {{$post->message}}</span></h2>
                <p class="lead"><img src="{{asset("icons/chat.png")}}">:{{$post->comment_no}} {{$post->date}}</p>
            </div>
            <div class="col-md-5">
                <a href="{{url("post_page/$post->post_id")}}"> <img src="{{asset("images/$post->pst_pic")}}" width='500' height='600'>
            </div>
        </div>

        <hr class="featurette-divider">

            
    @endforeach
</div>
@endsection