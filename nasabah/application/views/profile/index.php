<!-- Begin Page Content -->
<div class="container-fluid">

<div class="row">
  <div class="col-lg-12">
    <div class="card shadow mb-3">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-success"><i class="fa fa-user"></i> Informasi Profil</h6>
      </div>
      <div class="row no-gutters">
        <div class="col-md-3 text-center">
          <img style="border-radius: 50%; border: 4px solid #1cc88a; height: 150px; width: 160px;" src="<?= base_url('assets/img/profile/') . $user['image']; ?>" class="card-img mt-5" alt="...">
        </div>
        <div class="col-md-9">
          <div class="card-body mr-5">
            <h5 class="card-title mt-4"><b><?= $user['fullname']; ?></b></h5>
            <p class="card-text"><?= $user_role['role_name']; ?></p>
            <h4 class="small font-weight-bold">Level <?= $user['user_level']; ?> <span class="float-right"><?= $user['user_points']; ?>/<?= $user['user_dummy_points']; ?>pts</span></h4>
            <div class="progress mb-4">
              <div class="progress-bar bg-success" role="progressbar" style="width: <?= $user['user_progress']; ?>%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <p class="card-text mb-3"><small class="text-muted">Bergabung sejak : <?= date('d F Y', $user['date_created']);  ?></small></p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="row">

  <!-- <div class="col-xl-4 col-md-12 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Quest Selesai</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800">1 Quest</div>
          </div>
          <div class="col-auto">
            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div> -->

  <div class="col-xl-6 col-md-12 mb-4">
    <div class="card border-left-success shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Saldo</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800">IDR <?= $user['balance']; ?></div>
          </div>
          <div class="col-auto">
            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-xl-6 col-md-12 mb-4">
    <div class="card border-left-secondary shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">Total Sampah (KG)</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $user['user_trash_size']; ?> KG</div>
          </div>
          <div class="col-auto">
            <i class="fas fa-calendar fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>

<div class="row">
 <div class="col-lg-12">
    <div class="card shadow mb-3">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-success"><i class="fa fa-life-ring"></i> Koleksi Badges</h6>
      </div>
      <div class="row no-gutters">
          <div class="card-body mr-5"></div>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-lg">
    <?= form_error('quest', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
    <?= $this->session->flashdata('message'); ?>
    
    <div class="card shadow mb-5">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-success"><i class="fa fa-tasks"></i> Riwayat Quest</h6>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-hover mb-4" id="" width="100%">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nama Quest</th>
                <th scope="col">Point Quest</th>
                <th scope="col">Berat Sampah</th>
                <th scope="col">Waktu Mulai</th>
                <th scope="col">Waktu Selesai</th>
                <th scope="col">Status</th>
              </tr>
            </thead>
            <tbody>
              <?php $i = 1; ?>
              <?php foreach ($questsName as $qs) : $quest_id = $qs['quest_id']; ?>
                
              <tr>
                <th scope="row"><?= $i; ?></th>
                <td><?= $qs['quest_name']; ?></td>
                <td><?= $qs['quest_points']; ?></td>
                <td><?= $qs['trash_size']; ?></td>
                <td><?= date('d F Y | h:i:s A', $qs['date_started']);  ?></td>
                <td><?= date('d F Y | h:i:s A', $qs['date_ended']);  ?></td>
                <?php 
                  if ($qs['stat'] == "Selesai") {
                    echo "
                      <td><div class='badge badge-success mb-2'><i class='fas fa-check'></i>
                      " . $qs['stat'];
                    
                  } else {
                    echo "
                    <td><div class='badge badge-danger mb-2'><i class='fas fa-exclamation-triangle'></i>
                    " . 
                    $qs['stat'];
                  }
                  
                ?>
                
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

 