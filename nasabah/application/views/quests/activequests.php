<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

	<div class="row">
	<?php foreach ($questsName as $qs) : $quests_id = $qs['quest_id']; ?> 
	 <div class="col-xl-12 col-md-12 mb-4">
	    <div class="card border-left-info shadow h-100 py-2">
	      <div class="card-body">
	        <div class="row no-gutters align-items-center">
	          <div class="col mr-2">
	            <div class="font-weight-bold text-success text-uppercase mb-2"><?= $qs['quest_name']; ?></div>
	            <div class="text-gray-800 mb-3"><?= $qs['info']; ?></div>
	            <img style="width: 100px; height: 100px;" src="<?= base_url('assets/img/quest/') . $qs['image']; ?>" class="card-img mb-3" alt="Sampah Kaleng"><br>
	            <div class="h5 font-weight-bold text-gray-800 mt-4 mb-3 mr-4"><i class="fa fa-gift fa-1x text-gray-300"></i> +<?= $qs['points']; ?> Points</div>
	            <div class="badge badge-info mb-3"><i class="fas fa-info-circle"></i> Sedang dikerjakan</div>
	            <div class="mb-2"><small class="text-muted">Waktu ambil : <?= date('d F Y | h:i:s A', $qs['date_started']);  ?></small></div>
	            <!-- <div class="mb-3 mr-2"><small class="text-muted">Waktu selesai : <?= date('d F Y | h:i:s A', $qs['date_started']);  ?></small></div> -->
				
	          </div>
	          <div class="col-auto">
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

