<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laundry App</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- CSS --}}
    <style>
        body {
            background-color: #f5f6fa;
            overflow-x: hidden;
        }

        .sidebar {
            width: 260px;
            min-height: 100vh;
            background: #ffffff;
            border-right: 1px solid #e5e7eb;
            transition: margin-left .3s;
        }

        .sidebar.collapsed {
            margin-left: -260px;
        }

        @media (max-width: 991px) {
            .sidebar {
                margin-left: -260px;
            }
            .sidebar.show {
                margin-left: 0;
            }
        }

        .content {
            flex-grow: 1;
            padding: 24px;
            transition: margin-left .3s;
        }

        .navbar-top {
            height: 56px;
            border-bottom: 1px solid #e5e7eb;
            background: #fff;
        }
    </style>
</head>

<body>

{{-- TOP NAVBAR --}}
<nav class="navbar navbar-top px-3">
    <button class="btn btn-outline-secondary btn-sm" onclick="toggleSidebar()">
        ☰
    </button>
    <span class="ms-3 fw-semibold">Laundry App</span>
</nav>

<div class="d-flex">
    {{-- SIDEBAR --}}
    @include('partials.sidebar')

    {{-- CONTENT --}}
    <div class="content">
        @yield('content')
    </div>
</div>

{{-- Bootstrap JS --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

{{-- ✅ TARUH DI SINI --}}
<script>
    function toggleSidebar() {
        const sidebar = document.querySelector('.sidebar');

        if (window.innerWidth <= 991) {
            sidebar.classList.toggle('show');
        } else {
            sidebar.classList.toggle('collapsed');
        }
    }
</script>

</body>
</html>
