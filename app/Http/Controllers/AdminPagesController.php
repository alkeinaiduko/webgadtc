<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminPagesController extends Controller
{
   public function showAddAnnouncementPage()
   {
	return view('admin-layouts.add-announcement');
   }

   public function showAddBulletinPage()
   {
   	return view('admin-layouts.add-bulletin');
   }

   public function showAddUserPage()
   {
   	return view('admin-layouts.add-user');
   }
}
