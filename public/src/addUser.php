<?php
 // This file is select the data from avilable list and in selected list.
  session_start();
  require '../../database.php';

  $empId = $_POST['empId'];
  $empPoint = $_POST['empPoint'];

  $empId = number_format($empId);

  $obj = new Database();

  $status = $obj->addByUser($empId);

  if($status) {
    echo true;
  }
  else {
    echo false;
  }
?>
