<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Post</title>
</head>
<body>
    <h1>Edit Post</h1>
    <form action="/edit-post/{{ $post->id }}" method="POST">
        @csrf
        @method('PUT')
        <input type="text" name="title" placeholder="Title" value="{{ $post->title }}">
        <textarea name="body" placeholder="Body">{{ $post->body }}</textarea>
        <button type="submit">Save</button>
    </form>
</body>
</html>