<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>


  <div class="row">
	<div class="col-lg">
		<?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
		<?= $this->session->flashdata('message'); ?>
		
		<div class="card shadow mb-5">
			<div class="card-header py-3">
            	<h6 class="m-0 font-weight-bold text-secondary"><i class="fas fa-fw fa-table"></i> Tables Manage Menu</h6>
            </div>
            <div class="card-body">
            	<a href="" class="btn btn-success mb-4 mt-1" data-toggle="modal" data-target="#addMenuModal">Add New Menu</a>
				<table class="table table-hover mb-4" id="dataTable" width="100%">
				  <thead>
				    <tr>
				      <th scope="col">#</th>
				      <th scope="col">Menu Code</th>
				      <th scope="col">Menu Name</th>
				      <th scope="col">Action</th>

				    </tr>
				  </thead>
				  <tbody>
				  	<?php $i = 1; ?>
				  	<?php foreach ($menuName as $m) : $menu_id = $m['menu_id']; ?>
				      
				    <tr>
				      <th scope="row"><?= $i; ?></th>
				      <td><?= $m['menu_code']; ?></td>
				      <td><?= $m['menu_name']; ?></td>
				      <td>
				      	<a href="#editMenuModal<?= $menu_id; ?>" data-toggle="modal" class="badge badge-success">Edit</a>
				      	<a href="#deleteMenuModal<?= $menu_id; ?>" data-toggle="modal" class="badge badge-danger">Delete</a>
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


<!--Modal Add New Menu -->
<div class="modal fade" id="addMenuModal" tabindex="-1" role="dialog" aria-labelledby="addMenuModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="titleaddMenuModal">Add New Menu</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('menu'); ?>" method="post">
	      <div class="modal-body">
	      	<div class="form-group">
				<input type="text" class="form-control" id="menuCode" name="menuCode" placeholder="Menu Code">
			</div>
			<div class="form-group">
				<input type="text" class="form-control" id="menuName" name="menuName" placeholder="Menu Name">
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
<?php foreach ($menuName as $m) : 
	$menu_id = $m['menu_id']; 
	$menu_code = $m['menu_code']; 
	$menu_name = $m['menu_name']; 
?>
<div class="modal fade" id="editMenuModal<?= $menu_id; ?>" tabindex="-1" role="dialog" aria-labelledby="editMenuModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="titleEditMenuModal">Edit Menu</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('menu/editMenu'); ?>" method="post">
	      <div class="modal-body">
			<div class="form-group">
				<input type="hidden" class="form-control" id="menuId" name="menuId" value="<?= $menu_id; ?>">
				<input type="text" class="form-control" id="menuCode" name="menuCode" value="<?= $menu_code; ?>">
			</div>
			<div class="form-group">
				<input type="text" class="form-control" id="menuName" name="menuName" value="<?= $menu_name; ?>">
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
<?php foreach ($menuName as $m) : $menu_id = $m['menu_id']; $menu_name = $m['menu_name']; ?>
<div class="modal fade" id="deleteMenuModal<?= $menu_id; ?>" tabindex="-1" role="dialog" aria-labelledby="deleteMenuModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="titleDeleteModal">Delete Menu</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url().'menu/deleteMenu' ?>" method="post">
	      <div class="modal-body">
			Are you sure want to delete <?= $menu_name; ?>?
	      </div>
	      <div class="modal-footer">
	      	<input type="hidden" name="menuId" value="<?= $menu_id; ?>">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	        <button type="submit" class="btn btn-success">Confirm</button>
	      </div>
  	  </form>
    </div>
  </div>
</div>
<?php endforeach; ?>