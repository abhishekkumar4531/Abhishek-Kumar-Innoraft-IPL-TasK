<?php

/**
 * Database
 */
class Database {

  /**
   * It store the object of database connetion with mysql.
   *
   * @var object
   */
  public $conn;

  /**
   * emailErrorMsg
   *
   * @var bool
   */

  public $emailErrorMsg;
  /**
   * pwdErrorMsg
   *
   * @var bool
   */

  public $pwdErrorMsg;

  /**
   * addedEmp
   *
   * @var array
   */
  public $addedEmp = [];

  /**
   * addedUser
   *
   * @var array
   */
  public $addedUser = [];

  /**
   * selectedEmp
   *
   * @var array
   */
  public $selectedEmp = [];

  /**
   * When database class will be initilize it will be execute and make the
   * connection with database.
   *
   *   @return void
   */
  function __construct() {
    $this->conn = new mysqli("localhost", "root", "Abhi4531@my", "Social",);
  }

  /**
   * It is responsible for user logged in, it will fetch the user's email and
   * password and validate them, if user exut then return true otherwise return
   * false.
   *
   *   @param  string $userEmail
   *     It stores the user email.
   *
   *   @param  string $userPassword
   *     It stores the user password.
   *
   *   @return bool
   *     If user exist then return true otherwise return false;
   */
  public function userLogin($userEmail, $userPassword) {
    $fetch = "SELECT * FROM Account WHERE UserEmail = '$userEmail'";
    $result = $this->conn->query($fetch);

    //If user's email exit then continue otherwise return false with erro message.
    if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();

      // If user passsword exits then return true otherwise return false with error
      // message.
      if($userPassword === $row["UserPassword"]){
        $this->emailErrorMsg = false;
        $this->pwdErrorMsg = false;
        return true;
      }
      else {
        $this->pwdErrorMsg = true;
        return false;
      }
    }
    else {
      $this->emailErrorMsg = true;
      return false;
    }

    $this->conn->close();
  }

  /**
   * It is responsible for Admin login page.
   *
   *   @param  string $adminEmail
   *     It stores the admin email address.
   *
   *   @param  string $adminPassword
   *     It stores the admin password.
   *
   *   @return bool
   *     If admin exist then return true otherwise return false;
   */
  public function adminLogin($adminEmail, $adminPassword) {
    $fetch = "SELECT * FROM Account WHERE UserEmail = '$adminEmail'";
    $result = $this->conn->query($fetch);
    if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      if($adminPassword === $row["UserPassword"]){
        $this->emailErrorMsg = false;
        $this->pwdErrorMsg = false;
        return true;
      }
      else {
        $this->pwdErrorMsg = true;
        return false;
      }
    }
    else {
      $this->emailErrorMsg = true;
      return false;
    }

    $this->conn->close();
  }

  /**
   * It is manage when admin added the employee in the list
   *
   *   @param  int $empId
   *     It stores the employee id.
   *
   *   @param  string $empName
   *     It stores the employee name.
   *
   *   @param  string $empType
   *     It stores the employee type.
   *
   *   @param  int $empPoint
   *     It stores the employee point.
   *
   *   @return bool
   *     If added then return true otherwise rerturn false.
   */
  public function addByAdmin($empId, $empName, $empType, $empPoint) {
      $post = "INSERT INTO addByAdmin (empId, empName, empType, empPoint)
      VALUES('$empId', '$empName', '$empType', '$empPoint')";
      if($this->conn->query($post)) {
        return true;
      }
      else {
        return false;
      }
    $this->conn->close();
  }

  /**
   * All the added employee by Admin.
   *
   *   @return mixed
   */
  public function adddedByAdmin() {
    $fetch = "SELECT * FROM addByAdmin";
    $result = $this->conn->query($fetch);
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        $this->addedEmp[] = $row;
      }
      return $this->addedEmp;
    }
    return null;

    $this->conn->close();
  }

  /**
   * addByUser
   *
   *   @param  int $empId
   *
   *   @return bol
   */
  public function addByUser($empId) {
    $fetch = "SELECT * FROM addByAdmin WHERE empId = '$empId'";
    $result = $this->conn->query($fetch);
    if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      $this->addedUser = $row;
    }
    $empName = $this->addedUser['empName'];
    $empType = $this->addedUser['empType'];
    $empPoint = $this->addedUser['empPoint'];
    $post = "INSERT INTO addByUser (empId, empName, empType, empPoint)
      VALUES('$empId', '$empName', '$empType', '$empPoint')";
      if($this->conn->query($post)) {
        return true;
      }
      else {
        return false;
      }
    $this->conn->close();
  }

  /**
   * addedByUser
   *
   * @return mixed.
   */
  public function addedByUser() {
    $fetch = "SELECT * FROM addByUser";
    $result = $this->conn->query($fetch);
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        $this->selectedEmp[] = $row;
      }
      return $this->selectedEmp;
    }
    return null;

    $this->conn->close();
  }

}

?>
