<?php  include 'template/header.php'?>
<div class="container">
	<div class="row">
		<div class="col-md-4">
			
		</div>
		<div class="col-md-4">
			<div class="card" style="width: 22rem;">
			<div class="card-header">
		    Edit Data Nilai
		  	</div>
			 <div class="modal-content">
			    <div class="card-body md-auto">
		   			<form action="<?=base_url('welcome/update/'); ?>/<?=$edit['id'];  ?>" method="post" >
				      <div class="modal-body">
				        <div class="form-group">
					    <input type="text" class="form-control" id="role" name="npm" value="<?=$edit['npm'];  ?>">
				  		</div>
				  		<div class="form-group">
					    <input type="text" class="form-control" id="role" name="nama" value="<?=$edit['nama'];  ?>">
				  		</div>
				  		<div class="form-group">
					    <input type="text" class="form-control" id="role" name="p_web" value="<?=$edit['p_web'];  ?>">
				  		</div>
				        <div class="form-group">
					    <input type="text" class="form-control" id="role" name="jarlan" value="<?=$edit['jarlan'];  ?>">
				  		</div>
				  		 <div class="form-group">
					    <input type="text" class="form-control" id="role" name="t_kompilasi" value="<?=$edit['t_kompilasi'];  ?>">
				  		</div>
				      </div>
				      <div class="modal-footer">
				      	<a href="<?=base_url(); ?>" class="btn btn-warning"> kembali</a>
				        <button type="submit" class="btn btn-primary">Edit</button>
				      </div>
			      </form>
		  		</div>
				</div>
			  </div>
	  </div>
	  </div>
</div>




   
<?php  include 'template/footer.php'?>