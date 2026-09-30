<?php
namespace App\Http\Middleware;
use Closure;
use Illuminate\Http\Request;
use Auth;

class Admin
{
    public function handle(Request $request, Closure $next, $role)
    {
        // 1. Cek apakah pengguna sudah login
        if (!$request->user()) {
            return response()->json(['message' => 'Harap login terlebih dahulu!'], 401);
        }
        // 2. Jika sudah login, baru cek apakah rolenya sesuai
        if ($request->user()->role !== $role) {
            return response()->json(['message' => 'Akses ditolak!'], 403);
        }

        return $next($request);
    }

    public function terminate($request, $response)
    {
        \Log::info('Request selesai', ['url' => $request->fullUrl()]);
    }
}