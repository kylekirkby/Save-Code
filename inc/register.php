<?php
require_once('recaptchalib.php');

error_reporting(0);

	$email = htmlspecialchars(mysql_real_escape_string($_POST['newEmail']));
	$password = md5(mysql_real_escape_string($_POST['newPassword']));
	$firstName = htmlspecialchars(mysql_real_escape_string($_POST['newFirstName']));
	$lastName = htmlspecialchars(mysql_real_escape_string($_POST['newLastName']));

	$hostname = "saveCode.db.11797549.hostedresource.com";
    $username = "saveCode";
    $dbname = "saveCode";
    $password = "";
    $usertable = "saveCode";


  $privatekey = "6LdPZvESAAAAAD4Ap9poXDWXD733eP6FTLpjHhH5";
  $resp = recaptcha_check_answer ($privatekey,
                                $_SERVER["REMOTE_ADDR"],
                                $_POST["recaptcha_challenge_field"],
                                $_POST["recaptcha_response_field"]);

  if (!$resp->is_valid) {
    // recaptcha entered wrong!

  		echo '<div class="alert alert-warning alert-dismissable">
								  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
								  <strong>Recaptcha Incorrect!</strong> <br/><span id="alertContent">The reCpatcha text you entered did not match!</span>
								</div>';


  } else {

  	//recaptcha was correct!



  	echo "Proceeding!";








  }



          



?>