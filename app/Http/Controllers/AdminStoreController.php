<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Announcement;
use App\Bulletin;
use App\User;

class AdminStoreController extends Controller
{
    public function postAnnouncement(Request $request)
    {
    	$this->validate(request(), [
    		'title' => 'required|min:5',
    		'description' => 'required|min:10',
            'announcement_image' => 'required|image|mimes:jpeg,jpg,png|max:10000'
    	]);
        // File Upload
        if($request->hasFile('announcement_image')) {
            $fileNameWithExt = $request->file('announcement_image')->getClientOriginalName();

            // GET FILE NAME
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);

            // GET EXTENSION
            $extension = $request->file('announcement_image')->getClientOriginalExtension();
            // File Unique Name
            $fileNameToStore = $filename. '_'. time().'.'.$extension;

            $path = $request->file('announcement_image')->storeAs('public/announcement_images', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }

    	// Announcement::create([
     //        'title' => request('title'),
     //        'description' => request('description'),
     //        'announcement_image' => $fileNameToStore
     //    ]);

        $ann = new Announcement;
        $ann->title = request('title');
        $ann->description = request('description');
        $ann->announcement_image = $fileNameToStore;
        $ann->save();

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
