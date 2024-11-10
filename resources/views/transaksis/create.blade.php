<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah Transaksi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background: lightgray">

    <div class="container mt-5 mb-5">
        <h3 class="text-center my-4">Tambahkan Transaksi</h3>

        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <form action="{{ route('transaksis.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group mb-3">
                                <label for="jam_id">Pilih Jam</label>
                                <select name="jam_id" class="form-control" required>
                                    @foreach($jams as $jam)
                                        <option value="{{ $jam->id }}">
                                            {{ $jam->Nama }} (Stok: {{ $jam->Stok }})
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group mb-3">
                                <label for="Jumlah_barang">Jumlah Barang</label>
                                <input type="number" name="Jumlah_barang" class="form-control" min="1" required>
                            </div>

                            <div class="form-group mb-3">
                                <label for="Tanggal_transaksi">Tanggal Transaksi</label>
                                <input type="date" name="Tanggal_transaksi" class="form-control" required>
                            </div>

                            <div class="form-group mb-4">
                                <label for="Nama_pembeli">Nama Pembeli</label>
                                <input type="text" name="Nama_pembeli" class="form-control" required>
                            </div>

                            <button type="submit" class="btn btn-primary me-3">Simpan</button>
                            <button type="reset" class="btn btn-warning">Ulangi</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('description');
    </script>
</body>
</html>
