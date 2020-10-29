<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        return view('page.auth.login');
    }

    public function login(AuthRequest $request)
    {
        $credentials = $request->validated();

        if (!Auth::attempt($credentials)) {
            return redirect()->back()->withErrors(['unauthorized' => 'Kombinasi username & password salah.']);
        }

        return redirect()->route('absensi.index');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('absensi.index');
    }
}
