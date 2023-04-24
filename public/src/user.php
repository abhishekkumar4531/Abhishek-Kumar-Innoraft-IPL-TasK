<?php
  session_start();
  require '../../database.php';

  // Fetch the user data and check validation, if valid user then logged in and
  // redirect to home page. otherwise stay on same page.
  if(isset($_POST['userLogin'])) {
    $userEmail = $_POST['userEmail'];
    $userPassword = $_POST['userPassword'];

    $obj = new Database();

    $status = $obj->userLogin($userEmail, $userPassword);

    // If $status will be true that's means user logged in successfully then
    // redirect to home page otherwise stay on login page.
    if($status) {
      $_SESSION['userLogged'] = $userEmail;
      header("location: /");
    }
    else {
      header("location: /userLogin.php");
    }
  }
?>
