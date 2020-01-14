<div class="box">
  <div class="box-header with-border">
    <h3 class="box-title">Barang</h3>
    <div class="box-tools pull-right">
        <button data-toggle="modal" data-target="#tambah" type="button" class="btn btn-primary btn-sm">Tambah</button>
    </div>
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
          <th width='6%'>Aksi</th>
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
            <button type="button" data-toggle="modal" data-target="#ubah-<?=$b->kode_barang?>" class="btn btn-success btn-xs"><i class="fa fa-pencil" aria-hidden="true"></i></button>
            <button type="button" data-toggle="modal" data-target="#stok-<?=$b->kode_barang?>" class="btn btn-info btn-xs"><i class="fa fa-plus" aria-hidden="true"></i></button>
            <button type="button" data-toggle="modal" data-target="#hapus-<?=$b->kode_barang?>" class="btn btn-danger btn-xs"><i class="fa fa-trash" aria-hidden="true"></i></button>
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
        <h4 class="modal-title">Tambah Barang</h4>
      </div>
      <?=form_open('Admin/BarangAdd', 'id="pinjam" class="form-horizontal"')?>
        <div class="modal-body">
          <div class="form-group">
            <label class="control-label col-sm-2">Nama Barang</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="nama_barang" placeholder="Nama Barang">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2">Spesifikasi</label>
            <div class="col-sm-10">
              <textarea rows='3' style="resize:none" name="spesifikasi" class="form-control"></textarea>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2">Stok</label>
            <div class="col-sm-10">
              <input type="number" class="form-control" name="jml_barang" placeholder="Stok" value=1 min=1>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2">Ruang</label>
            <div class="col-sm-10">
              <select class="form-control" name="ruang">
                <option selected disabled>Ruang</option>
                <?php foreach($this->CRUD->get('ruang') as $a){?>
                <option value="<?=$a->id_ruang?>"><?=$a->nama_ruang?></option>
                <?php } ?>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2">Jenis</label>
            <div class="col-sm-10">
              <select class="form-control" name="jenis">
                <option selected disabled>Jenis</option>
                <?php foreach($this->CRUD->get('jenis') as $a){?>
                <option value="<?=$a->id_jenis?>"><?=$a->nama_jenis?></option>
                <?php } ?>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2">Kondisi</label>
            <div class="col-sm-10">
              <select class="form-control" name="kondisi">
                <option selected disabled>Kondisi</option>
                <option value="Layak Pakai">Layak Pakai</option>
                <option value="Tidak Layak Pakai">Tidak Layak Pakai</option>
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
<?php foreach($db['barang'] as $b){?>
<div id="ubah-<?=$b->kode_barang?>" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Ubah Barang</h4>
      </div>
      <?=form_open('Admin/BarangUpdate', 'id="pinjam" class="form-horizontal"')?>
        <input type="hidden" name="id_barang" value="<?=$b->id_barang?>">
        <div class="modal-body">
          <div class="form-group">
            <label class="control-label col-sm-2">Nama Barang</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="nama_barang" value="<?=$b->nama_barang?>" placeholder="Nama Barang">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2">Spesifikasi</label>
            <div class="col-sm-10">
              <textarea rows='3' style="resize:none" name="spesifikasi" class="form-control"><?=$b->spesifikasi?></textarea>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2">Ruang</label>
            <div class="col-sm-10">
              <select class="form-control" name="ruang">
                <option disabled>Ruang</option>
                <?php foreach($this->CRUD->get('ruang') as $a){
                  if($b->ruang==$a->id_ruang){?>
                  <option selected value="<?=$a->id_ruang?>"><?=$a->nama_ruang?></option>
                <?php } else {?>
                  <option value="<?=$a->id_ruang?>"><?=$a->nama_ruang?></option>
                <?php } } ?>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2">Jenis</label>
            <div class="col-sm-10">
              <select class="form-control" name="jenis">
                <option disabled>Jenis</option>
                <?php foreach($this->CRUD->get('jenis') as $a){
                  if($b->jenis==$a->id_jenis){?>
                  <option selected value="<?=$a->id_jenis?>"><?=$a->nama_jenis?></option>
                <?php }else{?>
                  <option value="<?=$a->id_jenis?>"><?=$a->nama_jenis?></option>
                <?php }} ?>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2">Kondisi</label>
            <div class="col-sm-10">
              <select class="form-control" name="kondisi" focus="<?=$a->kondisi?>">
                <option disabled>Kondisi</option>
                <option value="Layak Pakai">Layak Pakai</option>
                <option value="Tidak Layak Pakai">Tidak Layak Pakai</option>
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
<div id="stok-<?=$b->kode_barang?>" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Ubah Stok</h4>
      </div>
      <?=form_open('Admin/BarangStok', 'id="pinjam" class="form-horizontal"')?>
        <input type="hidden" name="id_barang" value="<?=$b->id_barang?>">
        <div class="modal-body">
          <div class="form-group">
            <label class="control-label col-sm-2">Nama Barang</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" readonly name="nama_barang" value="<?=$b->nama_barang?>" placeholder="Nama Barang">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2">Stok</label>
            <div class="col-sm-10">
              <input type="number" class="form-control" name="jml_barang" placeholder="Stok" value='<?=$b->jml_barang?>' min=1>
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
<div id="hapus-<?=$b->kode_barang?>" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Hapus Barang</h4>
      </div>
      <?=form_open('Admin/BarangHapus', 'id="pinjam" class="form-horizontal"')?>
        <input type="hidden" name="id_barang" value="<?=$b->id_barang?>">

        <div class="modal-body">
          Apakah anda yakin akan menghapus barang ini?
          <div class="form-group">
            <label class="control-label col-sm-2">Nama Barang</label>
            <div class="col-sm-10">
              <input type="text" readonly class="form-control" name="nama_barang" value="<?=$b->nama_barang?>" placeholder="Nama Barang">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2">Spesifikasi</label>
            <div class="col-sm-10">
              <textarea rows='3'  readonly style="resize:none" name="spesifikasi" class="form-control"><?=$b->spesifikasi?></textarea>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2">Ruang</label>
            <div class="col-sm-10">
              <select  readonly class="form-control" name="ruang">
                <option disabled>Ruang</option>
                <?php foreach($this->CRUD->get('ruang') as $a){
                  if($b->ruang==$a->id_ruang){?>
                  <option selected value="<?=$a->id_ruang?>"><?=$a->nama_ruang?></option>
                <?php } else {?>
                  <option value="<?=$a->id_ruang?>"><?=$a->nama_ruang?></option>
                <?php } } ?>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2">Jenis</label>
            <div class="col-sm-10">
              <select readonly class="form-control" name="jenis">
                <option disabled>Jenis</option>
                <?php foreach($this->CRUD->get('jenis') as $a){
                  if($b->jenis==$a->id_jenis){?>
                  <option selected value="<?=$a->id_jenis?>"><?=$a->nama_jenis?></option>
                <?php }else{?>
                  <option value="<?=$a->id_jenis?>"><?=$a->nama_jenis?></option>
                <?php }} ?>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2">Kondisi</label>
            <div class="col-sm-10">
              <select readonly class="form-control" selected="<?=$a->kondisi?>" name="kondisi">
                <option disabled>Kondisi</option>
                <option value="Layak Pakai">Layak Pakai</option>
                <option value="Tidak Layak Pakai">Tidak Layak Pakai</option>
              </select>
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