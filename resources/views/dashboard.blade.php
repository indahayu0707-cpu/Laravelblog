<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Blog CMS</title>
</head>
<body>
    <h1>Dashboard Blog CMS</h1>

    <p>
        Selamat datang,
        {{ auth()->user()->name }}!
    </p>

    <p>
        Email: {{ auth()->user()->email }}
    </p>

    <p>
        Role: {{ auth()->user()->role }}
    </p>

    <form method="POST" action="{{ route('logout') }}">
        @csrf

        <button type="submit">Logout</button>
    </form>
</body>
</html>