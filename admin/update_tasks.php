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
          <h1 class="h3 mb-2 text-gray-800">Update Task</h1>

<?php 


  if (isset($_POST['update_tasks'])) {

    $task_id = $_POST['task_id'];  
    $task_name = $_POST['task_name'];
    $task_client = $_POST['task_client'];
    $task_deadline = $_POST['task_deadline'];

    $update_tasks = mysqli_query($connection, "
                                                  UPDATE `tasks` SET 
                                                  `task_name` = '".$task_name."', 
                                                  `task_client` = '".$task_client."',
                                                  `task_deadline` = '".$task_deadline."'
                                                   WHERE `task_id` = '".$task_id."' ") or die(mysqli_error($connection));

    if ($update_tasks) {
      echo "<div class='alert alert-success' role='alert'>
    Task Updated!
    </div>";
    }
  }

  if (isset($_GET['edit'])) {
    $task_id = $_GET['edit'];

    $query = mysqli_query($connection, "SELECT * FROM `tasks` WHERE `task_id` = '".$task_id."'");
    $row = mysqli_fetch_array($query); 
  } else {
    header('Location: tasks.php');
  }

?>     


          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-body">
             <form action="update_tasks.php?edit=<?php echo $row['task_id']; ?>" method="post">
             <input type="hidden" class="form-control" name="task_id" value = "<?php echo $row['task_id']; ?>">
                <div class="form-group">
                  <label for="task_name">Task</label>
                  <input type="text" class="form-control" name="task_name" id="task_name" value = "<?php echo $row['task_name']; ?>">
                </div>
                <div class="form-group">
                  <label for="task_client">Client</label>
                  <input type="text" class="form-control" name="task_client" id="task_client" value = "<?php echo $row['task_client']; ?>">
                </div>
                <div class="form-group">
                  <label for="task_deadline">Deadline</label>
                  <input type="date" class="form-control" name="task_deadline" id="task_deadline" value = "<?php echo $row['task_deadline']; ?>">
                </div>
                <button type="submit" name="update_tasks" class="btn btn-primary">Update Task</button>
              </form>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

  
      <?php include "includes/footer.php";?>