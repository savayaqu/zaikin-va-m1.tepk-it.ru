<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
    <link rel="icon" href="{{ asset('assets/images/logo.ico') }}">
    <title>@yield('title')</title>
</head>
<body>

<header>
    <nav class="flex">
        <div style="padding: 20px">
            <img src="{{ asset('assets/images/logo.png') }}" alt="Логотип" width="100"/>
        </div>
        <div>
            <a class="btn" href="{{ route('products.index') }}">Продукция</a>
        </div>
    </nav>
</header>
<main>
    @yield('content')
</main>
<footer></footer>
</body>
</html>

