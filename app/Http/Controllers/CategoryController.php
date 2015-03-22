<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Images;
use App\mCategory;
use App\sCategory;
use App\Products;
use App\UserDisplay;
use App\UserProfile;
use Illuminate\Http\Request;
use DB;
use App\Cart;
use Session;

class CategoryController extends Controller {

	public function handmadeItems(sCategory $categories, mCategory $m)
    {
//        dd(Session::get("userID"));
        $count = count(Cart::where('userID', Session::get('userID'))->get());
        $mid = $m->where('name', 'Handmade Items')->get(['id'])->toArray();
        $categories = $categories->where('c_id', $mid[0]['id'])->get();
        return view('category.handmadeItems', compact('categories', 'count'));
    }

    public function pcservice(sCategory $categories, mCategory $m)
    {
        $count = count(Cart::where('userID', Session::get('userID'))->get());
        $mid = $m->where('name', 'PC Service')->get(['id'])->toArray();
        $categories = $categories->where('c_id', $mid[0]['id'])->get();
        return view('category.pcservice', compact('categories', 'count'));
    }

    public function electrical()
    {
        $count = count(Cart::where('userID', Session::get('userID'))->get());
    }

    public function consultant()
    {
        return view("category.consultant");
    }

    public function photography()
    {
        $flag = false;

        $users = DB::table('users')
            ->join('userprofiles', 'users.id', '=', 'userprofiles.userID')
            ->join('userdisplays', 'users.id', '=', 'userdisplays.userID')
            ->select('userprofiles.firstName', 'userprofiles.lastName', 'users.id',
                'userprofiles.about', 'userprofiles.experience', 'userprofiles.mobile', 'userprofiles.email',
                'userdisplays.name', 'userdisplays.url'
                )
            ->get();
//        dd($users);
        if(count($users)== 0)
        {
            $users = null;
        }
        if(! Session::has("username"))
        {
            $flag = true;
            return view("category.photography", compact("flag", "users"));
        }
        return view("category.photography", compact("flag", "users"));
    }

}
