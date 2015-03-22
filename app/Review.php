<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model {

	protected $table = "reviews";

    public function addReview($imageID, $review)
    {
        $r = new Review();
        $r->review = $review;
        $r->imageID = $imageID;
        $r->save();
        return true;
    }

}
