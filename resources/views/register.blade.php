<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    @vite('resources/css/app.css')
</head>
<body class="p-4">
   
    <div class="max-w-xs mx-auto flex flex-col gap-4">
        <div class="flex flex-col gap-4">
            <h1> Register </h1>
            @if ($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="/register" method="POST" class="flex gap-2 flex-col text-xs">
                @csrf
                <input type="text" 
                    name="name" 
                    placeholder="Name" 
                    value="{{ old('name') }}"
                    class="form-input @error('name') form-input-error @enderror">
                
                <input type="email" 
                    name="email" 
                    placeholder="Email" 
                    value="{{ old('email') }}"
                    class="form-input @error('email') form-input-error @enderror">
                
                <input type="password" 
                    name="password" 
                    placeholder="Password" 
                    class="form-input @error('password') form-input-error @enderror">
                
                <button type="submit" class="btn">Register</button>
            </form>
        </div>
        <p>Already have an account? <a href="/" class="underline">Login</a></p>
    </div>
   
    
</body>
</html>