<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>


  <div class="row">
	<div class="col-lg">
		<?= form_error('sampah', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
		<?= $this->session->flashdata('message'); ?>
		
		<div class="card shadow mb-5">
			<div class="card-header py-3">
            	<h6 class="m-0 font-weight-bold text-secondary"><i class="fas fa-fw fa-table"></i> Manage Sampah</h6>
            </div>
            <div class="card-body">
            	<a href="" class="btn btn-success mb-4 mt-1" data-toggle="modal" data-target="#addSampahModal">Add New Sampah</a>
				<table class="table table-hover mb-4" id="dataTable" width="100%">
				  <thead>
				    <tr>
				      <th scope="col">#</th>
				      <th scope="col">Kode Sampah</th>
				      <th scope="col">Nama Sampah</th>
				      <th scope="col">Jenis Sampah</th>
				      <th scope="col">Harga/Kg</th>
				      <th scope="col">Total(Kg)</th>
				      <th scope="col">Gambar</th>
				      <th scope="col">Action</th>

				    </tr>
				  </thead>
				  <tbody>
				  	<?php $i = 1; ?>
				  	<?php foreach ($sampahName as $s) : $trash_id = $s['trash_id']; ?>
				      
				    <tr>
				      <th scope="row"><?= $i; ?></th>
				      <td><?= $s['trash_code']; ?></td>
				      <td><?= $s['trash_name']; ?></td>
				      <td><?= $s['trash_type']; ?></td>
				      <td><?= $s['price']; ?></td>
				      <td><?= $s['size']; ?></td>
				      <td><img src="<?= base_url('assets/img/sampah/') . $s['image']; ?>" class="card-img" height="50px" alt="Sampah"></td>
				      <td>
				      	<a href="#editSampahModal<?= $trash_id; ?>" data-toggle="modal" class="badge badge-success">Edit</a>
				      	<a href="#deleteSampahModal<?= $trash_id; ?>" data-toggle="modal" class="badge badge-danger">Delete</a>
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
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->


<!--Modal Add New Sampah -->
<div class="modal fade" id="addSampahModal" tabindex="-1" role="dialog" aria-labelledby="addSampahModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="titleaddSampahModal">Add New Sampah</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('sampah'); ?>" method="post">
	      <div class="modal-body">
	      	<div class="form-group">
				<input type="text" class="form-control" id="trashCode" name="trashCode" placeholder="Kode Sampah">
			</div>
			<div class="form-group">
				<input type="text" class="form-control" id="sampahName" name="sampahName" placeholder="Nama Sampah">
			</div>
			<div class="form-group">
				<select class="form-control" id="sampahJenis" name="sampahJenis">
					<option value="Plastik">Plastik</option>
					<option value="Besi">Besi</option>
					<option value="Kertas">Kertas</option>
				</select>
			</div>
			<div class="form-group">
				<input type="text" class="form-control" id="sampahHarga" name="sampahHarga" placeholder="Harga Sampah">
			</div>
			<div class="form-group">
				<?= form_open_multipart('sampah/index'); ?>
				<div>
					<div class="custom-file">
					  <input type="file" class="custom-file-input" id="image" class="image">
					  <label class="custom-file-label" for="image">Pilih Gambar</label>
					</div>
				</div>
			</div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	        <button type="submit" class="btn btn-success">Add</button>
	      </div>
  	  </form>
    </div>
  </div>
</div>


<!--Modal Edit Menu -->
<?php foreach ($sampahName as $s) : 
	$trash_id = $s['trash_id']; 
	$trash_code = $s['trash_code']; 
	$trash_name = $s['trash_name']; 
?>
<div class="modal fade" id="editSampahModal<?= $trash_id; ?>" tabindex="-1" role="dialog" aria-labelledby="editSampahModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="titleEditSampahModal">Edit Sampah</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('sampah/editSampah'); ?>" method="post">
	      <div class="modal-body">
			<div class="form-group">
				<input type="hidden" class="form-control" id="trashId" name="trashId" value="<?= $trash_id; ?>">
				<input type="text" class="form-control" id="trashCode" name="trashCode" value="<?= $trash_code; ?>">
			</div>
			<div class="form-group">
				<input type="text" class="form-control" id="trashName" name="trashName" value="<?= $trash_name; ?>">
			</div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	        <button type="submit" class="btn btn-success">Save Changes</button>
	      </div>
  	  </form>
    </div>
  </div>
</div>
<?php endforeach; ?>

<!--Modal Delete Menu -->
<?php foreach ($sampahName as $s) : $trash_id = $s['trash_id']; $trash_name = $s['trash_name']; ?>
<div class="modal fade" id="deleteSampahModal<?= $trash_id; ?>" tabindex="-1" role="dialog" aria-labelledby="deleteSampahModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="titleDeleteModal">Delete Sampah</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url().'sampah/deleteSampah' ?>" method="post">
	      <div class="modal-body">
			Apakah kamu yakin ingin menghapus <?= $trash_name; ?>?
	      </div>
	      <div class="modal-footer">
	      	<input type="hidden" name="trashId" value="<?= $trash_id; ?>">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	        <button type="submit" class="btn btn-success">Confirm</button>
	      </div>
  	  </form>
    </div>
  </div>
</div>
<?php endforeach; ?>