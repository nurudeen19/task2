<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notifications\Message;
use Notification;

class ContactController extends Controller
{
    public function mail(Request $request){
    	// validate input request
    	$request->validate([
    		'email' => 'required|email',
    		'message' => 'required|string'
    	]);

    	try {
    		Notification::route('mail','contact@fillycoder.com')->notify(new Message($request));
    	} catch (\Exception $e) {
    		return back()->with('error','Sorry something went wrong, try again later!');
    	}

    	return back()->with('success','Message sent successfully, thank you for contacting me!');
    }
}
