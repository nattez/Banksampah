<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

  <div class="row">
	<div class="col-lg">
		<?php if(validation_errors()) : ?>
		<div class="alert alert-danger" role="alert">
			<?= validation_errors(); ?>
		</div>
		<?php endif; ?>
		<?= $this->session->flashdata('message'); ?>
		
		<div class="card shadow mb-5">
			<div class="card-header py-3">
            	<h6 class="m-0 font-weight-bold text-secondary"><i class="fas fa-fw fa-table"></i> Tables Manage Submenu</h6>
            </div>
            <div class="card-body">
   			  <a href="" class="btn btn-success mb-4 mt-1 " data-toggle="modal" data-target="#addSubMenuModal">Add New Submenu</a>
              <div class="table-responsive mb-4">
				<table class="table table-hover" id="dataTable" width="100%">
				  <thead>
				    <tr>
				      <th scope="col">#</th>
				      <th scope="col">Menu Name</th>
				      <th scope="col">Submenu Name</th>
				      <th scope="col">URL</th>
				      <th scope="col">Icon</th>
				      <th scope="col">Active</th>
				      <th scope="col">Action</th>
				    </tr>
				  </thead>
				  <tbody>
				  	<?php $i = 1; ?>
				  	<?php foreach ($subMenu as $sm) : $submenu_id = $sm['submenu_id']; ?>
				    <tr>
				      <th scope="row"><?= $i; ?></th>
				      <td><?= $sm['menu_name']; ?></td>
				      <td><?= $sm['title']; ?></td>
				      <td>http://localhost/POS-Eleora/<?= $sm['url']; ?></td>
				      <td><i class="<?= $sm['icon']; ?>"></i></td>
				      <td><?= $sm['is_active']; ?></td>
				      <td>
				      	<a href="" class="badge badge-success">Edit</a>
				      	<a href="#deleteSubmenuModal<?= $submenu_id; ?>" data-toggle="modal" class="badge badge-danger">Delete</a>
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


<!--Modal Add Submenu -->
<div class="modal fade" id="addSubMenuModal" tabindex="-1" role="dialog" aria-labelledby="newSubMenuModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="titleAddSubMenuModal">Add New Sub Menu</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('menu/submenu'); ?>" method="post">
	      <div class="modal-body">
			<div class="form-group">
				<input type="text" class="form-control" id="title" name="title" placeholder="SubMenu title">
			</div>
			<div class="form-group">
				<select name="menu_id" id="menu_id" class="form-control">
					<option value="">Select menu</option>
					<?php foreach($menu_name as $m) : ?>
					<option value="<?= $m['menu_id']; ?>"><?= $m['menu_name']; ?></option>
					<?php endforeach; ?>
				</select>
			</div>
			<div class="form-group">
				<input type="text" class="form-control" id="url" name="url" placeholder="Submenu URL">
			</div>
			<div class="form-group">
				<input type="text" class="form-control" id="icon" name="icon" placeholder="Submenu icon">
			</div>
			<div class="form-group">
				<div class="form-check">
				  <input class="form-check-input" type="checkbox" value="1" id="is_active" name="is_active" checked>
				  <label class="form-check-label" for="is_active">
				    Active?
				  </label>
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


<!--Modal Delete Submenu -->
<?php foreach ($subMenu as $sm) : $submenu_id = $sm['submenu_id']; $submenu_name = $sm['title']; ?>
<div class="modal fade" id="deleteSubmenuModal<?= $submenu_id; ?>" tabindex="-1" role="dialog" aria-labelledby="deleteSubMenuModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="titleDeleteModal">Delete Menu</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url().'menu/deleteSubMenu' ?>" method="post">
	      <div class="modal-body">
			Are you sure want to delete <?= $submenu_name; ?>?
	      </div>
	      <div class="modal-footer">
	      	<input type="hidden" name="submenu_id" value="<?= $submenu_id; ?>">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	        <button type="submit" class="btn btn-success">Confirm</button>
	      </div>
  	  </form>
    </div>
  </div>
</div>
<?php endforeach; ?>