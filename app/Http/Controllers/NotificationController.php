<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function markallasread(){
    	auth()->user()->unreadNotifications->markAsRead();
    	echo"Notification Marked as Read";
    }

    public function DeleteAllNotifications(){
    	auth()->user()->notifications()->delete();
    	echo"Notification Deleted Successfully!";
    }
}
