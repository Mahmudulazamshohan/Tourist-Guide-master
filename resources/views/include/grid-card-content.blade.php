{{-- Grid --}}
<style type="text/css">
  .fa-translate{
    font-size: 22px;
    transition: transform 1s;
   
  }
  .fa-translate:hover{
    transform: scale(1.2) !important;
  }
</style>
<div class="container" style="padding-top: 30px;">
	 <section id="pinBoot">
        <!-- @foreach ($blogs as $blog)
          <article class="white-panel">

            <img src="{{ asset('img').'/'.$blog->img }}" alt="">
            <div class="panel-contain">
              <h4>
            	<a href="{{route('viewplace',$blog->id)}}" >{{ $blog->name }}</a>
            	<div style="float:right;color: rgb(242, 156, 70);">
            		<i class="fa fa-star"></i>
            		<i class="fa fa-star"></i>
            		<i class="fa fa-star"></i>
            		<i class="fa fa-star"></i>
            		<i class="fa fa-star-half-full"></i>
            	</div>
              </h4>
              @php 
              $len = (strlen($blog->placedesc) / 100) * 50;

              @endphp
              <p>{{ $blog->placedesc }}</p>	
              <a href="{{route('viewplace',$blog->id)}}" class="btn btn-sm btn-info">more</a>
            </div>
            
          </article>
         @endforeach -->
         @foreach ($places as $place)
          <article class="white-panel" style="margin-top:20px;">

            <img src="{{ asset('img').'/'.$place->placeimage }}" alt="">
            <div class="panel-contain">
              <h4>
            	<a href="{{route('viewplace',$place->id)}}" >{{ $place->placename }}</a>
            	<div style="float:right;color: rgb(242, 156, 70);">

               <a href="{{ route('users-like',$place->id) }}">
                @if(!is_null($place->likes))
                 @if($place->likes->like)
                   <i class="fa fa-heart fa-translate" style="color: red;"></i>
                 @else
                   <i class="fa fa-heart fa-translate" style="color: #ccc;" ></i>
                 @endif
                @else
                   <i class="fa fa-heart fa-translate"  style="color: #ccc;"></i>

                @endif
              </a>

                @if(!is_null($place->reviews))
                  @for($i=1;$i<=5;$i++)
                   @if($i<$place->reviews->avgRate())
              	   	<i class="fa fa-star"></i>
                  @else
                    <i class="fa fa-star-half-full"></i>

                  @endif
                  @endfor
                @else
                @for($i=1;$i<=5;$i++)
                <i class="fa fa-star-half-full"></i>
                @endfor
              
                @endif
            	
            		
            	</div>
              </h4>
              @php 
              //$len = (strlen($place->overview) / 100) * 50;
              //use Illuminate\Support\Str;
              @endphp
              <p>{{ \Illuminate\Support\Str::limit($place->overview,300) }}</p>	
              <a href="{{route('viewplace',$place->id)}}" class="btn btn-sm btn-info">বিস্তারিত <i  class="fa fa-angle-double-right"></i></a>
            </div>
            
          </article>
         @endforeach
      
     </section>
</div>
                   
   {{--  Grid --}}
