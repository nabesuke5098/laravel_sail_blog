<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Rules\TokyoAddress;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SignupController extends Controller
{
    public function index()
    {
        return view('signup');
    }

    public function store(Request $request)
    {
        $address = mb_convert_kana($request->input('address'), 'A');
        $request->merge(compact('address'));

        $data = $request->validate([
            'name' => ['required', 'string', 'max:20'],
            'email' => ['required', 'email:filter', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
            // 'address' => ['required_if:pref,東京都']
            // 'address' => [new TokyoAddress($request->input('pref'))]
        ]);

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);

        Auth::login($user);
        return redirect('mypage');
    }
}
