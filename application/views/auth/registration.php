  <!-- Masthead -->
  <header class="masthead">
    <div class="container h-100">
      <div class="row h-50 align-items-center justify-content-center text-center text-white">
          <form class="user" method="post" action="<?= base_url('auth/registration'); ?>">
               <div class="form-group">
                  <label for="exampleInputEmail1">REGISTRASI AKUN</label>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" id="name" name="name"  aria-describedby="nameHelp" placeholder="Masukan Nama Lengkap" value="<?=set_value('name'); ?>">
                  <?= form_error('name','<small class="text-danger" pl-3>','</small>'); ?>
                 </div>
                  <div class="form-group">
                     <input type="text" class="form-control form-control-user" id="email" name="email"  placeholder="Masukan Email" value="<?=set_value('email'); ?>">
                     <?= form_error('email','<small class="text-danger" pl-3>','</small>'); ?>
                  </div>
                   <div class="form-group">
                     <input type="text" class="form-control form-control-user" id="nomor_telepon" name="nomor_telepon"  placeholder="Masukan Nomor Telepon" value="<?=set_value('nomor_telepon'); ?>">
                     <?= form_error('nomor_telepon','<small class="text-danger" pl-3>','</small>'); ?>
                  </div>
                  <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="password" class="form-control form-control-user" name="password1" id="password1" placeholder="Masukan Password" >
                    <?= form_error('password1','<small class="text-danger" pl-3>','</small>'); ?>
                  </div>
                  <div class="col-sm-6">
                    <input type="password" class="form-control form-control-user" name="password2" id="password2" placeholder="Ulangi Password">
                  </div>
                </div>
                <button type="submit" class="btn btn-primary btn-user btn-block">
                  Buat Akun
                </button>
                 <a class="small" href="<?=base_url('auth'); ?>">Sudah Memiliki Akun? Login!</a>
              </form>

      </div>
    </div>
  </header>

  <!-- About Section -->