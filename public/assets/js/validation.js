//Creating the object for userValidity class
regObj = new UserValidity();

/**
 * checkEmailStatus is responsible for checking the validations of user's email feild.
 * When user entered their email then onblur this function will be execute.
 * First it will fetch the what user entered and then call a function for checking
 * the validations of entered value.
 * If user entered valid then show a success otherwise it will show a error message.
 */
function checkEmailStatus() {
  var userEmail = document.getElementById('email').value;
  var status = regObj.checkEmail(userEmail);
  if(status) {
    document.getElementById("email_success").innerText = ``;
    document.getElementById("email_status").innerText = `Enter valid email`;
    document.getElementById("submitBtn").disabled = true;
  }
  else {
    document.getElementById("email_status").innerText = ``;
    document.getElementById("email_success").innerText = `Valid email`;
    document.getElementById("submitBtn").disabled = false;
  }
}

/**
 * checkPasswordStatus is responsible for checking the validations of user's password feild.
 * When user entered their password then onblur this function will be execute.
 * First it will fetch what user entered and then call a function for checking
 * the validations of entered value.
 * If user entered valid then show success message otherwise it will show a error message.
 */
function checkPasswordStatus() {
  var userPwd = document.getElementById('pwd').value;
  var status = regObj.checkPasswords(userPwd);
  if(status) {
    document.getElementById("pwd_success").innerText = ``;
    document.getElementById("pwd_status").innerText = `Enter valid password`;
    document.getElementById("submitBtn").disabled = true;
  }
  else {
    document.getElementById("pwd_status").innerText = ``;
    document.getElementById("pwd_success").innerText = `Valid password`;
    document.getElementById("submitBtn").disabled = false;
  }
}
