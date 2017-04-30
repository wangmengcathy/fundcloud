@extends('layouts.app')

@section('content')
<div class="container">
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
          <div class="panel-heading">Follow feeds</div>
         </div>
         <div class="row">
            @if($follow_contents != '[]')
                <?php $i = 0; ?>
                    @foreach($follow_contents as $follow_content)
                        <?php $i++;?>
                        @if($i < 4)
                            <div class="col-md-4">
                                <div class="thumbnail">
                                  <a href= "{{action('ProjectController@show',[$follow_content->pid])}}">
                                    <img src="https://2dbdd5116ffa30a49aa8-c03f075f8191fb4e60e74b907071aee8.ssl.cf1.rackcdn.com/596027_1376876426.2173.jpg" alt="Lights" style="width:100%">
                                    <div class="caption">
                                        <p>{{$follow_content->pname}}</p>
                                        <p>{{$follow_content->desp}}</p>
                                    </div>
                                  </a>
                                </div>
                            </div>
                        @endif

                    @endforeach
            @else
                <div> <span id = "no_follow">No Projects under following </span></div>
            @endif
        </div>
    </div>

    <div class="recommend">
        <div class="panel panel-info">
          <div class="panel-heading">Recommended For You</div>
        </div>
             <div class="row">
                @if($recommends != '[]')
                    <?php $i = 0; ?>
                        @foreach($recommends as $recommend)
                            <?php $i++;?>
                            @if($i < 4)
                                <div class="col-md-4">
                                    <div class="thumbnail">
                                      <a href= "{{action('ProjectController@show',[$recommend->project_pid])}}">
                                        <img src="https://2dbdd5116ffa30a49aa8-c03f075f8191fb4e60e74b907071aee8.ssl.cf1.rackcdn.com/10260677_1459361980.1123.jpg" alt="Lights" style="width:100%">
                                        <div class="caption">
                                            <p>{{$recommend->pname}}</p>
                                            <p>{{$recommend->desp}}</p>
                                        </div>
                                      </a>
                                    </div>
                                </div>
                            @endif

                        @endforeach
                @else
                    <div> No Relevant Recommends for you </div>
                @endif    
            </div>
     </div>

     <div class="popular">
        <div class="panel panel-info">
          <div class="panel-heading">What's popular now</div>
        </div>
<!--           <div class="panel-body">Recommended content here</div> -->
            <!-- content here !!! -->
        <div class="row">
            @if($popular_projects != '[]')
                <?php $i = 0; ?>
                    @foreach($popular_projects as $popular_project)
                        <?php $i++;?>
                        @if($i < 4)
                            <div class="col-md-4">
                                <div class="thumbnail">
                                  <a href= "{{action('ProjectController@show',[$popular_project->project_pid])}}">
                                    <img src="https://2dbdd5116ffa30a49aa8-c03f075f8191fb4e60e74b907071aee8.ssl.cf1.rackcdn.com/10260677_1459361980.1123.jpg" alt="Lights" style="width:100%">
                                    <div class="caption">
                                        <p>{{$popular_project->pname}}</p>
                                        <p>{{$popular_project->desp}}</p>
                                    </div>
                                  </a>
                                </div>
                            </div>
                        @endif
                    @endforeach
            @else
                <div> No Projects under following </div>
            @endif
        </div>
     
    </div>

</div>
@endsection
