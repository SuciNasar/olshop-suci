@extends('layouts.base')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Barang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f0f2f5;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .form-container {
            background: #fff;
            border-radius: 10px;
            padding: 40px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            max-width: 700px;
            margin: 50px auto;
        }
        h1 {
            font-weight: bold;
            color: #333;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            padding: 10px 20px;
            font-size: 16px;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
        .btn-secondary {
            background-color: #6c757d;
            border-color: #6c757d;
            padding: 10px 20px;
            font-size: 16px;
        }
        .btn-secondary:hover {
            background-color: #5a6268;
            border-color: #5a6268;
        }
        .form-control {
            border-radius: 8px;
            box-shadow: none;
            border: 1px solid #ced4da;
            padding: 12px;
            font-size: 16px;
        }
        .form-control:focus {
            border-color: #80bdff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.25);
        }
        .img-thumbnail {
            border-radius: 10px;
            transition: transform 0.3s ease;
        }
        .img-thumbnail:hover {
            transform: scale(1.1);
        }
        .img-preview {
            width: 100%;
            max-width: 150px;
            display: none;
            border-radius: 10px;
            margin-top: 10px;
            border: 2px solid #ddd;
            padding: 4px;
        }
        .alert-danger {
            background-color: #f8d7da;
            color: #721c24;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
        }
        .d-flex {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="form-container mx-auto">
            <h1 class="text-center mb-4">Edit Barang</h1>

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

            <!-- Form untuk edit barang -->
            <form action="{{ route('daftar_jualan.update', $daftar_jualan->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="nama_penjual" class="form-label">Nama Penjual</label>
                    <input type="text" class="form-control" id="nama_penjual" name="nama_penjual" value="{{ old('nama_penjual', $daftar_jualan->nama_penjual) }}" required>
                </div>

                <div class="mb-3">
                    <label for="nama_barang" class="form-label">Nama Barang</label>
                    <input type="text" class="form-control" id="nama_barang" name="nama_barang" value="{{ old('nama_barang', $daftar_jualan->nama_barang) }}" required>
                </div>

                <div class="mb-3">
                    <label for="alamat_toko" class="form-label">Alamat Toko</label>
                    <input type="text" class="form-control" id="alamat_toko" name="alamat_toko" value="{{ old('alamat_toko', $daftar_jualan->alamat_toko) }}" required>
                </div>

                <div class="mb-3">
                    <label for="harga" class="form-label">Harga</label>
                    <input type="text" class="form-control" id="harga" name="harga" value="{{ old('harga', $daftar_jualan->harga) }}" required>
                </div>

                <div class="mb-3">
                    <label for="no_rek" class="form-label">No. Rekening</label>
                    <input type="text" class="form-control" id="no_rek" name="no_rek" value="{{ old('no_rek', $daftar_jualan->no_rek) }}" required>
                </div>

                <div class="mb-3">
                    <label for="foto" class="form-label">Foto Barang</label>
                    @if ($daftar_jualan->foto)
                        <div class="mb-3">
                            <img id="current-img" src="{{ asset('upload/foto/' . $daftar_jualan->foto) }}" alt="Foto Barang" class="img-thumbnail" style="width: 150px;">
                        </div>
                    @endif
                    <input type="file" class="form-control" id="foto" name="foto" onchange="previewImage(event)">
                    <img id="preview" class="img-preview mt-2" src="#" alt="Pratinjau Foto Baru">
                </div>

                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    <a href="{{ route('daftar_jualan.index') }}" class="btn btn-secondary">Batal</a>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Menambahkan pratinjau gambar baru yang dipilih
        function previewImage(event) {
            const input = event.target;
            const preview = document.getElementById('preview');
            const currentImg = document.getElementById('current-img');

            // Sembunyikan gambar lama jika ada gambar baru
            if (currentImg) {
                currentImg.style.display = 'none';
            }

            if (input.files && input.files[0]) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block';  // Menampilkan pratinjau gambar
                };

                reader.readAsDataURL(input.files[0]);
            } else {
                preview.src = '#';
                preview.style.display = 'none';
            }
        }
    </script>
</body>
</html>
@endsection
