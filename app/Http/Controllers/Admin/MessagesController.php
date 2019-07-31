<?php

namespace App\Http\Controllers\Admin;

use App\Message;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMessageRequest;

class MessagesController extends Controller
{
    public function index()
    {
        $messages = Message::all();
        return view('admin.messages.index', compact('messages'));
    }
    public function store(StoreMessageRequest $request)
    {
        $messages = Message::create($request->all()); 
        return $messages;
    }

    public function show(Message $message)
    {
        return view('admin.messages.show', compact('message'));
    }

    public function destroy(Message $message)
    {
        $message->delete();
        return back()->withFlash('El mensaje se elimino correctamente');
    }

}
