<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>ChatApp</title>
    <link rel="stylesheet" href="{{ asset('/assets/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&amp;display=swap">
    <link rel="stylesheet" href="{{ asset('/assets/fonts/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/styles.css') }}">
    <script src="{{ asset('/assets/bootstrap/js/bootstrap.min.js') }}" defer></script>
</head>

<body class="bg-custom">
    @yield('content')

    <script>
        function toBottom() {
            document.getElementById('messages').scrollTo(0, document.getElementById('messages').scrollHeight);
        }
        window.onload = toBottom;
    </script>
</body>

</html>
