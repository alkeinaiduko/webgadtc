<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Announcement;
use App\Bulletin;

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

    public function postBulletin()
    {
        $this->validate(request(), [
            'title' => 'required|min:5',
            'who' => 'required',
            'what' => 'required|min:5',
            'where' => 'required|min:5',
            'when' => 'required'
        ]);

        Bulletin::create([
            'title' => request('title'),
            'who' => request('who'),
            'what' => request('what'),
            'where' => request('where'),
            'when' => request('when'),
            'description' => request('description')
        ]);

        return back()->with('success', 'Bulletin Posted Successfully!');
    }
}
