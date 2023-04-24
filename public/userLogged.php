<div class = "d-flex justify-content-around">
  <div>
    <h2>Select employee from given list</h2>
    <div>
     <?php if(isset($_SESSION['addedEmp'])) { ?>
      <?php foreach($_SESSION['addedEmp'] as $rowWise) { ?>
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
          <li>
            <button class="addEmp btn btn-primary" data-id = "<?php echo $rowWise['empId']; ?>"
            data-point = "<?php echo $rowWise['empPoint']; ?>">Add</button>
          </li>
        </ul>
      <?php } ?>
    <?php } ?>
    </div>
  </div>
  <div>
    <h2>Already your selected employee</h2>
    <div id = "selected-data"></div>
  </div>
</div>
