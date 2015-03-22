<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Http\Requests;
use App\Blog;
use App\Contact;
use App\sCategory;
use Illuminate\Http\Request;
use Session;

class HomeController extends Controller {
    /*
      |--------------------------------------------------------------------------
      | Home Controller
      |--------------------------------------------------------------------------
      |
      | This controller renders your application's "dashboard" for users that
      | are authenticated. Of course, you are free to change or remove the
      | controller as you wish. It is just here to get your app started!
      |
     */

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard to the user.
     *
     * @return Response
     */
    public function session($userID){
        if(! Session::get("userID"))
        {
            if($userID == "default"){
                Session::put("userID", uniqid());
            }else{
                Session::put("userID", $userID);
            }
        }

        return "";
    }

    public function index() {
        $count = count(Cart::where('userID', Session::get('userID'))->get());
        $category = new sCategory();
        $categories = $category->all();
        return view('site.home', compact('categories', 'count'));
    }

    public function blog(Blog $blog) {
        $count = count(Cart::where('userID', Session::get('userID'))->get());
        $blogs = $blog->all();
        return view('site.blog', compact('blogs','count'));
    }

    public function about() {
        
    }

    public function contact() {
//        $count = count(Cart::where('userID', Session::get('userID'))->get());
        return view('site.contact');
    }

    public function store(Request $request) {

        $this->validate($request, [
           'firstName'=>'required',
            'lastName'=>'required',
            'email'=>'email|required',
            'subject'=>'required',
            'message'=>'required'
        ]);

//        if ( ! $v->passes())
//        {
//
//            if(Request::ajax())
//            {
//                $response_values = array(
//                    'validation_failed' => 1,
//                    'errors' =>  $v->errors()->toArray());
//                return Response::json($response_values);
//            }
//            else
//            {
//                return Redirect::to('contact')
//                    ->with('validation_failed', 1)
//                    ->withErrors($v);
//            }
//
//        }

        
        if ($request->isXmlHttpRequest()) {
            $fname = $request->get('firstName');
            $lname = $request->get('lastName');
            $subject = $request->get('subject');
            $message = $request->get('message');
            $userID = uniqid();

            $contact = new Contact();
            $message = $contact->store($userID, $fname, $lname, $subject, $message);
            json_encode($message);
            return $message;
            
        }
        // if($request->isAjax())
        // {
        //     
        // }
    }

}
