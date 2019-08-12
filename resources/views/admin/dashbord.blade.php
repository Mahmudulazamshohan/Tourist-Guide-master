@extends('layouts.appAdmin')

@section('css')
    <style>

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
        .main-text
            {
                position: absolute;
                top: 130px;
                width: 96.66666666666666%;
                color: #FFF;
            }
    </style>
    
@endsection

@section('content')

@if (Auth::check())
    @if (Auth::user()->role == 'Admin')
       
    <form id="" action="{{ route('logout') }}" method="POST">
            {{ csrf_field() }}
            <div class="jumbotron row navbar-default">
                <div class="col-md-3">

                        <ul class="nav navbar-left" style="margin-top: 20px; margin-left: 10px;">
                                <li >
                                        <?php
                                        $user_img= Auth::user()->user_img;
                                        ?>
                                        <img src="{{ asset('img').'/'.$user_img }}" alt=""  class="img img-responsive img-circle" style="width: 100px; height: 100px;"/>
                                         @if(!is_null(Auth::user()->user_img))
                                                        <img src="{{ route('image',explode('/',Auth::user()->user_img)[1]) }}" alt="" style="width: 50px;height: 50px;margin-left: 30px;" class="img img-responsive img-circle">
                                                        @endif
                                </li>
                                <li>
                                        <h5 class="text-center text-info" style="font-weight: bold; font-size: 15px; font-family: cursive;"> Wellcome Admin<br> {{Auth::user()->name}} </h5>    
                                </li>
                                    
                            </ul>
                </div>
                <div class="col-md-5 ">
                    <h1 class=" text-center" ><b class="text-primary col-md-offset-2">Admin Board</b></h1>
         
                </div>
                <div class="col-md-4 main-text">
                        
                        <button class="btn btn-default pull-right" style="font-weight: bold; color: red; margin-left: 5px; margin-top: 20px;">LogOut <i class="fa fa-sign-out" aria-hidden="true"></i></button>
                        <a href=" {{ route('approve') }} " type="button" class="btn btn-default btn-info pull-right" style=" margin-top: 20px;">User Request <span class="badge">{{ $countRequest }}</span></a>
                        @if ( $countMessage > 0)
                        <a  href=" {{ route('messagelist') }} " type="button" class="btn  pull-right" style="margin-bottom: 0;"><i class="fa fa-envelope" style="font-size: 30px; color: red;" aria-hidden="true"></i> <span class="badge" style="margin-left: -15px; margin-bottom: 15px;">{{ $countMessage }}</span></a>
                        
                        @else
                        <a href=" {{ route('messagelist') }} " type="button" class="btn  pull-right" ><i class="fa fa-envelope" style="font-size: 30px;" aria-hidden="true"></i> <span class="badge" style="margin-left: -15px; margin-bottom: 15px;">{{ $countMessage }}</span></a>
                        
                        @endif
                       <a href="{{ route('admin.edit') }}" class="btn btn-default pull-right" style="font-weight: bold; background: #00C851;color: white; margin-left: 5px; margin-top: 20px;">
                        <i class="fa fa-pencil" aria-hidden="true"></i>
                    </a>
                </div>
                
                
            </div>
            
                
            
        </form>
        @if(Session::has('message'))
            <div id="successMessage" class="alert alert-dismissible alert-success" style="display: inline-block; float: right; ">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong> {{ Session::get('message') }} </strong>
            </div>
        @endif
        
        <div class="row container-fluid">
        @foreach($errors->all() as $message)
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                          
                          {{ $message }}
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        @endforeach
            <div class="col-md-6 jumbotron" >
                <h3 class="jumbotron text-center text-danger">Add Place By Admin</h3>
                
            <div class="form-group">
                    
                {!! Form::open(array('route' => 'addPlace', 'files'=> true)) !!}
        
                    <table id="singuptbl" class="table table-responsive" style="margin-left: 10%">

                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
        
                            <tr class="form-group">
                                    <td ><label for="cityname"><b class="form-control">City Name:</b></label></td>
                                    <td class="">
                                        <select name="cityname" id="cityname" class="form-control">
                                            <option value="">--Select Districts--</option>
                                            <option value="Dhaka">Dhaka</option>
                                            <option value="Rangpur">Rangpur</option>
                                            <option value="Rajshahi">Rajshahi</option>
                                            <option value="Sylhet">Sylhet</option>
                                            <option value="Chattagram">Chattagram</option>
                                            <option value="Mymensingh">Mymensingh</option>
                                            <option value="Barishal">Barishal</option>
                                            <option value="Khulna">Khulna</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr >
                                    <td ><label for="autocompleteA"><b class="form-control" for=""> Place Name:</b></td></label> 
                                    <td><input class="form-control" type="text" name="placename" id="autocompleteA" class="form-control" required="1" placeholder="Place name"></td>
                                </tr>
                                <tr class="form-group">
                                    <td ><label for="placeoverview"><b class="form-control"> Overview:</b></label></td>
                                    <td><textarea class="form-control" name="placeoverview" id="placeoverview" rows="5" required="1" placeholder="Place Overview"></textarea></td>
                                </tr>
                                <tr class="form-group">
                                    <td ><label for="placeoverview"><b class="form-control"> How to go:</b></label></td>
                                    <td><textarea class="form-control" name="visit" id="placeoverview" rows="5" required placeholder="Instructions"></textarea></td>
                                </tr>
                                <tr class="form-group">
                                    <td ><label for=""><b class="form-control"> Travel System:</b></label></td>
                                    <td >
                
                                            <table class="table-responsive">
                                                <tr>
                                                    <td><input type="checkbox" id="bus"> BUS</td>
                                                    <td><input class="form-control" type="number" id="busrent" name="busrent"  style="margin-left: 5px;" placeholder="50 Tk" disabled></td>
                                                </tr>
                                                <tr>
                                                    <td><input type="checkbox" id="train"> Train</td>
                                                    <td><input class="form-control" type="number" id="trainrent" name="trainrent"  style="margin-left: 5px;" placeholder="80 Tk" disabled></td>
                                                </tr>
                                                <tr>
                                                    <td><input type="checkbox" id="air"> Air</td>
                                                    <td><input class="form-control" type="number" id="airrent" name="airrent"  style="margin-left: 5px;" placeholder="150 Tk" disabled></td>
                                                </tr>
                                                <tr>
                                                    <td><input type="checkbox" id="ship"> Ship</td>
                                                    <td><input class="form-control" type="number" id="shiprent" name="shiprent" style="margin-left: 5px;" placeholder="20 Tk" disabled></td>
                                                </tr>
                                            </table>
                                            
                                    </td>
                                </tr>
                                
                                <tr >
                                    <td ><label for="autocompleteA"><b class="form-control" for=""> Tour Type:</b></td></label> 
                                    <td>
                                        <select name="tour_type" id="" class="form-control">
                                            <option value="long time">Long Time </option>
                                            <option value="short time">Short Time </option>
                                          <option value="both">Both </option>
                                        </select>
                                    </td>
                                </tr>
                                <tr >
                                    <td ><label for="autocompleteA"><b class="form-control" for=""> Travel Type:</b></td></label> 
                                    <td>
                                        <select name="travel_type" id="" class="form-control">
                                            <option value="day">Day </option>
                                            <option value="night">Night </option>
                                          <option value="both">Both </option>
                                        </select>
                                    </td>
                                </tr>
                                <tr >
                                    <td ><label for="autocompleteA"><b class="form-control" for=""style="border: none;"> Like most popular:</b></td></label> 
                                    <td>
                                        <input type="radio" name="most_popular" value="yes" checked> Yes
                                        <input type="radio" name="most_popular" value="no"> No
                                    </td>
                                </tr>
                                <tr >
                                    <td ><label for="autocompleteA" ><b class="form-control" for="" style="border: none;"> Like less popular:</b></td></label> 
                                    <td>
                                        <input type="radio" name="less_popular" value="yes" > Yes
                                        <input type="radio" name="less_popular" value="no" checked> No
                                    </td>
                                </tr>
                                <tr >
                                    <td ><label for="autocompleteA"><b class="form-control" for=""style="border: none;"> Living Expense:</b></td></label> 
                                    <td style="display: flex;">
                                        <input type="number" name="expenses" class="form-control" placeholder="">
                                        <p style="font-size: 18px">Taka</p> 
                                       
                                    </td>
                                </tr>
                                <tr class="form-group">
                                    <td ><b class="form-control"> Living Hotel:</b></td>
                                    <td>
                                        <table class="">
                                            <tr >
                                                <td >
                                                    <table class="RegSpLeft" id="hotel">
                                                        <tr>
                                                            <td>
                                                                <input class="form-control" type="text" name="hotel_name[]" style="width: 110px; margin-right: 5px;" placeholder="Hotel Name">                            
                                                            </td>
                                                            <td>
                                                                <select name="hotel_type[]" id="" class="form-control" style="background-color: #5bc0de;">
                                                                    <option value=""> Hotel Type</option>
                                                                    <option value="High">High</option>
                                                                    <option value="Medium">Medium</option>
                                                                    <option value="Low">Low</option>
                                                                </select>
                                                            </td>
                                                            <td>
                                                                <input class="form-control" type="number" name="hotel_price[]" style="width: 50px; margin-left: 5px;" placeholder="500 Tk">
                                                            </td>
                                                        </tr>
                                                    </table>
                                                        
                                                </td>
                                                <td>
                                                    <div class="RegSpRight">
                                                        <a href="#" class="pl"><i class="fa fa-plus" style="color: green;" aria-hidden="true"></i></a>
                                                        
                                                        <a href="#" class="mi" style="margin-left: 10px;"><i class="fa fa-minus" style="color: red;" aria-hidden="true"></i></a>
                                                    </div>
                                                </td>
                                            </tr>
                                            
                                        </table>       
                                    </td>
                                </tr>
                                
                                <tr >
                                        <td ><b class="form-control"> Place Image:</b></td>
                                        
                                        <td><input class="form-control" type="file" name="itemImage" id="itemImage" class="form-control" required="1" placeholder="Roll no"></td>
                                </tr>
                                <tr>
                                    <td><br><label for="" class="form-control">Place Type:</label></td>
                                    <td>
                                        <table>
                                            <tr>
                                                <td>
                                                    
                                                    <div style="display:inline-block; margin-right: 10px;">
                                                        <label class="form-control">
                                                        <input type="checkbox" name="placeType" class="PlaceType" value="hill"/>Hill
                                                        </label>
                                                    </div>
                                                    <div style="display:inline-block; margin-right: 10px;">
                                                        <label class="form-control">
                                                        <input type="checkbox" name="placeType" class="PlaceType" value="temple"/>Temple
                                                        </label>
                                                    </div>
                                                    <div style="display:inline-block; margin-right: 10px;">
                                                            <label class="form-control">
                                                            <input type="checkbox" name="placeType" class="PlaceType" value="museum"/>Museam
                                                            </label>
                                                        </div>
                                                    <div style="display:inline-block; margin-right: 10px;">
                                                        <label class="form-control">
                                                        <input type="checkbox" name="placeType" class="PlaceType" value="waterfall"/>Waterfall
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div style="display:inline-block; margin-right: 10px;">
                                                            <label class="form-control">
                                                            <input type="checkbox" name="placeType" class="PlaceType" value="beach"/>Beach
                                                            </label>
                                                    </div>
                                                    <div style="display:inline-block; margin-right: 10px;">
                                                        <label class="form-control">
                                                        <input type="checkbox" name="placeType" class="PlaceType" value="historical"/>Historical Place
                                                        </label>
                                                    </div>
                                                    <div style="display:inline-block; margin-right: 10px;">
                                                        <label class="form-control">
                                                        <input type="checkbox" name="placeType" class="PlaceType" value="natural"/>Natural Place
                                                    </label>
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr >
                                    <table>
                                        <tr>
                                                
                                        </tr>
                                    </table>
                                </tr>
                                
                    
                    </table>
                    <input class="btn btn-default btn-success" type="submit" name="submit" style="display: block;
                                            margin: auto;"  value="Add Place">
                                            
                    
                    {!! Form::close() !!}
                    
                </div>
            </div>
        
            <div class="col-md-6">
                    <div>
                            <a href="{{ route('liveview') }}" class="btn btn-default col-md-push-5">Live View </a>
                    </div>
                    <div>
                        @isset($place->id)
                            <h1>{{ $place->placename }}</h1>
                                <p> {{'City:'}} {{ $place->cityname }}</p>
                                <img src="img/{{ $place->placeimage }}" alt="alt text" style="width: 100%; height: 300px;">
                                <h1>Overview</h1>
                                <p>{{ $place->overview }}</p>
                        
                                <div class="jumbotron">
                                        <h3 class="text-center">Transport System And Cost</h3>
                                        <h5 class="text-center">(Per Person)</h5>
                                    <ul class="list-group">
                                       
                                        <li class="list-group-item d-flex justify-content-between align-items-center"><b>From</b> <i class="fa fa-hand-o-right" aria-hidden="true"></i> <b id="tsfrom"> </b>
                                                
                                        </li>
                                        <br>
                                        <li class="list-group-item d-flex justify-content-between align-items-center"><b>To</b> <i class="fa fa-hand-o-right" aria-hidden="true"></i> <b id="tsto"> </b>
                                            
                                        </li>
                                        <br>
                                        @if ($place->bus > 0 )
                                            <li class="list-group-item d-flex justify-content-between align-items-center"><i class="fa fa-bus" style="font-size:25px;color:blue"></i> BY BUS
                                                <i class="fa fa-hand-o-right" aria-hidden="true"></i> <b style="font-size: 15px; "><kbd>{{ $place->bus }}</kbd>Tk</b>
                                            </li>
                                        @endif
                                        <br>
                                        @if ( $place->train > 0 )
                                            <li class="list-group-item d-flex justify-content-between align-items-center"><i class="fa fa-train" style="font-size:25px;color:red"></i> BY TRAIN
                                                <i class="fa fa-hand-o-right" aria-hidden="true"></i> <b style="font-size: 15px; "><kbd>{{ $place->train }} </kbd>Tk</b>
                                            </li>
                                        @endif
                                        <br>
                                        @if ( $place->air > 0 )
                                            <li class="list-group-item d-flex justify-content-between align-items-center"><i class="fa fa-plane" style="font-size:25px;color:aqua"></i> BY AIR
                                                <i class="fa fa-hand-o-right" aria-hidden="true"></i> <b style="font-size: 15px; "><kbd>{{ $place->air }} </kbd>Tk</b>
                                            </li>
                                        @endif
                                        <br>
                                        @if ( $place->ship > 0 )
                                            <li class="list-group-item d-flex justify-content-between align-items-center"><i class="fa fa-ship" style="font-size:25px;color:black"></i> BY SHIP
                                                <i class="fa fa-hand-o-right" aria-hidden="true"></i> <b style="font-size: 15px; "><kbd>{{ $place->ship }} </kbd>Tk</b>
                                            </li>
                                        @endif
                                        <br>
                                            <li class="list-group-item d-flex justify-content-between align-items-center"><b>Distance in KM:</b>
                                                <i class="fa fa-hand-o-right" aria-hidden="true"></i> <b><kbd id="in_kilo"></kbd> km</b>
                                            </li>
                                            <br>
                                            <li class="list-group-item d-flex justify-content-between align-items-center"><b>Approximate  Time:</b>
                                                    <i class="fa fa-hand-o-right" aria-hidden="true"></i> <b><kbd id="duration_text" ></kbd></b>
                                            </li>
                                        
                                        
                                      </ul>
                                </div>
                                <div class="jumbotron">
                                    <h3 class="text-center">Living Place And Cost</h3>
                                    <h5 class="text-center">(Per Person)</h5>
                                    <table class="ta table table-striped">
                                        <thead>
                                            <th>No</th>
                                            <th>Hotel Name</th>
                                            <th>Type</th>
                                            <th>Price</th>
                                        </thead>
                                        <tbody>
                                            @foreach ($place->hotels as $key => $hotel)
                                                <tr>
                                                    <td>{{ $key+1 }}</td>
                                                    <td>{{$hotel->hotel_name}}</td>
                                                    <td>{{$hotel->hotel_type}}</td>
                                                    <td>{{$hotel->hotel_price}}</td>
                                                </tr>    
                                            @endforeach
                                            
                                        </tbody>
                                    </table>
                                    
                                </div>
                                <div class="">

                                    {{-- <h3 class="text-center text-danger">Place Location In Map</h3> --}}
                                    <input id="src" value="{{ $place->placename }}"  type="hidden">
                                    
                                    <div id="map" style="margin-top: 20px;"></div>
                                        
                                </div>
                                    
                                
                                @endisset
                            </div>
                            
                
                        
                    
                </div>
            
        </div>
        

        @else
        <script>window.location = "/home";</script>
        @endif
    @else
        <script>window.location = "/";</script>
    @endif

  
@endsection

@section('script')

    <script type="text/javascript" src="{{ asset('js/mymap.js') }}"></script>
    
@endsection
    