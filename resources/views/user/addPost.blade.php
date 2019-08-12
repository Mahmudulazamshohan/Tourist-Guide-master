@extends('layouts.app')

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

    </style>
@endsection   
@section('content')
<div class="container">
        <div class="row">
                @include('include.homenav')
        </div>
            
        <div class="row">
                @include('include.sidenav')
                
                <div class="col-md-9" >
                    <div class="container bg-white">
                       @if(Session::has('message'))
                        <div id="successMessage" class="alert alert-dismissible alert-success" style="display: inline-block; float: right; ">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong> {{ Session::get('message') }} </strong>
                        </div>
                        @endif
                    <div class="row" style="margin-top: 30px;">
                        
                        {!! Form::open(array('route' => 'userAddPost', 'files'=> true)) !!}
            
                        <table  class="table table-responsive table-bordered" style="">

                                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                <tr class="form-group">
                                        <td ><b class="form-control">City Name:</b></td>
                                        <td class="">
                                            <select name="cityname" id="" class="form-control" required="1">
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
                                            <td ><b class="form-control"> Place Name:</b></td>
                                            <td><input class="form-control" type="text" name="placename" id="autocomplete" required="1" placeholder="Place name"></td>
                                    </tr>
                                    <tr class="form-group">
                                        <td ><b class="form-control"> Overview:</b></td>
                                        <td><textarea class="form-control" name="placeoverview" id="" rows="5" required="1" placeholder="Place Overview"></textarea></td>
                                    </tr>
                                    <tr class="form-group">
                                        <td ><b class="form-control"> Travel System:</b></td>
                                        <td >
                    
                                                <table class="table-striped">
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
                                    
                                    <tr class="form-group">
                                        <td ><b class="form-control"> Living Hotel:</b></td>
                                        <td>
                                            <table class="table table-responsive table-bordered">
                                                <tr >
                                                    <td >
                                                        <table class="RegSpLeft" id="hotel">
                                                            <tr>
                                                                <td>
                                                                    <input class="form-control" type="text" name="hotel_name[]" style="width: 110px; margin-right: 5px;" placeholder="Hotel Name">                            
                                                                </td>
                                                                <td>
                                                                    <select name="hotel_type[]" id="" class="form-control" style="background-color: #5bc0de;">
                                                                        <option value=""> Select Hotel Type</option>
                                                                        <option value="High">High</option>
                                                                        <option value="Medium">Medium</option>
                                                                        <option value="Low">Low</option>
                                                                    </select>
                                                                </td>
                                                                <td>
                                                                    <input class="form-control" type="text" name="hotel_price[]" style="width: 50px; margin-left: 5px;" placeholder="500 Tk">
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
                                        <td><label for="" class="form-control">Place Type:</label></td>
                                        <td>
                                            <div style="display:inline-block; margin-right: 10px;">
                                                <label>Beach</label>
                                                <input type="checkbox" name="placeType" class="PlaceType" value="beach"/>
                                            </div>
                                            <div style="display:inline-block; margin-right: 10px;">
                                                <label>Hill</label>
                                                <input type="checkbox" name="placeType" class="PlaceType" value="hill"/>
                                            </div>
                                            <div style="display:inline-block; margin-right: 10px;">
                                                <label>Museam</label>
                                                <input type="checkbox" name="placeType" class="PlaceType" value="museum"/>
                                            </div>
                                            <div style="display:inline-block; margin-right: 10px;">
                                                <label>Waterfall</label>
                                                <input type="checkbox" name="placeType" class="PlaceType" value="waterfall"/>
                                            </div>
                                            <div style="display:inline-block; margin-right: 10px;">
                                                <label>Historical Place</label>
                                                <input type="checkbox" name="placeType" class="PlaceType" value="historical"/>
                                            </div>
                                            <div style="display:inline-block; margin-right: 10px;">
                                                <label>Natural Place</label>
                                                <input type="checkbox" name="placeType" class="PlaceType" value="natural"/>
                                            </div>
                                            
                                        </td>
                                    </tr>
                                    <tr >
                                        
                                        <td colspan="2"><input class="btn btn-default btn-info" type="submit" name="submit" style="float: right" value="Add Place"></td>
                                       
                                    </tr>
                        
                        </table>
                        
                        {!! Form::close() !!}
                       
                    </div> 
                    </div>
                           
                </div>
        </div>
        
    </div>
@endsection

@section('script')
    
@endsection
