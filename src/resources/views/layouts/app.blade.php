<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Atte</title>
    <link rel="stylesheet" href="css/reset.css" />
    <link rel="stylesheet" href="{{ asset('css/common.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/register.css') }}" />
    @yield('css')
</head>

<body>
    <header class="header">
        <a class="header__logo" href="/login">
            Atte
        </a>
    </header>

    <main>
        @yield('content')
    </main>

    <footer class="footer">
        <div class="footer-inner">
            Atte,inc.
        </div>
    </footer>
</body>

</html>