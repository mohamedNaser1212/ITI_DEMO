<!DOCTYPE html>
<html>

<head>
    <title>@yield('title')</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <style>
        body, html {
            height: 100%;
            margin: 0;
            padding: 0;
        }

        .dashboard-container {
            display: flex;
            height: 300vh;
        }

        .sidebar {
            flex: 0 0 250px;
            background-color: #e3f2fd;
            border-right: 1px solid #555;
            padding: 20px;
        }

        .content {
            flex: 1;
            padding: 20px;
        }

        .sidebar a {
            display: block;
            color: black; /* Change text color to black */
            text-decoration: none;
            padding: 20px;
        }

        .sidebar a:hover {
            background-color: #bbdefb; /* Change hover background color */
        }

        .navbar {
            background-color: #e3f2fd;
        }
    </style>
</head>

<body>

    <!-- Navigation bar -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand" href="#">@yield('project-name')</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('books.create') }}">Create Book</a>

                </li>
            </ul>
            <ul class="navbar-nav ms-auto">
                <!-- Authentication Links -->
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre="">
                        {{ Auth::user()->name ?? '-' }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                            Logout
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Main content -->
    <div class="dashboard-container">
        <!-- Sidebar -->
        <div class="sidebar">
            <a href="#">Home</a>
            <hr>
            <a href="#">Dashboard</a>
            <hr>
            <a href="{{ route('books.create') }}">Create Book</a>
        </div>

        <!-- Content area -->
        <div class="content">
            @yield('content')
        </div>
    </div>
</body>

</html>
