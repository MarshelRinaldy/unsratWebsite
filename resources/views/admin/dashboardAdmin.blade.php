@extends('NavbarAdmin')


<style>
    /* Custom styles for the sidebar */
    .sidebar {
        position: fixed;
        top: 56px;
        /* Height of the navbar */
        bottom: 0;
        left: -250px;
        /* Hide sidebar by default */
        width: 250px;
        transition: left 0.3s ease-in-out;
        padding: 48px 0 0;
        /* Padding from top to align with the navbar */
        overflow-x: hidden;
        /* Prevent horizontal scrollbar */
        overflow-y: auto;
        /* Enable vertical scrollbar if needed */
        background-color: #f8f9fa;
    }

    .sidebar.show {
        left: 0;
        /* Show sidebar */
    }

    /* Main content should shift to the right when the sidebar is shown */
    .main-content {
        transition: margin-left 0.3s ease-in-out;
        margin-left: 0;
        /* Default margin */
    }

    .main-content.shifted {
        margin-left: 250px;
        /* Adjust margin when sidebar is shown */
    }

    /* Sidebar nav links */
    .sidebar .nav-link {
        font-weight: 500;
        color: #333;
    }

    .sidebar .nav-link .fas {
        margin-right: 10px;
    }

    .sidebar .nav-link.active {
        color: #007bff;
    }

    /* Media queries for responsive design */
    @media (max-width: 768px) {
        .sidebar {
            width: 100%;
            /* Full width for small screens */
            left: -100%;
            /* Hide sidebar fully */
        }

        .sidebar.show {
            left: 0;
            /* Show sidebar */
        }

        .main-content {
            margin-left: 0;
            /* No margin adjustment for mobile view */
        }

        .main-content.shifted {
            margin-left: 0;
            /* Reset margin for mobile view */
        }
    }
</style>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Admin Dashboard</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <button class="btn btn-dark" id="sidebarToggle">
                        <i class="fas fa-bars"></i>
                    </button>
                </li>
            </ul>
        </div>
    </nav>

    @section('content')
        <!-- Sidebar and Content -->
        <div class="container-fluid">
            <div class="row">
                <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block bg-light sidebar">
                    <div class="position-sticky">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="#">
                                    <i class="fas fa-tachometer-alt"></i>
                                    Dashboard
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    <i class="fas fa-users"></i>
                                    Users
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    <i class="fas fa-cogs"></i>
                                    Settings
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    <i class="fas fa-chart-line"></i>
                                    Reports
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>

                <main class="main-content col-md-9 ml-sm-auto col-lg-10 px-md-4">
                    <div
                        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                        <h1 class="h2">Dashboard</h1>
                        <div class="btn-toolbar mb-2 mb-md-0">
                            <div class="btn-group mr-2">
                                <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
                                <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
                            </div>
                            <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
                                <i class="fas fa-calendar-alt"></i>
                                This week
                            </button>
                        </div>
                    </div>
                    <!-- Your main content goes here -->
                    <div class="content">
                        <p>Welcome to the Admin Dashboard!</p>
                    </div>
                </main>
            </div>
        </div>
    @endsection

    <!-- Custom JS -->
    <script>
        $(document).ready(function() {
            $('#sidebarToggle').on('click', function() {
                $('#sidebar').toggleClass('show');
                $('.main-content').toggleClass('shifted');
            });
        });
    </script>
</body>
