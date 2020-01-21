<div class="container-fluid">

 <div class="row">
  
    <div class="card">
      <div class="card-body">
        <div class="col-md-auto">    
         <?=$this->session->flashdata('message'); ?>
      
                         
        
          <div class="row mt-3">
           
              
            
            </div>
            <table class="table table-hover text-dark" id="myTable">
              <thead>
               <tr>
                 <th scope="col">#</th>
                 <th>foto</th>
                 <th scope="col">Nama</th>                
                 <th scope="col">Kategori</th>    
                 <th scope="col">Tipe</th> 
                 <th scope="col">deskripsi</th> 
                 <th scope="col">kontak</th> 
                 <th scope="col">status</th> 
                 <th>Aksi</th>

                
                             
               </tr>
             </thead>
             <tbody>
               <?php $i=1; ?>
               <?php foreach ($barang as $m ) :  ?>
                 <tr>
                   <th scope="row"><?= $i; ?></th>  
                   <td style="width: 100px;"><img src="<?= base_url('assets/img/barang/') . $m['image']; ?>" class="card-img-top"></td>
                   <td><?= $m['nama'];?></td>
                   <td><?= $m['kategori'];?></td>
                   <td><?= $m['tipe'];?></td>
                   <td><?= $m['deskripsi'];?></td>
                   <td><?= $m['contact'];?></td>
                   <td><?= $m['status'];?></td>
                   <td>
                   
                    <a href="<?=base_url();?>user/edit1/<?=$m['id']; ?>" class="badge badge-success"><i class="fas fa-edit"></i></a> 
                    <a href="<?=base_url();?>user/delete1/<?=$m['id']; ?>"  class="badge badge-danger" onclick="return confirm('yakin?');"><i class="fas fa-trash-alt" ></i></a>       
                  </td>
                </tr>
                <?php $i++; ?>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>







    </div>
  </div>
</div>
</div>










