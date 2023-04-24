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
  <title>Admin | Login</title>
</head>
<body class="parent-tag">
  <div>
    <?php include "navbar.php" ?>
  </div>
  <div class = "form-content">
    <div class = "form-feild">
      <h1 class = "p-3">Admin Login Page</h1>
      <form action="src/admin.php" method="post">
        <dl>
          <dt>Enter Admin-Email</dt>
          <dd>
            <input type="text" name="adminEmail" id="email" placeholder="Enter User-Email" required onblur="checkEmailStatus()"
            value = "<?php if(isset($_POST['adminEmail'])){echo $_POST['adminEmail'];} ?>"
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
          <dt>Enter Admin-Password</dt>
          <dd>
            <input type="password" name="adminPassword" id="pwd" placeholder="Enter User-Password" required onblur="checkPasswordStatus()"
            value = "<?php if(isset($_POST['adminPassword'])){echo $_POST['adminPassword'];} ?>"
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
            <button name="adminLogin" id="submitBtn">Login</button>
          </dd>
        </dl>
      </form>
    </div>
  </div>
</body>
</html>
