<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\SampleNotification;
use Mail;


class TransactionController extends Controller
{
  public function index(){
    // $data = ['msg'=>'名前を入力して下さい'];
    //$data = ['msg'=>'',];
    return view('mail.mail_form');
  }

  public function postSendMail(Request $request){
    // $mail_name = $request->get('user_name');
    // $mail_text = $mail_name.' 様、ご購入ありがとうございました';
    // $data = $request->session()->get('ordered_data');
    // $mail_to = $request->get('mail_address');
    // Mail::to($mail_to)->send( new SampleMail($mail_name, $mail_text, $data) );
    $to = [
	    [
	        'email' => 'kazuma444756@gmail.com',
	        'name' => 'Test',
	    ]
    ];
    Mail::to($to)->send(new SampleNotification());

  }
}
