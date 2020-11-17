<?php include "../db.php";
include "includes/header.php";
?>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

  <?php include "includes/sidebar.php";?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

      <?php include "includes/topbar.php";?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Add Clients</h1>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-body">

              <?php 

              if (isset($_POST['submit'])) {
                $brand_name = $_POST['brandName'];
                $owner_name = $_POST['ownerName'];
                $brand_website = $_POST['brandWebsite'];
                $owner_email = $_POST['ownerEmail'];
                $owner_phone = $_POST['ownerPhone'];

                $query = "INSERT INTO clients (client_brand, client_owner, client_website, client_email, client_phone) VALUES ('{$brand_name}', '{$owner_name}', '{$brand_website}', '{$owner_email}', '{$owner_phone}')";
                $insert_clients = mysqli_query($connection, $query);

                if (!$insert_clients) {
                  die(mysqli_error($connection));
                } else {
                  echo "<div class='alert alert-success' role='alert'>
                  Client Added!
                </div>";
                }

              }

              ?>

             <form action="add_clients.php" method="post">
                <div class="form-group">
                  <label for="brandName">Brand Name</label>
                  <input type="text" class="form-control" name="brandName" id="brandName">
                </div>
                <div class="form-group">
                  <label for="ownerName">Owner Name</label>
                  <input type="text" class="form-control" name="ownerName" id="ownerName">
                </div>
                <div class="form-group">
                  <label for="brandWebsite">Brand Website</label>
                  <input type="text" class="form-control" name="brandWebsite" id="ownerWebsite">
                </div>
                <div class="form-group">
                  <label for="ownerEmail">Owner Email</label>
                  <input type="text" class="form-control" name="ownerEmail" id="ownerEmail">
                </div>
                <div class="form-group">
                  <label for="ownerPhone">Owner Phone</label>
                  <input type="text" class="form-control" name="ownerPhone" id="ownerPhone">
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Add Client</button>
              </form>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <?php include "includes/footer.php";?>
