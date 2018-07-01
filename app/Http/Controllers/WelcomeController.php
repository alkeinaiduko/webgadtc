<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Announcement;
use App\Bulletin;

class WelcomeController extends Controller
{
    public function index()
    {
    	$announcements = Announcement::latest()->take(3)->get();

    	$bulletins = Bulletin::latest()->take(5)->get();

    	return view('welcome', compact(['announcements', 'bulletins']));
    }
}
