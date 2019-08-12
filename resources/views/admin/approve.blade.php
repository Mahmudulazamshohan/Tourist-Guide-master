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
        
    </style>
    
@endsection

@section('content')
    @if (Auth::user()->role == 'Admin')
            <form id="" action="{{ route('logout') }}" method="POST">
                {{ csrf_field() }}
                <h1 class="container jumbotron text-center" ><b class="text-primary col-md-offset-2">Admin Board</b>
                
                <button class="btn btn-default pull-right" style="color: red; margin-left: 5px;">LogOut <i class="fa fa-sign-out" aria-hidden="true"></i></button>
                <a href=" {{ route('dashbord') }} " type="button" class="btn btn-default pull-right"><span class="fa fa-hand-o-left" style="color:red;"></span> Dashbord</a>
                    
                </h1>
            </form> 
    @endif
    
    <div class="container">
            
            
        
        @if(Session::has('message'))
            <div id="successMessage" class="alert alert-dismissible alert-success" style="display: inline-block; float: right; ">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong> {{ Session::get('message') }} </strong>
            </div>
        @endif
        @isset($places)
        <div class="row">
                <table class="table table-responsive table-striped jumbotron">
                    <thead>
                        <th>Serial</th>
                        <th>Image</th>
                        <th>City Name</th>
                        <th>Place Title</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        <?php $id = 1; ?>
                        @foreach ($places as $place)
                        <tr>
                            <td class="text-center text-info" style="font-size: 70px;">{{ $id }}</td>
                            <td><img src="{{ asset('img').'/'.$place->placeimage }}" alt="" class="img img-responsive img-rounded"  style="width:200px; height: 150px; "/></td>
                            <td>{{ $place->cityname }}</td>
                            <td>{{ $place->placename }}</td>
                            <td><a class="btn btn-default btn-primary btn-sm" href="{{ route('viewApprovePlace', $place->id) }}"><i class="fa fa-eye" aria-hidden="true" > View</i></a></td>
                            
                            <?php $id++; ?>
                        </tr>
                        @endforeach
                        
                    </tbody>
                </table>
            </div>
    
        </div>   
        @endisset
        
        @isset($messages)
        <div class="row">
                <table class="table table-responsive table-striped jumbotron">
                    <thead>
                        <th>Serial</th>
                        <th>User Id</th>
                        <th>User Name</th>
                        <th>Message</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        <?php $id = 1; ?>
                        @foreach ($messages as $message)
                        <tr>
                            <td class="text-info" style="font-size: 30px;">{{ $id }}</td>
                            <td >{{ $message->user_id }}</td>
                            <td>{{ $message->user_name }}</td>
                            <td>{{ $message->message }}</td>
                            <td><a class="btn btn-default btn-primary btn-sm" href="{{ route('deleteMessage', $message->id) }}"><i class="fa fa-eye" aria-hidden="true" > Done</i></a></td>
                            
                            <?php $id++; ?>
                        </tr>
                        @endforeach
                        
                    </tbody>
                </table>
            </div>
    
        </div>
        @endisset
        

    

@endsection
