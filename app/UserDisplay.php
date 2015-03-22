<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use League\Flysystem\Exception;

class UserDisplay extends Model {

	protected $table = "userdisplays";

    public function check($userID, $username, $name, $url)
    {
        try{
            $dp = new UserDisplay();
            $image = $dp->where(['userID'=>$userID, 'username'=>$username])->get();
            if(count($image) == 1)
            {
                return $this->updateImage($userID, $username, $name, $url);
            } else {
                return $this->insertImage($userID, $username, $name, $url);
            }

            return false;
        }catch(Exception $ex)
        {
            return false;
        }
    }

    public function updateImage($userID, $username, $name, $url)
    {
            $dp = new UserDisplay();
            $dp->where(['username'=>$username, 'userID'=>$userID])->update(['name'=>$name,'url'=>$url]);
            return true;
    }

    public function insertImage($userID, $username, $name, $url)
    {
        /*
         * While uploading image to the directory make sure to add the public folder before the url
         */
        $dp = new UserDisplay();
        $dp->userID = $userID;
        $dp->username = $username;
        $dp->name = $name;
        $dp->url = $url;
        $dp->save();
        return true;
    }

}
