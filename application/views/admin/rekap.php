<div class="box">
  <div class="box-header with-border">
    <h3 class="box-title">Rekap Peminjaman per Tanggal</h3>
  </div>
  <div class="box-body">
    <?=form_open('Laporan/Pinjam', 'id="pinjam" class="form-horizontal"')?>
      <div class="form-group">
        <label class="control-label col-sm-2">Tanggal Awal</label>
        <div class="col-sm-10">
          <input type="text" class="form-control datepicker" readonly name="awal">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2">Tanggal Akhir</label>
        <div class="col-sm-10">
          <input type="text" class="form-control datepicker" readonly name="akhir">
        </div>
      </div>
      <button type="submit" class="btn btn-success">Lihat</button>
    <?=form_close()?>
  </div>
</div>