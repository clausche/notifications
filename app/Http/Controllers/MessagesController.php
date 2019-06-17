<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Message;
use App\Notifications\MessageSent;
use Faker\Factory;
use Illuminate\Database\Eloquent\Faker;
use Illuminate\Support\Str;

class MessagesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function create()
    {
        $users = User::where('id', '!=', auth()->id())->orderBy('id','desc')->get();
        return view('home', compact('users'));
    } 

    public function store(Request $request)
    {

        $this->validate($request, [
            'body' => 'required',
            'recipient_id' => 'required|exists:users,id',
        ]);

        $message = Message::create([
            'sender_id' => auth()->id(),
            'recipient_id' => $request->recipient_id,
            'body' => \Faker\Factory::create()->paragraph
        ]);

        $recipient = User::find($request->recipient_id);
        
        $recipient->notify(new MessageSent($message));

        return back()->with('flash', 'Mensaje enviado exitosamente');
    }

    public function show($id){

        $message = Message::findOrFail($id);
        
        return view('messages.show', compact('message'));
    }
}
