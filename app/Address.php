<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use League\Flysystem\Exception;

class Address extends Model {

	protected $table = "addresses";

    public function addAddress($userID, $firstName, $lastName, $email, $addressOne, $addressTwo, $landmark, $state, $city, $mobile)
    {
        try{

            $this->userID = $userID;
            $this->firstName = $firstName;
            $this->lastName = $lastName;
            $this->email = $email;
            $this->address_one = $addressOne;
            $this->address_two = $addressTwo;
            $this->landmark = $landmark;
            $this->state = $state;
            $this->city = $city;
            $this->mobile = $mobile;
            $this->save();

            return $this->id;
        }catch(Exception $ex){
            return false;
        }

    }

}
