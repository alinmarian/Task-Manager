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
          <h1 class="h3 mb-2 text-gray-800">Passwords</h1>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Client</th>
                      <th>Type</th>
                      <th>URL</th>
                      <th>User</th>
                      <th>Password</th>
                      <th>Edit</th>
                      <th>Delete</th>
                    </tr>
                  </thead>
                  <tbody>

                    <?php // SELECT AND DISPLAY PASSWORDS

                    $select_passwords = mysqli_query($connection, "SELECT * FROM passwords");

                    while ($row = mysqli_fetch_assoc($select_passwords)) {

                      echo "<tr>";
                      echo "<td>".$row['password_client']."</td>";
                      echo "<td>".$row["password_type"]."</td>";
                      echo "<td>".$row["password_url"]."</td>";
                      echo "<td>".$row["password_user"]."</td>";
                      echo "<td>".$row["password_password"]."</td>";
                      echo "<td><a href='update_passwords.php?edit=".$row['password_id']."'>Edit</a></td>";
                      echo "<td><a href='passwords.php?delete=".$row['password_id']."'>Delete</a></td>";
                      echo "</tr>";

                    }

                    // DELETE PASSWORDS

                    if (isset($_GET['delete'])) {
                    $delete_password = mysqli_query($connection, "DELETE FROM passwords WHERE password_id = {$_GET['delete']}");

                    if (!$delete_password) {
                      die(mysqli_error($connection));
                    } 
                      
                    header("Location: passwords.php");

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