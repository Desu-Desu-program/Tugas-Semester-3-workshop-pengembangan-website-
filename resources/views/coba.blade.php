<!-- acara 11 -->
<!DOCTYPE html>
<html>
<head>
    <title>tugas minggu 3 acara 11-12</title>
</head>
<body>
    <div>
        <h1>hai</h1>

        @if($user->isAdmin())
            <p>Welcome, Admin!</p>
        @else
            <p>Welcome, User!</p>
        @endif

        <p>Hello, {{ $name }}</p>
    </div>
</body>
</html>