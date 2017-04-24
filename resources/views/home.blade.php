@extends('layouts.app')

@section('content')
<div class="container">
    <!-- <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    You are logged in!
                </div>
            </div>
        </div>
    </div> -->
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
          <!-- Indicators -->
          <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
            <li data-target="#myCarousel" data-slide-to="3"></li>
          </ol>

          <!-- Wrapper for slides -->
          <div class="carousel-inner" role="listbox">
            <div class="item active">
                <img src="https://az616578.vo.msecnd.net/files/responsive/cover/main/desktop/2016/04/24/635971367796010521-1773666128_Travel-womanArmsOutstretched-147079253.jpg" alt="Chania">
                <div class="home-button-graph-div">
                    <a href="{{action('ProjectController@index')}}" class="btn btn-warning home-button-graph-button" role="button">View Projects</a>
                </div>
            </div>

            <div class="item">
                <img src="https://www.w3schools.com/bootstrap/img_flower2.jpg" alt="Chania" class = "tales">
                <div class="home-button-graph-div">
                    <button type="button" class="btn btn-warning home-button-graph-button">Edit Profile</button>
                </div>
            </div>

            <div class="item">
                <img src="https://www.w3schools.com/bootstrap/img_chania.jpg" alt="Flower" class = "tales">
                <div class="home-button-graph-div">
                    <a href="{{action('ProjectController@create')}}" class="btn btn-warning home-button-graph-button" role="button">Start a Project</a>
                </div>
            </div>

            <div class="item">
                <img src="https://www.roughguides.com/wp-content/uploads/2016/03/Sings-660x420.jpg" alt="Flower" class = "tales">
                <div class="home-button-graph-div">
                    <button type="button" class="btn btn-warning home-button-graph-button">Update projects</button>
                </div>
            </div>
          </div>

          <!-- Left and right controls -->
          <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
    </div>

    <!-- <hr/> -->
    <!-- recommend region -->

    <div class="recommend">
        <div class="panel panel-info">
          <div class="panel-heading">Recommended For You</div>
<!--           <div class="panel-body">Recommended content here</div> -->
            <!-- content here !!! -->
        </div>
    </div>

     <div class="popular">
        <div class="panel panel-info">
          <div class="panel-heading">What's popular now</div>
<!--           <div class="panel-body">Recommended content here</div> -->
            <!-- content here !!! -->
        </div>
    </div>

</div>
@endsection
