<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use League\Flysystem\Exception;

class Customer extends Model {

	protected $table = "customers";

    public function addCustomer($userID, $pid, $firstName, $lastName, $email, $totalAmount)
    {
        try{
            $c = new Customer();
            $c->userID = $userID;
            $c->pid = $pid;
            $c->firstName = $firstName;
            $c->lastName = $lastName;
            $c->email = $email;
            $c->totalAmount = $totalAmount;
            $c->save();
            return true;
        }catch (Exception $e){
            return false;
        }

    }

}
