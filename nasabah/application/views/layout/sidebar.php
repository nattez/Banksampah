<!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fa fa-trash"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Banksampah</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Query Menu -->
      <?php
        $role_id = $this->session->userdata('role_id');
        $queryMenu = "SELECT `menu`.`menu_id`, `menu_name` 
                      FROM `menu` JOIN `access_menu`
                      ON `menu`.`menu_id` = `access_menu`.`menu_id`   
                      WHERE `access_menu`.`role_id` = $role_id
                      ORDER BY `access_menu`.`menu_id` ASC  
                      ";
        $menu = $this->db->query($queryMenu)->result_array();
      ?>

      <!-- LOOPING MENU -->
      <?php foreach ($menu as $m) : ?>
      <div class="sidebar-heading">
        <?= $m['menu_name']; ?>
      </div>

      <!-- Siapkan Sub-menu sesuai menu -->
      <?php 
        $menuId = $m['menu_id'];
        $querySubMenu = "SELECT * 
                        FROM `submenu` JOIN `menu`
                        ON `submenu`.`menu_id` = `menu`.`menu_id`   
                        WHERE `submenu`.`menu_id` = $menuId
                        AND `submenu`.`is_active` = 1
                        ";
        $subMenu = $this->db->query($querySubMenu)->result_array();
      ?>

        <?php foreach($subMenu as $sm) : ?>
        <?php if ($title == $sm['title']) : ?>
        <li class="nav-item active">
          <?php else : ?>
            <li class="nav-item">
          <?php endif; ?>
          <a class="nav-link" href="<?= base_url($sm['url']); ?>">
            <i class="<?= $sm['icon']; ?>"></i>
            <span><?= $sm['title']; ?></span></a>
        </li>
        <?php endforeach; ?>
        
        <!-- Divider -->
        <hr class="sidebar-divider">
      
      <?php endforeach; ?>

      <!-- Nav Item - Logout -->
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('auth/logout'); ?>" data-toggle="modal" data-target="#logoutModal">
          <i class="fas fa-fw fa-user"></i>
          <span>Logout</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->
