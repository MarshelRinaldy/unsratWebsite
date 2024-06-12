@extends('NavbarAdmin')

@section('content')
    @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <form action="{{ route('admin.settings.update') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="system_name" class="form-label">Nama Sistem</label>
                        <input type="text" class="form-control" id="system_name" name="system_name" value="{{ $setting->system_name ?? '' }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ $setting->email ?? '' }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="contact" class="form-label">Kontak</label>
                        <input type="text" class="form-control" id="contact" name="contact" value="{{ $setting->contact ?? '' }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="about_us" class="form-label">Konten Tentang Kami</label>
                        <textarea class="form-control" id="about_us" name="about_us" rows="5" required>{{ $setting->about_us ?? '' }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">SAVE</button>
                </form>
            </div>
        </div>
    </div>

    <style>
        .container {
            max-width: 700px;
        }

        .form-control {
            background-color: #f1f1f1;
        }

        .btn-primary {
            background-color: #4caf50;
            border-color: #4caf50;
        }

        .btn-primary:hover {
            background-color: #45a049;
            border-color: #45a049;
        }
    </style>
@endsection
