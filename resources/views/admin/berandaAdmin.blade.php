@extends('NavbarAdmin')

@section('content')
    <div class="container mt-5">
        <h1 class="text-center mb-4">Selamat Datang Kembali, Administrator!</h1>
        <div class="row text-center">
            <div class="col-md-3 mb-3">
                <div class="card bg-primary text-white shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Total Active Menu</h5>
                        <p class="display-4">3</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="card bg-secondary text-white shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Total Inactive Menu</h5>
                        <p class="display-4">0</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="card bg-warning text-dark shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Orders for Verification</h5>
                        <p class="display-4">0</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="card bg-success text-white shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Confirmed Orders</h5>
                        <p class="display-4">1</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .card {
            border-radius: 0.75rem;
        }

        .card-body {
            padding: 2rem;
        }

        .card-title {
            font-size: 1.5rem;
            margin-bottom: 1rem;
        }

        .display-4 {
            font-weight: bold;
        }
    </style>
@endsection
