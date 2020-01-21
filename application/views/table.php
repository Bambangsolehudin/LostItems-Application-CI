<?php  include 'template/header.php'?>
<body>
	<div class="container">
		<a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#tambahdata"> Tambah Data</a> 
		<a href="<?= base_url() ?>Auth/logout" class="btn btn-primary mb-3"> Logout</a> 
	<div class="card">
	<?=$this->session->flashdata('message'); ?>
	
	<table class="table table-striped text-center" id="example">
		<thead class="">
		<tr>
			<th rowspan="2">NO</th>
			<th rowspan="2">NPM</th>
			<th rowspan="2">NAMA</th>
			<th colspan="3">MATA KULIAH</th>
			<th rowspan="2">AKSI</th>
		</tr>
		<tr>
			<th rowspan="1">P. WEB</th>
			<th rowspan="1">J. KOMPUTER LANJUT</th>
			<th rowspan="1">T. KOMPILASI</th>
			
		</tr>
		</thead>
		<tbody>
		<?php $i=1; ?>

			<?php foreach ($nilai as $m ) :  ?>
			    <tr>

			      <th scope="row"><?= $i; ?></th>
			      <td><?= $m['npm'];?></td>
			      <td><?= $m['nama'];?></td>
			      <td><?= $m['p_web'];?></td>
			      <td><?= $m['jarlan'];?></td>
		          <td><?= $m['t_kompilasi'];?></td>
			      <td>     
			     	<a href="<?=base_url();?>welcome/edit/<?=$m['id']; ?>" class="badge badge-primary mb-3" > Edit</a> 
			     	<a href="<?=base_url();?>welcome/delete/<?=$m['id']; ?>" class="badge badge-danger" onclick="return confirm('yakin?');">delete</a>	      		
			      </td>
			    </tr>
			    <?php $i++; ?>
			<?php endforeach; ?>
			
		</tbody>
	</table>
	</div>
	</div>
</body>
<?php  include 'template/footer.php'?>

<!-- Modals  -->

<div class="modal fade" id="tambahdata" tabindex="-1" role="dialog" aria-labelledby="newRoleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newRoleModalLabel">Tambah Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?=base_url('welcome/table'); ?>" method="post" >
      <div class="modal-body">
        <div class="form-group">
	    <input type="text" class="form-control" id="role" name="npm" placeholder="NPM">
  		</div>
  		<div class="form-group">
	    <input type="text" class="form-control" id="role" name="nama" placeholder="Nama">
  		</div>
  		<div class="form-group">
	    <input type="text" class="form-control" id="role" name="p_web" placeholder="Pemrograman Web">
  		</div>
        <div class="form-group">
	    <input type="text" class="form-control" id="role" name="jarlan" placeholder="Jaringan Komputer Lanjut">
  		</div>
  		 <div class="form-group">
	    <input type="text" class="form-control" id="role" name="t_kompilasi" placeholder="Teknik Kompilasi">
  		</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Add</button>
        </form>
      </div>
    </div>
  </div>
</div>



