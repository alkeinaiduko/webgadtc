<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Announcement;
use App\Bulletin;
use App\User;

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

    public function addStudent()
    {
        // $this->validate(request(), [
        //     'username' => 'required',
        //     'password' => 'required',
        //     'firstname' => 'required',
        //     'middlename' => 'required',
        //     'lastname' => 'required',,
        //     'birthdate' => 'required',
        //     'sex' => 'required',  
        //     'address' => 'required',
        //     'department' => 'required'
        // ]);

        User::create([
            'email' => request('username'),
            'password' => Hash::make(request('password')),
            'firstname' => request('firstname'),
            'middlename' => request('middlename'),
            'lastname' => request('lastname'),
            'birthdate' => request('birthdate'),
            'sex' => request('sex'),
            'address' => request('address'),
            'department' => request('department')
        ]);

        return back()->with('success', 'Student Added Successfully!');
    }
}
