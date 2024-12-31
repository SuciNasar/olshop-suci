@extends('layouts.base')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Barang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .form-container {
            background: #ffffff;
            border-radius: 12px;
            padding: 40px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin: auto;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        .btn-secondary {
            background-color: #6c757d;
            border-color: #6c757d;
        }
        .btn-secondary:hover {
            background-color: #5a6268;
            border-color: #545b62;
        }
        h1 {
            font-weight: bold;
            color: #333;
        }
        .alert {
            border-radius: 10px;
        }
        .form-label {
            font-weight: bold;
        }
        .form-control {
            border-radius: 8px;
            transition: border-color 0.3s ease;
        }
        .form-control:focus {
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        }
        .form-control-file {
            padding: 10px;
        }
        .form-group {
            margin-bottom: 25px;
        }
        .d-flex {
            justify-content: space-between;
        }
        .alert ul {
            padding-left: 15px;
        }
        .alert-danger {
            background-color: #f8d7da;
            border-color: #f5c6cb;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="form-container">
            <h1 class="text-center mb-4">Tambah Barang</h1>

            <!-- Menampilkan pesan error jika ada -->
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Form untuk tambah barang -->
            <form action="{{ route('daftar_jualan.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="nama_penjual" class="form-label">Nama penjual</label>
                    <input type="text" class="form-control" id="nama_penjual" name="nama_penjual" value="{{ old('nama_penjual') }}" placeholder="" required>
                </div>
                <div class="mb-3">
                    <label for="nama_barang" class="form-label">Nama Barang</label>
                    <input type="text" class="form-control" id="nama_barang" name="nama_barang" value="{{ old('nama_barang') }}" placeholder="Masukkan nama barang" required>
                </div>

                <div class="mb-3">
                    <label for="alamat_toko" class="form-label">Alamat Toko</label>
                    <input type="text" class="form-control" id="alamat_toko" name="alamat_toko" value="{{ old('alamat_toko') }}" placeholder="Masukkan alamat toko" required>
                </div>

                <div class="mb-3">
                    <label for="harga" class="form-label">Harga</label>
                    <input type="text" class="form-control" id="harga" name="harga" value="{{ old('harga') }}" placeholder="Masukkan harga barang" required>
                </div>

                <div class="mb-3">
                    <label for="no_rek" class="form-label">No. Rekening</label>
                    <input type="text" class="form-control" id="no_rek" name="no_rek" value="{{ old('no_rek') }}" placeholder="Masukkan nomor rekening" required>
                </div>

                <div class="mb-3">
                    <label for="foto" class="form-label">Foto Barang</label>
                    <input type="file" class="form-control" id="foto" name="foto">
                </div>

                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ route('daftar_jualan.index') }}" class="btn btn-secondary">Batal</a>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
@endsection
