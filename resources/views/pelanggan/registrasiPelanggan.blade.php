<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi Pelanggan</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #ffffff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            padding: 40px;
            max-width: 600px;
            width: 100%;
            border: 2px solid #FF7A00;
        }

        .form-title {
            text-align: center;
            font-weight: bold;
            margin-bottom: 30px;
            color: #FF7A00;
        }

        .form-group label {
            font-weight: bold;
            color: #333;
        }

        button {
            width: 100%;
            padding: 15px;
            background-color: #FF7A00;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            text-transform: uppercase;
        }

        button:hover {
            background-color: #e66a00;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="form-title">Buat Akun Baru</div>
        <form action="{{ route('simpan_pelanggan') }}" method="POST">
            @method('post')
            @csrf
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="nama_awal">Nama Awal</label>
                    <input type="text" class="form-control" id="nama_awal" name="nama_awal" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="nama_akhir">Nama Akhir</label>
                    <input type="text" class="form-control" id="nama_akhir" name="nama_akhir" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="alamat">Alamat</label>
                    <input type="text" class="form-control" id="alamat" name="alamat" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="kontak">Kontak</label>
                    <input type="text" class="form-control" id="kontak" name="mobile_number" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12" >
                    <label for="password">Kata Sandi</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
            </div>
            <button type="submit" class="btn btn-dark" style="background-color: #FF7A00;" >Buat Akun</button>
        </form>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
