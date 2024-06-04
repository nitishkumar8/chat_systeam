<?php namespace App\Http\Controllers;

use App\Models\Chat;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function index(Request $request)
    {
        // Fetch chats where the user is either the sender or receiver
        $chats = Chat::where('user_id', $request->user()->id)
                    ->orWhere('receiver_id', $request->user()->id)
                    ->with(['user', 'receiver'])
                    ->get();

        return response()->json($chats);
    }

    public function store(Request $request)
    {
        $request->validate([
            'message' => 'required|string',
            'receiver_id' => 'required|exists:users,id',
        ]);

        $chat = Chat::create([
            'user_id' => $request->user()->id,
            'receiver_id' => $request->receiver_id,
            'message' => $request->message,
        ]);

        return response()->json($chat, 201);
    }

    public function show(Chat $chat)
    {
        $this->authorize('view', $chat);

        return response()->json($chat->load(['user', 'receiver']));
    }
}
