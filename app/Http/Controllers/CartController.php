<?php namespace App\Http\Controllers;

use App\Address;
use App\Cart;
use App\City;
use App\Customer;
use App\Http\Requests;
use App\Order;
use Illuminate\Http\Request;
use App\State;
use App\User;
use App\Http\Controllers\Controller;
use App\Images;
use App\Products;
use League\Flysystem\Exception;
use Session;
use Illuminate\Http\Response;
use DB;

class CartController extends Controller {


	public function add($pid,$name,$brand,$size,$price,$type,$design,$image, $userID)
    {
        if(! Session::get("userID"))
        {
            if($userID == "default"){
                Session::put("userID", uniqid());
            }else{
                Session::put("userID", $userID);
            }
        }


        $cart = new Cart();
        $flag = $cart->addProduct($pid,Session::get('userID'),$name,$brand,$size,$price,$type,$design, $image);
        if($flag){
            $count = count($cart->where('userID', Session::get('userID'))->get());
            Session::put('productCount', $count);

            $userID = Session::get("userID");
            return ["message"=>$name. " has been added to the cart!","userID"=>$userID];
        } else{
            return ['message'=>"The product has already been added to the cart!",
                "userID"=>Session::get("userID")];
        }


    }

    public function insertQuantity(Request $request)
    {
        if($request->ajax() && $request->isMethod("put")){
            $quantity = $request->get('q');
            $pid = $request->get('productID');

            try{
                DB::table('cart')
                    ->where(["userID"=>Session::get("userID"), "pid"=>$pid])
                    ->update(array('quantity'=>$quantity));

                return ['message'=>"Quantity Added To the database"];
            }catch(Exception $e){
                return ['message'=>"Error inserting in the database"];
            }

        }
    }

    public function delete($pid, $userID, Cart $cart){
        $pid = intval($pid);
//        dd($pid);
//        DB::delete(DB::raw("DELETE FROM cart WHERE userID=:userID, pid=:pid ", ['userID'=>$userID,'pid'=>$pid]));
        $flag = $cart->deleteProduct($userID,$pid);
        if($flag){
            return ['message'=>'true'];
        }else{
            return ['message'=>'false'];
        }
    }

    public function buy($pid,$name,$brand,$size,$price,$type,$design,$image, $userID){
        /*
         * If the userID is null then the jquery will set the userID as "default",
         * In that case the user will be assumed to be a new user and a new userID will be alloted to the user
         * otherwise, it will be the userID of the user.
         */
        if(! Session::get('userID'))
        {
            if($userID === "default"){
                Session::put("userID", uniqid());
            }else{
                Session::put("userID", $userID);
            }
        }
        $cart = new Cart();
        $flag = $cart->addProduct($pid,Session::get('userID'),$name,$brand,$size,$price,$type,$design, $image);
        if($flag){
            return redirect(route('cartShow'));
        }

        return redirect(route('cartShow'));
//        $cart->userID = Session::get('userID');
//        $cart->name = $name;
//        $cart->brand = $brand;
//        $cart->size  = $size;
//        $cart->price = $price;
//        $cart->type = $type;
//        $cart->design = $design;
//        $cart->image = $image;
//        try{
//            $cart->save();
//            return redirect(route('cartShow'));
//        } catch(Exception $ex){
//            die($ex);
//        }
    }


    public function show()
    {
        $count = count(Cart::where('userID', Session::get('userID'))->get());

        if($count == 0){
            return redirect(route('home'));
        }
        $cart = Cart::where("userID",Session::get('userID'))->get();

        return view('cart.cart', compact('cart', 'count'));
    }

    public function checkout(Request $request)
    {
        $addresses = new Address();
        $addresses = $addresses->where(["userID"=>Session::get("userID")])->get();

        $states = State::all();
        $cities = City::all();
        $cart = new Cart();
        $userID = Session::get('userID');
//        dd($userID);
        $pids = $cart->where("userID", $userID)->get(['pid']);
        $totalAmount = $request->get('amountPayable');
        $message = $request->get('amountPayable');
        return view('cart.checkout', compact('message', 'states', 'cities', 'totalAmount', 'addresses'));
    }

    /*
     * Get request sent with the address id of the existing address
     */
    public function summaryAddress($addressID, $totalAmount)
    {
        if($addressID)
        {
            $add = new Address();
            $address = $add->where('id', $addressID)->get([
                'id','userID','firstName', 'lastName', 'email', 'address_one', 'address_two', 'landmark', 'state','city', 'mobile'
            ])->toArray();

            $state = State::where('id', $address[0]['state'])->get(['name']);
            $city = City::where('id', $address[0]['city'])->get(['name']);

            return view('cart.summary', compact('totalAmount', 'address', 'state', 'city'));
        }
    }

    public function summary(Request $request)
    {
        if($request->isMethod('put'))
        {
            $userID = Session::get('userID');
            $firstName = $request->get('firstName');
            $lastName = $request->get('lastName');
            $email = $request->get('email');
            $addressOne = $request->get('address_one');
            $addressTwo = $request->get('address_two');
            $landmark = $request->get('landmark');
            $state = $request->get('state');
            $city = $request->get('city');
            $totalAmount = $request->get('totalAmount');
            $mobile = $request->get('mobile');

            $add = new Address();
            $id = $add->addAddress($userID,$firstName,$lastName,$email, $addressOne, $addressTwo, $landmark, $state, $city, $mobile);

            /*
             * Add fname, lname,email and randomPassword into the customer table.
             */

//            dd($add->get());
            if($id)
            {
                $address = $add->where('id', $id)->get([
                    'id','userID','firstName', 'lastName', 'email', 'address_one', 'address_two', 'landmark', 'state','city', 'mobile'
                ])->toArray();

                $state = State::where('id', $address[0]['state'])->get(['name']);
                $city = City::where('id', $address[0]['city'])->get(['name']);

                return view('cart.summary', compact('totalAmount', 'address', 'state', 'city'));
            }

        }
    }

    public function confirm($addressID, $firstName, $lastName, $email, $totalAmount)
    {
          $order = new Order();
        $flag = $order->addOrder(Session::get("userID"), $firstName, $lastName, $email, $addressID, $totalAmount);

        if(! $flag)
        {
            $message = "There was some error. Please refresh the page again.";
            return view("cart.confirm", compact('message'));
        }
        $cart = Cart::where("userID", Session::get("userID"))->get(['pid'])->toArray();
//        dd($cart);

//        foreach($cart as $c)
//        {
//            $order = new Order();
//            $order->userID = Session::get("userID");
//            $order->firstName = $firstName;
//            $order->lastName = $lastName;
//            $order->email = $email;
//            $order->pid = $c['pid'];
//            $order->quantity = $c['quantity'];
//            $order->addressID = $addressID;
//            $order->totalAmount = $totalAmount;
//            $order->save();
//        }
        /*
         * All the required details are inserted in the customer database.
         */
        $customer = new Customer();
        $flag = $customer->addCustomer(Session::get("userID"),$cart[0]['pid'], $firstName, $lastName, $email, $totalAmount);
        if($flag){
            $message = "Thank You for purchasing from us. Your order details will be mailed to u shortly";
            DB::table("cart")->where("userID", Session::get("userID"))->delete();
            return view("cart.confirm", compact('message'));
        }else{
            $message = "There was some error. Please refresh the page again.";
            return view("cart.confirm", compact('message'));
        }
    }


}
