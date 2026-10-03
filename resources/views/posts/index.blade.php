<!DOCTYPE html>
<html>
<head>
    <title>Daftar Post</title>
</head>
<body>
    <h1>Daftar Post</h1>
    <h1>AKHIRNYA BISA</h1>
    
    @foreach($posts as $post)
        <div style="margin-bottom: 20px; padding-bottom: 10px; border-bottom: 1px solid #ccc;">
            <h2>{{ $post->title }}</h2>
            <p>{{ $post->content }}</p>

            @can('update', $post)
                <button style="background-color: #007bff; color: white; border: none; padding: 5px 10px; cursor: pointer;">Edit Postingan</button>
            @endcan
        </div>
    @endforeach
</body>
</html>