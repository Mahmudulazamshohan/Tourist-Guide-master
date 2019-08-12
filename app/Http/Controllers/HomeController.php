<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Place;
use App\Blog;
use App\User;
use App\UserDetail;
use App\Review;
use App\Hotel;
use App\UserSuggestion;
use Auth;
use App\LikeDislike;
use App\Like;
use App\Group;
use App\GroupPost;
use App\GroupUsers;
use Illuminate\Support\Facades\Storage;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }
    public function groups($id,Request $request){
        if(!Group::find($id)){
            return redirect()->to('/');
        }
        if(!GroupUsers::where('group_id',$id)->where('user_id',Auth::id())->first()){
            return redirect()->to('/');
        }
        $groupUsers = GroupUsers::where('user_id',Auth::id())->get();


        $users = User::limit(5)->inRandomOrder()->get();
        if($request->has('user_search')){
            $users = User::where('name','like','%'.$request->user_search.'%')->orWhere('email','like','%'.$request->user_search.'%')->get();
        }
        $groupPost = GroupPost::where('group_id',$id)->orderBy('id','desc')->get();

        return view('group',['users' =>$users,'id'=>$id,'groupPosts' =>$groupPost,'groupUsers'=>$groupUsers]);
    }
    public function groupCreate(){
        $groups = Group::where('user_id',Auth::id())->get();
        $groupUsers = GroupUsers::where('user_id',Auth::id())->get();
        return view('create-group',compact('groups','groupUsers'));
    }
    public function storeGroupPost(Request $request){
        if($request->has('texts')){
            if(GroupUsers::where('group_id',$request->group_id)->where('user_id',Auth::id())->count()){
                 GroupPost::create([
                    'group_id'=>$request->group_id,
                    'user_id'=>Auth::id(),
                    'text'=>$request->texts
                 ]);
                 return redirect()->back();
             }else{
                 return redirect()->back();
             }
            
           
        }else{
            return redirect()->back();
        }
    }
    public function storeGroupUser($id,$user_id){
        GroupUsers::create([
            "user_id"=>$user_id,
            "group_id"=>$id
        ]);
        return redirect()->back();
    }

    public function createGroup(Request $request){
        $this->validate($request,[
            'name'=>'required'
        ]);
        $group = Group::create([
            "name"=>$request->name,
            'user_id'=>Auth::id()
        ]);
        if($group){
            GroupUsers::create([
                "user_id"=>Auth::id(),
                "group_id"=>$group->id
            ]);
        }

        return redirect()->back();
    }
    public function storeComment(Request $r)
    {
        $this->validate($r,[
            'comment'=>'required'
        ]);
        //Comment Store
        $comment=\App\Comments::create([
                    'user_id'=>Auth::id(),
                    'place_id'=>$r->place_id,
                    'comment_text'=>$r->comment
                ]);
         
         return redirect()->back();

    }
    public function likeLove($id){

        if(Like::where('user_id',Auth::id())
            ->where('place_id',$id)->first()==null){
             Like::create([
                'user_id'=>Auth::id(),
                'place_id'=>$id,
                'like'=>true
            ]);

            return redirect()->back();   
        }else{
            $like = Like::where('user_id',Auth::id())
            ->where('place_id',$id)->first();
            if($like->like){
                 Like::where('user_id',Auth::id())
                 ->where('place_id',$id)
                 ->update([
                    'like'=>false,
                ]);
            }else{
                Like::where('user_id',Auth::id())
                 ->where('place_id',$id)
                 ->update([
                    'like'=>true,
                ]);
            }
            
           
            return redirect()->back();

        }
    }
    public function tab(){
        return view('tab');
    }
    public function blogShow(Request $r)
    {
        if($r->has('q')){
           $blogs = Blog::where('name','like','%'.$r->q.'%')
                         ->orWhere('placedesc','like','%'.$r->q.'%')
                         ->orWhere('placelocation','like','%'.$r->q.'%')
                         ->paginate(100);
           $place = Place::where('placename','like','%'.$r->q.'%')
                         ->where('status',1)
                         ->orWhere('overview','like','%'.$r->q.'%')
                         ->orWhere('cityname','like','%'.$r->q.'%')
                         ->orderBy('cityname','asc')
                        ->paginate(100);
                        //dd($place) ;

        }else{
             $blogs = Blog::orderBy('id','desc')->paginate(2000);
             $place = Place::where('status',1)
                           ->orderBy('id','desc')
                           ->paginate(1000); 
              //dd($place) ;
        } 
        

        //dd($places);
        return view('home',['blogs' => $blogs,'places'=>$place]);
    }

    public function shareBlog()
    {
        return view('user/shareblog');
    }

    public function suggestedPlace()
    {
        //$places = Place::where('status', 1)->paginate(9);
        $userdetail = Auth::user()->userDetails;
        
        //$places = Place::where('status', 0)->paginate(9);
        $places = Place::Where('tag', $userdetail->beach)
        ->orWhere('tag', $userdetail->hill)
        ->orWhere('tag', $userdetail->museum)
        ->orWhere('tag', $userdetail->temple)
        ->orWhere('tag', $userdetail->historical_place)
        ->orWhere('tag', $userdetail->water_fall)
        ->orWhere('tag', $userdetail->natural_place)
        
        ->paginate(9);
        
        //dd($places);
        return view('user/suggestedplace', ['places' => $places]);
    }

    public function viewPlace($id)
    {
       
        $place = Place::find($id);
        $user_id = Auth::user()->id;
        $reviews = Review::where('user_id',$user_id)->where('place_id',$id)->first();

        //$reviews = Auth::user()->reviews->place_id;
        
        $count = Review::where('place_id', $id )->count();
        $avg = Review::where('place_id', $id)->avg('rate');
        //echo $reviews;
        //dd($reviews->place_id);
        $comments = \App\Comments::where('place_id',$id)->get();

        //return view('user/viewplace', ['reviews' => $reviews]);
        return view('user/viewplace')->with('place', $place)->with('count', $count)->with('avg', $avg)->with('reviews', $reviews)
            ->with('comments',$comments);
    }

    public function addBlog(Request $request)
    {
        //return $request->all();
        $blog = new Blog;

        $blog->name = $request->place_name;
        $blog->placelocation = $request->placelocation;
        $blog->placedesc = $request->description;

        $imageName = $request->file('image')->getClientOriginalName();

        $request->file('image')->move(base_path() . '/public/img', $imageName);

        $blog->img = $imageName;

        $blog->save();

        Session::flash('message','Blog Add successfully.');

        //return view('user/shareblog');
        return redirect()->route('home');

    }

    public function cat($cat)
    {
        //echo $cat;
        $places = Place::where('tag',  $cat)->where('status',  1)->paginate(9);
        //dd($place);
       
        return view('user/suggestedplace', ['places' => $places]);
    }

    public function profile($id)
    {
        $user = User::find($id);
        //$n = \App\NextPrediction::where('user_id');
        $points = \App\Points::where('user_id',Auth::id())->get();

        //dd($user);
        //dd($user->userDetails->where());
        return view('user/profile')
               ->with('user', $user)
               ->with('points',$points);
    }

    public function updateUser(Request $request, $id)
    {
          $this->validate($request,[
            'fname'=>'required',
            'name'=>'required',
            'email'=>'required',
            'userImg'=>'file|mimes:jpg,png,jpeg,gif,svg|max:1024'
        ]);

        $user = User::find($id);
        //dd($user);
         $user->fname = $request->fname;
         $user->name = $request->name;
         $user->email = $request->email;
         $user->role = "User";


        if ( empty( $request->file('userImg') ) ) {
            //$user->user_img = "null";
        }else{
            //Storage::delete('profiles/'.$user->userImg);

            $file = $request->file('userImg');;
            /**
             * File Uploaded with Storage
             */
            $user->user_img = Storage::put('profiles',$file);
        }
        
        
        $user->save();
        
        //echo "<script>alert('Course Update')</script>";
        \Session::flash('message','Update successfully.');
        \Session::flash('alert-class', 'alert-danger'); 
        Session::flash('message','User info Updated...!!!');
      
        $hc = new HomeController;
        return redirect()->back();
        
    }
    public function addDetails(Request $request, $id)
    {
        //echo 'hello';
        //return $request->all();
         $userdetail =new UserDetail;

        $userdetail->user_id = $id;
        $userdetail->beach = $request->beach;
        $userdetail->hill = $request->hill_station;
        $userdetail->museum = $request->museum;
        $userdetail->temple = $request->temple;
        $userdetail->historical_place = $request->historical_place;
        $userdetail->water_fall = $request->water_fall;
        $userdetail->natural_place = $request->natural_place;

        $userdetail->save();

        Session::flash('message','User Details Added...!!!');

        $hc = new HomeController;
        return $hc->suggestedPlace();


    }
    public function UpdateDetails(Request $request)
    {
        
        //return $request->all();
        $userdetail = Auth::user()->userDetails;
        // UserDetails::where('user_id', Auth::user()->id)->get();
        //dd($userdetail);

        $userdetail->beach = $request->beach;
        $userdetail->hill = $request->hill_station;
        $userdetail->museum = $request->museum;
        $userdetail->temple = $request->temple;
        $userdetail->historical_place = $request->historical_place;
        $userdetail->water_fall = $request->water_fall;
        $userdetail->natural_place = $request->natural_place;

        $userdetail->save();

        Session::flash('message','User Details Updated...!!!');

        //$hc = new HomeController;
        //return $hc->profile(Auth::user()->id);
        $id = Auth::user()->id;
        return redirect()->route('profile',$id);


    }

    public function addPostPage()
    {
        return view('user/addPost');
    }

    public function userAddPost( Request $request)
    {
        //add place
        
        $place = new Place;
        $place->user_id = $request->user_id;
        $place->cityname = $request->cityname;
        $place->placename = $request->placename;
        $place->overview = $request->placeoverview;
        
        if ( empty ( $request->busrent ) ) {
            $place->bus = "null";
        }else{
            $place->bus = $request->busrent;
        }

        if ( empty ( $request->trainrent ) ) {
            $place->train = "null";
        }else{
            $place->train = $request->trainrent;
        }

        if ( empty ( $request->airrent ) ) {
            $place->air = "null";
        }else{
            $place->air = $request->airrent;
        }

        if ( empty ( $request->shiprent ) ) {
            $place->ship = "null";
        }else{
            $place->ship = $request->shiprent;
        }
        
        
        $imageName = $request->file('itemImage')->getClientOriginalName();

        $request->file('itemImage')->move(base_path() . '/public/img', $imageName);

        $place->placeimage = $imageName;

        $place->tag = $request->placeType;
        $place->status = "0";

        $place->save();

        //Session()->put('name', 'ok');
        //add hotel
       
        foreach ($request->hotel_name as $key => $name) {
            $hotel =new Hotel;
            $hotel->user_id = $request->user_id;
            $hotel->place_id = $place->id;
            $hotel->hotel_name = $request->hotel_name[$key];
            $hotel->hotel_type = $request->hotel_type[$key];
            $hotel->hotel_price = $request->hotel_price[$key];
            $hotel->save();

        }
        Session::flash('message','Place Add successfully.');

        //dd($place);
        //return redirect()->route('dashbord')->with('place', $place);
        //return view('admin/dashbord');
        return view('user/addPost');
    }

    
    public function search(Request $request)
    {
        //return $request->all();
        
        $places = Place::where('placename',  $request->data)
                       ->orWhere('cityname',$request->data)
                       ->orWhere('tag',$request->data)

                       ->where('status',  1)->paginate(9);
        
        return view('user/suggestedplace', ['places' => $places]);
    }

    public function review(Request $request)
    {
        //return $request->all();
        $review =new Review;

        $review->user_id = $request->user_id;
        $review->place_id = $request->place_id;
        $review->rate = $request->rate;

        $review->save();

        //$id = Auth::user()->id;
        return redirect()->route('viewplace',$request->place_id);

    }

    public function message(Request $request)
    {
        //return $request->all();
        $suggestion = new UserSuggestion;

        $suggestion->user_id = Auth::user()->id;
        $suggestion->user_name = $request->from;
        $suggestion->message = $request->message;
        $suggestion->status = 0;

        $suggestion->save();

        //Session::flash('message','Thank You For Your Suggestion');
        Session::flash('name', $request->from);

        return redirect()->route('home');
        
        
    }

    public function like(Request $request)
    {
        $like = LikeDislike::where('user_id', Auth::user()->id)->where('place_id', $request->id)->first();
        if($like != null){
            $like->like_status = 1;
            $like->save();
        }
        else{
            $like = new LikeDislike;
            $like->user_id = Auth::user()->id;
            $like->place_id = $request->id;
            $like->like_status = 1;
            $like->save();
        }
        // $countLike = LikeDislike::where('like_status', 1 )->where('place_id', $request->id)->count();

        // return $countLike;
    }

    public function dislike(Request $request)
    {
        $like = LikeDislike::where('user_id', Auth::user()->id)->where('place_id', $request->id)->first();
        if($like != null){
            $like->like_status = 0;
            $like->save();
        }
        else{
            $like = new LikeDislike;
            $like->user_id = Auth::user()->id;
            $like->place_id = $request->id;
            $like->like_status = 0;
            $like->save();
        }
        // $countDislike = LikeDislike::where('like_status', 0 )->where('place_id', $request->id)->count();

        // return $countDislike;
    }
}
