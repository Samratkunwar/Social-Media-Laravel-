@extends('layouts.master')  

@section('title')
  Update post
@endsection

@section('content')

<div class="container marketing">
        <div class="row">
                <form class=" " method="post" action="{{url("update_post_action")}}">
                {{csrf_field()}}
                        <input type="hidden" name="post_id" value="{{$post->post_id}}">
                        <div class="form-group mb-2">
                          <label class="sr-only">User:</label>
                          <input type="text" class="form-control-plaintext" id="staticEmail2" name="username" value="{{$post->username}}">
                        </div>
                        <div class="form-group mx-sm-3 mb-2">
                            <label class="sr-only">Title:</label>
                            <input type="text" class="form-control" name="title" value="{{$post->title}}">
                        </div>
                        <div class="form-group mx-sm-3 mb-2">
                          <label class="sr-only">Message:</label>
                          <input type="textarea" class="form-control" name="message" value="{{$post->message}}">
                        </div>
                        
                        <p><input type="file" class="form-control-file" id="exampleFormControlFile1" name="pst_pic" value="{{$post->pst_pic}}"></p>
                        <button type="submit" class="btn btn-primary mb-2">Update</button>
                        <a href="{{url("cancel_update/$post->post_id")}}"><button class="btn btn-info mb-2">Cancel</button></a>
                        
                </form>
                
        </div><!-- /.row -->


@endsection