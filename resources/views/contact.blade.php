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
    
    

{!! Form::open(array('route' => 'add')) !!}

<table class="table table-responsive table-bordered form-group">

    <h1 class="panel-title text-danger">Add info</h1>
    <tr >
        <td ><b class="form-control"> Name:</b></td>
        <td><input class="form-control" type="text" name="name"  class="form-control" required="1" placeholder="Name"></td>
    </tr>
    <tr >
        <td ><b class="form-control"> Email:</b></td>
        <td><input class="form-control" type="text" name="email"  class="form-control" required="1" placeholder="Email"></td>
    </tr>
    <tr >
        <td ><b class="form-control"> Message:</b></td>
        <td><input class="form-control" type="text" name="msg"  class="form-control" required="1" placeholder="Message"></td>
    </tr>
    <tr >

        <td colspan="2"><button class="btn btn-default" type="submit" name="submit">Add</button></td>
        

    </tr>

</table>

{!! Form::close() !!}
{{'user id = '}}
{{ Auth::user()->id }}

<div>
        <table class="table table-dark">
                <thead>
                  <tr>
                    <th scope="col">Id</th>
                    <th scope="col">name</th>
                    <th scope="col">masg</th>
                    <th scope="col">email</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($infos as $info)
                  <tr>
                        <th scope="row">{{ $info->id }}</th>
                        <td>{{ $info->name }}</td>
                        <td>{{ $info->email }}</td>
                        <td>{{ $info->msg }}</td>
                      </tr>
                  @endforeach
                  
                </tbody>
              </table>
</div>
    
@endsection