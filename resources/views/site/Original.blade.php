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

    <!--User avatar code-->

    <br>  
    <div class="container marketing">
        <div class="row">
            <div class="col-lg-4">
                <div id="avatar1"></div>
                <h2>Siri</h2>
                <p>To be the greatest witcher the world has ever seen. That is my cause and one true gaol in life.</p>
                <p>
                    <a class="btn btn-secondary" href="siri.html" role="button">View details &raquo;</a>
                </p>
            </div><!-- /.col-lg-4 -->
            <div class="col-lg-4">
                <div id="avatar2"></div>
                <h2>Harry</h2>
                <p>Life is a picture of events that causes an imprint in the memory. So why not photograph them to share it with others</p>
                <p>
                    <a class="btn btn-secondary" href="harry.html" role="button">View details &raquo;</a>
                </p>
            </div><!-- /.col-lg-4 -->
            <div class="col-lg-4">
                <div id="avatar3"></div>
                <h2>Alexandra</h2>
                <p>Expressing emotions of characters that play is my way of living</p>
                <p>
                    <a class="btn btn-secondary" href="alexandra.html" role="button">View details &raquo;</a>
                </p>
            </div><!-- /.col-lg-4 -->
        </div><!-- /.row -->
        

        <!-- Featuring posts of Avatars -->

        <hr class="featurette-divider">

        <div class="row featurette">
            <div class="col-md-7">
                <div id="User-icon1"></div>
                <h2 class="featurette-heading">Cosplay Time: <span class="text-muted"> It’ll blow your mind.</span></h2>
                <p class="lead"><span class="glyphicon-comments">&#xe111;</span> 27 August 2019</p>
            </div>
            <div class="col-md-5">
                <img src="images/siricosplay.jpg" width='500' height='600'>
            </div>
        </div>

        <hr class="featurette-divider">

        <div class="row featurette">
            <div class="col-md-7 order-md-2">
                <div id="User-icon2"></div>
                <h2 class="featurette-heading">Night Light: <span class="text-muted">The Night Brings out the color of life</span></h2>
                <p class="lead"><span class="glyphicon">&#xe111;</span> 26 Ausgust 2019</p>
            </div>
            <div class="col-md-5 order-md-1">
                <img src="images/night-lights.png" width='400' height='400'>
            </div>
        </div>

        <hr class="featurette-divider">

        <div class="row featurette">
            <div class="col-md-7">
                <div id="User-icon3"></div>
                <h2 class="featurette-heading">Mood: <span class="text-muted">Blue eyes make the ocean look pale</span></h2>
                <p class="lead"><span class="glyphicon">&#xe111;</span> 27 August 2019</p>
            </div>
            <div class="col-md-5">
                    <img src="images/alexandra(p1).jpg" width='500' height='600'>
            </div>
        </div>

        <hr class="featurette-divider">
        

        <!-- End of Featuring posts -->

    </div><!-- /.container -->

    <!--Licence with Privacy policy and T&C-->


@endsection