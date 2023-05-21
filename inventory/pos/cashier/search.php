<?php
session_start();
include('config/config.php');
include('config/checklogin.php');
check_login();

$s='';
if (isset($_POST['search'])) {
$s=$_POST['search'];
}else{
    echo 'prkawa';
}
if (isset($_GET['delete'])) {
  $id = intval($_GET['delete']);
  
  // Perform the deletion
  $adn = "DELETE FROM products WHERE prod_id = ?";
  $stmt = $mysqli->prepare($adn);
  $stmt->bind_param('i', $id);
  $stmt->execute();
  $stmt->close();

  if ($stmt) {
    $success = "Product deleted successfully.";
  } else {
    $err = "Failed to delete the product. Please try again later.";
  }
}
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once('partials/_head.php');
?>

<body>
  <!-- Sidenav -->
  <?php
  require_once('partials/_sidebar.php');
  ?>
  <!-- Main content -->
  <div class="main-content">
    <!-- Top navbar -->
    <?php
    require_once('partials/_topnav.php');
    ?>
    <!-- Header -->
    <div style="background-image: url(../admin/assets/img/theme/bck.jpg); background-size: cover;" class="header  pb-8 pt-5 pt-md-8">
       <span class="mask bg-gradient-dark opacity-8"></span>
      <div class="container-fluid">
        <div class="header-body">
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--8">
      <!-- Table -->
      <div class="row">
        <div class="col">
          <div class="card shadow">
            <div class="card-header border-0">
              <a href="add_product.php" class="btn btn-outline-success">
                <i class="fas fa-plus"></i> 
                Add New Product
              </a>
            </div>
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">Image</th>
                    <th scope="col">Product Code</th>
                    <th scope="col">Name</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Price</th>
                    <th scope="col">Description</th>
                    <th scope="col">Actions</th>
                  </tr>
                </thead>
               <tbody>
  <?php
   $ser='%'.$s.'%';
  $ret = "SELECT * FROM `products` WHERE prod_desc LIKE ? or prod_code = ?";
  $stmt = $mysqli->prepare($ret);
  $aa=  $stmt->bind_param('ss',$ser,$s);
  $stmt->execute();
  $res = $stmt->get_result();
  while ($prod = $res->fetch_object()) 
  { if($prod->prod_quantity < 1 ) continue;
  ?>
                    <tr>
                      <td>
                        <?php
                        if ($prod->prod_img) {
                          echo "<img src='assets/img/products/$prod->prod_img' height='60' width='60 class='img-thumbnail'>";
                        } else {
                          echo "<img src='assets/img/products/itemm.png' height='60' width='60 class='img-thumbnail'>";
                        }

                        ?>
                      </td>
                      <td><?php echo $prod->prod_code; ?></td>
                      <td><?php echo $prod->prod_name; ?></td>
                      <td><?php echo $prod->prod_quantity; ?></td>
                      <td>$<?php echo $prod->prod_price; ?></td>
                      <td><?php echo $prod->prod_desc; ?></td>
                      <td>
                        <a href="products.php?delete=<?php echo $prod->prod_id; ?>">
                          <button class="btn btn-sm btn-danger">
                            <i class="fas fa-trash"></i>
                          </button>
                        </a>
                        <a href="update_product.php?update=<?php echo $prod->prod_id; ?>">
                          <button class="btn btn-sm btn-primary">
                            <i class="fas fa-edit"></i>
                          </button>
                        </a>
                      </td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <!-- Footer -->
      <?php
      require_once('partials/_footer.php');
      ?>
    </div>
  </div>
  <!-- Argon Scripts -->
  <?php
  require_once('partials/_scripts.php');
  ?>
</body>

</html>