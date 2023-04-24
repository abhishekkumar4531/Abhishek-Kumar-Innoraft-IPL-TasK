<div class = "d-flex justify-content-around">
  <div>
    <h2>Add new Employee</h2>
    <form action="src/admin.php" method="post">
      <dl>
        <dt>Enter employee-id</dt>
        <dd>
          <input type="text" name = "empId" id = "empId" class = "form-control"
          placeholder = "Enter employee id" required>
        </dd>
        <dt>Enter employee-name</dt>
        <dd>
          <input type="text" name = "empName" id = "empName" class = "form-control"
          placeholder = "Enter employee name" required>
        </dd>
        <dt>Select employee-type</dt>
        <dd>
          <select name = "empType" id = "empType" class = "form-select">
            <option value = "Batsman">Batsman</option>
            <option value = "Bowler">Bowler</option>
            <option value = "All-Rounder">All Rounder</option>
          </select>
        </dd>
        <dt>Enter employee-point</dt>
        <dd>
          <input type="text" name = "empPoint" id = "empPoint" class = "form-control"
          placeholder = "Enter employee point" required>
        </dd>

        <dd>
          <button class = "btn btn-primary" id = "addAdmin" name = "addAdmin">Add to list</button>
        </dd>
      </dl>
    </form>
  </div>
  <div>
    <h2>Added Employee list</h2>
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
        </ul>
      <?php } ?>
    <?php } ?>
  </div>
</div>
