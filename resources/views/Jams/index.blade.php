<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Jam</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

</head>
<body style="background: white">

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div>
                    <h3 class="text-center my-4">Sistem Toko Jam</h3>
                    <h3 class="text-center my-4">Data Jam</h3>

                    <hr>
                </div>
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <a href="{{ route('Jams.create') }}" class="btn btn-md btn-success mb-3">Tambahkan Jam</a>
                        <a href="{{ route('dashboard') }}" class="btn btn-md btn-success mb-3">Kembali ke dashboard</a>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">Gambar</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Harga</th>
                                    <th scope="col">Stok</th>
                                    <th scope="col" style="width: 20%">Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($Jams as $Jam)
                                    <tr>
                                        <td class="text-center">
                                        <img src="{{ asset('storage/jams/' . $Jam->Gambar) }}" alt="{{ $Jam->Nama }}" style="max-width: 200px;">
                                        </td>
                                        <td>{{ $Jam->Nama }}</td>
                                        <td>{{ "Rp " . number_format($Jam->Harga,2,',','.') }}</td>
                                        <td>{{ $Jam->Stok }}</td>
                                        <td class="text-center">
                                            <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('Jams.destroy', $Jam->id) }}" method="POST">
                                                <a href="{{ route('Jams.show', $Jam->id) }}" class="btn btn-sm btn-dark">Lihat</a>
                                                <a href="{{ route('Jams.edit', $Jam->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                                
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <div class="alert alert-success">
                                        Data Produk belum Tersedia.
                                    </div>
                                @endforelse
                            </tbody>
                        </table>
                        {{ $Jams->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>

         @if(session('success'))
            Swal.fire({
                icon: "success",
                title: "BERHASIL",
                text: "{{ session('success') }}",
                showConfirmButton: false,
                timer: 2000
            });
        @elseif(session('error'))
            Swal.fire({
                icon: "error",
                title: "GAGAL!",
                text: "{{ session('error') }}",
                showConfirmButton: false,
                timer: 2000
            });
        @endif

    </script>

</body>
</html>