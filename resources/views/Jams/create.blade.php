<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background: lightgray">

    <div>
        <h3 class="text-center my-4">Tambahkan Jam</h3>
     </div>

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <form action="{{ route('Jams.store') }}" method="POST" enctype="multipart/form-data">
                        
                            @csrf

                            <div class="form-group mb-3">
                                <label class="font-weight-bold">Gambar</label>
                                <input type="file" class="form-control @error('Gambar') is-invalid @enderror" name="Gambar">
                            
                                <!-- error message untuk Gambar -->
                                @error('Gambar')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label class="font-weight-bold">Nama</label>
                                <input type="text" class="form-control @error('Nama') is-invalid @enderror" name="Nama" value="{{ old('Nama') }}" placeholder="Masukkan Nama Jam">
                            
                                <!-- error message untuk Nama -->
                                @error('Nama')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label class="font-weight-bold">Merek</label>
                                <textarea class="form-control @error('Merek') is-invalid @enderror" name="Merek" rows="5" placeholder="Masukkan Merek">{{ old('Merek') }}</textarea>
                            
                                <!-- error message untuk Merek -->
                                @error('Merek')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label class="font-weight-bold">Harga</label>
                                        <input type="number" class="form-control @error('Harga') is-invalid @enderror" name="Harga" value="{{ old('Harga') }}" placeholder="Masukkan Harga Jam">
                                    
                                        <!-- error message untuk Harga -->
                                        @error('Harga')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label class="font-weight-bold">Stok</label>
                                        <input type="number" class="form-control @error('Stok') is-invalid @enderror" name="Stok" value="{{ old('Stok') }}" placeholder="Masukkan Stok Produk">
                                    
                                        <!-- error message untuk Stok -->
                                        @error('Stok')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-md btn-primary me-3">Simpan</button>
                            <button type="reset" class="btn btn-md btn-warning">Ulangi</button>

                        </form> 
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
    <script>
        CKEDITOR5.replace( 'Merek' );
    </script>
</body>
</html>