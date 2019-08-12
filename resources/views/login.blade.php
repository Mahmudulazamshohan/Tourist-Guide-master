<!DOCTYPE html>
<html>
<head>
  <title>Login Page</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
  <a href="{{ route('mainhome') }}" class="btn btn-info" style="margin-top: 100px; margin-left: 100px;">
    Home
  </a>
 <div class="container">

    <div class="row">
      <div class="col-md-3"></div>
      <div class="col-md-6">
        <div class="formbox">
        
          @foreach ($errors->all() as $message) 
            <div class="alert alert-warning alert-dismissible fade in">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            {{$message}}
            </div>          
         @endforeach

          <form action="{{route('login')}}" method="POST" >
            {{csrf_field()}}
            <div class="form-group">
              <label for="">Email</label>
               <input type="text" class="form-control form-control-lg" name="email"> 
            </div>
            <div class="form-group">
              <label for="">Password</label>
               <input type="text" class="form-control form-control-lg" name="password"> 
            </div>
            <button class="btn btn-success">Login</button>
            <a href="{{route('reg')}}">Create a new account
            </a>
            <br>
            <br>
           

            
          </form>
           <button class="btn btn-success" onclick="googleOauth()">
              <i class="fa fa-google"></i> Login with google
            </button>
        </div>
      </div>
      <div class="col-md-3"></div>
    </div>
                      
</div>
<style type="text/css">
  .formbox{
   /* background: rgba(255,255,255,0.45);*/
    background: rgba(0,0,0,0.15);
    border-radius: 4px;
    padding:15px 40px;
    margin-top: 20%;

  }
  .formbox label{
    color:#fff;
  }
  body{
    background:linear-gradient(to right bottom,
                                    rgba(0, 0, 0,0.46),
                                    rgba(0, 0, 0,0.46)),
                  url('https://images.pexels.com/photos/1301444/pexels-photo-1301444.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=1366');
    background-size: cover;
    background-position: 100%;
  }
</style>

</body>
<script type="text/javascript">
  function googleOauth (event) {
   
    window.open("https://accounts.google.com/servicelogin/signinchooser?flowName=GlifWebSignIn&flowEntry=ServiceLogin", "", "width=600,height=600");
     
  }
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js" >

</html>
