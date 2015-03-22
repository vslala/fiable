<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use League\Flysystem\Exception;

class UserImage extends Model {

	protected $table = "userimages";

    public function insert($userID,$username,$name,$url,$description)
    {
        try{
            $userImage = new UserImage();
            $userImage->userID = $userID;
            $userImage->username = $username;
            $userImage->name = $name;
            $userImage->url = $url;
            $userImage->description = $description;
            $userImage->save();

            return true;
        }catch(Exception $ex)
        {
            return false;
        }
    }

    public function deleteImage($userID, $username, $id = null)
    {
        $file = new File();
        if($id !== null)
        {
            $image = DB::table('userimages')->where('id', $id)->get()->toArray();
            $file->delete("public/".$image[0]['url']);

            if(! file_exists("public/".$image[0]['url']))
            {
                DB::table('userimages')->where("id", $id)->delete();
                return true;
            }

            return false;
        }

        try{
            $image = DB::table('userimages')->where(['username'=>$username, 'userID'=>$userID])->get()->toArray();

            $file->delete("public/".$image[0]['url']);

            if(! file_exists("public/".$image[0]['url']))
            {
                DB::table('userimages')->where(['username'=>$username, 'userID'=>$userID])->delete();
            }


            return true;
        }catch (Exception $ex)
        {
            return false;
        }
    }

}
