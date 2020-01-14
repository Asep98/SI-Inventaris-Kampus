<div class="row d-flex h-100" style="min-height: 100vh;">
  <div class="col d-none d-lg-block"></div>
  <div class="col col-lg-8 justify-content-center align-self-center">
    <div class="card my-5">
      <div class="card-body">
        <h3 class="card-title">
          <?=$pageHeader?>
          <a href="<?=base_url('front/menu')?>" class="btn btn-primary btn-sm rounded-pill float-right">Kembali</a>
        </h3>
        <table class="table table-responsive">
          <thead>
            <tr>
              <th scope="col">No.</th>
              <th scope="col">Barang Yang Dipinjam</th>
              <th scope="col">Tanggal Peminjaman</th>
              <th scope="col">Tanggal Pengembalian</th>
            </tr>
          </thead>
          <tbody>
            <?php $no=1; foreach($db['barang'] as $b){?>
            <tr>
              <th scope="row"><?=$no++?></th>
              <td><?=$this->CRUD->get_row_where('barang','kode_barang', $b->kode_barang)->nama_barang?></td>
              <td><?=date('d M Y', strtotime($b->tgl_pinjam))?></td>
              <td><?=(isset($b->tgl_kembali)) ? date('d M Y', strtotime($b->tgl_kembali)) : 'Belum Dikembalikan' ?></td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <div class="col d-none d-lg-block"></div>
</div>