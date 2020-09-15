<!-- Begin Page Content -->
<div class="container-fluid">
<?php
//var_dump($this->session->userdata())
?>
	<div class="row">
	<?php foreach ($questsName as $qs) : $quests_id = $qs['quest_id']; ?> 
	 <div class="col-xl-12 col-md-12 mb-4">
	    <div class="card border-left-success shadow h-100 py-2">
	      <div class="card-body">
	        <div class="row no-gutters align-items-center">
	          <div class="col mr-2">
	            <div class="font-weight-bold text-success text-uppercase mb-2"><?= $qs['quest_name']; ?></div>
	            <!-- <div class="text-gray-800 mb-3"><?= $qs['info']; ?></div> -->
	            <img style="width: 100px; height: 100px;" src="<?= base_url('assets/img/quest/') . $qs['image']; ?>" class="card-img mb-3" alt="Sampah Kaleng">
	          </div>
	          <div class="col-auto">
	            <div class="h5 font-weight-bold text-gray-800 mb-4 mr-4"><i class="fa fa-gift fa-1x text-gray-300"></i> +<?= $qs['points']; ?> Points</div>
	            <a href="#takeQuestsModal<?= $quests_id; ?>" data-toggle="modal" class="btn btn-success">Ambil Quest</a>
	          </div>
	        </div>
	      </div>
	    </div>
	  </div>
	<?php endforeach; ?>  
	</div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!--Modal Take Quests-->
<?php foreach ($questsName as $qs) : 
	$quests_id = $qs['quest_id']; 
	$quests_name = $qs['quest_name'];
	$quests_trash_size = $qs['quest_trash_size'];
	$quests_info = $qs['info'];
	$points = $qs['points']; 
?>
<div class="modal fade" id="takeQuestsModal<?= $quests_id; ?>" tabindex="-1" role="dialog" aria-labelledby="takeQuestsModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="titleTakeQuestsModal">Ambil Quest</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('quests/takeQuests') ?>" method="post">
	      <div class="modal-body">
	      	<div class="font-weight-bold text-success text-uppercase mb-2"><?= $qs['quest_name']; ?></div>
	      	<?= $qs['info']; ?><br><br>
	      	<img style="width: 100px; height: 100px;" src="<?= base_url('assets/img/quest/') . $qs['image']; ?>" class="card-img mb-3" alt="Sampah Kaleng"><br>
	      	<br>
			<div class="h5 font-weight-bold text-gray-800 mb-4 mr-4"><i class="fa fa-gift fa-1x text-gray-300"></i> +<?= $qs['points']; ?> Points</div>
	      	<hr>
			Apakah kamu yakin ingin mengambil quest <i>"<?= $quests_name; ?>"</i>?
	      </div>
	      <div class="modal-footer">
	      	<input type="hidden" name="questsId" value="<?= $quests_id; ?>">
	      	<input type="hidden" name="questsName" value="<?= $quests_name; ?>">
	      	<input type="hidden" name="questsPoints" value="<?= $points; ?>">
	      	<input type="hidden" name="questsTrashSize" value="<?= $quests_trash_size; ?>">
	      	<input type="hidden" name="userId" value="<?= $user['user_id']; ?>">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	        <button type="submit" class="btn btn-success">Confirm</button>
	      </div>
  	  </form>
    </div>
  </div>
</div>
<?php endforeach; ?>