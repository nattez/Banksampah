<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

  <div class="row">
	<div class="col-lg">
		<?= form_error('quest', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
		<?= $this->session->flashdata('message'); ?>
		
		<div class="card shadow mb-5">
			<div class="card-header py-3">
            	<h6 class="m-0 font-weight-bold text-secondary"><i class="fas fa-fw fa-table"></i> Manage Quest</h6>
            </div>
            <div class="card-body">
            	<a href="" class="btn btn-success mb-4 mt-1" data-toggle="modal" data-target="#addQuestModal">Add New Quest</a>
				<table class="table table-hover mb-4" id="dataTable" width="100%">
				  <thead>
				    <tr>
				      <th scope="col">#</th>
				      <th scope="col">Kode Quest</th>
				      <th scope="col">Nama Quest</th>
				      <th scope="col">Point Quest</th>
				      <th scope="col">Min Level</th>
				      <th scope="col">Info Quest</th>
				      <th scope="col">Gambar</th>
				      <th scope="col">Action</th>

				    </tr>
				  </thead>
				  <tbody>
				  	<?php $i = 1; ?>
				  	<?php foreach ($questName as $qs) : $quest_id = $qs['quest_id']; ?>
				      
				    <tr>
				      <th scope="row"><?= $i; ?></th>
				      <td><?= $qs['quest_code']; ?></td>
				      <td><?= $qs['quest_name']; ?></td>
				      <td><?= $qs['points']; ?></td>
				      <td><?= $qs['min_level']; ?></td>
				      <td><?= $qs['info']; ?></td>
				      <td><img src="<?= base_url('assets/img/quest/') . $qs['image']; ?>" class="card-img" height="50px" alt="Sampah"></td>
				      <td>
				      	<a href="#editQuestModal<?= $quest_id; ?>" data-toggle="modal" class="badge badge-success">Edit</a>
				      	<a href="#deleteQuestModal<?= $quest_id; ?>" data-toggle="modal" class="badge badge-danger">Delete</a>
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


<!--Modal Add New Quest -->
<div class="modal fade" id="addQuestModal" tabindex="-1" role="dialog" aria-labelledby="addQuestModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="titleaddQuestModal">Add New Quest</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('quest'); ?>" method="post">
	      <div class="modal-body">
	      	<div class="form-group">
				<input type="text" class="form-control" id="questCode" name="questCode" placeholder="Kode Quest">
			</div>
			<div class="form-group">
				<input type="text" class="form-control" id="questName" name="questName" placeholder="Nama Quest">
			</div>
			<div class="form-group">
				<input type="text" class="form-control" id="questPoint" name="questPoint" placeholder="Point Quest">
			</div>
			<div class="form-group">
				<input type="text" class="form-control" id="questLevel" name="questLevel" placeholder="Min Level">
			</div>
			<div class="form-group">
				<input type="text" class="form-control" id="questInfo" name="questInfo" placeholder="Info Quest">
			</div>
			<div class="form-group">
				<select class="form-control" id="sampahName" name="sampahName">
					<option selected>--Nama Sampah--</option>
					<option value="Kaleng">Kaleng</option>
					<option value="Botol Plastik">Botol Plastik</option>
					<option value="Koran Bekas">Koran Bekas</option>
					<option value="Besi">Besi</option>
				</select>
			</div>
			<div class="form-group">
				<input type="text" class="form-control" id="questTrashSize" name="questTrashSize" placeholder="Berat Sampah">
			</div>
			<div class="form-group">
				<?= form_open_multipart('quest/index'); ?>
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
<?php foreach ($questName as $qs) : 
	$quest_id = $qs['quest_id']; 
	$quest_code = $qs['quest_code']; 
	$quest_name = $qs['quest_name']; 
?>
<div class="modal fade" id="editQuestModal<?= $quest_id; ?>" tabindex="-1" role="dialog" aria-labelledby="editQuestModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="titleEditQuestModal">Edit Quest</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('quest/editQuest'); ?>" method="post">
	      <div class="modal-body">
			<div class="form-group">
				<input type="hidden" class="form-control" id="questId" name="questId" value="<?= $quest_id; ?>">
				<input type="text" class="form-control" id="questCode" name="questCode" value="<?= $quest_code; ?>">
			</div>
			<div class="form-group">
				<input type="text" class="form-control" id="questName" name="questName" value="<?= $quest_name; ?>">
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
<?php foreach ($questName as $qs) : $quest_id = $qs['quest_id']; $quest_name = $qs['quest_name']; ?>
<div class="modal fade" id="deleteQuestModal<?= $quest_id; ?>" tabindex="-1" role="dialog" aria-labelledby="deleteQuestModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="titleDeleteModal">Delete Quest</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url().'quest/deleteQuest' ?>" method="post">
	      <div class="modal-body">
			Apakah kamu yakin ingin menghapus <?= $quest_name; ?>?
	      </div>
	      <div class="modal-footer">
	      	<input type="hidden" name="questId" value="<?= $quest_id; ?>">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	        <button type="submit" class="btn btn-success">Confirm</button>
	      </div>
  	  </form>
    </div>
  </div>
</div>
<?php endforeach; ?>