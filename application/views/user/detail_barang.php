<div class="container-fluid">
   <!--  -->

   <div class="row justify-content-md-center">

    <div class="col-md-auto">
    <div class="card" style="width: 600px;">
        <div class="card-header bg-dark text-white">
          Detail Data Barang
        </div>
          
            <div class="card-body text-dark">
              <img src="<?= base_url('assets/img/barang/') . $detail['image']; ?>" class="img-thumbnail" >
                  <table >

                      <tr>
                          <td>Nama Barang</td>
                          <td>:</td>
                          <td><?=$detail['nama']; ?></td>
                      </tr>
                      <tr>
                          <td>Kategori</td>
                          <td>:</td>
                          <td><?=$detail['kategori'];?></td>
                      </tr>
                      <tr>
                          <td> Deskripsi</td>
                          <td>:</td>
                          <td> <?=$detail['deskripsi'] ?></td>
                      </tr>
                      <tr>
                          <td>Tipe</td>
                          <td> :</td>
                          <td> <?=$detail['tipe'] ?></td>
                      </tr>
                      <tr>
                          <td>Hubungi</td>
                          <td> : </td>
                          <td><?= $detail['contact']; ?></td>
                      </tr>
                      <tr>
                          <td>Status</td>
                          <td> : </td>
                          <td><?= $detail['status']; ?></td>
                      </tr>
                  </table>                             
            </div>
          </div>

  

</div>
</div>
</div>



