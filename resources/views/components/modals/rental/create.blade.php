<form id="createForm" enctype="multipart/form-data">
    
    <div class="modal" tabindex="-1" role="dialog" id="createModal">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Tambah Produk</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="form-group">
                <label for="createName">Nama Mobil</label>
                    <input type="text" name="name_car" id="createName" class="form-control">
                </label>
            </div>
            <div class="form-group">
                <label for="createName">Deskripsi</label>
                    <input type="text" name="description" id="createDescription" class="form-control">
                </label>
            </div>
            <div class="form-group">
                <label for="createName">Gambar</label>
                    <input type="file" name="image" id="createImage" class="form-control">
                </label>
            </div>
            <div class="form-group">
                <label for="createPrice">Harga Sewa</label>
                    <input type="number" id="createPrice" class="form-control price" name="price">
                </label>
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                    <select name="status" id="status" class="form-control">
                    <option value="disewa" >Disewa</option>
                    <option value="tersedia" >Tersedia</option>
                    </select>
                </label>
            </div>
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary" id="createSubmit">Save changes</button>
          </div>
        </div>
      </div>
    </div>
</form>
