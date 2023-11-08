<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 

class WelcomeController extends Controller
{
    public function index()
    {
        
        if (Auth::check()) {
            
            $userName = Auth::user()->name;
        } else {
            
            $userName = 'Guest';
        }
        return view('welcome', ['userName' => $userName]);
    }
}