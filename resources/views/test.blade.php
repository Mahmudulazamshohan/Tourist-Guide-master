@extends('layouts.app')

@section('css')
    <link href="{{ asset('css/loginStyle.css') }}" rel="stylesheet">
    <style>

        /*
    IMPORTANT : 
    Background Image from unsplash 
    
    feel free to use this code ! 
*/
 body{
    padding-top: 50px;
    font-family: Montserrat, sans-serif;
    background-image: url("https://s16.postimg.org/4erognbdx/10px_bg.jpg");
    background-size: cover;
  }
body *{
transition:0.2 ease;
-o-transition: 0.2s ease;
-moz-transition: 0.2s ease;
-webkit-transition:0.2s ease;
}
  .form{
    padding: 0 0 1em 0;
    width:90%;
    margin: auto;
    text-align: center;
    background: linear-gradient(to bottom, rgba(0,50,150,0.4), rgba(0,0,30,0.3));
    background-size: cover;
    border-radius: 5px;
  }
  .form .first-login{
    color: #333;}

  .form .icon-login{
    width:100px;
    height: 100px;}
  .form .first-row{
    border-bottom:1px solid rgba(0,200,255,0.4);
    padding:1em 0;
    border-radius: 5px 5px 0 0;
    background: rgba(0,0,0,0.2);
    }
    .form .first-row h2{
      color:#ddd;
    }
  .form .input-group{
    padding:0.5em 2em;}
  .form .input-group input{
    border:1px solid #007CFF;
    height:3em;
    font-size: 18px;}
  .form .input-group .form-control{
    color:#007CFF;}
  .form .input-group .input-group-addon{
    background-color: #ddd;
    border:1px solid #007CFF;
    border-left: none;
    color:#007CFF;
  }
  .remember-me, .forget {
    padding: 1em 2em;
    color:#eee;
    text-transform: uppercase;
  }
  .remember-me{
    text-align: left;
  }
  .forget{
    text-align: right;
  }
  .forget a{
    color: #eee;
    text-decoration: none;
  }
  .switch {
    margin:0.1em 0.5em;
    float:left;
    position: relative;
    display: inline-block;
    width: 30px;
    height: 17px;
  }
  .switch input {display:none;}
  .slider {
    position: absolute;
    cursor: pointer;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: #ccc;
    -o-transition: .4s;
    -moz-transition: .4s;
    -webkit-transition: .4s;
    transition: .4s;
}
  .slider:before {
    position: absolute;
    content: "";
    height: 10px;
    width: 10px;
    left: 4px;
    bottom: 4px;
    background-color: white;
    -o-transition: .4s;
    -moz-transition: .4s;
    -webkit-transition: .4s;
    transition: .4s;
  }

  input:checked + .slider {
    background-color: #2196F3;
  }
  input:focus + .slider {
    box-shadow: 0 0 1px #2196F3;
  }
  input:checked + .slider:before {
    -ms-transform: translateX(13px);
    -o-transform: translateX(13px);
    -moz-transform: translateX(13px);
    -webkit-transform: translateX(13px);
    transform: translateX(13px);
  }
  .slider.round {
    border-radius: 34px;
  }

  .slider.round:before {
    border-radius: 50%;
  }
  .login-btn{
    width: 75%;
    background: #00AEEF;
  }
  .social-login{
    margin-top: 25px
  }
  .social-login .btn-group{
    margin: 1em 1;
  }
  .social-login .btn-fb{
    background: #3B5998;
  }
  .social-login .btn-fb:hover{
    border-color: #2E6DA4;
  }
  .social-login .btn-tw {
    background:#1DA1F2;
  }
  .social-login .btn-tw:hover{
    border-color: #46B8DA;
  }
  .social-login .btn-fb,
  .social-login .btn-tw{
    font-size: 16px;
  }
  .social-login i{
    padding: 0.2em;
  }
  .social-login{
    text-align: center;
    padding:2em 0;
  }
  .social-login .btn-group{
    margin:1em;
  }
  h3{
    color:#ddd;
  }
  .sign-up{
    color:#ddd;
  }
  .sign-up a{
    color:#007CFF;
  }
  @media(max-width:768px){
    .form{
      width:100%;
    }
  }*/
    </style>
@endsection

@section('content')
<div class="container">
    <h1 class="jumbotron text-center"><b class="text-info" style="font-family: Curlz MT; font-size: 60px; "> Tourist Guide</b></h1>

        

        
        <!-- Main Contain -->
        <div class="row container">
           
            <div class="col-md-6" style="margin-top: 25px;">
                <!-- Image -->
                <img class="img img-responsive" src="img/login.gif" alt="alt text" style="width: 600px; height: 470px;">
            </div>

        <!-- Reg Form -->
        
                <div class="col-md-6" style="margin-top: 25px;">
                
                        <div class="form">
                                <!-- the input -->
                              <div class="first-row">
                                <a href="#"><img src="https://s13.postimg.org/r7a1xqv1j/1480623034_lock.png" alt="login" class="icon-login"></a>
                                <h2 class="first-login">LOGIN</h2>
                              </div>
                              <form class="" method="POST" action="{{ route('login') }}">
                                    {{ csrf_field() }}
                                  <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Username">
                                    <span class="input-group-addon">
                                      <span class="fa fa-user fa-2x"></span>
                                    </span>
                                  </div>
                                  <div class="input-group">
                                    <input type="password" class="form-control" placeholder="password">
                                    <span class="input-group-addon">
                                      <span class="fa fa-lock fa-2x"></span>
                                    </span>
                                  </div>
                                </form>
                                <div class="row">
                                  <div class="remember-me col-sm-6 col-xs-6">
                                    <label class="switch">
                                      <input type="checkbox">
                                      <div class="slider round"></div>
                                    </label>
                                    <p>Remember Me</p>
                                  </div>
                                  <div class="forget col-sm-6 col-xs-6">
                                    <a href="#">Forgot your password ?</a>
                                  </div>
                                </div>
                        
                                <a href="#" class="btn btn-primary btn-lg login-btn">LOGIN</a>
                                <p class="sign-up">Not A Member ? <a href="#">SIGN UP Now!</a></p>
                              </div>
                            </div>
                            
    </div>
                      
</div>
@endsection

@section('script')

@endsection