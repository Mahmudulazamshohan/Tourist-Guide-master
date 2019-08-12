<!DOCTYPE html>
<html lang="en">
<head>
  <title>{{__('GUIDE')}}</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
   <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
 
</head>
<style type="text/css">
	.p-10{
		padding: 50px;
		background: #141A30;
	box-shadow: 0 2px 5px 0 rgba(0,0,0,.16), 0 2px 10px 0 rgba(0,0,0,.12);
	min-height: auto !important;
  width: 50%;
  margin: 0 auto 0 auto;

	}
	body{
		background: #eee;
	}
  .nav-tabs>li>a{
    background: #FE445B;
    color: white;
    text-transform: uppercase;
  }
  .nav-tabs>li>a:hover{
    background: #000;
    color: white;
  }
  #home{
    padding: 10px;
  }
</style>
<body>

<div class="container p-10">
  

  <ul class="nav nav-tabs">
    <li class="active"><a  href="#">Home</a></li>
    <li>
    	<a  href="{{ route('home') }}">Tour</a></li>
    
  </ul>

  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
      <form action="{{ route('ai-search') }}" method="GET">
        <input type="number" name="cityname" class="form-control">
        <input type="number" name="bus" class="form-control">

        <input type="number" name="train" class="form-control">

        <input type="number" name="ship" class="form-control">
        <input type="number" name="air" class="form-control">
        <input type="number" name="tags" class="form-control">
        <input type="number" name="hotel_price" class="form-control">
        <button class="btn btn-info" type="submit">
          Predict
        </button>




      </form>
      <div id="slider"></div>
    </div>
    
 </h1>	
     
    </div>
    
  </div>
</div>

</body>
<script type="text/javascript">
  $( function() {
    $( "#slider" ).slider();
  } );
</script>
</html>
