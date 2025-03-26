@extends('layouts.mainlayout')

@section('title', 'Home')

@section('content')
<script>
    alert()->success('SuccessAlert','Lorem ipsum dolor sit amet.');
</script>

<h1>selamat datang admin, {{ Auth::user()->nama_user }}</h1>
<h1>hak akses anda adalah, {{ Auth::user()->role->nama_role }}</h1>
@endsection
