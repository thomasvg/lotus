@vite(['resources/sass/login.scss', 'resources/js/app.js'])
@vite(['resources/sass/admin.scss', 'resources/js/app.js'])
@vite(['resources/sass/deegkamer.scss', 'resources/js/app.js'])
@vite(['resources/js/custom.js', 'resources/js/app.js'])
@vite(['resources/js/kalender.js'])
@vite(['resources/js/sidebar.js'])
@vite(['resources/js/deegkamer.js'])


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300&family=Sigmar&display=swap" rel="stylesheet">
    <title>Document</title>
</head>

<body>

    <div class="container">
        <div class="panel">

            <div class="logo"> <img src="{{ asset('storage/image/logo1.png') }}" alt="Logo"></div>

            <ul>

                <a href="/">
                    <li>
                        <div class="hover-focus"></div>
                        <div class="f-icon"><i class="fa-solid fa-home"></i></div>
                        <h3>Home</h3>

                    </li>
                </a>
                <li>
                    <div class="hover-focus"></div>
                    <div class="f-icon"><i class="fa-solid fa-calendar-days "></i></div>
                    <h3>kalender</h3>
                </li>

                <a href="/deegkamer">
                    <li>

                        <div class="hover-focus"></div>
                        <div class="f-icon"><i class="fa-solid fa-check "></i></div>
                        <h3>deegkamer</h3>
                    </li>
                </a>
                <li>
                    <div class="hover-focus"></div>
                    <div class="f-icon"><i class="fa-solid fa-user "></i></div>
                    <h3>profiel</h3>
                </li>

                @if (Auth::check() && Auth::user()->is_admin)
                    <a href="/admin">
                        <li>
                            <div class="hover-focus"></div>
                            <div class="f-icon"><i class="fa-solid fa-key"></i></div>
                            <h3>admin</h3>
                        </li>
                    </a>
                @endif

                <li>

                    <div class="hover-focus"></div>
                    <div class="f-icon"><i class="fa-solid fa-arrow-right-from-bracket"></i></div>
                    <form method="POST" action='/logout'>
                        @csrf


                        <button type="submit">
                            <h3>Afmelden </h3>
                        </button>
                    </form>

                </li>



            </ul>
        </div>


        <div class="overviewboard">
            <div class="welcome">
                <h1>Welkom {{ auth()->user()->name }}</h1>
                <div class="burger-icon">
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
            </div>

            <div class="newsPanel">
                {{ $slot }}




            </div>


        </div>




    </div>









</body>

</html>
