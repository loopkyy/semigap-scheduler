<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Schedule App')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    
    <style>
        /* Body & Font */
        body { 
            background: linear-gradient(to bottom, #f8f9fa, #e9ecef);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; 
            min-height: 100vh;
        }

        /* Navbar */
        .navbar {
            border-bottom-left-radius: 12px;
            border-bottom-right-radius: 12px;
        }

        /* Cards */
        .card {
            border-radius: 12px;
        }

        /* Headings */
        h1, h2, h3, h4, h5 {
            font-weight: 600;
        }

        /* Table */
        table th, table td {
            vertical-align: middle;
        }

        /* Footer space */
        .content-wrapper {
            padding-bottom: 60px;
        }

        /* Navbar links hover */
        .nav-link:hover {
            text-decoration: underline;
        }

        /* Responsive adjustments */
        @media (max-width: 575.98px) {
            .container {
                padding-left: 1rem;
                padding-right: 1rem;
            }
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm sticky-top">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">📅 Semigap Scheduler</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="{{ route('lectures.index') }}">Kuliah</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('utbk-sessions.index') }}">UTBK</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container content-wrapper">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
