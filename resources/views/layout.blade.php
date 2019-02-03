<html>

<head>
    <title>
@yield('title','laracast')
    </title>
</head>

<body>

<ul>
    <li><a href="/"> go to Home</a></li>
    <li><a href="/contact"> go to contact</a></li>
    <li><a href="/about"> go to about</a></li>
    @yield('content')

</ul>
</body>
</html>