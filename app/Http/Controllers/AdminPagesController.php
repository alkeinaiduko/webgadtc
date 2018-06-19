<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Department;

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
      $depts = Department::all();

   	return view('admin-layouts.add-user', compact(['depts']));
   }
}
