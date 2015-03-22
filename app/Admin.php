<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use Hash;
use League\Flysystem\Exception;

class Admin extends Model {

	protected $table = 'admins';

    public function loginCheck($username, $password)
    {
        $r = DB::table('admins')->where('username', $username)->first(['username','password']);
//        dd($r->username);
        if(count($r) == 1)
        {

            try{
                if(Hash::check($password, $r->password))
                {
                    return true;
                }
            }catch(Exception $ex)
            {
                echo "ERROR";
                die();
            }

        }

        return false;
    }

}
