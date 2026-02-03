<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student CRUD</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <!-- Top Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold" href="#">Student System</a>
        </div>
    </nav>

    <div class="d-flex">

        <!-- Sidebar -->
        <aside class="bg-dark text-white p-3" style="width: 230px; min-height: 100vh;">
            <h6 class="text-uppercase text-light text-center">Menu</h6>

            <a href="{{ route('students.index') }}" class="btn bg-white text-black w-100 text-start mt-3">
                Create Student
            </a>
        </aside>

        <!-- Main Content -->
        <main class="p-4 w-100">
            @yield('content')
        </main>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
