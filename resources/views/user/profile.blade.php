@extends('layouts.app')

@section('css')
    <style>
        .img{
            width: 270px;
            height: 200px;
            margin-top: 10px;
            
        }
    
        h4:hover{
            color: violet;
            font: bold;
            
        }
        .btn {
            margin-left: 10px;
            margin-right: 10px;
        }
        /* Boostrap Buttons Styling */
        
        .btn-default {
            font-family: Raleway-SemiBold;
            font-size: 13px;
            color: rgba(108, 88, 179, 0.75);
            letter-spacing: 1px;
            line-height: 15px;
            border: 2px solid rgba(108, 89, 179, 0.75);
            border-radius: 40px;
            background: transparent;
            transition: all 0.3s ease 0s;
        }
        
        .btn-default:hover {
            color: red;
            background: rgba(108, 88, 179, 0.75);
            border: 2px solid rgba(108, 89, 179, 0.75);
        }
        .bg-white  {
            background: white;
            padding:20px;
        }
    </style>
@endsection

@section('content')
<div class="container">
    <div class="row">
            @include('include.homenav')
    </div>
        
    <div class="row">
            @include('include.sidenav')
            <div class=col-lg-9" >
                <div class="container bg-white">
                <div class="row">
                   
                    
                        <h3 class="text-center text-info">User Profile</h3>
                   
                        
                    @if(Session::has('message'))
                        <div id="successMessage" class="alert alert-dismissible alert-success" style="display: inline-block; float: right; ">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong> {{ Session::get('message') }} </strong>
                        </div>
                    @endif

                    
                    <div class="col-md-6" >
                        @foreach($errors->all() as $message)
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                              {{$message}}
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                        @endforeach
                        <h3 class="text-center text-danger">User Info
                            
                        </h3>
                        
                                <div class="form-group">

                                        <form class="form-horizontal" method="POST" action="{{ route('updateUser',$user->id) }}" enctype="multipart/form-data">
                                            {{ csrf_field() }}
                                    <table class="table table-responsive table-bordered" style="width:100%;">
                        
                                               
                                                <tr >
                                                    <td ><b class="form-control"> Full Name:</b></td>
                                                    <td><input class="form-control" type="text" name="fname" id=""  required="1" placeholder="" value="{{$user->fname }}"></td>
                                                </tr>
                                                <tr >
                                                    <td ><b class="form-control"> User Name:</b></td>
                                                    <td><input class="form-control" type="text" name="name" id=""  required="1" placeholder="" value="{{$user->name }}"></td>
                                                </tr>
                                                <tr >
                                                    <td ><b class="form-control"> User Email:</b></td>
                                                    <td><input class="form-control" type="email" name="email" id="" required="1" placeholder="" value="{{$user->email }}"></td>
                                                </tr>
                                                <tr >
                                                    <td ><b class="form-control"> User Image:

                                                    </b></td>

                                                    <td>
                                                        @if(!is_null($user->user_img))
                                                        <img src="{{ route('image',explode('/',$user->user_img)[1]) }}" alt="" style="width: 50px;height: 50px;margin-left: 30px;">
                                                        @endif
                                                        <input class="form-control" type="file" name="userImg" id=""  style="width: 120px;" ></td>
                                                </tr>
                                                
                                                
                                                <tr >
                                                        
                                                    <td colspan="2">
                                                            <button type="submit" class="btn btn-default btn-primary form-control" name="submit" >Update User</button>
                                                    </td>
                                                
                                                </tr>
                                    
                                    </table>
                                        </form>
                                </div>
                               <h1 style="text-align: center;">
                                 Achievements
                               </h1>
                               <table class="table table-bordered ">
                                <thead>
                                  <tr>
                                
                                    <th scope="col"></th>
                                    <th scope="col">Source</th>
                                    <th scope="col">Points</th>
                                  </tr>
                                </thead>
                                <tbody>
                                 @foreach($points as $p)
                                  <tr>
                                    <td></td>
                                    <td>{{ucfirst($p->source)}}</td>
                                    <td>{{$p->points}}</td>
                                  </tr>
                                  @endforeach
                                  <tr>
                               
                                    <td colspan="2" style="text-align: center;font-weight: bold;">
                                      Total:
                                    </td>
                                    <td>
                                      {{$points->sum('points')}}
                                    </td>
                                  </tr>
                                </tbody>
                              </table>
                                                      
                    </div>
                    <div class="col-md-6" >
                        <h3 class="text-center text-danger">User Details</h3>
                        
                        <style type="text/css">
                        .questions{
                        background: #141A30;
                        color: #fff;
                        padding: 20px;
                        border-radius: 4px;
                        }
                        .questions label{

                        margin-left: 30px !important;
                        color: #fff !important;
                        }
                        .questions p:first-child{
                        border-top: 0px dashed #ccc;
                        }
                        .questions p{
                        font-size: 18px;
                        color: #fff;
                        border-top: 1px dashed #ccc;
                        font-weight: 500;

                        }
                        </style>
                    @php
                    $nextPredict = \App\NextPrediction::where('user_id',Auth::id())->first();

                    @endphp           
                        <form action="" method="">
                            @if($nextPredict->count())
                            <div class="questions">
            <p>আপনি কি সমুদ্র সৈকত পছন্দ করেন ?</p>
            <label >হ্যাঁ
            <input type="radio" 
              @if($nextPredict->beach == 1)
             checked="checked" 
             @endif
             name="beach" value="yes">
            </label>
            <label >না
            <input type="radio"  @if($nextPredict->beach == 0)
             checked="checked" 
             @endif  name="beach" value="no">

          </label>
          <p>আপনি কি পাহাড় পছন্দ করেন ?</p>
            <label >হ্যাঁ
            <input type="radio" 
             @if($nextPredict->beach == 1)
             checked="checked" 
             @endif name="hill" value="yes">
            </label>
            <label >না
            <input type="radio" 
             @if($nextPredict->beach == 0)
             checked="checked" 
             @endif name="hill" value="no">
           
          </label>
          <p>আপনি কি জাদুঘর পছন্দ করেন? ? </p>
            <label >হ্যাঁ
            <input type="radio" @if($nextPredict->museum == 1)
             checked="checked" 
             @endif name="museum" value="yes">
            </label>
            <label >না
            <input type="radio" @if($nextPredict->museum == 0)
             checked="checked" 
             @endif  name="museum" value="no">
           
          </label>
          <p>আপনি কি ঐতিহাসিক জায়গা পছন্দ  করেন? ?</p>
            <label >হ্যাঁ
            <input type="radio"
             @if($nextPredict->historical == 1)
              checked="checked" 
             @endif name="historical" value="yes">
            </label>
            <label >না
            <input type="radio" 
              @if($nextPredict->historical == 0)
             checked="checked" 
             @endif  name="historical" value="no">
           
          </label>
          <p>আপনি প্রাকৃতিক জায়গা পছন্দ করেন?</p>
            <label >হ্যাঁ
            <input type="radio" 
            @if($nextPredict->natural == 1)
             checked="checked" 
             @endif name="natural" value="yes">
            </label>
            <label >না
            <input type="radio" 
             @if($nextPredict->natural == 0)
             checked="checked" 
             @endif name="natural" value="no">
           
          </label>
          <p>আপনি কি বেশি জনপ্রিয় জায়গা গুলো পছন্দ করেন ? </p>
            <label >হ্যাঁ
            <input type="radio" 
            @if($nextPredict->most_popular == 1)
             checked="checked" 
             @endif name="most_popular" value="yes">
            </label>
            <label >না
            <input type="radio" 
             @if($nextPredict->most_popular == 0)
             checked="checked" 
             @endif  name="most_popular" value="no">
           
          </label>
          <p>আপনি কি কম জনপ্রিয় জায়গা গুলো পছন্দ করেন ? ?</p>
            <label >হ্যাঁ
            <input type="radio"  
             @if($nextPredict->less_popular == 1)
             checked="checked" 
             @endif name="less_popular" value="yes">
            </label>
            <label >না
            <input type="radio" 
              @if($nextPredict->less_popular == 1)
             checked="checked" 
             @endif name="less_popular" value="no">

          </label>
          <p>আপনি দীর্ঘ সফর করতে চান ?</p>
            <label >হ্যাঁ
            <input type="radio" 
             @if($nextPredict->long == 1)
              checked="checked" 
             @endif
             checked="checked" name="long" value="yes">
            </label>
            <label >না
            <input type="radio" 
             @if($nextPredict->long == 0)
              checked="checked" 
             @endif  name="long" value="no">
           
          </label>
          <p>আপনি সফর ট্রিপ চান ?</p>
            <label >হ্যাঁ
            <input type="radio" 
             @if($nextPredict->long == 1)
              checked="checked" 
             @endif name="trip" value="yes">
            </label>
            <label >না
            <input type="radio" 
            @if($nextPredict->long == 0)
              checked="checked" 
             @endif  name="trip" value="no">
           
          </label>
          <p>আপনি কি দিনের জায়গা গুলো করেন??</p>
            <label >হ্যাঁ
            <input type="radio" 
            @if($nextPredict->day == 1)
              checked="checked" 
             @endif name="day" value="yes">
            </label>
            <label >না
            <input type="radio" 
             @if($nextPredict->day == 0)
              checked="checked" 
             @endif name="day" value="no">
           
          </label>
          <p>আপনি কোন জায়গা পছন্দ  করেন?</p>
            <label >হোটেল
            <input type="radio" 
              @if($nextPredict->hotel == 'hotel')
              checked="checked" 
             @endif 
             name="hotel" value="hotel">
            </label>
            <label >কটেজ 
            <input type="radio" 
             @if($nextPredict->hotel == 'cortez')
              checked="checked" 
             @endif  name="hotel" value="cortez">
           
          </label>
          <label >রিসোট 
            <input type="radio" 
             @if($nextPredict->hotel == 'resorts')
              checked="checked" 
             @endif 
              name="hotel" value="resorts">
           
          </label>
          <p>
আপনি কি ধরনের হোটেল মূল্য চান?</p>
            <label >কম
            <input type="radio" 
              @if($nextPredict->hotel_price == 1)
              checked="checked" 
             @endif name="hotel_price" value="low">
            </label>
            <label >উচ্চ
            <input type="radio"  
              @if($nextPredict->hotel_price == 0)
              checked="checked" 
             @endif name="hotel_price" value="high">
           
          </label>
          <br>
          {{-- <button class="btn btn-info">
              Update
          </button> --}}
          </div>
          @endif
      </form>
                                
                    
                </div>
                    
                </div>
               </div>
            </div>
@endsection

@section('script')
    <script type="text/javascript">
        $(function () {
            

            setTimeout(function() {
                $('#successMessage').fadeOut('fast');
                }, 1000);
                
                $("#successMessage").fadeTo(1000, 500).slideUp(500, function(){
                    $("#successMessage").alert('close');
                });
        });
      

    </script>
@endsection