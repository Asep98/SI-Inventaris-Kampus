<div class="box">
  <div class="box-header with-border">
    <h3 class="box-title">Peminjaman</h3>
  </div>
  <div class="box-body">
    <table class="table table-bordered table-striped dt">
      <thead>
        <tr>
          <th width='1%'>No.</th>
          <th width='10%'>Kode Barang</th>
          <th width='30%'>Nama Barang</th>
          <th width='10%'>Ruang</th>
          <th width='5%'>Stok</th>
          <th width='7%'>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php $no=1; foreach($db['barang'] as $b){?>
        <tr>
          <td><?=$no++?></td>
          <td><?=$b->kode_barang?></td>
          <td><?=$b->nama_barang?></td>
          <td><?=$this->CRUD->get_row_where('ruang','id_ruang',$b->ruang)->nama_ruang?></td>
          <td><?=$b->jml_barang?></td>
          <td>
            <button type="button" data-toggle="modal" data-target="#pinjam-<?=$b->kode_barang?>" class="btn btn-success btn-xs">Pinjam</button>
          </td>
        </tr>
        <?php }?>
      </tbody>
    </table>
  </div>
</div>
<?php foreach($db['barang'] as $b){?>
<div id="pinjam-<?=$b->kode_barang?>" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Pinjam</h4>
      </div>
      <?=form_open('Admin/Pinjam', 'id="pinjam" class="form-horizontal"')?>
        <input type="hidden" name="kode_barang" value="<?=$b->kode_barang?>">
        <div class="modal-body">
          <div class="form-group">
            <label class="control-label col-sm-2">Pegawai</label>
            <div class="col-sm-10">
              <select class="form-control" name="nip">
                <option selected disabled>NIP</option>
                <?php foreach($this->CRUD->get('pegawai') as $a){?>
                <option value="<?=$a->nip?>"><?=$a->nip?> - <?=$a->nama_pegawai?></option>
                <?php } ?>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2">Nama Barang</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" readonly name="nama_barang" value="<?=$b->nama_barang?>" placeholder="Nama Barang">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2">Jumlah Pinjam</label>
            <div class="col-sm-10">
              <input type="number" class="form-control" name="jml_barang" placeholder="Jumlah Pinjam" value="1" max='<?=$b->jml_barang?>' min=1>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2">Keterangan</label>
            <div class="col-sm-10">
              <textarea rows='3' style="resize:none" name="keterangan" class="form-control"></textarea>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-success">Simpan</button>
        </div>
      <?=form_close()?>
    </div>

  </div>
</div>
<?php }?>