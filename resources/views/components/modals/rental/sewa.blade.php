<form id="editFormSewa">
    <div class="modal" tabindex="-1" role="dialog" id="sewaModal">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Sewa Mobil</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" disabled>
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="form-group">
                <label for="name_car_sewa">Nama Mobil</label>
                    <input type="text" name="name_car" id="name_car_sewa" class="form-control" disabled>
                </label>
            </div>
            <div class="form-group">
                <label for="description_sewa">Deskripsi</label>
                    <input type="text" name="description" id="description_sewa" class="form-control" disabled>
                </label>
            </div>
            <div class="form-group">
                <label for="image_sewa">Gambar</label>
                    <input type="text" name="image" id="image_sewa" class="form-control" disabled>
                </label>
            </div>
            <div class="form-group">
                <label for="price_sewa">Harga Sewa</label>
                    <input type="number" id="price_sewa" class="form-control price" name="price" disabled>
                </label>
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <select name="status" id="status_sewa" class="form-control">
                <option value="disewa" >Disewa</option>
                <option value="tersedia" >Tersedia</option>
                </select>
            </label>
            </div>
            <div class="form-group">
                <label for="lama_sewa">Lama Sewa</label>
                    <input type="text" name="lama_sewa" id="lama_sewa" class="form-control">
                </label>
            </div>
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary" id="editSewa">Save changes</button>
          </div>
        </div>
      </div>
    </div>
</form>
