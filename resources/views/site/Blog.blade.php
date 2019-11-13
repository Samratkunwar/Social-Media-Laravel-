@extends('layouts.master')  

@section('title')
  Bloggers Home
@endsection

@section('content')



        
    <!--Image slider code-->

    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="images/1.jpg" class="d-block default" alt="..." style="width:100%;" >
            </div>
            <div class="carousel-item">
                <img src="images/2.jpg" class="d-block default" alt="..." style="width:100%;"> 
            </div>
            <div class="carousel-item">
                <img src="images/3.jpg" class="d-block default" alt="..." style="width:100%;">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <!--Post creation section-->
    <br>  
    <div class="container marketing">
        <div class="row">
                <form class="form-inline " method="get" action="create_post">
                {{csrf_field()}}
                        <div class="form-group mb-2">
                          <label class="sr-only">User:</label>
                          <input type="text" class="form-control-plaintext" id="staticEmail2" placeholder="Username" name="username" required>
                        </div>
                        <div class="form-group mx-sm-3 mb-2">
                            <label class="sr-only">Title:</label>
                            <input type="text" class="form-control" placeholder="Post Title" name="title">
                        </div>
                        <div class="form-group mx-sm-3 mb-2">
                          <label class="sr-only">Message:</label>
                          <input type="textarea" class="form-control" placeholder="Message" name="message">
                        </div>
                        <p><input type="file" class="form-control-file" id="exampleFormControlFile1" name="pst_pic"></p>
                        <p><button type="submit" class="btn btn-primary mb-2">Post</button></p>
                        
                </form>
        </div><!-- /.row -->
    <hr class="featurette-divider">
    <!--User avatar code-->

    <br>  
    <div class="container marketing">
        <div class="row">
            <div class="col-lg-4">
                <div id="avatar1"></div>
                <h2>Siri</h2>
                <p>To be the greatest witcher the world has ever seen. That is my cause and one true gaol in life.</p>
                <p>
                    <a class="btn btn-secondary" href="#" role="button">View details &raquo;</a>
                </p>
            </div><!-- /.col-lg-4 -->
            <div class="col-lg-4">
                <div id="avatar2"></div>
                <h2>Harry</h2>
                <p>Life is a picture of events that causes an imprint in the memory. So why not photograph them to share it with others</p>
                <p>
                    <a class="btn btn-secondary" href="#" role="button">View details &raquo;</a>
                </p>
            </div><!-- /.col-lg-4 -->
            <div class="col-lg-4">
                <div id="avatar3"></div>
                <h2>Alexandra</h2>
                <p>Expressing emotions of characters that play is my way of living</p>
                <p>
                    <a class="btn btn-secondary" href="#" role="button">View details &raquo;</a>
                </p>
            </div><!-- /.col-lg-4 -->
        </div><!-- /.row -->
        

        <!-- Featuring posts of Avatars -->

        <hr class="featurette-divider">
@foreach($posts as $post)
        <div class="row featurette">
            <div class="col-md-7">
                <a href="{{url("user_profile/$post->username")}}"><div id="User-icon1" style="background-image:url('images/{{$post->pro_pic}}')"></div></a>
                <span class="text-muted"> {{$post->username}}</span>
                <h2 class="featurette-heading">{{$post->title}}: <span class="text-muted"> {{$post->message}}</span></h2>
                <p class="lead"><span class="glyphicon-comments">&#xe111;</span><img src="{{asset("icons/chat.png")}}">:{{$post->comment_no}} {{$post->date}}</p>
            </div>
            <div class="col-md-5">
               <a href="{{url("post_page/$post->post_id")}}"> <img src="images/{{{$post->pst_pic}}}" width='500' height='600'></a>

            </div>
        </div>

        <hr class="featurette-divider">

        
@endforeach     

        <!-- End of Featuring posts -->

    </div><!-- /.container -->

    <!--Licence with Privacy policy and T&C-->


@endsection