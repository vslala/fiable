<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use League\Flysystem\Exception;
use DB;

class Cart extends Model {

	protected $table = "cart";

    public function checkCart($userID, $pid)
    {
        $cart = new Cart();
        $count = count($cart->where(['userID'=>$userID, 'pid'=>$pid])->get());

        if($count > 0)
        {
            return false;
        }else{
            return true;
        }
    }

    public function addProduct($pid, $userID, $name, $brand, $size, $price, $type, $design, $image)
    {
        $flag = $this->checkCart($userID,$pid);

        try{
            if($flag){
                $cart = new Cart();
                $cart->pid = $pid;
                $cart->userID = $userID;
                $cart->name = $name;
                $cart->brand = $brand;
                $cart->size = $size;
                $cart->price = $price;
                $cart->type = $type;
                $cart->design = $design;
                $cart->image = $image;
                $cart->save();
                return true;
            } else{
                return false;
            }
        }catch (Exception $ex){
            return false;
        }

    }

    public function deleteProduct($userID, $pid){
        try{
            DB::delete("DELETE FROM cart WHERE userID=:userID AND pid=:pid", ['userID'=>$userID, "pid"=>$pid]);
            return true;
        }catch (Exception $e){
            return false;
        }


    }

}
