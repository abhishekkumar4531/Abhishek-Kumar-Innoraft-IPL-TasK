<?php
 // This only used for display purpose of all the selected data from database.
  session_start();
  require '../../database.php';

  $obj = new Database();

  $selectedData = $obj->addedByUser();
?>
<?php
  // If user's already selcted some data then show here otherwise seleted item
  // list will be empty.
  if($selectedData != null) { ?>
  <?php foreach($selectedData as $rowWise) { ?>
    <ul class = "d-flex justify-content-between border border-2 p-2 text-denger bg-white">
      <li>
        <?php echo $rowWise['empId']; ?>
      </li>
      <li>
        <?php echo $rowWise['empName']; ?>
      </li>
      <li>
        <?php echo $rowWise['empType']; ?>
      </li>
      <li>
        <?php echo $rowWise['empPoint']; ?>
      </li>
    </ul>
  <?php } ?>
<?php } ?>
