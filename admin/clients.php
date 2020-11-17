<?php 
include "core/db.php";
ob_start(); 

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
          <h1 class="h3 mb-2 text-gray-800">Clients</h1>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Brand</th>
                      <th>Owner</th>
                      <th>Website</th>
                      <th>Email</th>
                      <th>Phone</th>
                      <th>Edit</th>
                      <th>Delete</th>
                    </tr>
                  </thead>
                  <tbody>

                    <?php // SELECT AND DISPLAY CLIENTS

                    $select_clients = mysqli_query($connection, "SELECT * FROM clients");

                    while ($row = mysqli_fetch_assoc($select_clients)) {

                      echo "<tr>";
                      echo "<td>".$row['client_brand']."</td>";
                      echo "<td>".$row["client_owner"]."</td>";
                      echo "<td>".$row["client_website"]."</td>";
                      echo "<td>".$row["client_email"]."</td>";
                      echo "<td>".$row["client_phone"]."</td>";
                      echo "<td><a href='update_clients.php?edit=".$row['client_id']."'>Edit</a></td>";
                      echo "<td><a href='clients.php?delete=".$row['client_id']."'>Delete</a></td>";
                      echo "</tr>";

                    }

                    // DELETE CLIENTS

                    if (isset($_GET['delete'])) {
                    $delete_client = mysqli_query($connection, "DELETE FROM clients WHERE client_id = {$_GET['delete']}");

                    if (!$delete_client) {
                      die(mysqli_error($connection));
                    } 
                      
                    header("Location: clients.php");

                    }

                    ?>

                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <?php include "includes/footer.php";?>