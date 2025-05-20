<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Movie DB</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #181818;
            color: #f5c518;
            min-height: 100vh;
        }

        .navbar {
            background-color: #121212 !important;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.5);
        }

        .navbar-brand {
            font-size: 2rem;
            font-weight: bold;
            display: flex;
            align-items: center;
            color: #f5c518 !important;
            letter-spacing: 1px;
        }

        .navbar-brand img {
            background: #f5c518;
            border-radius: 4px;
            margin-right: 10px;
            padding: 2px 6px;
        }

        .nav-link {
            color: #f5c518 !important;
            font-weight: bold;
            letter-spacing: 1px;
            transition: color 0.2s;
        }

        .nav-link.active,
        .nav-link:hover {
            color: #fff700 !important;
        }

        main {
            min-height: 80vh;
        }

        .card {
            background-color: #232323;
            color: #fff;
            border: none;
            border-radius: 16px;
        }

        .card-title,
        .card-text,
        .badge {
            color: #fff;
        }

        .btn-primary,
        .btn-success,
        .btn-warning,
        .btn-danger {
            border: none;
            font-weight: bold;
            letter-spacing: 1px;
        }

        .btn-primary {
            background-color: #f5c518;
            color: #232323;
        }

        .btn-primary:hover {
            background-color: #ffe066;
            color: #232323;
        }

        .btn-success {
            background-color: #43a047;
        }

        .btn-warning {
            background-color: #ffb300;
            color: #232323;
        }

        .btn-danger {
            background-color: #e53935;
        }

        .badge.bg-secondary {
            background-color: #f5c518 !important;
            color: #232323 !important;
        }

        .alert-success {
            background-color: #232323;
            color: #f5c518;
            border: 1px solid #f5c518;
        }

        a {
            text-decoration: none !important;
        }

        /* Pagination & Table */
        div[role="status"],
        .pagination-info,
        .dataTables_info,
        .pagination-summary,
        .pagination-details {
            color: #f5c518 !important;
            font-weight: bold;
        }

        .pagination {
            --bs-pagination-bg: #232323;
            --bs-pagination-color: #f5c518;
            --bs-pagination-border-color: #232323;
            --bs-pagination-hover-bg: #f5c518;
            --bs-pagination-hover-color: #232323;
            --bs-pagination-active-bg: #f5c518;
            --bs-pagination-active-color: #232323;
        }

        .table {
            background-color: #232323 !important;
            color: #fff !important;
            border-radius: 16px;
            overflow: hidden;
        }

        .table thead tr th {
            background-color: #232323 !important;
            color: #f5c518 !important;
            border: none !important;
            font-weight: bold;
            font-size: 1.15rem;
        }

        .table thead {
            background-color: #232323 !important;
        }

        .table th,
        .table td {
            border-color: #333 !important;
        }

        .table td {
            color: #fff !important;
            background-color: #232323 !important;
        }

        .table tr {
            border-bottom: 1px solid #333 !important;
        }

        /* Custom scrollbar for dark theme */
        ::-webkit-scrollbar {
            width: 10px;
            background: #181818;
        }

        ::-webkit-scrollbar-thumb {
            background: #232323;
            border-radius: 8px;
        }

        ::selection {
            background: #f5c518;
            color: #232323;
        }
    </style>
</head>

<body>
    {{-- navbar --}}
    <nav class="navbar navbar-expand-lg mb-4">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="https://upload.wikimedia.org/wikipedia/commons/6/69/IMDB_Logo_2016.svg" alt="IMDB"
                    height="32">
                Movie DB
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link{{ request()->routeIs('movies.*') ? ' active' : '' }}"
                            href="{{ route('movies.index') }}">Movies</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link{{ request()->routeIs('categories.*') ? ' active' : '' }}"
                            href="{{ route('categories.index') }}">Categories</a>
                    </li>
                </ul>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" />
                    <button class="btn btn-outline-light" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>

    {{-- main content --}}
    <main>
        @yield('content')
    </main>

    {{-- footer --}}
    <footer class="text-center py-3" style="background:#121212;color:#f5c518;font-size:1rem;">
        &copy; {{ date('Y') }} Movie DB &mdash; Inspired by IMDb by Kardiko Anando
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
