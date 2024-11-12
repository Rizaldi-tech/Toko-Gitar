@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Sistem Manajemen Toko Gitar</h1>
@stop

@section('content')
    {{-- Card Daftar Gitar --}}
    <div class="card bg-dark text-white mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="card-title">Gitar</h3>
            <a href="{{ route('guitars.create') }}" class="btn btn-sm btn-success">Tambah Gitar</a>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-dark">
                <thead>
                    <tr>
                        <th scope="col">Nama</th>
                        <th scope="col">Merek</th>
                        <th scope="col">Harga</th>
                        <th scope="col" style="width: 20%">Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($guitars as $guitar)
                        <tr>
                            </td>
                            <td>{{ $guitar->nama }}</td>
                            <td>{{ $guitar->merek }}</td>
                            <td>{{ "Rp " . number_format($guitar->harga,2,',','.') }}</td>
                            <td class="text-center">
                                <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('guitars.destroy', $guitar->id) }}" method="POST">
                                    <a href="{{ route('guitars.show', $guitar->id) }}" class="btn btn-sm btn-dark">Lihat</a>
                                    <a href="{{ route('guitars.edit', $guitar->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus produk ini?');">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">
                                <div class="alert alert-success">
                                    Data Jam belum tersedia.
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
