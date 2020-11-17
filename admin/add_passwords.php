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
          <h1 class="h3 mb-2 text-gray-800">Add Passwords</h1>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-body">

              <?php 

              if (isset($_POST['submit'])) {
                $password_client = $_POST['password_client'];
                $password_type = $_POST['password_type'];
                $password_url = $_POST['password_url'];
                $password_user = $_POST['password_user'];
                $password_password = $_POST['password_password'];

                $query = "INSERT INTO passwords (password_client, password_type, password_url, password_user, password_password) VALUES ('{$password_client}', '{$password_type}', '{$password_url}', '{$password_user}', '{$password_password}')";
                $insert_passwords = mysqli_query($connection, $query);

                if (!$insert_passwords) {
                  die(mysqli_error($connection));
                } else {
                  echo "<div class='alert alert-success' role='alert'>
                  Password Added!
                </div>";
                }

              }

              ?>

             <form action="add_passwords.php" method="post">
                <div class="form-group">
                  <label for="password_client">Client</label>
                  <input type="text" class="form-control" name="password_client" id="password_client">
                </div>
                <div class="form-group">
                  <label for="password_type">Type</label>
                  <input type="text" class="form-control" name="password_type" id="password_type">
                </div>
                <div class="form-group">
                  <label for="password_url">Url</label>
                  <input type="text" class="form-control" name="password_url" id="password_url">
                </div>
                <div class="form-group">
                  <label for="password_user">User</label>
                  <input type="text" class="form-control" name="password_user" id="password_user">
                </div>
                <div class="form-group">
                  <label for="password_password">Password</label>
                  <input type="text" class="form-control" name="password_password" id="password_password">
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Add Password</button>
              </form>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <?php include "includes/footer.php";?>
