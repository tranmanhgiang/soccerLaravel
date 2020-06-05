<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Mail;
use App\User;
use App\Mail\sendmailCatch;

class MailController extends Controller
{
    public function sendToUser($id)
    {
        $user = User::find($id);
        Mail::to($user->email)->send(new sendmailCatch(Auth::user()));
        if( count(Mail::failures()) > 0 ) {

            echo "There was one or more failures. They were: <br />";
         
            foreach(Mail::failures() as $email_address) {
                echo " - $email_address <br />";
             }
         
        } else {
            $user->clubs->find_amatch->status = 1;
            $user->clubs->find_amatch->save();
            return redirect('front')->with('success','Bắt đối thành công!');
        }

    }    
}
