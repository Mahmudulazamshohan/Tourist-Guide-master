
<div class="main-tourist-bg" style="margin-top: 55px;">

	      <div class="content-center">
	      	 <p id="clock" style="text-align: center;color: #fff;font-size: 22px;font-weight: bold;"></p>
	      	{{-- <form action="{{ route('home') }}" method="GET">
	      	<div class="searchbar">
			<input class="search_input" type="text" name="q" placeholder="Search..." id="tags" >
			<button type="submit" class="search_icon">
			<i class="fa fa-search"></i>
			</button>
			</div>  
			</form> --}}
			<div class="grid-container">
	      	<div>
	      		<i class="fa fa-map-marker "></i>
	      		<h1>স্থান</h1>
	      		<p style="text-align: center;font-size: 16px;color:#fff;">{{$totalP}}</p>

	      	</div>
	      	<div>
	      		<i class="fa fa-info"></i>
	      		<h1>তথ্য</h1>
	      		<p style="text-align: center;font-size: 16px;color:#fff;">{{$questionTotal}}</p>
	 
	      	</div>
	      	<div>
	      		<i class="fa fa-question"></i>
	      		
	      		<h1>প্রশ্ন</h1>
	      		
	      		<p style="text-align: center;font-size: 16px;color:#fff;">0</p>

	      	</div>
	      	<div>
	      		<i class="fa fa-search"></i>
	      		<h1>ভ্রমণ </h1>
	      		<p style="text-align: center;font-size: 16px;color:#fff;">{{$blogTotal}}</p>
	      		
	      	</div>
	      </div>
	     
        <script type="text/javascript">
          setInterval(function(){
            var date = new Date();
            $("#clock").text(date.toString().substring(0,40))
          });
        </script>
	      </div>
	      
			               
	{{-- <div class="content-images">

		<div class="images">

			<h1>Any place you want </h1>
			<p>Discover new place</p>
		</div>
	</div> --}}
	{{-- <div class="content-text">
		<div class="content-container">
			<div style="width: 50%;margin-top: 100px;display: flex;flex-direction: row;display: none;">
			  <input type="text" class="form-control" style="height: 40px;width: 100% !important;">
	
			  <button class="btn btn-primary" style="margin:0;">
			  	<i class="fa fa-search"></i>
			  </button>
			</div>
			
			<a class="btn btn-primary btn-positions" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{csrf_field()}}
                                    </form>
			
		</div>
	</div> --}}

</div>
<style type="text/css">
	 .searchbar{
    margin-bottom: auto;
    margin-top: auto;
    height: 60px;
    background-color: #eee;
    border-radius: 30px;
    padding: 10px;
    }

    .search_input{
    color: #000;
    border: 0;
    outline: 0;
    background: none;
    width: 0;
    color:#000;
    line-height: 40px;
    transition: width 0.4s linear;
    }
      ul#ui-id-1{
      	margin-top: 200px;
      	margin-left: 200px;
      	width: 200px !important;
      }
    .searchbar .search_input{
    padding: 0 10px;
    width: 650px;
    caret-color:red;
    transition: width 0.4s linear;
    }

    .searchbar .search_icon{
    background: white;
    color: #e74c3c;
    }

    .search_icon{
    height: 40px;
    width: 40px;
    float: right;
    display: flex;
    justify-content: center;
    align-items: center;
    border-radius: 50%;
    color:white;
    border:2px solid #ff4949;
	box-shadow:inset 0 2px 5px 0 rgba(0,0,0,.16), 0 2px 10px 0 rgba(0,0,0,.12);

    }
    .content-center{
    	margin: 100px auto 0 auto;

    }
    .grid-container {
  display: grid;
  grid-template-columns: auto auto auto auto;
	 grid-column-gap: 5px;
	 margin-top: 50px;

}
.grid-container div{
	background: #141a30;
	margin-top: 30px;
	width: 100%;
	border-radius: 3px;
	display: flex;
	flex-flow: column;
	padding: 10px;
	box-shadow: 0 2px 5px 0 rgba(0,0,0,.16), 0 2px 10px 0 rgba(0,0,0,.12);
	clip-path: polygon(25% 0%, 100% 0%, 75% 100%, 0% 100%);
}
.grid-container div i{
	width: 40%;
	text-align: center !important;
	font-size: 22px;
	color: #fff !important;
	background: #fe445b;
	margin:0 auto 0 auto;
	height: 40px;
	border-radius: 5px;
	box-shadow: 0 2px 5px 0 rgba(0,0,0,.16), 0 2px 10px 0 rgba(0,0,0,.12);
	
}
.grid-container div h1{
	text-align: center;
	color: #fff !important;
	font-size: 22px;

}
</style>