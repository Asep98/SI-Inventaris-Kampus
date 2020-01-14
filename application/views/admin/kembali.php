<div class="box">
  <div class="box-header with-border">
    <h3 class="box-title">Pengembalian</h3>
  </div>
  <div class="box-body">
    <table class="table table-bordered table-responsive table-striped dt">
      <thead>
        <tr>
          <th width='1%'>No.</th>
          <th width='10%'>Kode Pinjam</th>
          <th width='30%'>Nama Peminjam</th>
          <th width='30%'>Barang Dipinjam</th>
          <th width='5%'>Jumlah</th>
          <th width='10%'>Tanggal Meminjam</th>
          <th width='7%'>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php $no=1; foreach($db['barang'] as $b){?>
        <tr>
          <td><?=$no++?></td>
          <td><?=$b->kode_pinjam?></td>
          <td><?=$this->CRUD->get_row_where('pegawai','nip',$b->peminjam)->nama_pegawai?></td>
          <td><?=$this->CRUD->get_row_where('barang','kode_barang',$b->kode_barang)->nama_barang?></td>
          <td><?=$b->jumlah?></td>
          <td><?=$b->tgl_pinjam?></td>
          <td>
            <button type="button" data-toggle="modal" data-target="#kembali-<?=$b->kode_pinjam?>" class="btn btn-success btn-xs">Kembalikan</button>
          </td>
        </tr>
        <?php }?>
      </tbody>
    </table>
  </div>
</div>
<?php foreach($db['barang'] as $b){?>
<div id="kembali-<?=$b->kode_pinjam?>" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Pengembalian</h4>
      </div>
      <?=form_open('Admin/Kembali', 'id="pinjam" class="form-horizontal"')?>
        <input type="hidden" name="kode_pinjam" value="<?=$b->kode_pinjam?>">
        <div class="modal-body">
          Anda yakin bahwa barang ini akan dikembalikan?
          <div class="form-group">
            <label class="control-label col-sm-2">Peminjam</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" readonly name="peminjam" value="<?=$b->peminjam?>" placeholder="Peminjam">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2">Nama Barang</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" readonly name="nama_barang" value="<?=$this->CRUD->get_row_where('barang','kode_barang',$b->kode_barang)->nama_barang?>" placeholder="Nama Barang">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2">Jumlah Pinjam</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" readonly name="jumlah" value="<?=$b->jumlah?>" placeholder="Jumlah">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2">Keterangan</label>
            <div class="col-sm-10">
              <textarea readonly rows='3' style="resize:none" name="keterangan" class="form-control"><?=$b->keterangan?></textarea>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-success">Kembalikan</button>
        </div>
      <?=form_close()?>
    </div>

  </div>
</div>
<?php }?>