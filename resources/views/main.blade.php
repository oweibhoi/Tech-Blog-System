<!DOCTYPE html>
<html lang="EN">

<head>
    <title>BLOG SHIT</title>
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('custom/custom.css') }}">
    <script src="https://kit.fontawesome.com/f2ec8eb7d2.js" crossorigin="anonymous"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;1,100;1,300&display=swap" rel="stylesheet">
</head>

<body>
    <nav class="navbar bg-white">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">
                <img src="/images/tech.png" alt="" width="200" height="100" class="d-inline-block align-text-top">
            </a>
            <div class="d-flex align-items-end">
                @auth
                <a class="btn btn-outline-success" href="/myaccount">My Dashboard</a>&nbsp;
                <form class="d-flex" role="search" method="POST" action="/logout">
                    @csrf
                    <button class="btn btn-outline-danger" type="submit">Logout</button>&nbsp;
                </form>
                @else
                <a class="btn btn-outline-success" href="/login">Login</a>&nbsp;
                @endauth
            </div>

        </div>
    </nav>
    @yield('content')

    <!-- Modals Section -->
    <x-login-reminder />
    <!-- End Modals Section -->
</body>
<footer style="margin-top:5%;">
    <div class="container-fluid">
        <hr>
        <p class="text-center">
            {{ 'Copyright@'.date('Y') }}
        </p>
    </div>
</footer>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('custom/custom.js') }}"></script>
<script>
    const globalData = {
        base_url: '{{ url("/") }}',
        }
</script>
</html>