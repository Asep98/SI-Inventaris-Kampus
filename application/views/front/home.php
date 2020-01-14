<div class="row d-flex h-100" style="min-height: 100vh;">
  <div class="col d-none d-md-block"></div>
  <div class="col col-md-5 justify-content-center align-self-center">
    <h1 class="text-center text-white">Sistem Inventaris Sarana Prasarana Kampus</h1>
    <div class="card">
      <div class="card-body d-flex">
        <div class="text-center justify-content-center align-self-center" style="width: 100%">
          <?php echo form_open('Auth/Login', 'id="login" class="mt-3"'); ?>
            <input class="form-control mt-3 form-control-lg rounded-pill" type="text" name="uname" placeholder="NIP / Nama Pengguna / Username">
            <input class="form-control mt-3 form-control-lg rounded-pill" type="password" name="pword" placeholder="Kata Sandi">
            <button class="btn mt-2 btn-lg btn-primary rounded-pill" type="submit">Masuk</button>
          <?php echo form_close();?>
        </div>
      </div>
    </div>
  </div>
  <div class="col d-none d-md-block"></div>
</div>