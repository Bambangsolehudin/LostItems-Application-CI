  <!-- Masthead -->
  <header class="masthead">
    <div class="container h-100">
      <div class="row h-50 align-items-center justify-content-center text-center text-white">
          
    
           <form class="user" method="post" action="<?= base_url('auth');?>">

              <div class="form-group">
                  <label for="exampleInputEmail1">SILAHKAN LOGIN</label>
                  <?= $this->session->flashdata('message'); ?>
                </div>
               <div class="form-group">
                 <input type="text" class="form-control form-control-user" id="email" name="email"  aria-describedby="emailHelp" placeholder="Masukan Email" value="<?=set_value('email'); ?>">
                <?= form_error('email','<small class="text-danger" pl-3>','</small>'); ?>
              </div>

              <div class="form-group">
                <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Masukan Password">
                <?= form_error('password','<small class="text-danger" pl-3>','</small>'); ?>
               </div>
                                       
                 <button type="submit" class="btn btn-primary btn-user btn-block">
                  Login
                </button>
                       <a class="small" href="<?=base_url('auth/registration'); ?>">buat akun baru!</a>                   
             </form>

      </div>
    </div>
  </header>

  <!-- About Section -->