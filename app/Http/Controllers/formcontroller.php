<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rules\Uppercase;

class FormController extends Controller
{
    public function submitForm(Request $request)
    {
        $messages = [
            'name.required' => 'Nama tidak boleh kosong!',
            'email.required' => 'Email tidak boleh kosong!',
            'warna.min' => 'Minimal pilih 1 warna.',
            'warna.max' => 'Maksimal pilih 3 warna.',
            'password.confirmed' => 'Password tidak cocok!'
        ];

        $request->validate([
            'name' => ['required', 'min:3', 'max:50', new Uppercase], 
            'email' => 'required|email',
            'warna' => 'required|array|min:1|max:3',
            'password' => 'required|min:6|confirmed'
        ], $messages);

        return "Data berhasil divalidasi!";
    }
}