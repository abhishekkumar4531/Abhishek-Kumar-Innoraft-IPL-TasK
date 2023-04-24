$( document ).ready(function() {

  $(document).on('click','.addEmp',function(e){
    var emp_id = $(this).data("id");
    var emp_point = $(this).data("point");
    addEmp(emp_id, emp_point);
  });

  function addEmp(emp_id, emp_point) {
    // var item_id = $(this).data("id");
    $.ajax({
      type: "POST",
      url: "/src/addUser.php",
      data: {empId : emp_id, empPoint : emp_point},

      success: function(data) {
        if(data) {
          displayListData();
        }
        else {
          alert("Check error after deletion!!!");
        }
      }
    });
  }


  function displayListData() {
    $.ajax({
      type: "POST",
      url: "/src/displayUser.php",

      success: function(data) {
        $("#selected-data").html(data);
      }
    });
  }

  displayListData();
});
