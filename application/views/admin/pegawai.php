<div class="box">
  <div class="box-header with-border">
    <h3 class="box-title">Pegawai</h3>
    <div class="box-tools pull-right">
        <button data-toggle="modal" data-target="#tambah" type="button" class="btn btn-primary btn-sm">Tambah</button>
    </div>
  </div>
  <div class="box-body">
    <table class="table table-bordered table-striped dt">
      <thead>
        <tr>
          <th width='1%'>No.</th>
          <th width='30%'>Nama Pegawai</th>
          <th width='10%'>NIP</th>
          <th width='50%'>Alamat</th>
          <th width='5%'>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php $no=1; foreach($db['pegawai'] as $b){?>
        <tr>
          <td><?=$no++?></td>
          <td><?=$b->nama_pegawai?></td>
          <td><?=$b->nip?></td>
          <td><?=$b->alamat?></td>
          <td>
            <button type="button" data-toggle="modal" data-target="#ubah-<?=$b->id_pegawai?>" class="btn btn-success btn-xs"><i class="fa fa-pencil" aria-hidden="true"></i></button>
            <button type="button" data-toggle="modal" data-target="#hapus-<?=$b->id_pegawai?>" class="btn btn-danger btn-xs"><i class="fa fa-trash" aria-hidden="true"></i></button>
          </td>
        </tr>
        <?php }?>
      </tbody>
    </table>
  </div>
</div>
<div id="tambah" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Tambah Pegawai</h4>
      </div>
      <?=form_open('Admin/PegawaiAdd', 'id="pinjam" class="form-horizontal"')?>
        <div class="modal-body">
          <div class="form-group">
            <label class="control-label col-sm-2">NIP Pegawai</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="nip" placeholder="NIP Pegawai">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2">Nama Pegawai</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="nama_pegawai" placeholder="Nama Pegawai">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2">Alamat</label>
            <div class="col-sm-10">
              <textarea rows='3' style="resize:none" name="alamat" class="form-control"></textarea>
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
<?php foreach($db['pegawai'] as $b){?>
<div id="ubah-<?=$b->id_pegawai?>" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Ubah Data Pegawai</h4>
      </div>
      <?=form_open('Admin/PegawaiUpdate', 'id="pinjam" class="form-horizontal"')?>
        <input type="hidden" name="id_pegawai" value="<?=$b->id_pegawai?>">
        <div class="modal-body">
          <div class="form-group">
            <label class="control-label col-sm-2">NIP Pegawai</label>
            <div class="col-sm-10">
              <input type="text" class="form-control"  value="<?=$b->nip?>" name="nip" placeholder="NIP Pegawai">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2">Nama Pegawai</label>
            <div class="col-sm-10">
              <input type="text" class="form-control"  value="<?=$b->nama_pegawai?>" name="nama_pegawai" placeholder="Nama Pegawai">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2">Alamat</label>
            <div class="col-sm-10">
              <textarea rows='3' style="resize:none" name="alamat" class="form-control"><?=$b->alamat?></textarea>
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
<div id="hapus-<?=$b->id_pegawai?>" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Hapus Barang</h4>
      </div>
      <?=form_open('Admin/PegawaiDelete', 'id="pinjam" class="form-horizontal"')?>
        <input type="hidden" name="id_pegawai" value="<?=$b->id_pegawai?>">
        <div class="modal-body">
          Apakah anda yakin akan menghapus pegawai berikut?
          <div class="form-group">
            <label class="control-label col-sm-2">NIP Pegawai</label>
            <div class="col-sm-10">
              <input type="text" readonly class="form-control"  value="<?=$b->nip?>" name="nip" placeholder="NIP Pegawai">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2">Nama Pegawai</label>
            <div class="col-sm-10">
              <input type="text" readonly class="form-control"  value="<?=$b->nama_pegawai?>" name="nama_pegawai" placeholder="Nama Pegawai">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2">Alamat</label>
            <div class="col-sm-10">
              <textarea rows='3' readonly style="resize:none" name="alamat" class="form-control"><?=$b->alamat?></textarea>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-danger">Hapus</button>
        </div>
      <?=form_close()?>
    </div>

  </div>
</div>
<?php }?>