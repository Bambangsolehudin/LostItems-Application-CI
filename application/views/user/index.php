
        <!-- Begin Page Content -->
        <div class="container-fluid">
          <?=$this->session->flashdata('message'); ?>
                 <div class="col">
                  <form method="post">
                    <div class="input-group mb-3 col-md-5">
                      <input type="text" class="form-control" placeholder="Cari Data Barang ..." name="keyword">
                      <div class="input-group-append">
                      <button class="btn btn-dark" type="submit" >Cari</button>
                    </div>
                  </form>
                  </div>
                  <br>
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                   <i class="fas fa-plus-circle"></i> Buat Pengumuman
                  </button>
                  
                  <a href="<?=base_url() ?>user/barang_temuan" class="btn btn-warning"> <i class="fas fa-times-circle"></i> Barang Temuan</a>
                  <a href="<?= base_url() ?>user/barang_hilang" class="btn btn-danger"><i class="fas fa-truck-loading"></i> Barang Hilang</a>
                  <a href="<?=base_url() ?>user" class="btn btn-success"><i class="fas fa-reply-all"></i>  Tampilkan Semua</a>

        <hr>
          <div class="row">
            <div class="card-group">
            <?php foreach ($barang as $b ) :  ?>
            <div class=" col-md-3 ">
             <div class="card text-center mb-3" style="width: 14rem; height: 21rem;">

              <img src="<?= base_url('assets/img/barang/') . $b['image']; ?>" class="card-img-top img-thumbnail" alt="Responsive image">
                <div class="card-body">
                  <p class="card-text text-dark"><?= $b['nama'];?></p>
                  <small class="text-danger"><?= $b['deskripsi'];?></small> |
                  <a href="<?= base_url() ?>/user/detail/<?= $b['id'];  ?>" class="badge badge-dark">detail</a>
                </div>
              </div>
            </div>
             
           <?php endforeach; ?> 

          </div>
          </div>
        </div>
      </form>

<!-- modals upload -->
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Buat Pengumuman</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">



      <?= form_open_multipart('user/tambah_barang') ?>
          <div class="form-group">
            <input type="file"  id="foto" name="image" placeholder="pilih gambar">  
            <p>Masukan gambar || <span style="color: red;">max ukuran = 2mb</span></p>
          </div>

          <div class="form-group">
            <input type="text" class="form-control" id="role" name="nama" placeholder="Nama Barang">
          </div>
          <div class="form-group">
            <select class="form-control" id="tipe" name="kategori">
                <option value="">Pilih Kategori</option>
                <option value="elektronik">Elektronik</option>
                <option value="tas">Tas</option>
                <option value="surat penting">Surat Penting</option>
                <option value="buku">Buku</option>
                <option value="jaket">Jaket</option>
                <option value="aksesoris">Aksesoris</option>
                <option value="lain-lain">lain-lain</option>
            </select>
          </div>
          <div class="form-group">
            <select class="form-control" id="tipe" name="tipe">
                <option value="">pilih tipe</option>
                <option value="barang hilang">Barang Hilang</option>
                <option value="barang temuan">Barang Temuan</option>
            </select>
          </div>
          <div class="form-group">
            <textarea name="deskripsi" class="form-control" placeholder="deskripsi"></textarea>
          </div>
          <input type="hidden" name="user_id" value="<?= $user['id']; ?>">
          <input type="hidden" name="contact" value="<?= $user['nomor_telepon']; ?>">
          <input type="hidden" name="status" value="belum terverifikasi">
              <button type="reset" class="btn btn-danger" data-dismiss="modal">reset</button>
              <button type="submit" class="btn btn-primary">upload</button>
      </div>
      <?= form_close(); ?>

    </div>
  </div>
</div>


  
