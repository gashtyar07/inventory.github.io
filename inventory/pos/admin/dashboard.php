<?php
session_start();
include('config/config.php');
include('config/checklogin.php');
check_login();
require_once('partials/_head.php');
require_once('partials/_analytics.php');
?>

<body>
  <!-- Sidenav -->
  <?php
  require_once('partials/_sidebar.php');
  ?>
	
  <div class="main-content">
	  
    <?php
    require_once('partials/_topnav.php');
    ?>
	
	  
    <!-- Header
<!-- style="background-image: url(assets/img/theme/donut4.jpg); -->
<div style="background-image: url(../admin/assets/img/theme/bck.jpg);hie/ background-size: cover;" class="header  pb-8 pt-5 pt-md-8">
       <span class="mask bg-gradient-dark opacity-8"></span>
    
      <?php require_once('partials/_footer.php'); ?>
    </div>
  </div>
  <!-- Argon Scripts -->
  <?php
  require_once('partials/_scripts.php');
  ?>
</body>

</html>
