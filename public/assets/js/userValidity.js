/**
 * Validity class is responsible for Form-Validation using JavaScript.
 */
class UserValidity{

  check_email = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
  check_pwd = /^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})/;

  /**
   * checkEmail is a parametrised method which is responsible for the validation
   * of user email.
   *
   *   @param string userEmail
   *     It stores the user phone number.
   *
   *   @returns boolean
   *     If userPhone invalid then return true otherwise false
   */
  checkEmail(userEmail){
    if(!(userEmail.match(this.check_email))) {
      return true;
    }
    return false;
  }

  /**
   * checkPasswords is a parametrised method which is responsible for the
   * validation of user passwords.
   *
   *   @param string userPwd
   *     It stores the user password.
   *   @returns boolean
   *     If userPwd invalid then return true otherwise false
   */
  checkPasswords(userPwd){
    if(!(userPwd.match(this.check_pwd))) {
      return true;
    }
    return false;
  }
}
