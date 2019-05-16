<!doctype html>
<html lang='en'>
<head>
    <title>@yield('title')</title>
    <meta charset='utf-8'>
    <link rel="stylesheet"
          href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
          integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf"
          crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          rel="stylesheet"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
          crossorigin="anonymous">
    <link href='/css/countdown.css' rel='stylesheet'>

    @yield('head')
</head>
<body>

@if(session('alert'))
    <div class='alert'>{{ session('alert') }}</div>
@endif

<header>
    <h1>Event Countdowns</h1>
</header>

<section id='main'>
    @yield('content')
</section>

<footer>
    <a href='{{ config('app.githubUrl') }}'><i class='fab fa-github'></i> View on Github</a>
</footer>

</body>
</html>