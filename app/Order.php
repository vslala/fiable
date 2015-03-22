<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use League\Flysystem\Exception;

class Order extends Model {

	protected $table = "orders";

    public function addOrder($userID, $firstName, $lastName, $email, $addressID, $totalAmount)
    {
        try{
            $cart = new Cart();
            $cart = $cart->where("userID", $userID)->get();

            foreach($cart as $c)
            {
                $order = new Order();
                $order->userID = $userID;
                $order->firstName = $firstName;
                $order->lastName = $lastName;
                $order->email = $email;
                $order->pid = $c->pid;
                $order->quantity = $c->quantity;
                $order->addressID = $addressID;
                $order->totalAmount = $totalAmount;
                $order->save();

            }


            return true;
        }catch(Exception $ex)
        {
            return false;
        }
    }

}
