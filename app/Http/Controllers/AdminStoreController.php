<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Announcement;

class AdminStoreController extends Controller
{
    public function postAnnouncement()
    {
    	$this->validate(request(), [
    		'title' => 'required|min:5',
    		'description' => 'required|min:10'
    	]);

    	Announcement::create([
    		'title' => request('title'),
    		'description' => request('description')
    	]);

    	return back()->with('success', 'Announcement Posted Successfully!');

    }
}
