<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->

  <div class="row">
	<div class="col-lg">
		
		<div class="card border-bottom-success shadow mb-5">
			<div class="card-header py-3">
            	<h6 class="m-0 font-weight-bold text-success"><i class="fa fa-trophy"></i> Leaderboards</h6>
            </div>
            <div class="card-body">
             <div class="table-responsive">
				<table class="table table-hover mb-4" id="" width="100%">
				  <thead>
				    <tr>
				      <th scope="col">Rank</th>
				      <th scope="col">Nasabah</th>
				      <th scope="col">Total Points</th>
				      <th scope="col">Action</th>
				    </tr>
				  </thead>
				  <tbody>
				  	<?php $i = 1; ?>
				  	<?php foreach ($leaderboardsName as $ls) : $user_id = $ls['user_id']; ?>
				      
				    <tr>
				      <th scope="row"><?= $i; ?></th>
				      <td>
				      	<img style="border-radius: 50%; border: 2px solid #1cc88a; height: 30px; width: 35px;" src="<?= base_url('assets/img/profile/') . $ls['image']; ?>" class="card-img mr-2" alt="..."><?= $ls['fullname']; ?>
				      </td>
				      <td><?= $ls['user_points']; ?></td>
				      <td>
				      	<a href="#showProfilesModal<?= $user_id; ?>" data-toggle="modal" class="badge badge-success">Lihat Profile</a>
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


<!--Modal Show Profiles -->
<?php foreach ($leaderboardsName as $ls) : 
	$user_id = $ls['user_id']; 
	$rekening_id = $ls['rekening_id']; 
	$fullname = $ls['fullname'];
	$user_points = $ls['user_points'];
	$user_dummy_points = $ls['user_dummy_points'];
	$user_level = $ls['user_level'];
	$user_progress = $ls['user_progress'];
	$image = $ls['image'];
?>
<div class="modal fade" id="showProfilesModal<?= $user_id; ?>" tabindex="-1" role="dialog" aria-labelledby="showProfilesModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="titleShowProfilesModal">Profile Nasabah</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('leaderboards/showProfiles'); ?>" method="post">
	      <div class="modal-body">
			<div class="form-group mr-3 ml-3">
				<div class="text-center mb-3"><img style="border-radius: 50%; border: 4px solid #1cc88a; height: 150px; width: 170px;" src="<?= base_url('assets/img/profile/') . $image; ?>" class="card-img mt-4" alt="..."></div>
				<h5 class="text-center mb-5"><b><?= $fullname; ?></b></h5>
	            <h4 class="small font-weight-bold">Level <?= $user_level; ?>  <span class="float-right"><?= $user_points; ?>/<?= $user_dummy_points; ?>pts</span></h4>
	            <div class="progress mb-4">
	              <div class="progress-bar bg-success" role="progressbar" style="width: <?= $user_progress; ?>%"></div>
	            </div>
			</div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	      </div>
  	  </form>
    </div>
  </div>
</div>
<?php endforeach; ?>

