<?php
  session_start();
  require '../../database.php';

  // Fetch the user data and check validation, if valid user then logged in and
  // redirect to home page. otherwise stay on same page.
  if(isset($_POST['adminLogin'])) {
    $adminEmail = $_POST['adminEmail'];
    $adminPassword = $_POST['adminPassword'];

    $obj = new Database();

    $status = $obj->adminLogin($adminEmail, $adminPassword);

    // If $status will be true that's means admin logged in successfully then
    // redirect to home page otherwise stay on login page.
    if($status) {
      $_SESSION['adminLogged'] = $adminEmail;
      header("location: /");
    }
    else {
      header("location: /adminLogin.php");
    }
  }

  // When admin will add a new employee then first validate the input and then
  // store in the database.
  if(isset($_POST['addAdmin'])) {
    $empId = $_POST['empId'];
    $empName = $_POST['empName'];
    $empType = $_POST['empType'];
    $empPoint = $_POST['empPoint'];
    $empId = number_format($empId);
    $empPoint = number_format($empPoint);

    // If empPoint is between the range of 2-20 then call a function addByAdmin
    // from Database class and store the emp details in database otherwise
    // redirect to home page.
    if($empPoint < 2 && $empPoint > 20) {
      header("location: /");
    }
    else {
      $obj = new Database();
      $status = $obj->addByAdmin($empId, $empName, $empType, $empPoint);

      if($status) {
        header("location: /");
      }
      else {
        header("location: /logout.php");
      }
    }

  }
?>
