@extends('layouts.master')  

@section('title')
  Bloggers Home
@endsection

@section('content')

<br>

    <div class="container">
        <div class="row featurette">
            <div class="col-md-7">
                
                <div id="User-icon1" style="background-image:url({{asset("images/$pro_pic")}});"></div>
                <span class="text-muted"> {{$posts->username}}</span>
                <h2 class="featurette-heading">{{$posts->title}}: <span class="text-muted"> {{$posts->message}}</span></h2>
                <p class="lead"><span class="glyphicon-comments">&#xe111;</span> {{$posts->date}}</p>
                <a class="btn btn-danger" href="{{url("delete_post/$posts->post_id")}}" role="button">Delete </a>
                <a class="btn btn-warning" href="{{url("update_post/$posts->post_id")}}" role="button">Update </a>
                <h6>Comments:</h6>
                @foreach($comments as $comment)
                    <h5 class="featurette-heading">
                        <span class="glyphicon-comments">&#xe111;</span> {{$comment->username}}: <span class="text-muted">  {{$comment->p_comments}}</span> 
                        <a class="btn btn-danger" href="{{url("delete_comment/$comment->comment_id/$posts->post_id")}}" role="button">Delete </a>
                    </h5>
                @endforeach
            </div>
            <div class="col-md-5"> 
                <img src="{{asset("images/$pst_pic")}}" width='500' height='600'>   
            </div>
        </div>
    </div>

    <hr class="featurette-divider">

    <div class="container">
        <div class="row">
        <h4><span class="text-muted"> Add Comments:</span><h4>
            <form class="form-inline " method="get" action="{{url("add_comments")}}">
            {{csrf_field()}}
                        <input type="hidden" name="post_id" value="{{$posts->post_id}}">
                        <div class="form-group mb-2">
                          <label class="sr-only">User:</label>
                          <input type="text" class="form-control-plaintext" id="staticEmail2" placeholder="Username" name="username" required>
                          <input type="text" class="form-control-plaintext" id="staticEmail2" placeholder="Comments" name="comment">
                        </div>
                        <p><button type="submit" class="btn btn-primary mb-2">Add comment</button></p>
                        
            </form>
        </div>
    </div>
    
    <hr class="featurette-divider">
    

@endsection