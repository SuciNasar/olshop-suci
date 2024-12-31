<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konfirmasi Pembelian</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .form-container {
            max-width: 600px;
            margin: 50px auto;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            background-color: #fff;
        }
        .form-title {
            font-size: 1.5rem;
            font-weight: bold;
            color: #007bff;
            text-align: center;
            margin-bottom: 20px;
        }
        .btn-primary {
            background-color: #007bff;
            border: none;
            width: 100%;
            padding: 10px;
            font-size: 1rem;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
        .form-label {
            font-weight: bold;
            color: #333;
        }
        .form-control:focus {
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        }
        .form-footer {
            text-align: center;
            margin-top: 20px;
            color: #6c757d;
        }
        .form-footer a {
            color: #007bff;
            text-decoration: none;
        }
        .form-footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h1 class="form-title">Transaksi</h1>
        <center><img src="{{ asset('upload/foto/' . $foto) }}" alt="Gambar Produk" width="300" height="300"></center>
        <form id="konfirmasiForm" action="{{ route('pelanggan.store') }}" method="POST">
            @csrf
            <input type="hidden" name="daftar_jualan_id" value="{{ $daftar_jualan_id }}">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Lengkap</label>
                <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama Anda" required>
            </div>
            <div class="mb-3">
                <label for="alamat_pembeli" class="form-label">Alamat</label>
                <input type="text" class="form-control" id="alamat_pembeli" name="alamat_pembeli" placeholder="Masukkan alamat Anda" required>
            </div>
            <div class="mb-3">
                <label for="no_hp" class="form-label">No HP</label>
                <input type="text" class="form-control" id="no_hp" name="no_hp" placeholder="Masukkan nomor HP Anda" required>
            </div>
            <div class="mb-3">
                <label for="no_rek" class="form-label">No. Rekening penjual</label>
                <input type="text" class="form-control" id="no_rek" name="no_rek" value="{{ $no_rek }}" readonly>
            </div>
            <div class="mb-3">
                <label for="harga" class="form-label">Harga</label>
                <input type="text" class="form-control" id="harga" name="harga" value="Rp {{ $harga }}" readonly>
            </div>
            <button type="button" id="submitButton" class="btn btn-primary">Konfirmasi Pembelian</button>
        </form>
        <div class="form-footer">
            <p><a href="{{ url('pelanggan') }}">Kembali ke halaman utama</a></p>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById('submitButton').addEventListener('click', function () {
            // Ambil semua input dalam form
            const nama = document.getElementById('nama').value.trim();
            const alamat = document.getElementById('alamat_pembeli').value.trim();
            const noHp = document.getElementById('no_hp').value.trim();

            // Periksa apakah ada kolom yang kosong
            if (!nama || !alamat || !noHp) {
                Swal.fire({
                    title: 'Gagal',
                    text: 'Semua kolom wajib diisi!',
                    icon: 'error',
                    confirmButtonColor: '#d33',
                    confirmButtonText: 'OK'
                });
            } else {
                // Jika semua input diisi, tampilkan konfirmasi
                Swal.fire({
                    title: 'Konfirmasi Pembelian',
                    text: 'Apakah Anda yakin ingin melanjutkan pembelian?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, Konfirmasi',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Submit form jika pengguna mengonfirmasi
                        document.getElementById('konfirmasiForm').submit();
                    }
                });
            }
        });
    </script>
</body>
</html>
