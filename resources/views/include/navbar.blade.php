@auth
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
        
         <li class="dropdown" style="width: 55px;height: 55px;">
         <a class="dropdown-toggle" data-toggle="dropdown" href="#">{{_('তৈরী')}} 
          <ul class="dropdown-menu">
           
             
              <li >
                <a style="color: #000 !important; " href="{{route('group-create')}}">
                দলবদ্ধ </a>
              </li>
            </ul>
          </li>
        

        <li>
           <form action="{{ route('home') }}" method="GET">
           
             <div style="display: flex;flex-flow: row;">
               <input type="text" class="form-control" style="margin-top: 10px;color:#fff;background: #000;height: 35px;width: 100%;border-right: none;
               border-top-right-radius: 0px;border-bottom-right-radius: 0px;" name="q">
               <button style="height: 35px;width:25px;margin-top: 10px;border-radius: 0px 5px 5px 0px;background: #00C851;border:none;">
                 <i class="fa fa-search"></i>
               </button>
             </div>
             

           </form>
      </li>
     



        <li >
           <a  style="margin-left:20px;" href="{{ route('logout') }}"
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
@include('include.next-prediction')
@include('include.tourist-ui')
@endauth