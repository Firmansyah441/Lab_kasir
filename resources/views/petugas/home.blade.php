@extends('layouts.mainlayout')

@section('title', 'Home')

@section('content')
<h1>selamat datang petugas, {{ Auth::user()->nama_user }}</h1>
<h1>hak akses anda adalah, {{ Auth::user()->role->nama_role }}</h1>
@endsection
