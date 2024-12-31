<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Jualan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet"> <!-- Font Awesome -->
    <style>
        body {
            background-color: #f0f4f8;
            font-family: 'Roboto', Arial, sans-serif;
        }
        h1 {
            font-size: 2.5rem;
            font-weight: bold;
            color: #2c3e50;
        }
        .product-card {
            border-radius: 12px;
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            background-color: #ffffff;
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.1);
        }
        .product-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 12px 20px rgba(0, 0, 0, 0.2);
        }
        .product-image {
            height: 250px;
            width: 100%;
            object-fit: cover;
            border-bottom: 1px solid #ddd;
        }
        .product-info {
            padding: 20px;
            text-align: center;
        }
        .product-title {
            font-size: 1.2rem;
            font-weight: bold;
            color: #2c3e50;
            margin-bottom: 8px;
        }
        .product-price {
            font-size: 1.4rem;
            color: #27ae60;
            font-weight: bold;
            margin-bottom: 15px;
        }
        .address {
            font-size: 0.95rem;
            color: #7f8c8d;
            margin-bottom: 15px;
        }
        .address i {
            color: #3498db; /* GPS icon color */
            margin-right: 5px;
        }
        .btn-buy {
            background-color: #3498db;
            border: none;
            color: white;
            padding: 10px 20px;
            font-size: 1rem;
            font-weight: bold;
            border-radius: 30px;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }
        .btn-buy:hover {
            background-color: #2980b9;
            transform: scale(1.05);
        }
        .no-data {
            text-align: center;
            font-size: 1.3rem;
            color: #7f8c8d;
            margin-top: 50px;
        }
        .container {
            margin-top: 50px;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-5">Olshop Suci</h1>
        <div class="row justify-content-center">
            @forelse($daftar__jualans as $item)
                <div class="col-md-4 col-sm-6 mb-4">
                    <div class="product-card">
                        <img src="{{ asset('upload/foto/' . $item->foto) }}" alt="Foto Barang" class="img-fluid product-image">
                        <div class="product-info">
                            <h5 class="product-title">{{ $item->nama_barang }}</h5>
                            <p class="product-price">Rp{{ $item->harga }}</p>
                            <p class="address"><i class="fas fa-map-marker-alt"></i>{{ $item->alamat_toko }}</p>
                            <a href="{{ route('pelanggan.transaksi', $item->id) }}" class="btn btn-buy">Beli Sekarang</a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <p class="no-data">Data tidak tersedia</p>
                </div>
            @endforelse
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
