<?php

error_reporting();



    $hostname = "saveCode.db.11797549.hostedresource.com";
    $username = "saveCode";
    $dbname = "saveCode";
    $passwordDB = "";
    $usertable = "saveCode";

    mysql_connect($hostname, $username, $passwordDB) OR DIE ("Unable to 
            connect to database! Please try again later.");

    mysql_select_db($dbname);



  $email = strip_tags(mysql_real_escape_string($_POST['newEmail']));
  $password = md5(strip_tags(mysql_real_escape_string($_POST['newPassword'])));
  $firstName = strip_tags(mysql_real_escape_string($_POST['newFirstName']));
  $lastName = strip_tags(mysql_real_escape_string($_POST['newLastName']));





  if($email != "" && $password != "" && $firstName != "" && $lastName != ""){


    $query = mysql_query("SELECT * FROM appUsers WHERE email = '$email'") or die("Mysql Error 1");

    if (mysql_num_rows($query) == 0){
      //email is not in use

      $activated = "false";
      $activatedCode = md5($email + time());
      $registeredDate = time();

        $newQuery = mysql_query("INSERT INTO appUsers(firstName,lastName,password,email,activated,activatedCode,registeredDate) 
          VALUES('$firstName','$lastName','$password','$email','$activated','$activatedCode',NOW())") or die("Mysql Error 2");

        echo "";
        //send user activation email




            $from = 'SaveCode@savecode.co.uk!'; // sender
            $subject = "SaveCode - User Activation";
             $message = "Please click the link below to complete the activation of your account! \nLink:http://www.savecode.co.uk/activate.php?key=".$activatedCode;


            // message lines should not exceed 70 characters (PHP rule), so wrap it
            $message = wordwrap($message, 70);
            // send mail
            mail($email,$subject,$message,"From: $from\n");
            





        echo '<div class="alert alert-success alert-dismissable">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <strong>Activation Email Sent!</strong> <br/><span id="alertContent">Please click the activation link in the email we just sent you!</span>
                </div>';




    }
    else {


      echo '<div class="alert alert-warning alert-dismissable">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <strong>Email already in use!</strong> <br/><span id="alertContent">The email you entered is already in use!</span>
                </div>';





    }






}
else {

    echo '<div class="alert alert-warning alert-dismissable">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <strong>Fields are empty!</strong> <br/><span id="alertContent">All fields are required to be filled in.</span>
                </div>';


}
?>