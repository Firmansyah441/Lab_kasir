@extends('layouts.mainlayout')

@section('title', 'Barang')
@section('content')
<h1>Barang</h1>
@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif
<!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahbarang">
        Tambah Barang
    </button>
@include('admin.modal.tambah_barang')
@include('sweetalert::alert')

<!-- Tabel Kategori -->
<table class="table mt-2">
    <tr>
        <th>No</th>
        <th>Kode barang</th>
        <th>Nama Barang</th>
        <th>Kategori</th>
        <th>Gambar</th>
        <th>Stok</th>
        <th>Harga</th>
        <th>Aksi</th>
    </tr>
    @foreach ($barang as $k)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $k->kode_barang }}</td>
        <td>{{ $k->nama_barang}}</td>
        <td>{{ $k->kategori->nama_kategori}}</td>
        <td>
            {{-- <img src="{{ asset('storage/' . $k->gambar) }}" alt="" width="100px"> --}}
            <a href="" data-bs-toggle="modal" data-bs-target="#lihatgambar{{ $k->id }}">lihat gambar</a>
        </td>
        <td>{{ $k->stok}}</td>
        <td>{{ $k->harga}}</td>
        <td>
            <a href="" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editbarang{{ $k->id }}">Edit</a>
            <a href="" class="btn btn-danger"data-bs-toggle="modal" data-bs-target="#hapusbarang{{ $k->id }}">Hapus</a>
        </td>
    </tr>
    @include('admin.modal.update_barang')
    @include('admin.modal.hapus_barang')
    @include('admin.modal.lihat_gambar')
    @endforeach
</table>
@endsection


