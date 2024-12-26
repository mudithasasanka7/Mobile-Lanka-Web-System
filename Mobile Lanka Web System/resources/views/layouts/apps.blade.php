<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mobile Lanka</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="{{ asset('js/script.js') }}" defer></script>
</head>
<body>
    <!-- Main Content Section -->
     <!-- login register edit i need to the home -->
    <main>
        @yield('content')
    </main>

    <!-- Footer new -->
    <footer>

    </footer>
</body>
</html>
