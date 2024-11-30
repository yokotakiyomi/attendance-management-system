<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Atte</title>
    <link rel="stylesheet" href="{{ asset('css/general.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/stamping.css') }}" />
    @yield('css')
</head>

<body>
    <header class="header">
        <div class="header-inner">
            <div class="header-logo">Atte</div>
            <div class=header-link>
                <a href="/stamping" class="header-link__logo">ホーム</a>
                <a href="/attendance" class="header-link__logo">日付一覧</a>
                <a href="/login" class="header-link__logo">ログアウト</a>
            </div>
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