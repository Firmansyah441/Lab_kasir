<!-- Modal -->
<div class="modal fade" id="addcart" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add cart</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <table class="table mt-3">
             <thead>
               <tr>
                 <th>No</th>    
                 <th>Kode Barang</th>
                 <th>Nama Barang</th>
                 <th>Harga</th>
                 <th>Aksi</th>
             </thead>
             <tbody>
                @foreach ($barang as $list)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $list->kode_barang }}</td>
                    <td>{{ $list->nama_barang }}</td>
                    <td>{{ $list->harga }}</td>
                    <td>
                        <form action="/add_to_cart/{{ $list->id }}" method="GET">
                            <button type="submit" class="btn btn-primary">Pilih</button>
                        </form>
                    </td>
                </tr>
                @endforeach
             </tbody>
            </table>
            </div>
          </div>
    </div>
  </div>
