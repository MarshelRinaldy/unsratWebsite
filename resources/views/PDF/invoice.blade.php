<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nota Pesanan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            width: 100%;
            margin: 0 auto;
            padding: 20px;
        }
        .header, .footer {
            text-align: center;
            margin-bottom: 20px;
        }
        .details {
            margin-bottom: 20px;
        }
        .items table {
            width: 100%;
            border-collapse: collapse;
        }
        .items table, .items th, .items td {
            border: 1px solid black;
        }
        .items th, .items td {
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>Nota Pesanan</h2>
        </div>
        <div class="details">
            <p><strong>Nama:</strong> {{ $order->nama }}</p>
            <p><strong>Meja:</strong> {{ $order->meja }}</p>
            <p><strong>Status:</strong> {{ $order->status_pesanan }}</p>
            <p><strong>Total Harga:</strong> {{ $order->total_harga }}</p>
        </div>
        <div class="items">
            <h3>Items</h3>
            <table>
                <thead>
                    <tr>
                        <th>Menu</th>
                        <th>Quantity</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($order->listPesanan as $item)
                        <tr>
                            <td>{{ $item->menu->nama }}</td>
                            <td>{{ $item->quantity }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="footer">
            <p>Terima kasih atas pesanan Anda!</p>
        </div>
    </div>
</body>
</html>
