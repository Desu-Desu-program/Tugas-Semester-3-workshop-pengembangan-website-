<!--acara 11-->
<div>
    <!DOCTYPE html>
<html>
<head>
    <title>tugas minggu 3 acara 11-12</title>
</head>
<body>
    <h1>hai</h1>
@if($user->isAdmin())
    <p>Welcome, Admin!</p>
@else
    <p>Welcome, User!</p>
@endif
    <p>Hello, {{ $name }}</p>

</body>
</html>
    <!-- I begin to speak only when I am certain what I will say is not better left unsaid. - Cato the Younger -->
</div>
