<!DOCTYPE html>
<html lang="en">
<head>
  <title>{{__('GUIDE')}}</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-design/0.3.0/css/roboto.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-design/0.3.0/css/material-fullpalette.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-design/0.3.0/css/ripples.min.css">
        <link href="{{ asset('css/slider.css') }}" rel="stylesheet">
</head>
<style type="text/css">
	.p-10{
		padding: 50px;
		background: #141A30;
	box-shadow: 0 2px 5px 0 rgba(0,0,0,.16), 0 2px 10px 0 rgba(0,0,0,.12);
	min-height: auto !important;
  width: 50%;
  margin: 0 auto 0 auto;

	}
	body{
		background: #eee;
	}
  .nav-tabs>li>a{
    background: #FE445B;
    color: white;
    text-transform: uppercase;
  }
  .nav-tabs>li>a:hover{
    background: #000;
    color: white;
  }
  #home{
    padding: 10px;
  }
  .card{
  box-shadow: 0 2px 5px 0 rgba(0,0,0,.16), 0 2px 10px 0 rgba(0,0,0,.12);

  }
  .navbar .navbar-nav>li>a{
    font-size: 13px;
    font-weight: bold;
  }
</style>
<body>
  @php
            $nextPrediction = \App\NextPrediction::where('user_id',Auth::id())
                                  ->first();
        @endphp
  <nav class="navbar navbar-inverse navbar-fixed-top" style="background: rgb(20, 26, 48);border:none;border-radius: 0;box-shadow: 0px 1px 2px rgba(0,0,0,0.2);margin-bottom: 0;">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="{{ route('home') }}">Tourist Guide</a>
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
    </div>
   <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
      <li class="active"><a href="{{ route('home') }}">স্থান</a></li>
      <li><a href="{{ route('shareblog') }}">ভ্রমন কাহিণী</a></li>
      <li><a href="{{ route('suggestedplace') }}">শেয়ার করুন</a></li>
      <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">{{_('শ্রেণী')}} <span class="caret"></span></a>
          <ul class="dropdown-menu">
           
             <li >
                <a style="color: #000 !important; " href="{{route('cat','beach')}}">
                সৈকত</a>
              </li>
              <li >
                <a style="color: #000 !important; " href="{{route('cat','hill')}}">
                পাহাড়</a>
              </li>
              <li >
                <a style="color: #000 !important; " href="{{route('cat','museum')}}">
                জাদুঘর</a>
              </li>
              <li >
                <a style="color: #000 !important; " href="{{route('cat','historical')}}">
                ঐতিহাসিক</a>
              </li>
                  <li >
                <a style="color: #000 !important; " href="{{route('cat','natural')}}">
                প্রাকৃতিক</a>
              </li>
               <li >
                <a style="color: #000 !important; " href="{{route('cat','temple')}}">
                মন্দির</a>
              </li>
               <li >
                <a style="color: #000 !important; " href="{{route('cat','waterfall')}}">
                জলপ্রপাত</a>
              </li>
          </ul>
        </li>
        <li><a href="{{  route('addPostPage') }}">স্থান যোগ করুন</a></li>
        @auth
        <li>
          <a href="{{  route('profile', Auth::user()->id) }}">
            @if(!is_null(Auth::user()->user_img))
            <img src="{{ route('image',explode('/',Auth::user()->user_img)[1]) }}" alt="" style="width: 20px; height: 20px;border-radius: 50%;"> 
            @else
             <img src="{{ asset('img/blank.png') }}" alt="" style="width: 25px; height: 25px;border-radius: 50%;background: white;"> 
            @endif
            প্রোফাইলে
           </a>
        </li>
        @endauth
        @if($nextPrediction==null && Auth::user()->role == "User")
        <li>
          <a href="#" data-toggle="modal" data-target="#exampleModalCenter">
          <i class="fa fa-pulse fa-spinner" style="color: #FE445B;"></i> পরবর্তী ভ্রমণ
          </a>
        </li>
        @else
       
            <li>
          <a href="{{route('ai-search',[
           'tags'=>2,
           'cityname'=>1,
            'bus'=>1,
            'train'=>1,
            'ship'=>1,
            'air'=>1,
            'tags'=>1,
            'hotel_price'=>1,
          ])}}" >
          <i class="fa fa-pulse fa-spinner" style="color: #FE445B;"></i>পরবর্তী ভ্রমণ
          </a>
        </li>
        @endif
        <li>
           <form action="{{ route('home') }}" method="GET">
           
             <div style="display: flex;flex-flow: row;">
               <input type="text" class="form-control" style="margin-top: 10px;color:#fff;background: #000;height: 35px;width: 100%;border-right: none;
               border-top-right-radius: 0px;border-bottom-right-radius: 0px;" name="q">
               <button style="height: 35px;width: 35px;margin-top: 10px;border-radius: 0px 5px 5px 0px;background: #00C851;border:none;">
                 <i class="fa fa-search"></i>
               </button>
             </div>
             

           </form>
      </li>
     



        <li >
           <a  style="margin-left:30px;" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
            <i class="fa fa-sign-out "></i> প্রস্থান
          </a>
      </li>

    </ul>
    
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{csrf_field()}}
                                    </form>
   </div>
    
    
  </div>
</nav>

<div class="container">
  <div style="background: #000;margin-top: 80px;padding: 10px;color: white;border-radius: 5px;font-family: arial;">
     Train Accuracy:- {{$accuracy}}
  </div>

  <div class="row">
  @foreach($places as $place)
  <div class="col-md-4">
    <div class="panel panel-default " style="margin-top: 50px;border-radius: 5px;">
      <div class="panel-heading" style="padding: 0;">
        <img src="{{ asset('img').'/'.$place->placeimage }}" alt="" style="width: 100%;">

      </div>
      <div class="panel-body" style="background: #1a237e;padding: 10px;border-bottom-right-radius: 4px;border-bottom-left-radius: 4px;">
        <h5 style="font-size: 18px;color:#fff; font-family: arial;">{{\Illuminate\Support\Str::limit($place->overview,300)}}</h5>
        <a class="btn btn-info" href="{{ route('viewplace',$place->id) }}"><i class="fa fa-angle-double-right"></i></a>
      </div>
    </div>
  </div>

 
  @endforeach

  </div>

</div>
</body>
 <script src="{{ asset('js/jquery-3.1.1.min.js') }}"></script>
  <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/material.min.js') }}"></script>
    <script src="{{ asset('js/ripples.min.js') }}"></script>
    <script src="{{ asset('js/geocomplete.js') }}"></script>

     
<script type="text/javascript">
  $( function() {
    $( "#slider" ).slider();
  } );
</script>
</html>
