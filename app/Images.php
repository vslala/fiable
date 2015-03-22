<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use League\Flysystem\Exception;

class Images extends Model {

	protected $table = 'images';

    public function uploadMultiple($pid, $url, $viewUrl, $files)
    {
        try{
            foreach($files as $file)
            {
                $file->move($url, $file->getClientOriginalName());
                $image = new Images();
                $image->name = $file->getClientOriginalName();
                $image->url = $viewUrl.$file->getClientOriginalName();
                $image->product = $pid;
                $image->save();
            }
            return true;
        }catch(Exception $ex)
        {
            return false;
        }
    }

}
