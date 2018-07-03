<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Announcement;
use App\Bulletin;

class UserPagesController extends Controller
{
    public function loadDeptView()
    {
    	return view('user-layouts.department');
    }

    public function viewAnnouncement($id)
    {
    	$announcement = Announcement::find($id);

    	$announcements = Announcement::latest()->get();

    	return view('user-layouts.read-announcement', compact(['announcement', 'announcements']));
    }

    public function viewBulletin($id)
    {
    	$bulletin = Bulletin::find($id);

    	return view('user-layouts.read-bulletin', compact(['bulletin']));
    }
}
