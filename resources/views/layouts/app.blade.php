
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Laravel Blog')</title>
    <style>
    body {
        font-family: Arial, sans-serif;       /* Jenis huruf */
        background-color: #f6f8fa;            /* Warna latar halaman */
        margin: 20px;                         /* Jarak pinggir halaman */
    }

    header {
        background-color: #3498db;            /* Background biru header */
        color: white;                         /* Warna tulisan header */
        padding: 20px;
        border-radius: 5px;
        text-align: center;
        margin-bottom: 20px;
    }

    main {
        background-color: white;               /* Background putih konten */
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0,0,0,0.1); /* Bayangan tipis */
    }
</style>

    
</head>
<body>

    <header>
        <h1>Laravel Blog</h1>
    </header>

    <main>
        @yield('content')
    </main>

</body>
</html>