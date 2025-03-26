<!-- Modal -->
<div class="modal fade" id="tambahbarang" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="/tambah_barang" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah barang</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="kode_barang" class="form-label">Kode Barang</label>
                        <input type="text" class="form-control" name="kode_barang" id="kode_barang"
                            value="{{ $KodeBarang }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="nama_barang" class="form-label">Nama Barang</label>
                        <input type="text" class="form-control"name="nama_barang" id="nama_barang"
                            placeholder="Bebas">
                    </div>
                    <div class="mb-3">
                        <label for="kategori_id" class="form-label">Kategori Barang</label>
                        <select class="form-select" name="kategori_id" id="kategori_id">
                            <option value="">---Pilih Kategori---</option>
                            @foreach ($kategori as $k)
                                <option value="{{ $k->id }}">{{ $k->nama_kategori }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="gambar" class="form-label">Gambar Barang</label>
                        <input type="file" class="form-control" name="gambar" id="gambar" placeholder="Bebas">
                    </div>
                    <div class="mb-3">
                        <label for="harga" class="form-label">Harga Barang</label>
                        <input type="text" class="form-control" name="harga" id="harga"
                            placeholder="contoh: 10000">
                    </div>
                    <div class="mb-3">
                        <label for="stok" class="form-label">Stok Barang</label>
                        <input type="text" class="form-control" name="stok" id="stok"
                            placeholder="contoh: 100">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
        </div>
        </form>
    </div>
</div>
