<?php include "../db.php";
include "includes/header.php";
ob_start(); 
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
          <h1 class="h3 mb-2 text-gray-800">Tasks</h1>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Task</th>
                      <th>Client</th>
                      <th>Date Added</th>
                      <th>Deadline</th>
                      <th>Edit</th>
                      <th>Delete</th>
                    </tr>
                  </thead>
                  <tbody>


                  <?php // SELECT AND DISPLAY TASKS

                    $select_tasks = mysqli_query($connection, "SELECT * FROM tasks");

                    while ($row = mysqli_fetch_assoc($select_tasks)) {

                      echo "<tr>";
                      echo "<td>".$row['task_name']."</td>";
                      echo "<td>".$row["task_client"]."</td>";
                      echo "<td>".$row["task_date"]."</td>";
                      echo "<td>".$row["task_deadline"]."</td>";
                      echo "<td><a href='update_tasks.php?edit=".$row['task_id']."'>Edit</a></td>";
                      echo "<td><a href='tasks.php?delete=".$row['task_id']."'>Delete</a></td>";
                      echo "</tr>";

                    }

                    // DELETE TASKS

                    if (isset($_GET['delete'])) {
                      $delete_task = mysqli_query($connection, "DELETE FROM tasks WHERE task_id = {$_GET['delete']}");
  
                      if (!$delete_task) {
                        die(mysqli_error($connection));
                      } 
                        
                      header("Location: tasks.php");
  
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
