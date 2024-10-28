<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MessageController extends Controller
{
    public function index()
    {
        $messages = Message::all();
        return view('messages',  ['messages' => $messages]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'text' => 'required|string|min:10|max:255',
            'subrayado' => 'boolean',
            'negrita' => 'boolean'
        ]);

        Message::create($request->only('text', 'subrayado', 'negrita'));
        return redirect()->route('messages.index');
    }

    public function editar_duda($id)
    {
        $message = Message::find($id);
        
        if ($message) {
            return view('edit', ['message' => $$message]);
        }

        return redirect()->route('message.index')->with('error', 'Duda no encontrada');
    }

    public function actualizar_duda(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'text' => 'required|text',
            'negrita' => 'boolean',
            'subrayado' => 'boolan',
        ]);

        if ($validator->fails()) {
            return redirect()->route('doubt.edit', $id)->withErrors($validator)->withInput();
        }

        $message = Message::find($id);
        if ($message) {
            $message->text = $request->input('text');
            $message->modulo = $request->input('negrita');
            $message->asunto = $request->input('subrayado');
            $message->save();

            return redirect()->route('message.index')->with('success', 'Duda actualizada correctamente');
        }

        return redirect()->route('message.index')->with('error', 'Duda no encontrada');
    }
}