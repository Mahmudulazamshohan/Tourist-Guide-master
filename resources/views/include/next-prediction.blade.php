
<style>
  /* The container */
.containers {
  display: block;
  position: relative;
  padding-left: 35px;
  margin-bottom: 12px;
  cursor: pointer;
  font-size: 22px;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

/* Hide the browser's default radio button */
.containers input {
  position: absolute;
  opacity: 0;
  cursor: pointer;
}

/* Create a custom radio button */
.checkmark {
  position: absolute;
  top: 0;
  left: 0;
  height: 25px;
  width: 25px;
  background-color: #eee;
  border-radius: 50%;
}

/* On mouse-over, add a grey background color */
.containers:hover input ~ .checkmark {
  background-color: #ccc;
}

/* When the radio button is checked, add a blue background */
.containers input:checked ~ .checkmark {
  background-color: #2196F3;
}

/* Create the indicator (the dot/circle - hidden when not checked) */
.checkmark:after {
  content: "";
  position: absolute;
  display: none;
}

/* Show the indicator (dot/circle) when checked */
.containers input:checked ~ .checkmark:after {
  display: block;
}

/* Style the indicator (dot/circle) */
.containers .checkmark:after {
  top: 9px;
  left: 9px;
  width: 8px;
  height: 8px;
  border-radius: 50%;
  background: white;
}
.questions label{
  margin-left: 30px !important;
  color: #fff;
}
.questions p{
  font-size: 18px;
   color: #fff;
}
.modal--p{
  font-size: 18px;
  color:white;
}
.bg-dark{
  background: #555 !important;
}
</style>
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
          <form action="{{route('ai-data')}}" method="POST">
            {{csrf_field()}}
    <div class="modal-content" style="background: #555;">
      <div class="modal-header" style="clip-path: polygon(0 0, 100% 0, 100% 54%, 0% 100%);background-image:linear-gradient(to right bottom, rgba(0, 200, 81,0.56), rgba(255, 187, 51,0.56)),  url('https://images.pexels.com/photos/1266808/pexels-photo-1266808.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940');background-size: cover;background-position: 10% 100%;">
        <p class="modal--p">Next Prediction</p>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:white;">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body bg-dark">
  
          <div class="questions">
            <p>আপনি কি সমুদ্র সৈকত পছন্দ করেন ?</p>
            <label >হ্যাঁ
            <input type="radio" checked="checked" name="beach" value="yes">
            </label>
            <label >না
            <input type="radio"  name="beach" value="no">

          </label>
          <p>আপনি কি পাহাড় পছন্দ করেন ?</p>
            <label >হ্যাঁ
            <input type="radio" checked="checked" name="hill" value="yes">
            </label>
            <label >না
            <input type="radio"  name="hill" value="no">
           
          </label>
          <p>আপনি কি জাদুঘর পছন্দ করেন? ? </p>
            <label >হ্যাঁ
            <input type="radio" checked="checked" name="museum" value="yes">
            </label>
            <label >না
            <input type="radio"  name="museum" value="no">
           
          </label>
          <p>আপনি কি ঐতিহাসিক জায়গা পছন্দ  করেন? ?</p>
            <label >হ্যাঁ
            <input type="radio" checked="checked" name="historical" value="yes">
            </label>
            <label >না
            <input type="radio"  name="historical" value="no">
           
          </label>
          <p>আপনি প্রাকৃতিক জায়গা পছন্দ করেন?</p>
            <label >হ্যাঁ
            <input type="radio" checked="checked" name="natural" value="yes">
            </label>
            <label >না
            <input type="radio"  name="natural" value="no">
           
          </label>
          <p>আপনি কি বেশি জনপ্রিয় জায়গা গুলো পছন্দ করেন ? </p>
            <label >হ্যাঁ
            <input type="radio" checked="checked" name="most_popular" value="yes">
            </label>
            <label >না
            <input type="radio"  name="most_popular" value="no">
           
          </label>
          <p>আপনি কি কম জনপ্রিয় জায়গা গুলো পছন্দ করেন ? ?</p>
            <label >হ্যাঁ
            <input type="radio" checked="checked" name="less_popular" value="yes">
            </label>
            <label >না
            <input type="radio"  name="less_popular" value="no">

          </label>
          <p>আপনি দীর্ঘ সফর করতে চান ?</p>
            <label >হ্যাঁ
            <input type="radio" checked="checked" name="long" value="yes">
            </label>
            <label >না
            <input type="radio"  name="long" value="no">
           
          </label>
          <p>আপনি সফর ট্রিপ চান ?</p>
            <label >হ্যাঁ
            <input type="radio" checked="checked" name="trip" value="yes">
            </label>
            <label >না
            <input type="radio"  name="trip" value="no">
           
          </label>
          <p>আপনি কি দিনের জায়গা গুলো করেন??</p>
            <label >হ্যাঁ
            <input type="radio" checked="checked" name="day" value="yes">
            </label>
            <label >না
            <input type="radio"  name="day" value="no">
           
          </label>
          <p>আপনি কোন জায়গা পছন্দ  করেন?</p>
            <label >হোটেল
            <input type="radio" checked="checked" name="hotel" value="hotel">
            </label>
            <label >কটেজ 
            <input type="radio"  name="hotel" value="cortez">
           
          </label>
          <label >রিসোট 
            <input type="radio"  name="hotel" value="resorts">
           
          </label>
          <p>
আপনি কি ধরনের হোটেল মূল্য চান?</p>
            <label >কম
            <input type="radio" checked="checked" name="hotel_price" value="low">
            </label>
            <label >উচ্চ
            <input type="radio"  name="hotel_price" value="high">
           
          </label>
          
          

          </div>

       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Predict</button>
      </div>
    </div>
     </form>
  </div>
</div>
