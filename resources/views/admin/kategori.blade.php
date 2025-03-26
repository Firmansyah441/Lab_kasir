@extends('layouts.mainlayout')

@section('content')
<h1>Kategori</h1>
@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif
<!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahkategori">
        Tambah Kategori
    </button>
@include('admin.modal.tambah_kategori')
@include('sweetalert::alert')

<!-- Tabel Kategori -->
<table class="table mt-2">
    <tr>
        <th>No</th>
        <th>Nama Kategori</th>
        <th>Keterangan</th>
        <th>Aksi</th>
    </tr>
    @foreach ($kategori as $k)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $k->nama_kategori }}</td>
        <td>{{ $k->keterangan }}</td>
        <td>
            <a href="" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editkategori{{ $k->id }}">Edit</a>
            <a href="" class="btn btn-danger"data-bs-toggle="modal" data-bs-target="#hapuskategori{{ $k->id }}">Hapus</a>
        </td>
    </tr>
    @include('admin.modal.hapus_kategori')
    @include('admin.modal.edit_kategori')
    @endforeach
</table>
@endsection


