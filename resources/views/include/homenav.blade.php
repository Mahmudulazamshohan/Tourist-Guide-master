@section('style')
        <style>
            .main-text
            {
                position: absolute;
                top: 50px;
                width: 96.66666666666666%;
                color: #FFF;
            }
        
        </style>
@endsection

{{-- <div class="container jumbotron " style="box-shadow: 0px 1px 2px rgba(0,0,0,0.21);"> --}}


    
        
{{-- <div class="row navbar" style="background: transparent;">
        <div class="">
            <div id="carousel-example-generic" class="carousel slide carousel-fade" data-ride="carousel">
                
                <div class="carousel-inner">
                        @foreach (\App\Place::all() as $place)

                        <div class="item {{ $loop->first ? ' active' : '' }}">
                            <img class="img img-responsive img-rounded" id="slide-img" src="{{ asset('img/sundarban.jpg')}}" alt="Los Angeles" style="width: 100%; height: 250px;">
                        </div>
                        <div class="item ">
                                <img class="img img-responsive img-rounded" id="slide-img" src="{{ asset('img/nilgiri-bandorban.jpg')}}" alt="Los Angeles" style="width: 100%; height: 250px;">
                        </div>
                        <div class="item ">
                            <img class="img img-responsive img-rounded" id="slide-img" src="{{ asset('img/sunderbans2.jpg')}}" alt="Los Angeles" style="width: 100%; height: 250px;">
                        </div>
                        <div class="item ">
                            <img class="img img-responsive img-rounded" id="slide-img" src="{{ asset('img/waterfall.jpg')}}" alt="Los Angeles" style="width: 100%; height: 250px;">
                        </div>
                        <div class="item ">
                            <img class="img img-responsive img-rounded" id="slide-img" src="{{ asset('img/museum.jpg')}}" alt="Los Angeles" style="width: 100%; height: 250px;">
                        </div>
                        <div class="item ">
                            <img class="img img-responsive img-rounded" id="slide-img" src="{{ asset('img/beach.jpg')}}" alt="Los Angeles" style="width: 100%; height: 250px;">
                        </div>
                        <div class="item ">
                            <img class="img img-responsive img-rounded" id="slide-img" src="{{ asset('img/historical.jpg')}}" alt="Los Angeles" style="width: 100%; height: 250px;">
                        </div>
                        <div class="item ">
                            <img class="img img-responsive img-rounded" id="slide-img" src="{{ asset('img/temple.jpg')}}" alt="Los Angeles" style="width: 100%; height: 250px;">
                        </div>
                        
                        
                    @endforeach
                </div>
                
            </div>
            <div class="main-text ">
                <nav class="" >
                    <div class="container">
                        <div>
                            <marquee behavior="alternate"><h2 class="" style="font-weight: bold; font-family: cursive; font-size: 50px; color: royalblue;" >Tourist Guide</h2></marquee>
                        </div>
                        <nav class="">
                                <div class="">
                                  <div class="navbar-header">
                                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                                      <span class="icon-bar"></span>
                                      <span class="icon-bar"></span>
                                      <span class="icon-bar"></span> 
                                    </button>
                                    
                                    
                                    
                                  </div>
                                  <div class="collapse navbar-collapse" id="myNavbar">
                                    @if(Auth::check())
                                    <ul class="nav navbar-nav">
                    
                                        <h5 class="text-center text-info pull-right" style="font-weight: bold; font-size: 15px; font-family: cursive; margin-top: 35px;"> Wellcome<br> {{Auth::user()->name}} </h5>    
                                             
                                        @php
                                        $user_img= Auth::user()->user_img;
                                        @endphp

                                        <img src="{{ asset('img').'/'.$user_img }}" alt=""  class="img img-responsive img-circle pull-right" style="width: 100px; height: 100px;"/>
                                            
                                    </ul>
                                   
                                    <ul class="nav navbar-nav navbar-right">
                                      <li>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                                    {{ csrf_field() }}
                                                    
                                                    <button class="btn btn-default btn-info pull-right" style="font-weight: bold; color: black;">LogOut <i class="fa fa-sign-out" aria-hidden="true"></i></button>
                                                        
                                                </form>
                                      </li>
                                    </ul>
                                    @endif
                                  </div>
                                </div>
                              </nav>
                    </div>
                </nav>
            </div>
        </div>
    </div> --}}

    
            
{{-- </div> --}}
