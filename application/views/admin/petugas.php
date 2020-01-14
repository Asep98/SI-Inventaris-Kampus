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
          <th width='30%'>Username</th>
          <th width='30%'>Level</th>
          <th width='5%'>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php $no=1; foreach($db['petugas'] as $b){?>
        <tr>
          <td><?=$no++?></td>
          <td><?=$b->nama_petugas?></td>
          <td><?=$b->username?></td>
          <td><?=$this->CRUD->get_row_where('level','id_level',$b->id_level)->nama_level;?></td>
          
          <td>
            <button type="button" data-toggle="modal" data-target="#ubah-<?=$b->id_petugas?>" class="btn btn-success btn-xs"><i class="fa fa-pencil" aria-hidden="true"></i></button>
            <button type="button" data-toggle="modal" data-target="#hapus-<?=$b->id_petugas?>" class="btn btn-danger btn-xs"><i class="fa fa-trash" aria-hidden="true"></i></button>
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
        <h4 class="modal-title">Tambah Petugas</h4>
      </div>
      <?=form_open('admin/PetugasAdd', 'id="pegawai" class="form-horizontal"')?>
        <div class="modal-body">
          <div class="form-group">
            <label class="control-label col-sm-2">Nama Petugas</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="nama_petugas" placeholder="Nama Petugas">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2">Username</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="username" placeholder="Username">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2">Password</label>
            <div class="col-sm-10">
              <input type="password" class="form-control" name="password" placeholder="Password">
            </div>
          </div>
          
            <div class="form-group">
            <label class="control-label col-sm-2">Level</label>
            <div class="col-sm-10">
              <select class="form-control" name="level">
                <option selected disabled>Level</option>
                <?php foreach ($db['level'] as $l){ ?>
                <option value="<?=$l->id_level?>"><?=$l->nama_level?></option>
                <?php } ?>
              </select>
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
<?php foreach($db['petugas'] as $b){?>
<div id="ubah-<?=$b->id_petugas?>" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Ubah Petugas</h4>
      </div>
      <?=form_open('admin/PetugasUpdate', 'id="petugas" class="form-horizontal"')?>
        <input type="hidden" name="id_petugas" value="<?=$b->id_petugas?>">
        <div class="modal-body">
          <div class="form-group">
            <label class="control-label col-sm-2">Nama Petugas</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="nama_petugas" value="<?=$b->nama_petugas?>" placeholder="Nama Petugas">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2">Password</label>
            <div class="col-sm-10">
              <input type="password" value="<?=$b->ungeneratepass?>" name="password" class="form-control">
            </div>
          </div>
           <div class="form-group">
            <label class="control-label col-sm-2">Level</label>
            <div class="col-sm-10">
              <select class="form-control" name="jenis">
                <option selected disabled>Level</option>
                <?php foreach ($db['level'] as $l){ 
                  if ($b->id_level == $l->id_level) {
                  ?>
                <option value="<?=$l->id_level?>" selected ><?=$l->nama_level?></option>
              <?php }else { ?>
                <option value="<?=$l->id_level?>"><?=$l->nama_level?></option>
                <?php }} ?>
              </select>
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

<div id="hapus-<?=$b->id_petugas?>" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Hapus Petugas</h4>
      </div>
      <?=form_open('admin/PetugasDelete', 'id="petugas" class="form-horizontal"')?>
        <input type="hidden" name="id_petugas" value="<?=$b->id_petugas?>">

        <div class="modal-body">
          Apakah anda yakin akan menghapus petugas ini?
          <div class="form-group">
            <label class="control-label col-sm-2">Nama Petugas</label>
            <div class="col-sm-10">
              <input type="text" disabled class="form-control" name="nama_petugas" value="<?=$b->nama_petugas?>" placeholder="Nama Petugas">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2">Level</label>
            <div class="col-sm-10">
              <input type="text" disabled class="form-control" name="level" value="<?=$this->CRUD->get_row_where('level','id_level',$b->id_level)->nama_level?>" placeholder="Nama Petugas">
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