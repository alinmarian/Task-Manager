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
          <h1 class="h3 mb-2 text-gray-800">Add Tasks</h1>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-body">

            <?php 

            if (isset($_POST['submit'])) {
              $task_name = $_POST['task_name'];
              $task_client = $_POST['task_client'];
              $task_deadline = $_POST['task_deadline'];

              $query = "INSERT INTO tasks (task_name, task_client, task_date, task_deadline) VALUES ('{$task_name}', '{$task_client}', now(), '{$task_deadline}')";
              $insert_tasks = mysqli_query($connection, $query);

              if (!$insert_tasks) {
                die(mysqli_error($connection));
              } else {
                echo "<div class='alert alert-success' role='alert'>
                Task Added!
              </div>";
              }

            }

            ?>

             <form action="add_tasks.php" method="post">
                <div class="form-group">
                  <label for="task_name">Task</label>
                  <input type="text" class="form-control" name="task_name" id="task_name">
                </div>
                <div class="form-group">
                  <label for="task_client">Client</label>
                  <input type="text" class="form-control" name="task_client" id="task_client">
                </div>
                <div class="form-group">
                  <label for="task_deadline">Deadline</label>
                  <input type="date" class="form-control" name="task_deadline" id="task_deadline">
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Add Task</button>
              </form>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <?php include "includes/footer.php";?>
