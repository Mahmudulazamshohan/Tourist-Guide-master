<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Tourist Guide</title>

        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-design/0.3.0/css/roboto.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-design/0.3.0/css/material-fullpalette.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-design/0.3.0/css/ripples.min.css">
        <link href="{{ asset('css/slider.css') }}" rel="stylesheet">
        
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body style="background:linear-gradient(to right bottom, rgba(0, 0, 0,0.56), rgba(0, 0, 0,0.56)), url('https://images.pexels.com/photos/2125075/pexels-photo-2125075.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=1360');background-position: cover;overflow-x: hidden;">
    	<nav class="navbar navbar-inverse" style="border-radius: 0;background: #00C851;border:none;margin: 10px;">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">{{env('APP_NAME')}}</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active">
        	<a href="{{ route('home') }}">Home</a>
        </li>
       
          
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="{{ route('reg') }}"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
        <li><a href="{{ route('user_login') }}"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>
    </div>
  </div>
</nav>
  <div class="row">
  	<div class="col-md-2">
  		
  	</div>
  	<div class="col-md-8">
  		<h1 style="font-family: arial;color:white;font-size: 22px;text-align: center;">
  			ধন্য বাদ আমাদের সাইট এ ভিজিট করার জন্য।
  		</h1>
  		<div class="panel panel-default" style="padding: 20px;background: #007E33;color: #fff;">

       	  <p>বাংলাদেশ প্রাক্রিতিক  সৌন্দর্যের দেশ। এখানে ভ্রমনের জন্য পর্যাপ্ত জায়গা   রয়েছে।
কিন্তু অনেকেই এই জায়গা সম্পর্কে ভালো ভাবে জানেন না।   আবার  অনেকেই কোথায় ঘুরতে জাবেন বা তার পছন্দের সাথে তাল মিলিয়ে জায়গা পছন্দ করতে পারেন না।এমন কি তাদের চাওয়া পাওয়া গুলো থাকবে এমন জায়গা বের করার জন্ন্যে আলাদা আলদা ভাবে বিভিন্নধরনের জায়গা গুলো খুজতে হয়।

তাদের জন্য আমাদের সাইট টি উপযুক্ত হবে।</p>
<br>
<p>
	আমাদের সাইট এ আপনি বাংলাদেশের সকল দর্শনীয় স্থানগুলো সম্পর্কে জানতে  পারবেন। সেখানে থাকা খাওয়ার  খবরগুলো পাবেন। ঢাকা থেকে
যাতায়াত সম্পর্কে  জানতে পারবেন।
আপনি এই জেনে অবাক হবেন  যে, এই সাইট এ ভবিষ্যৎ এ আপনি কোথায় ভ্রমন করতে পারেন সেই নিরদেশনা পাবেন।
</p>

<br>
<p>
 আপনি আমাদের এই সাইট ব্যবহার করতে চাইলে প্রথমে আপনাকে একটি  account  খুলতে হবে। তার জন্ন্যে আপনাকে log in  পেজ এ গিয়ে   sign up  বাটন এ ক্লিক করতে হবে।
একটি ফর্ম আসবে,  যেখানে আপনি আপনার ই-মেইল, পাসওয়ার্ড, নাম এবং মোবাইল  নাম্বার প্রবেশ করে ওকে করবেন। 	
</p>


<br>
<p>
	এর পর লগ ইন করতে ভেলিড ই-মেইল  এবং  পাসওয়ার্ড  প্রবেশ করে লগ ইন এ ক্লিক করতে হবে।
</p>

<br>
<p>
 লগ ইন করার পর আপনার সামনে একটা প্রশ্ন পত্র আসবে, যেটা আপনাকে অবশ্যই রেডিও একটিভ বাটন দিয়ে পুরন করতে হবে। অন্নথায় আপনার সামনে বার বার আই প্রশ্ন পত্র আসতে থাকবে।	
</p>

<br>
এই তৈথ্য এর ভিত্তিতেই আপনি ভবিষ্যতে ভ্রমনের পরামর্শ পাবেন। 

পরামর্শ দেখতে চাইলে আপনাকে পরবর্তী ভ্রমন এ ক্লিক করতে হবে।

ধন্যবাদ আপনাকে আমাদের সাথে থাকার জন্ন্যে।
       </div>
  	</div>
  	<div class="col-md-2">
  		
  	</div>
  </div>
  
    </body>
    </html>

