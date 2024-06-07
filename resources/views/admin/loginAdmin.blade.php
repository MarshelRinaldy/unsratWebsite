<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dapoer Boulevard - Admin Site</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }

        .bg-grey {
            background-color: #b0b0b0;
        }

        .bg-black {
            background-color: #000000;
        }

        .text-white {
            color: #ffffff;
            text-align: center;
            font-size: 2rem;
        }

        .card {
            width: 500px;
        }

        .card-body {
            padding: 2rem;
        }

        button {
            background-color: #6c757d;
            border: none;
        }
    </style>
</head>

<body>
    <div class="container-fluid vh-100 d-flex">
        <div class="row flex-fill">
            <div class="col-md-5 d-flex align-items-center justify-content-center bg-grey">
                <h1 class="text-white">Dapoer Boulevard -<br> Admin Site</h1>
            </div>
            <div class="col-md-7 d-flex align-items-center justify-content-center bg-black">
                <div class="card p-2">
                    <div class="card-body">
                        <form>
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" id="username" placeholder="Enter username">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" placeholder="Password">
                            </div>
                            <button style="width: 120px; border-radius: 20px;" type="submit"
                                class="btn btn-primary btn-block">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
