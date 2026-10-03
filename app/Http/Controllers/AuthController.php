<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller {
    public function logout (Request $request) {
        Auth::logout(); // Logout user
        $request->session()->invalidate(); // Hapus sesi
        $request->session()->regenerateToken(); // Regenerasi CSRF token
        return redirect('/'); // Redirect ke halaman utama
    }
}