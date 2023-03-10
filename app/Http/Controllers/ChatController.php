<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function public_chat(){
    	return view('Chat.all_chat');
    }
}
