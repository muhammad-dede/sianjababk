<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function index()
    {
        return view('notification.index');
    }

    public function read($id)
    {
        $notification = DatabaseNotification::where('id', $id)->first();

        $notification->update([
            'read_at' => now(),
        ]);

        return redirect($notification->data['url']);
    }

    public function readAll()
    {
        auth()->user()->unreadNotifications->markAsRead();

        return redirect()->back();
    }
}
