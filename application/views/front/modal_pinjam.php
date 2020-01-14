<div class="modal fade" id="pinjam" tabindex="-1" role="dialog" aria-labelledby="pinjam" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
    <div class="modal-content">
      <?php echo form_open('Transaksi/Peminjaman', 'id="pinjam"'); ?>
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Pinjam Barang</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="container-fluid">
            <div class="form-group row">
              <label class="col-md-3 col-form-label">Kode Barang</label>
              <input class="form-control col-md-9" readonly type="text" name="kode_barang" id="kode_barang" placeholder="Kode">
            </div>
            <div class="form-group row">
              <label class="col-md-3 col-form-label">Nama Barang</label>
              <input class="form-control col-md-9" readonly type="text" name="nama_barang" id="nama_barang" placeholder="Nama">
            </div>
            <div class="form-group row">
              <label class="col-md-3 col-form-label">Jumlah Pinjam</label>
              <input class="form-control col-md-9" type="number" min="1" name="jml_pinjam" id="jml_pinjam">
            </div>
            <div class="form-group row">
              <label class="col-md-3 col-form-label">Keterangan</label>
              <textarea class="form-control col-md-9" style="resize: none" name="keterangan" rows="3" id="keterangan"></textarea>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary">Pinjam</button>
        </div>
      <?php echo form_close();?>
    </div>
  </div>
</div>
<script>
  function pinjam(data){
    $('#pinjam').modal('toggle'); /* Toggle Modal */
    /* Set nilai pada form */
    document.getElementById('kode_barang').value = data[0];
    document.getElementById('nama_barang').value = data[1];
    document.getElementById('jml_pinjam').value  = '1';
    document.getElementById('jml_pinjam').max = data[2];
  }
</script>