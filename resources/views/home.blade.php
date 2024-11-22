<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite('resources/css/app.css')

</head>
<body class="p-4">
    @auth 
    <p>Welcome {{ auth()->user()->name }}</p>
    <form action="/logout" method="POST">
        @csrf
        <button type="submit">Logout</button>
    </form>

    <div class="">
        <h1>Create a Post</h1>
        <form action="/create-post" method="POST">
            @csrf
            <input type="text" name="title" placeholder="Title">
            <textarea name="body" placeholder="Body"></textarea>
            <button type="submit">Save</button>
        </form>
    </div>
    <div class="">
        <h2>All Posts</h2>
        @foreach ($posts as $post)
        <div class="">
            <h2>{{ $post->title }} by {{$post->user->name}}</h2>
            <p>{{ $post->body }}</p>
            <p>{{ $post->created_at->format('Y-m-d H:i:s') }}</p>
            <a href="/edit-post/{{ $post->id }}">Edit</a>
            <form action="/delete-post/{{ $post->id }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
        </div>
        @endforeach
    </div>
    @else 
    

    <div class="max-w-xs mx-auto flex flex-col gap-4">
        <div class=" flex flex-col gap-4">
            <h1> Login </h1>
            @if (session()->has('error'))
                <div class="bg-red-500 text-white p-4 rounded-md">
                    {{ session('error') }}
                </div>
            @endif
            @if ($errors->any())
                <div class="text-center text-xs text-muted-foreground space-y-2">
                    @foreach ($errors->all() as $error)
                        <span class="inline-block rounded-lg bg-[#e8e8e8] px-3 py-1 text-muted-foreground/80">
                            {{ $error }}
                        </span>
                    @endforeach
                </div>
            @endif
            <form action="/login" method="POST" class="flex  gap-2 flex-col text-xs">
                @csrf
                <input type="text" autocomplete="off" name="loginname" placeholder="Name" class=" border rounded-md px-2 py-2  border-black placeholder:text-xs">
    
                <input type="password" name="loginpassword" placeholder="Password" class="  border rounded-md px-2 py-2  border-black placeholder:text-xs">
                <button type="submit" class="btn">Login</button>
            </form>
        </div>

        <p>Don't have an account? <a href="/register" class="underline">Register</a></p>
    </div>
    @endauth
   
</body>
</html>