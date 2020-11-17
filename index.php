<?php include "includes/head.php" ?>

<body class="text-center">
    <form class="form-signin" action="index.php" method="post">
      <img class="mb-4" src="images/login-image.svg" alt="" width="300" height="300">
      <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
      <label for="inputUser" class="sr-only">Username</label>
      <input type="text" id="inputUser" name="formUser"  class="form-control" placeholder="Username" required>
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" id="inputPassword" name="formPass" class="form-control" placeholder="Password" required>
      <p id="error-msg"></p>
      <button class="btn btn-lg btn-primary btn-block" name="submit" type="submit">Sign in</button>
    </form>
  </body>


<?php 

if(isset($_POST['submit'])) {

$username = $_POST['formUser'];
$password = $_POST['formPass'];

$username = mysqli_real_escape_string($connection, $username);
$password = mysqli_real_escape_string($connection, $password);

$query = "SELECT * FROM users WHERE username ='{$username}' ";
$select_user_query = mysqli_query($connection, $query);

// if (!$select_user_query) {
//     die("Query failed" . mysqli_error($connection));
// }
$db_username = '';
$db_password = '';
$db_user_firstname = '';

while ($row = mysqli_fetch_array($select_user_query)) {
  $db_username = $row['username'];
  $db_password = $row['password'];
  $db_user_firstname = $row['firstname'];
}

if ($username === $db_username && $password === $db_password) {
  $_SESSION['username'] = $db_username;
  $_SESSION['firstname'] = $db_user_firstname;

  header("Location: admin");
} else {
  echo "
    <script>
       let errorMessage = document.getElementById('error-msg');
       errorMessage.textContent = 'The username or password are not correct!';
    </script>
  ";
}

} 

?>


<?php include "includes/footer.php" ?>