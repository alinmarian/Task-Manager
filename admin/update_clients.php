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
          <h1 class="h3 mb-2 text-gray-800">Update Client</h1>

<?php 


  if (isset($_POST['update_client'])) {

    $client_id = $_POST['client_id'];  
    $update_client_brand = $_POST['brandName'];
    $update_owner_name = $_POST['ownerName'];
    $update_brand_website = $_POST['brandWebsite'];
    $update_brand_email = $_POST['ownerEmail'];
    $update_brand_phone = $_POST['ownerPhone'];


    $update_clients = mysqli_query($connection, "
                                                  UPDATE `clients` SET 
                                                  `client_brand` = '".$update_client_brand."', 
                                                  `client_owner` = '".$update_owner_name."',
                                                  `client_website` = '".$update_brand_website."',
                                                  `client_email` = '".$update_brand_email."',
                                                  `client_phone` = '".$update_brand_phone."'
                                                   WHERE `client_id` = '".$client_id."' ") or die(mysqli_error($connection));

    if ($update_clients) {
      echo "<div class='alert alert-success' role='alert'>
    Client Updated!
    </div>";
    }
  }

  if (isset($_GET['edit'])) {
    $client_id = $_GET['edit'];

    $query = mysqli_query($connection, "SELECT * FROM `clients` WHERE `client_id` = '".$client_id."'");
    $row = mysqli_fetch_array($query); 
  } else {
    header('Location: clients.php');
  }

?>     


          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-body">
             <form action="update_clients.php?edit=<?php echo $row['client_id']; ?>" method="post">
             <input type="hidden" class="form-control" name="client_id" value = "<?php echo $row['client_id']; ?>">
                <div class="form-group">
                  <label for="brandName">Brand Name</label>
                  <input type="text" class="form-control" name="brandName" id="brandName" value = "<?php echo $row['client_brand']; ?>">
                </div>
                <div class="form-group">
                  <label for="ownerName">Owner Name</label>
                  <input type="text" class="form-control" name="ownerName" id="ownerName" value = "<?php echo $row['client_owner']; ?>">
                </div>
                <div class="form-group">
                  <label for="brandWebsite">Brand Website</label>
                  <input type="text" class="form-control" name="brandWebsite" id="ownerWebsite" value = "<?php echo $row['client_website']; ?>">
                </div>
                <div class="form-group">
                  <label for="ownerEmail">Owner Email</label>
                  <input type="text" class="form-control" name="ownerEmail" id="ownerEmail" value = "<?php echo $row['client_email']; ?>">
                </div>
                <div class="form-group">
                  <label for="ownerPhone">Owner Phone</label>
                  <input type="text" class="form-control" name="ownerPhone" id="ownerPhone" value = "<?php echo $row['client_phone']; ?>">
                </div>
                <button type="submit" name="update_client" class="btn btn-primary">Update Client</button>
              </form>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

  
      <?php include "includes/footer.php";?>