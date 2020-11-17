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
          <h1 class="h3 mb-2 text-gray-800">Update Passwords</h1>

<?php 


  if (isset($_POST['update_password'])) {

    $password_id = $_POST['password_id'];  
    $password_client = $_POST['password_client'];
    $password_type = $_POST['password_type'];
    $password_url = $_POST['password_url'];
    $password_user = $_POST['password_user'];
    $password_password = $_POST['password_password'];


    $update_passwords = mysqli_query($connection, "
                                                  UPDATE `passwords` SET 
                                                  `password_client` = '".$password_client."', 
                                                  `password_type` = '".$password_type."',
                                                  `password_url` = '".$password_url."',
                                                  `password_user` = '".$password_user."',
                                                  `password_password` = '".$password_password."'
                                                   WHERE `password_id` = '".$password_id."' ") or die(mysqli_error($connection));

    if ($update_passwords) {
      echo "<div class='alert alert-success' role='alert'>
    Password Updated!
    </div>";
    }
  }

  if (isset($_GET['edit'])) {
    $password_id = $_GET['edit'];

    $query = mysqli_query($connection, "SELECT * FROM `passwords` WHERE `password_id` = '".$password_id."'");
    $row = mysqli_fetch_array($query); 
  } else {
    header('Location: passwords.php');
  }

?>     


          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-body">
             <form action="update_passwords.php?edit=<?php echo $row['password_id']; ?>" method="post">
             <input type="hidden" class="form-control" name="password_id" value = "<?php echo $row['password_id']; ?>">
                <div class="form-group">
                  <label for="password_client">Client</label>
                  <input type="text" class="form-control" name="password_client" id="password_client" value = "<?php echo $row['password_client']; ?>">
                </div>
                <div class="form-group">
                  <label for="password_type">Type</label>
                  <input type="text" class="form-control" name="password_type" id="password_type" value = "<?php echo $row['password_type']; ?>">
                </div>
                <div class="form-group">
                  <label for="password_url">Url</label>
                  <input type="text" class="form-control" name="password_url" id="password_url" value = "<?php echo $row['password_url']; ?>">
                </div>
                <div class="form-group">
                  <label for="password_user">User</label>
                  <input type="text" class="form-control" name="password_user" id="password_user" value = "<?php echo $row['password_user']; ?>">
                </div>
                <div class="form-group">
                  <label for="password_password">Password</label>
                  <input type="text" class="form-control" name="password_password" id="password_password" value = "<?php echo $row['password_password']; ?>">
                </div>
                <button type="submit" name="update_password" class="btn btn-primary">Update Password</button>
              </form>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

  
      <?php include "includes/footer.php";?>