<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ChatController extends Controller
{
    public function index()
    {
        $users = User::query()->get();
        return view('home', ['users' => $users]);
    }

    public function store(Request $request)
    {
        $chat = new Chat();
        $chat->sentBy = Auth::user()->id;
        $chat->receivedBy = $request->receivedBy;
        $chat->message = $request->message;

        $chat->save();

        return redirect()->intended("/home/chat?id=$request->receivedBy");
    }

    public function show(Chat $chat, Request $request)
    {
        $users = User::query()->get();

        $chat = DB::table('chats')
            ->select('*')
            ->where('sentBy', '=', Auth::user()->id)
            ->where('receivedBy', '=', $request->id)
            ->orWhere('sentBy', '=', $request->id)
            ->where('receivedBy', '=', Auth::user()->id)
            ->get();

        return view('home', ['users' => $users, 'chat' => $chat, 'receiverId' => $request->id]);
    }
}
