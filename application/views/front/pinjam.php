<div class="row d-flex h-100" style="min-height: 100vh;">
  <div class="col d-none d-lg-block"></div>
  <div class="col col-lg-10 justify-content-center align-self-center">
    <div class="card my-5">
      <div class="card-body">
        <h3 class="card-title">
          <?=$pageHeader?>
          <a href="<?=base_url('front/menu')?>" class="btn btn-primary btn-sm rounded-pill float-right">Kembali</a>
        </h3>
        <p class="card-text">
          <div class="row" style="overflow-x:auto; min-height: 73vh">
            <?php foreach($db['barang'] as $bar){?>
              <div class="col-12 col-sm-6 col-lg-3 my-2">
                <div class="card">
                  <img src="<?php if ($bar->gambar) {echo $bar->gambar; } else { echo base_url('assets/img/content-placeholder.svg'); }?>" class="card-img-top">
                  <div class="card-body">
                    <h5 class="card-title"><?=$bar->nama_barang?></h5>
                    <h6 class="card-subtitle mb-2 text-muted"><?=$this->CRUD->get_row_where('jenis','id_jenis', $bar->jenis_barang)->nama_jenis?></h6>
                    <p class="card-text">
                      <b>Spesifikasi :</b> <?=$bar->spesifikasi?><br>
                      <b>Lokasi :</b> <?=$this->CRUD->get_row_where('ruang','id_ruang', $bar->ruang)->nama_ruang?><br>
                      <b>Stok :</b> <?=$bar->jml_barang?><br>
                    </p>
                    <button type="button" class="btn btn-primary" onclick="pinjam(Array('<?=$bar->kode_barang?>','<?=$bar->nama_barang?>','<?=$bar->jml_barang?>'))">Pinjam</a>
                  </div>
                </div>
              </div>
            <?php } ?>
          </div>
        </p>
      </div>
    </div>
  </div>
  <div class="col d-none d-lg-block"></div>
</div>
