<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Selamat Datang</title>
</head>
<body style="font-family: Arial, sans-serif; color: #222; line-height: 1.6;">
    <h1>Halo, {{ $user->name }}!</h1>

    <p>
        Terima kasih telah mendaftar di
        <strong>{{ config('app.name') }}</strong>.
    </p>

    <p>
        Akun dengan email <strong>{{ $user->email }}</strong>
        berhasil dibuat.
    </p>

    <p>
        Silakan verifikasi email kamu melalui link yang kami kirimkan.
    </p>

    <p>
        Salam,<br>
        {{ config('app.name') }}
    </p>
</body>
</html>