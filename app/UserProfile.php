<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use League\Flysystem\Exception;
use DB;

class UserProfile extends Model {

	protected $table = "userprofiles";

    public function insert($username,$userID,$firstName,$lastName,$email, $mobile, $experience, $about)
    {
        try{
            $userProfile = new UserProfile();
            $userProfile->username = $username;
            $userProfile->userID = $userID;
            $userProfile->firstName = $firstName;
            $userProfile->lastName = $lastName;
            $userProfile->email = $email;
            $userProfile->mobile = $mobile;
            $userProfile->experience = $experience;
            $userProfile->about = $about;
            $userProfile->save();
            return true;
        }catch(Exception $ex)
        {
            return false;
        }

    }

    public function updateProfile($username,$userID,$firstName,$lastName,$email, $mobile, $experience, $about)
    {
        try{
            DB::table("userprofiles")->where(["username"=>$username, "userID"=>$userID])->update(
                [
                    "username"=>$username,
                    "userID"=>$userID,
                    "firstName"=>$firstName,
                    "lastName"=>$lastName,
                    "email"=>$email,
                    "mobile"=>$mobile,
                    "experience"=>$experience,
                    "about"=>$about,
                    "updated_at"=>new \DateTime()
                ]
            );

            return true;
        }catch(Exception $ex)
        {
            return false;
        }

    }

    public function check($username,$userID,$firstName,$lastName,$email, $mobile, $experience, $about)
    {
        $user = new UserProfile();
        $userProfile = $user->where(["username"=>$username, "userID"=>$userID])->get();

        if(count($userProfile) == 1)
        {
            return $this->updateProfile($username,$userID,$firstName,$lastName,$email, $mobile, $experience, $about);
        }
        else
        {
            return $this->insert($username,$userID,$firstName,$lastName,$email, $mobile, $experience, $about);
        }
    }

}
