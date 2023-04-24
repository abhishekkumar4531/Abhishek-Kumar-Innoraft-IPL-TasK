<?php
  session_start();
  require '../database.php';
  if(!(isset($_SESSION['userLogged']) || isset($_SESSION['adminLogged']))) {
    header("location: /userLogin.php");
  }
  else {
    $obj = new Database();
    $_SESSION['addedEmp'] = $obj->adddedByAdmin();
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php include "header.php" ?>
  <title>Home | Page</title>
</head>
<body class="parent-tag">
  <div>
    <nav>
      <div class="container">
        <ul>
          <li>
            <a href="/">Home</a>
          </li>
          <li>
            <a href="/logout.php">Logout</a>
          </li>
        </ul>
      </div>
    </nav>
  </div>
  <?php
   // If user logged in then open user's dashboard and if admin logged in then
   // redirect to admin page.
    if(isset($_SESSION['userLogged'])) {
      include "userLogged.php";
    }
    else {
      include "adminLogged.php";
    }
  ?>
</body>
</html>
