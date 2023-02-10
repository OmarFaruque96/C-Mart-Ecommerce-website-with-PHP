  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="index.html">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <?php 

      if($_SESSION['userrole'] == 3){
        ?>
          <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>E-Commerce</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="components-alerts.html">
              <i class="bi bi-circle"></i><span>All Orders</span>
            </a>
          </li>
          <li>
            <a href="couponcode.php">
              <i class="bi bi-circle"></i><span>Coupon Code</span>
            </a>
          </li>
          <li>
            <a href="components-badges.html">
              <i class="bi bi-circle"></i><span>Payment Gateway</span>
            </a>
          </li>
        </ul>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-layout-text-window-reverse"></i><span>Products</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="category.php">
              <i class="bi bi-circle"></i><span>Category</span>
            </a>
          </li>
          <li>
            <a href="brand.php">
              <i class="bi bi-circle"></i><span>Brand</span>
            </a>
          </li>
          <li>
            <a href="products.php?data=add">
              <i class="bi bi-circle"></i><span>Add New Product</span>
            </a>
          </li>
          <li>
            <a href="products.php?data=view">
              <i class="bi bi-circle"></i><span>View All Products</span>
            </a>
          </li>
        </ul>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">
          <i class="bi bi-bar-chart"></i><span>Reports</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-gem"></i><span>Users</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="icons-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="users.php?data=add">
              <i class="bi bi-circle"></i><span>Add New User</span>
            </a>
          </li>
          <li>
            <a href="users.php?data=view">
              <i class="bi bi-circle"></i><span>View All Users</span>
            </a>
          </li>

        </ul>
      </li>
        <?php
      }
      if($_SESSION['userrole'] == 2){
        ?>
        <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-layout-text-window-reverse"></i><span>Products</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="category.php">
              <i class="bi bi-circle"></i><span>Category</span>
            </a>
          </li>
          <li>
            <a href="brand.php">
              <i class="bi bi-circle"></i><span>Brand</span>
            </a>
          </li>
          <li>
            <a href="products.php?data=add">
              <i class="bi bi-circle"></i><span>Add New Product</span>
            </a>
          </li>
          <li>
            <a href="products.php?data=view">
              <i class="bi bi-circle"></i><span>View All Products</span>
            </a>
          </li>
        </ul>
      </li>
        <?php
      }

      ?>

      

      <li class="nav-heading">Pages</li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="users-profile.html">
          <i class="bi bi-person"></i>
          <span>Theme Options</span>
        </a>
      </li><!-- End Profile Page Nav -->

      

    </ul>

  </aside><!-- End Sidebar-->