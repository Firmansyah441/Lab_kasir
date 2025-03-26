@extends('layouts.mainLayout')

@section('title', 'Transaksi')
@section('content')
    <style>
        .form-label {
            font-weight: bold;
        }
    </style>
    <h3>Transaksi</h3>
    @include('admin.modal.Tambah_cart')
    <div class="row mb-3">
        <div class="col-md-2">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addcart">Add cart</button>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-2">
            <h4 class="mb-1">Kode Transaksi</h4>
        </div>
        <div class="col-md-10">
            <h4 class="mb-0">: {{ $kodeTransaksi }}</h4>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-2">
            <h4 class="mb-0">Tanggal</h4>
        </div>
        <div class="col-md-10">
            <h4 class="mb-0">: {{ now()->format('d-m-Y') }}</h4>
        </div>
    </div>
    <table class="table table-bordered">
        <thead class="thead-light">
            <tr>
                <th>No</th>
                <th>Kode</th>
                <th>Nama Barang</th>
                <th>Harga</th>
                <th>Jumlah</th>
                <th>subtotal</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($t_keranjang as $cart)
                <td>{{ $loop->iteration }}</td>
                <td><span class="badge bg-success">{{ $cart->kode_barang }}</span></td>
                <td>{{ $cart->nama_barang }}</td>
                <td>{{ $cart->harga }}</td>
                <td>
                    <form action="{{ route('keranjang.update', $cart->id) }}" method="POST">
                        @csrf
                        <input type="number" name="qty" value="{{ $cart->qty }}" class="form-control" min="1"
                            onchange="this.form.submit()">
                    </form>
                </td>
                <td>{{ $cart->subtotal }}</td>
                <td>
                    <a href="" class="btn btn-danger"data-bs-toggle="modal"
                        data-bs-target="#hapuskeranjang{{ $cart->id }}">Hapus</a>
                </td>
                </tr>
                @include('admin.modal.hapus_keranjang')
            @endforeach
        </tbody>
    </table>
    <form action="{{ route('transaksi.simpan') }}" method="post">
        @csrf
    <div class="row mt-3">
        <div class="col-md-2">
            <label for="bayar" class="form-label">bayar</label>
        </div>
        <div class="col-md-3">
            <input type="text" class="form-control" id="bayar" value="Rp. {{ number_format($total, 0, ',', '.') }}"
                readonly>
            <input type="hidden" name="total" value="{{ $total }}">
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-2">
            <label for="diterima" class="form-label">Diterima</label>
        </div>
        <div class="col-md-3">
            <input type="text" class="form-control" id="diterima" placeholder="Masukkanjumlah uang yang diterima">
            <div id="error-message" class="text-danger mt-2" style="display:none;"></div>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-2">
            <label for="kembali" class="form-label">kembali</label>
        </div>
        <div class="col-md-3">
            <input type="text" class="form-control" id="kembali" value="Rp. 0" readonly>
        </div>
    </div>
    <div class="mt-4">
        <button type="submit" class="btn btn-primary">Simpan Transaksi</button>
    </div>
</form>
    <script>
        // Fungsi untuk memformat angka menjadi mata uang Indonesia
        function formatCurrency(value) {
            // Menghilangkan karakter selain angka
            value = value.replace(/\D/g, '');
            return 'Rp. ' + value.replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        }
        document.getElementById('diterima').addEventListener('input', function() {
            // Ambil nilai dari input Bayar tanpa simbol
            var bayar = parseFloat(document.getElementById('bayar').value.replace(/Rp. /g,
                    '').replace(/\./g, '')
                .trim());
            // Hapus simbol Rp. dan ambil angka saja
            var diterima = this.value.replace(/Rp\. /g, '').replace(/\D/g, '').trim();
            var errorMessage = document.getElementById('error-message');
            var kembaliField = document.getElementById('kembali');
            // Mengupdate nilai ditampilkan dalam format currency
            this.value = formatCurrency(diterima);
            errorMessage.style.display = "none";
            kembaliField.value = "Rp. 0";
            // Cek jika input 'diterima' kosong atau tidak valid
            if (isNaN(diterima) || diterima === "") {
                errorMessage.innerHTML = "Uang tidak boleh kosong";
                errorMessage.style.display = "block";
                return;
            }
            // Hitung kembali
            var kembali = parseFloat(diterima) - bayar;
            // Jika kembalian negatif, tampilkan pesan error dan set kembalian jadi Rp. 0
            if (kembali < 0) {
                errorMessage.innerHTML = "Uang tidak boleh kurang dari total bayar";
                errorMessage.style.display = "block";
                kembaliField.value = "Rp. 0";
                return;
            }
            // Jika tidak ada error, sembunyikan pesan error dan tampilkan kembalian
            errorMessage.style.display = "none";
            kembaliField.value = "Rp. " + kembali.toLocaleString('id-ID');
        });
        document.getElementById('bayar').addEventListener('input', function() {
            // Menambahkan format currency pada input bayar
            this.value = formatCurrency(this.value);
        });
    </script>

@endsection
