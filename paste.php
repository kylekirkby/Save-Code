<?php
session_start();
      //Written by CrouchingTiger

            require('./inc/recaptchalib.php');

            $hostname = "saveCode.db.11797549.hostedresource.com";
            $username = "saveCode";
            $dbname = "saveCode";
            $passwordDB = "";
            $usertable = "saveCode";
          
        
            //Connecting to your database
            mysql_connect($hostname, $username, $passwordDB) OR DIE ("Unable to 
            connect to database! Please try again later.");

            mysql_select_db($dbname);


            $pasteCode = mysql_real_escape_string($_POST['pasteCode']);
            $pasteTitle = strip_tags(mysql_real_escape_string($_POST['pasteTitle']));
            $pasteDescription = strip_tags(mysql_real_escape_string($_POST['pasteDescription']));
            $pasteLanguage = strip_tags(mysql_real_escape_string($_POST['pasteLanguage']));
            $pasteVisibility = strip_tags(mysql_real_escape_string($_POST['pasteVisibility']));


            $privatekey = "6LdPZvESAAAAAD4Ap9poXDWXD733eP6FTLpjHhH5";
            $resp = recaptcha_check_answer ($privatekey,$_SERVER["REMOTE_ADDR"],$_POST["recaptcha_challenge_field"],$_POST["recaptcha_response_field"]);

              if (!$resp->is_valid) {
                // recaptcha entered wrong!

                        echo '<div class="alert alert-warning alert-dismissable">
                                                              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                              <strong>Recaptcha Incorrect!</strong> <br/><span id="alertContent">The reCpatcha text you entered did not match!</span>
                                                            </div>';

              } 
                  else {

                  //recaptcha was correct!


                              if(isset($pasteCode)){

                                          if(isset($pasteTitle)){
                                                //paste title exists

                                                      if(!empty($pasteLanguage)){

                                                            //paste language type exists


                                                            if($pasteVisibility == "public" || $pasteVisibility == "private"){

                                                                  //Upload code to database
                                                                  
                                                                  if(isset($_SESSION['userEmail'])){

                                                                        $userType = "Member";

                                                                        $email = mysql_real_escape_string($_SESSION['userEmail']);

                                                                        $getId = mysql_query("SELECT * FROM `appUsers` WHERE email='$email' ");
                                                                        $row = mysql_fetch_assoc($getId);
                                                                        $userId = $row['id'];

                                                            
                                                                  }
                                                                  else{
                                                                        $userType = "Guest";
                                                                        $userId = "Guest";
                                                                  }

                                                                  $pasteTimestamp = time();
                                                                  $pasteViewCount = 0;



                                                                  $query = mysql_query("INSERT INTO 
                                                                        `appPastes`(id,userType,userId,pasteLanguage,pasteTimestamp,pasteTitle,pasteDescription,pasteViewCount,paste,pasteVisibility)
                                                                        VALUES('','$userType','$userId','$pasteLanguage','$pasteTimestamp','$pasteTitle','$pasteDescription','$pasteViewCount','$pasteCode','$pasteVisibility') ");


                                                                  echo '<div class="alert alert-success alert-dismissable">
                                                              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                              <strong>Your code has been pasted!</strong> <br/><span id="alertContent">Successfully pasted!</span>
                                                            </div>'; 

                                                            }

                                                            else {
                                                                  //visibilty not there
                                                                     echo '<div class="alert alert-warning alert-dismissable">
                                                              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                              <strong>Your visibilty is invisible!</strong> <br/><span id="alertContent">We need to know who to show your paste to!</span>
                                                            </div>';   

                                                            }

                                                      }

                                                      else {

                                                            //no paste language

                                                            echo '<div class="alert alert-warning alert-dismissable">
                                                              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                              <strong>No Code Language!</strong> <br/><span id="alertContent">We need a language so we know how to highlight your code!</span>
                                                            </div>';


                                                      }

                                          }

                                          else {
                                                //no paste title 

                                                echo '<div class="alert alert-warning alert-dismissable">
                                                              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                              <strong>No title!</strong> <br/><span id="alertContent">We require a title to keep your code organised!</span>
                                                            </div>';


                                          }

                              }
                              else {

                                    echo '<div class="alert alert-warning alert-dismissable">
                                                              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                              <strong>Paste empty!</strong> <br/><span id="alertContent">Stop fooling around and slap some code in that box!</span>
                                                            </div>';


                              }







              }







?>


