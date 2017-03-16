<?php
error_reporting(0);
session_start();


			$hostname = "saveCode.db.11797549.hostedresource.com";
            $username = "saveCode";
            $dbname = "saveCode";
            $passwordDB = "";
            $usertable = "saveCode";
          
        
            //Connecting to your database
            mysql_connect($hostname, $username, $passwordDB) OR DIE ("Unable to 
            connect to database! Please try again later.");

            mysql_select_db($dbname);



			$email = mysql_real_escape_string($_POST['email']);
			$password = md5(mysql_real_escape_string($_POST['password']));


            if(!empty($email) && !empty($password)){


            $query = mysql_query("SELECT * FROM `appUsers` WHERE `email`='".$email."'");

            if(mysql_num_rows($query) == 1){

            		//email is in database


            		$newQuery = mysql_query("SELECT * FROM `appUsers` WHERE `email`='".$email."' AND `password`='".$password."'");
                        $row = mysql_fetch_assoc($newQuery);
            		if(mysql_num_rows($newQuery) == 1){

                              if($row['activated'] == 'true'){
            				//login the user

            				$row = mysql_fetch_array($newQuery);


                  
            				$_SESSION["userEmail"] = $email;


            				header("Location:../index.php?page=account");
                              }
                              else {

                                    echo '<div class="alert alert-warning alert-dismissable">
                                                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                  <strong>Account not activated!</strong> <br/><span id="alertContent">Your account has not been activated! Please check your email or <a href="resend.php">resend email.</a></span>
                                                </div>';


                              }


            		}
            		else {

            				echo '<div class="alert alert-warning alert-dismissable">
								  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
								  <strong>Password incorrect!</strong> <br/><span id="alertContent">The emailn is in our database but the password is incorrect!</span>
								</div>';


            		}

            }
            else{


            		//Email is not in database


            		echo '<div class="alert alert-warning alert-dismissable">
								  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
								  <strong>Email is not database!</strong> <br/><span id="alertContent">The email entered has not been found!</span>
								</div>';


            }

      }

      else{

                  echo '<div class="alert alert-warning alert-dismissable">
                                                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                  <strong>Fields are empty!</strong> <br/><span id="alertContent">Some fields were not filled in! Please fill in all fields of the form!</span>
                                                </div>';


      }


?>