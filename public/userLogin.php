<?php
  session_start();
  if(isset($_SESSION['userLogged']) || isset($_SESSION['adminLogged'])) {
    header("location: /");
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php include "header.php" ?>
  <title>User | Login</title>
</head>
<body class="parent-tag">
  <div>
    <?php include "navbar.php" ?>
  </div>
  <div class = "form-content">
    <div class = "form-feild">
      <h1 class = "p-3">User Login Page</h1>
      <form action="src/user.php" method="post">
        <dl>
          <dt>Enter User-Email</dt>
          <dd>
            <input type="text" name="userEmail" id="email" placeholder="Enter User-Email" required onblur="checkEmailStatus()"
            value = "<?php if(isset($_POST['userEmail'])){echo $_POST['userEmail'];} ?>"
            >
          </dd>
          <dd id="email_success" class="success-msg"></dd>
          <dd id="email_status" class="error-msg"></dd>
          <dd class="error-msg">
            <?php
              if(isset($GLOBALS['emailErrorStatus']) && $GLOBALS['emailErrorStatus']) {
                echo "Please Enter Valid User-Email";
              }
            ?>
          </dd>
          <dt>Enter User-Password</dt>
          <dd>
            <input type="password" name="userPassword" id="pwd" placeholder="Enter User-Password" required onblur="checkPasswordStatus()"
            value = "<?php if(isset($_POST['userPassword'])){echo $_POST['userPassword'];} ?>"
            >
          </dd>
          <dd id="pwd_success" class="success-msg"></dd>
          <dd id="pwd_status" class="error-msg"></dd>
          <dd class="error-msg">
          <?php
            if(isset($GLOBALS['pwdErrorStatus']) && $GLOBALS['pwdErrorStatus']) {
              echo "Please Enter Valid User-Password";
            }
          ?>
          </dd>

          <dd>
            <button name="userLogin" id="submitBtn">Login</button>
          </dd>
        </dl>
      </form>
    </div>
  </div>
</body>
</html>
