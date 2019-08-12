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
    </style>
@endsection

@section('content')
<div class="container">
    <div class="row">
            @include('include.homenav')
    </div>
        
    <div class="row">
            @include('include.sidenav')
            <div class="container col-lg-12" >
               
                <div class="row">
                    @foreach ($places as $place)
                    
                    @if ($place->status == 1)
                    <div class="col-md-4">
                            <a href="{{ route('viewplace', $place->id) }}">
                                <img src="{{ asset('img').'/'.$place->placeimage }}" alt=""  class="img img-responsive img-rounded"/>
                                <button class="btn btn-default col-md-push-3" href="{{ route('viewplace', $place->id) }}" ><?php 
                                    
                                    $delimiters = array('-', ',', ';', ' '); 
                                    $string = $place->placename;
                                    $ready = str_replace($delimiters, $delimiters[0], $string);
                                    $launch = explode($delimiters[0], $ready);
                                    
                                    if(count($launch) > 0){
                                        echo $launch[0];  
                                    }else{
                                        echo $place->placename;
                                    }
                                      ?>
                                </button>
                            </a>
                        </div>    
                    @endif

                    @endforeach
                    
                </div>
                
                <div class="col-md-offset-4">
                        {{ $places->links() }}
                </div>
            </div>
@endsection

@section('script')
    
@endsection