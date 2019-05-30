<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Requests\ContactUsRequest;
use Mail;
use Validator;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

	public function contact(ContactUsRequest $request){
		
		Mail::send('emails.contact', ['request' => $request], function ($mail) use ($request) {
			//$mail->from($request->get('email'),$request->get('name'));
			$mail->from('info@scriptreports.com','Script Reports');
            $mail->to('scriptreports1@gmail.com', 'Ann Wolf')->cc('naman.r.b@gmail.com')->subject('Message Form '.$request->get('name'));
			//$mail->to('naman.r.b@gmail.com', 'Harpreet Singh')->subject('Message Form '.$request->get('name'));
        });
		
		return back()->withSuccess(trans("success.contact-msg-send"));
	}
	
	
}
