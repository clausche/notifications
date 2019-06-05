<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Notifications\DatabaseNotification;

class NotificationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$notifications = auth()->user()->notifications;
        return view('notifications.index', [
            'unreadNotifications' => auth()->user()->unreadNotifications,
            'readNotifications' => auth()->user()->readNotifications,
        ]);
    }

    public function read($id)
    {
        DatabaseNotification::find($id)->markAsRead();
        return back()->with('flash', 'Notificacion marcada como leida!');
    }
    public function unread($id)
    {
        DatabaseNotification::find($id)->markAsUnread();
        return back()->with('flash', 'Notificacion marcada como No leida!');
    }
    public function destroy($id)
    {
        DatabaseNotification::find($id)->delete();
        return back()->with('flash', 'Notificacion eliminada!');
    }
}
