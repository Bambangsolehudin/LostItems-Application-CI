<div class="container-fluid">
	<h1>Edit Barang</h1>
	<div class="row">
		<div class="col-lg-8">

			<?= form_open_multipart('user/update');?>
			<input type="hidden" name="id" value="<?=$edit['id']; ?>">
			<input type="hidden" name="user_id" value="<?=$edit['user_id']; ?>">
			<input type="hidden" name="contact" value="<?=$edit['contact']; ?>">
			<div class="form-group row">
				<label for="email" class="col-sm-2 col-form-label">Nama</label>
				<div class="col-sm-10">
					<input type="text" name="nama" class="form-control" id="nama" value="<?=$edit['nama']; ?>">
					<?= form_error('nama','<small class="text-danger" pl-3>','</small>'); ?>
				</div>
			</div>
			<div class="form-group row">
             <label for='kategori' class="col-sm-2 col-form-label">Kategori</label>
             <div class="col-sm-10">
              <select class="form-control" id="kategori" name="kategori">
                
                <?php foreach ($kategori as $v) :?>
                  <?php if($v == $edit['kategori']) :?>
                    <option value="<?=$v ?>" selected><?=$v ?></option>
                    <?php else: ?>
                      <option value="<?=$v ?>"><?=$v ?></option> 
                    <?php endif; ?>
                    
                  <?php endforeach; ?>
                </select>
            </div>
                
            </div>
			<div class="form-group row">
             <label for='status' class="col-sm-2 col-form-label">Tipe</label>
             <div class="col-sm-10">
              <select class="form-control" id="tipe" name="tipe">
                
                <?php foreach ($tipe as $v) :?>
                  <?php if($v == $edit['tipe']) :?>
                    <option value="<?=$v ?>" selected><?=$v ?></option>
                    <?php else: ?>
                      <option value="<?=$v ?>"><?=$v ?></option> 
                    <?php endif; ?>
                    
                  <?php endforeach; ?>
                </select>
            </div>
                
            </div>
			<div class="form-group row">
				<label for="name" class="col-sm-2 col-form-label">Deskripsi</label>
				<div class="col-sm-10">
					<input type="text" name="deskripsi" class="form-control" id="deskripsi" value="<?=$edit['deskripsi']; ?>">
					<?= form_error('deskripsi','<small class="text-danger" pl-3>','</small>'); ?>
				</div>
			</div>
			<div class="form-group row">
             <label for='status' class="col-sm-2 col-form-label">Status</label>
             <div class="col-sm-10">
              <select class="form-control" id="status" name="status">
                
                <?php foreach ($status as $v) :?>
                  <?php if($v == $edit['status']) :?>
                    <option value="<?=$v ?>" selected><?=$v ?></option>
                    <?php else: ?>
                      <option value="<?=$v ?>"><?=$v ?></option> 
                    <?php endif; ?>
                    
                  <?php endforeach; ?>
                </select>
            </div>
                
            </div>
            <div class="form-group row">
				<label for="name" class="col-sm-2 col-form-label">Kontak</label>
				<div class="col-sm-10">
					<input type="text" name="contact" class="form-control" id="contact" value="<?=$edit['contact']; ?>">
					<?= form_error('contact','<small class="text-danger" pl-3>','</small>'); ?>
				</div>
			</div>
			<div class="col-sm-2">Picture</div>
			<div class="col-sm-10">
				<div class="row">
					<div class="col-sm-3">
						<img src="<?= base_url('assets/img/barang/') . $edit['image']; ?>" class="img-thumbnail">
					</div>
					<div class="col-sm-9">
						<div class="custom-file">
							<input type="file" class="custom-file-input" id="image" name="image" >
							<label class="custom-file-label" for="image">Choose file</label>
							<p>max ukuran gambar = 2 mb</p>
						</div>
					</div>
				</div>

			</div>

			<div class="form-group row justify-content-end"></div>
			
			<div class="col-sm-10">
				<br>
				<button type="submit" class="btn btn-dark">edit</button>
			</div>
		</div>
	</div>
</form>

</div>
</div>



