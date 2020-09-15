<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

  <div class="card shadow mb-3" style="max-width: 600px; ">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-secondary"><i class="fas fa-fw fa-table"></i> Profile Information</h6>
    </div>
    <div class="row no-gutters">
      <div class="col-md-4">
        <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" class="card-img" alt="...">
      </div>
      <div class="col-md-8">
        <div class="card-body">
          <h5 class="card-title"><b><?= $user['fullname']; ?></b></h5>
          <p class="card-text">Username : <?= $user['username']; ?></p>
          <p class="card-text">User Role : <?= $user_role['role_name']; ?></p>
          <p class="card-text"><small class="text-muted">Member Since : <?= date('d F Y', $user['date_created']);  ?></small></p>
        </div>
      </div>
    </div>
  </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

 