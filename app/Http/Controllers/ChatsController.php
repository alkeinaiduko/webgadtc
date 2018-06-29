<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Chat;
use App\User;
use Auth;
use App\Events\ChatPosted;

class ChatsController extends Controller
{
    public function getChat()
    {
    	return Chat::with('user')->get();
    	// return response()->json($chats);
    }

    public function store()
    {
    	$user = Auth::user();

    	$chat = $user->chats()->create([
    		'chat' => request()->get('chat')
    	]);

    	broadcast(new ChatPosted($chat, $user))->toOthers();

    	// event(new ChatPosted($chat, $user));

    	return ['status' => 'success'];
    }

    public function getUser()
    {
        return Auth::user();
    }
}
