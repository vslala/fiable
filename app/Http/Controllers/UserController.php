<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Review;
use App\UserDisplay;
use App\UserImage;
use App\UserProfile;
use Session;
use Illuminate\Http\Request;

class UserController extends Controller {

    /*
     * This is a get request to return the Home page with suitable data
     */
	public function home()
    {
        $flag = true;
        if(! Session::has("username"))
        {
            return redirect(route('photography'));
        } else{
            $users = UserProfile::find(Session::get("userID"))->toArray();
            $images = UserImage::where("userID", Session::get("userID"))->get();
            $dp = UserDisplay::find(Session::get("userID"))->toArray();
            $reviews = Review::all();
//            dd($reviews);
            if(count($dp) == 0)
            {
                $dp = null;
            }
            return view("user.home", compact('dp','users', 'images', 'flag', 'reviews'));
        }

    }

    /*
     * This is a get request to return the Profile page with suitable data
     */
    public function profile()
    {
        $user = UserProfile::where(["username"=>Session::get("username"), "userID"=>Session::get("userID")])->get()->toArray();
        $image = UserDisplay::where(["username"=>Session::get("username"), "userID"=>Session::get("userID")])->get()->toArray();
//        dd($user);
        if(count($user) == 0)
        {
            $user = null;
        }
        if(count($image) == 0)
        {
            $image = null;
        }

        return view("user.profile", compact('user', 'image'));
    }

    public function updateProfile(Request $request)
    {
        if($request->isMethod("put"))
        {
            $firstName = $request->get("firstName");
            $lastName = $request->get("lastName");
            $email = $request->get("email");
            $mobile = $request->get("mobile");
            $xp = $request->get("xp");
            $about = $request->get("about");
            $username = Session::get("username");
            $userID = Session::get("userID");

            $user = new UserProfile();
            $flag = $user->check($username, $userID, $firstName, $lastName, $email, $mobile, $xp, $about);

            if($flag)
            {
                return redirect(route("userProfile"));
            }
        }
        $message = "There was some error updating the profile";
        return view("user.profile", compact('message'));
    }

    public function dp(Request $request)
    {
        if($request->isMethod("put"))
        {
            if($request->file("file")->isValid())
            {
//                dd($request->file("file"));
                $username = Session::get("username");
                $file = $request->file("file");
                $imageName = $file->getClientOriginalName();
                $url = "public/img/user/".$username;

                $file->move($url, $imageName);
                $dp = new UserDisplay();
                $flag = $dp->check(Session::get("userID"),$username,$imageName, 'img/user/'.$username.'/'.$imageName );

                if($flag)
                {
                    return redirect(route("userProfile"));
                }

                dd("Error");
            }
        }
    }

    public function getProfile($id)
    {
        $flag = false;
        $users = UserProfile::find($id)->toArray();
        $dp = UserDisplay::find($id)->toArray();
        $images = UserImage::where("userID", $id)->get();
        $reviews = Review::all();
//        dd($dp);
        return view("user.home", compact("users", "dp", "images", "flag", "reviews"));
    }

    public function userImages(Request $request)
    {
        if($request->isMethod("put"))
        {
            if($request->file("file")->isValid())
            {
                $file = $request->file("file");
                $username = Session::get("username");
                $userID = Session::get("userID");
                $imageName = $file->getClientOriginalName();
                $description = $request->get("description");
                $url = "public/img/user/".$username."/portfolio";
                $file->move($url, $imageName);

//                dd($userID);
                $user = new UserImage();
                $flag = $user->insert($userID,$username,$imageName,"img/user/".$username."/portfolio/".$imageName,$description);

                if($flag)
                {
                    return redirect(route("userHome"));
                }
            }
        }
    }

    public function addReview(Request $request)
    {
        if($request->ajax())
        {
            $review = $request->get("review");
            $imageID = $request->get("imageID");

            $r = new Review();
            $flag = $r->addReview($imageID,$review);

            if($flag)
            {
//                $reviews = DB::table('reviews')->order_by('created_at', 'desc')->first()->toJson();
                $reviews = $r->orderBy("created_at", "desc")->where("imageID", $imageID)->take(1)->get()->toJson();
                return $reviews;
            }
        }
    }


}
