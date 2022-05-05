<?php

namespace App\Http\Controllers;

use App\Models\Details;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    public function dashboard()
    {
        $details = Details::orderBy('created_at', 'desc')->paginate(7);
        return view('admin.dashboard',['title' => 'dashboard', 'details' => $details]);
    }
}
