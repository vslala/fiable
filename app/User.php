<?php namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use League\Flysystem\Exception;
use Hash;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['name', 'email', 'password'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];

    public function signUp($username, $email, $password, $cpassword)
    {
        $user = User::where(["username"=>$username])->get();

        if(count($user) >0)
        {
            return "Username already exists!";
        }

        try{
            if($password === $cpassword)
            {
                $user = new User();
                $user->username = $username;
                $user->password = Hash::make($password);
                $user->email = $email;
                $user->save();
                $userArray = ['username'=>$user->username,'userID'=>$user->id];
                return $userArray;
            }

            return "Passwords do not match";
        }catch (Exception $ex)
        {
            return false;
        }


    }

    public function signIn($username, $password)
    {
        $user = new User();
        try{
            $hashedPassword = null; $id = null;
            $users = $user->where("username", $username)->get();

            foreach($users as $u)
            {
                $id = $u->id;
                $hashedPassword = $u->password;
            }
//            dd($hashedPassword);
            if(! count($users) > 0)
            {
                return false;
            }


            if(count($user) == 1)
            {
                if(Hash::check($password, $hashedPassword))
                {
                    $response = ["username"=>$username, "id"=>$id];
                    return $response;
                }

                return false;
            }
        }catch(Exception $ex)
        {

        }
    }

}
