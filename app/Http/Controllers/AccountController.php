<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Session;
use App\User;
use Illuminate\Http\Request;

class AccountController extends Controller {

	public function signIn()
    {

        return view('account.signIn');
    }

    public function signInAuth(Request $request)
    {
        if($request->isMethod("put"))
        {
            $user = new User();
            $response = $user->signIn($request->get("username"), $request->get("password"));
//            dd($response['id']);
            if($response)
            {
                Session::put("username", $response['username']);
                Session::put("userID", $response['id']);
                return redirect(route("userProfile"));
            } else {
                $message = "Username or Password is invalid!";
                return view("account.signIn", compact('message'));
            }
        }
    }

    public function signUp()
    {

        return view('account.signUp');
    }

    public function signUpAuth(Request $request)
    {
        if($request->isMethod("put"))
        {
            $username = $request->get("username");
            $email = $request->get("email");
            $password = $request->get("password");
            $cpassword = $request->get("cpassword");
            $user = new User();
            $response = $user->signUp($username,$email,$password,$cpassword);

            if($response == true)
            {
                $message = "You have been successfully signed up!";
                return view("account.signUp", compact("message"));
            }else{
                return view("account.signUp", compact("response"));
            }
        }

    }

    public function signOut()
    {
        Session::flush();
        return redirect(route("photography"));
    }

}
