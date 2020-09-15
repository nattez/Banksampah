<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>


  <div class="row">
	<div class="col-lg">
		<?= form_error('nasabah', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
		<?= $this->session->flashdata('message'); ?>
		
		<div class="card shadow mb-5">
			<div class="card-header py-3">
            	<h6 class="m-0 font-weight-bold text-secondary"><i class="fas fa-fw fa-table"></i> Manage Nasabah</h6>
            </div>
            <div class="card-body">
            	<a href="" class="btn btn-success mb-4 mt-1" data-toggle="modal" data-target="#addNasabahModal">Add New Nasabah</a>
				<table class="table table-hover mb-4" id="dataTable" width="100%">
				  <thead>
				    <tr>
				      <th scope="col">#</th>
				      <th scope="col">No.Rekening</th>
				      <th scope="col">No.HP</th>
				      <th scope="col">Nama Lengkap</th>
				      <th scope="col">Total Berat Sampah(Kg)</th>
				      <th scope="col">Saldo</th>
				      <th scope="col">Action</th>

				    </tr>
				  </thead>
				  <tbody>
				  	<?php $i = 1; ?>
				  	<?php foreach ($nasabahName as $n) : $user_id = $n['user_id']; ?>
				      
				    <tr>
				      <th scope="row"><?= $i; ?></th>
				      <td><?= $n['rekening_id']; ?></td>
				      <td><?= $n['phone_number']; ?></td>
				      <td><?= $n['fullname']; ?></td>
				      <td><?= $n['user_trash_size']; ?></td>
				      <td><?= $n['balance']; ?></td>
				      <td>
				      	<a href="#editNasabahModal<?= $user_id; ?>" data-toggle="modal" class="badge badge-success">Edit</a>
				      	<a href="#deleteNasabahModal<?= $user_id; ?>" data-toggle="modal" class="badge badge-danger">Delete</a>
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


<!--Modal Add New Nasabah -->
<div class="modal fade" id="addNasabahModal" tabindex="-1" role="dialog" aria-labelledby="addNasabahModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="titleaddNasabahModal">Add New Nasabah</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('nasabah'); ?>" method="post">
	      <div class="modal-body">
	      	<input type="hidden" class="form-control" id="roleId" name="roleId" value="3">
	      	<input type="hidden" class="form-control" id="nasabahLevel" name="nasabahLevel" value="1">
	      	<input type="hidden" class="form-control" id="image" name="image" value="default.png">
	      	<input type="hidden" class="form-control" id="nasabahDummyPoints" name="nasabahDummyPoints" value="100">
	      	<div class="form-group">
				<input type="text" class="form-control" id="nasabahUsername" name="nasabahUsername" placeholder="Username">
			</div>
			<div class="form-group">
				<input type="text" class="form-control" id="nasabahPassword" name="nasabahPassword" placeholder="Password">
			</div>
	      	<div class="form-group">
				<input type="text" class="form-control" id="rekeningId" name="rekeningId" placeholder="Nomor Rekening">
			</div>
			<div class="form-group">
				<input type="text" class="form-control" id="nasabahName" name="nasabahName" placeholder="Nama Nasabah">
			</div>
			<div class="form-group">
				<input type="text" class="form-control" id="nasabahAlamat" name="nasabahAlamat" placeholder="Alamat">
			</div>
			<div class="form-group">
				<input type="text" class="form-control" id="nasabahHp" name="nasabahHp" placeholder="No HP">
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
<?php foreach ($nasabahName as $n) : 
	$user_id = $n['user_id']; 
	$rekening_id = $n['rekening_id']; 
	$fullname = $n['fullname']; 
?>
<div class="modal fade" id="editNasabahModal<?= $user_id; ?>" tabindex="-1" role="dialog" aria-labelledby="editNasabahModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="titleEditNasabahModal">Edit Nasabah</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('nasabah/editNasabah'); ?>" method="post">
	      <div class="modal-body">
			<div class="form-group">
				<input type="hidden" class="form-control" id="userId" name="userId" value="<?= $user_id; ?>">
				<input type="text" class="form-control" id="rekeningId" name="rekeningId" value="<?= $rekening_id; ?>">
			</div>
			<div class="form-group">
				<input type="text" class="form-control" id="nasabahName" name="nasabahName" value="<?= $fullname; ?>">
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
<?php foreach ($nasabahName as $n) : $user_id = $n['user_id']; $fullname = $n['fullname']; ?>
<div class="modal fade" id="deleteNasabahModal<?= $user_id; ?>" tabindex="-1" role="dialog" aria-labelledby="deleteNasabahModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="titleDeleteModal">Delete Menu</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url().'nasabah/deleteNasabah' ?>" method="post">
	      <div class="modal-body">
			Apakah kamu yakin ingin menghapus <?= $fullname; ?>?
	      </div>
	      <div class="modal-footer">
	      	<input type="hidden" name="userId" value="<?= $user_id; ?>">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	        <button type="submit" class="btn btn-success">Confirm</button>
	      </div>
  	  </form>
    </div>
  </div>
</div>
<?php endforeach; ?>