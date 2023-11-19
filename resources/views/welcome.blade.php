@vite(['resources/sass/app.scss', 'resources/js/app.js'])
@viteReactRefresh
@vite('resources/js/app.jsx')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Document</title>
</head>

<body>
    <div class="container">
        <div class="logo">
            <img src="{{ asset('storage/image/logo.png') }}" alt="Logo">
        </div>
        <form action="/login" method="POST">
            @csrf
            <div class="input">
                <label for="username"><i class="fa-solid fa-user"></i></label>
                <input type="text" name="username" placeholder="Gebruikersnaam" autofocus>
                @error('username')
                    <span>
                        {{ $message }}
                    </span>
                @enderror
            </div>
            <div class="input">
                <label for="password"><i class="fa-solid fa-key"></i></label>
                <input type="password" name="password" placeholder="Wachtwoord">
                @error('password')
                    <span class="error">
                        {{ $message }}
                    </span>
                @enderror
            </div>
            <div class="button">
                <button type="submit">Aanmelden</button>
            </div>
        </form>
    </div>
</body>

</html>
