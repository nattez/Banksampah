<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

<?php

$grade= "1";
$p = 149;
$qp = 50;
$dummy = $p+$qp;

if (($dummy >= 99 AND $dummy < 200) OR ($qp < 101 AND $qp > 199)) {
    $grade = "2";
} elseif(($dummy >= 199 AND $dummy < 300) OR ($qp < 201 AND $qp > 299)){
    $grade = "3";
} elseif(($dummy >= 299 AND $dummy < 400) OR ($qp < 301 AND $qp > 399)){
    $grade = "4";
} elseif(($dummy >= 399 AND $dummy < 500) OR ($qp < 401 AND $qp > 499)){
    $grade = "5";
} 

//echo "Output: $grade";

?>

  <div class="row">
	<div class="col-lg">
		<?= form_error('quest', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
		<?= $this->session->flashdata('message'); ?>
		
		<div class="card shadow mb-5">
			<div class="card-header py-3">
            	<h6 class="m-0 font-weight-bold text-secondary"><i class="fas fa-fw fa-table"></i> Verifikasi Quest</h6>
            </div>
            <div class="card-body">
             <div class="table-responsive">
				<table class="table table-hover mb-4" id="dataTable" width="100%">
				  <thead>
				    <tr>
				      <th scope="col">#</th>
				      <th scope="col">No Hp</th>
				      <th scope="col">Nasabah</th>
				      <th scope="col">Quest</th>
				      <th scope="col">Action</th>

				    </tr>
				  </thead>
				  <tbody>
				  	<?php $i = 1; ?>
				  	<?php foreach ($verificationName as $vn) : $active_quest_id = $vn['active_quest_id']; ?>
				      
				    <tr>
				      <th scope="row"><?= $i; ?></th>
				      <td><?= $vn['phone_number']; ?></td>
				      <td><?= $vn['fullname']; ?></td>
				      <td><?= $vn['quest_name']; ?></td>
				      <td>
				      	<a href="#processQuestModal<?= $active_quest_id; ?>" data-toggle="modal" class="badge badge-success">Verification</a>
				      	<a href="#deleteQuestModal<?= $active_quest_id; ?>" data-toggle="modal" class="badge badge-danger">Delete</a>
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
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->


<!--Modal Proses Verification -->
<?php foreach ($verificationName as $vn) : 
	$active_quest_id = $vn['active_quest_id'];
	$quest_id = $vn['quest_id'];
	$user_id = $vn['user_id'];
	$user_points = $vn['user_points'];   
	$quest_name = $vn['quest_name'];
	$quest_points = $vn['points']; 
?>
<div class="modal fade" id="processQuestModal<?= $active_quest_id; ?>" tabindex="-1" role="dialog" aria-labelledby="processQuestModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="titleProcessQuestModal">Verification</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('verification/processQuest'); ?>" method="post">
	      <div class="modal-body">
			<div class="form-group">
				<input type="hidden" class="form-control" id="activequestId" name="activequestId" value="<?= $active_quest_id; ?>">
				<input type="hidden" class="form-control" id="userId" name="userId" value="<?= $user_id; ?>">
				<input type="hidden" class="form-control" id="userPoints" name="userPoints" value="<?= $user_points; ?>">
				<input type="hidden" class="form-control" id="questPoints" name="questPoints" value="<?= $quest_points; ?>">
				<input type="text" disabled class="form-control" id="questName" name="questName" value="<?= $quest_name; ?>"><br>
				<input type="text" class="form-control" id="inputSizeTrash" name="inputSizeTrash" placeholder="Berat Sampah">
			</div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	        <button type="submit" class="btn btn-success">Process</button>
	      </div>
  	  </form>
    </div>
  </div>
</div>
<?php endforeach; ?>

<!--Modal Delete Verification -->
<?php foreach ($verificationName as $vn) : $active_quest_id = $vn['active_quest_id']; $quest_name = $vn['quest_name']; ?>
<div class="modal fade" id="deleteQuestModal<?= $active_quest_id; ?>" tabindex="-1" role="dialog" aria-labelledby="deleteQuestModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="titleDeleteModal">Delete Quest</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url().'verification/deleteActiveQuest' ?>" method="post">
	      <div class="modal-body">
			Apakah kamu yakin ingin menghapus <?= $quest_name; ?>?
	      </div>
	      <div class="modal-footer">
	      	<input type="hidden" name="activequestId" value="<?= $active_quest_id; ?>">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	        <button type="submit" class="btn btn-success">Confirm</button>
	      </div>
  	  </form>
    </div>
  </div>
</div>
<?php endforeach; ?>