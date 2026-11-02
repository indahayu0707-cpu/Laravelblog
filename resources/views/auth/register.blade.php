<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi Blog CMS</title>
</head>
<body>
    <h1>Registrasi Akun</h1>

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div>
            <label for="name">Nama</label>
            <input
                id="name"
                type="text"
                name="name"
                value="{{ old('name') }}"
                required
            >
        </div>

        <div>
            <label for="email">Email</label>
            <input
                id="email"
                type="email"
                name="email"
                value="{{ old('email') }}"
                required
            >
        </div>

        <div>
            <label for="password">Password</label>
            <input
                id="password"
                type="password"
                name="password"
                required
            >
        </div>

        <div>
            <label for="password_confirmation">
                Konfirmasi Password
            </label>

            <input
                id="password_confirmation"
                type="password"
                name="password_confirmation"
                required
            >
        </div>

        <button type="submit">Daftar</button>
    </form>

    <p>
        Sudah punya akun?
        <a href="{{ route('login') }}">Login</a>
    </p>
</body>
</html>