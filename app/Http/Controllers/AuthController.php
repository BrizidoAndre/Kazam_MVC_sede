<?php

namespace App\Http\Controllers;

use App\Models\Organizer;
use Http;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function index()
    {
        $re = Http::post('https://jsonplaceholder.typicode.com/posts', [
            'body' => [
                'during that time' => 'i was young',
            ]
        ]);
        dump($re->json());
        return view('index');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => ['required'],
            'password' => ['required'],
        ]);
        if (\Auth::attempt($request->only(['email', 'password']))) {
            return redirect()->route('event.index');
        }
        session()->flash('info', 'Email or password not correct');
        return redirect()->route('login');
    }

    public function logout()
    {
        \Auth::logout();

        return redirect()->route('login');
    }
}
