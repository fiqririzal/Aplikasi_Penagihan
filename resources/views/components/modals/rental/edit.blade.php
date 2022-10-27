<form id="editForm">
    <div class="modal" tabindex="-1" role="dialog" id="editModal">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Edit Produk</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="form-group">
                <label for="name_car">Nama Mobil</label>
                    <input type="text" name="name_car" id="name_car" class="form-control">
                </label>
            </div>
            <div class="form-group">
                <label for="description">Deskripsi</label>
                    <input type="text" name="description" id="description" class="form-control">
                </label>
            </div>
            <div class="form-group">
                <label for="image">Gambar</label>
                    <input type="text" name="image" id="image" class="form-control">
                </label>
            </div>
            <div class="form-group">
                <label for="price">Harga Sewa</label>
                    <input type="number" id="price" class="form-control price" name="price">
                </label>
            </div>
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary" id="editSubmit">Save changes</button>
          </div>
        </div>
      </div>
    </div>
</form>
