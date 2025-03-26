<!-- Modal -->
<div class="modal fade" id="tambahkategori" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <form action="/tambah_kategori" method="POST">
            @csrf
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Tambah kategori</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="nama_kategori" class="form-label">Nama Kategori</label>
                    <input type="text" class="form-control" name="nama_kategori" id="nama_kategori" placeholder="contoh: Alat Tulis">
                  </div>
                  <div class="mb-3">
                    <label for="Keterangan" class="form-label">Keterangan</label>
                    <input type="text" class="form-control"name="keterangan" id="keterangan" placeholder="Bebas">
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
