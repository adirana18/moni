<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item" style="padding-top: 8px;">
        <?php  
          echo "<b>".$tipeToko."</b>";
        ?>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
              
         <a class="btn btn-block btn-primary btn-sm"   style="margin-top: 5px; color:white;"><?= $_SESSION['user_nama']; ?></a>
           
      </li>
     &nbsp;&nbsp;
      

      <li class="nav-item">
        <a href="<?php echo "aksi/logout.php?logout";?>"onclick="return confirm('Apakah anda yakin logout ?')" class="nav-link">Logout <i class="fa fa-sign-out"></i>
        </a>
      </li>
    </ul>
  </nav>

