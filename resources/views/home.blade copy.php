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
    

    <div class="relative h-screen w-screen overflow-hidden   p-4">
        

        @if (session()->has('error'))
            <div class="absolute top-[20%] right-[10%] w-64 transform rotate-6">
                <div class="bg-red-500 text-white p-4 rounded-md">
                    {{ session('error') }}
                </div>
            </div>
        @endif

        @if ($errors->any())
            <div class="absolute top-[20%] right-[10%] w-64 transform rotate-6">
                <div class="text-center text-xs space-y-2">
                    @foreach ($errors->all() as $error)
                        <span class="inline-block rounded-lg bg-[#e8e8e8] px-3 py-1 text-muted-foreground/80">
                            {{ $error }}
                        </span>
                    @endforeach
                </div>
            </div>
        @endif

        <form action="/login" method="POST" class="w-full h-full">
            @csrf
            <div class="absolute bottom-[15%] left-[15%] w-64 space-y-2 transform -rotate-3">
                <input type="text" 
                       autocomplete="off" 
                       name="loginname" 
                       placeholder="Name" 
                       class="w-full border-0 border-b border-gray-200 rounded-none bg-transparent text-gray-400 placeholder:text-xs focus:ring-0">
            </div>

            <div class="absolute top-[40%] right-[20%] w-64 space-y-2 transform rotate-3">
                <input type="password" 
                       name="loginpassword" 
                       placeholder="Password" 
                       class="w-full border-0 border-b border-gray-200 rounded-none bg-transparent text-gray-400 placeholder:text-xs focus:ring-0">
            </div>

            <button type="submit" 
                    class="absolute bottom-10 right-10 bg-transparent text-gray-400     ">
                Login
            </button>
        </form>

        <div class="absolute top-[70%] right-[5%] text-xs text-gray-300 transform -rotate-2">
            Don't have an account? 
            <a href="/register" class="underline underline-offset-4 hover:text-gray-400">
                Register
            </a>
        </div>
    </div>
    @endauth
   
</body>
</html>