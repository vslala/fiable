<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model {

	protected $table = 'contacts';

    public function store($userID, $fname, $lname, $subject, $message)
    {
        $contact = new Contact();
        $contact->userID = $userID;
        $contact->firstName = $fname;
        $contact->lastName = $lname;
        $contact->subject = $subject;
        $contact->message = $message;
        $contact->save();
        return 'Thank You for contacting us. <br>We will reach you as soon as we can.';
    }

}
