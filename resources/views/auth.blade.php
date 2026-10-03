<div>
    @auth
        <p>Selamat datang, {{ Auth::user()->name }}</p>
    @endauth

    @guest
        <p>Silakan login untuk mengakses fitur ini.</p>
    @endguest
</div>