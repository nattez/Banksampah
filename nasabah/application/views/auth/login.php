<div class="container">

  <!-- Outer Row -->
  <div class="row justify-content-center">

    <div class="col-lg-5 mt-5">

      <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
          <!-- Nested Row within Card Body -->
          <div class="row">
            <div class="col-lg">
              <div class="p-5">
                <div class="text-center">
                  <img src="<?= base_url('assets/img/logo.png'); ?>" class="mb-3" alt="Logo">
                  <h1 class="h4 text-gray-900 mb-4">Banksampah BI</h1><hr>
                <br><?= $this->session->flashdata('message'); ?>
                </div>
                <form class="user" method="post" action="<?= base_url('auth') ?>">
                  <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="username" name="username" placeholder="Username" value="<?= set_value('username'); ?>">
                    <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
                  </div>
                  <div class="form-group">
                    <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password">
                    <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                  </div><br>
                  <button type="submit" class="btn btn-success btn-user btn-block">
                    Login
                  </button>
                </form><br>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>

  </div>

</div>

