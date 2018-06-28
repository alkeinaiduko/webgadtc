<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserPagesController extends Controller
{
    public function loadDeptView()
    {
    	return view('user-layouts.department');
    }
}
