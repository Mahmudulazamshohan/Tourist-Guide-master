@extends('layouts.app')


@section('css')

@endsection

@section('content')

<div class="container">
    <div class="row">
            @include('include.homenav')
    </div>
        
    <div class="row">
            @include('include.sidenav')
            
            <div class="col-md-12" >
                    @if(Session::has('message'))
                    <div id="successMessage" class="alert alert-dismissible alert-success" style="display: inline-block; float: right; ">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong> {{ Session::get('message') }} </strong>
                    </div>
                    @endif
                    <div class="jumbotron text-center" style="font-size: 30px;">
                            
ব্লগ শেয়ার করুন
                    </div>
                <div class="row" style="margin-top: 30px;">
                    
    
                        {!! Form::open(array('route' => 'addblog', 'files'=> true)) !!}

                        <div class="container col-md-8 col-md-offset-2">
                            <table class="table table-responsive table-striped " style="width: 600px;">
    
                                <tbody>
    
                                    <tr class="form-group">
                                        <td>
                                            <label class="form-control text-center" for="place_name">
স্থানের নাম:</label>
                                        </td>
                                        <td>
                                            <input class="form-control" type="text" id="place_name" name="place_name" placeholder="Place Name" required="1">
                                        </td>
                                    </tr>
                                    <tr class="form-group">
                                            
                                            
                                            <td>
                                                <label class="form-control text-center" for="autocomplete">স্থান অবস্থান:</label>
                                            </td>
                                            <td>
                                                <input class="form-control" type="text" name="placelocation" id="autocomplete" required="1" placeholder="Place Location">
                                            </td>
                                        </tr>
    
                                    <tr class="form-group">
                                        <td>
                                            <label class="form-control text-center" for="description">ছোট বিবরণ:</label>
                                        </td>
                                        <td>
                                            <textarea class="form-control" type="text" name="description" id="description" placeholder="Short Description" required="1"></textarea>
                                        </td>
                                    </tr>
    
                                    
                                    <tr class="form-group">
                                        <td class="f">
                                            <label class="form-control text-center" for="image">চিত্র আপলোড </label>
                                        </td>
                                        <td>
                                            <input type="file" class="form-control text-right" name="image" id="image" required="1">
                                        </td>
    
                                    </tr>
                                    <tr class="form-group " align="center">
    
                                        <td colspan="2"><button class="btn btn-info " type="submit" name="share" style="font-size: 20px; font-weight: bolder;"><i class="glyphicon glyphicon-share"></i> Share Post</button></td>
    
                                    </tr>
                                    
    
                                </tbody>
                            </table>
                        </div>
                   
                   {!! Form::close() !!}
                   
                </div>   
            </div>
    </div>
</div>

@endsection

@section('script')
    <script>
            setTimeout(function() {
                $('#successMessage').fadeOut('fast');
                }, 1000);
                
                $("#successMessage").fadeTo(1000, 500).slideUp(500, function(){
                    $("#successMessage").alert('close');
                });
    </script>
@endsection