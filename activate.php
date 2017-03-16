<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>SaveCode</title>

	<!--link rel="stylesheet/less" href="less/bootstrap.less" type="text/css" /-->
	<!--link rel="stylesheet/less" href="less/responsive.less" type="text/css" /-->
	<!--script src="js/less-1.3.3.min.js"></script-->
	<!--append ‘#!watch’ to the browser URL, then refresh the page. -->
	
	<link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="./res/css/main.css" type="text/css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">

  <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
  <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
  <![endif]-->

  <!-- Fav and touch icons -->
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="img/apple-touch-icon-144-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="img/apple-touch-icon-114-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="img/apple-touch-icon-72-precomposed.png">
  <link rel="apple-touch-icon-precomposed" href="img/apple-touch-icon-57-precomposed.png">
  <link rel="shortcut icon" href="img/favicon.ico">
  
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/scripts.js"></script>
	<script type="text/javascript">

	$(document).ready(function(){

		$('.splashScreen').show();

	});

	</script>
    <!--				
				 var refreshId = setInterval(function(){ //SYNTAX ERROR HERE
        $.load('timeonpage.php?wzx=<?php echo $t; ?>&ip=<?php echo $ip; ?>');
    }, 5000);
-->

    
</head>

<body>

	<?php
  $bg = array('bg1.jpg', 'bg2.jpg', 'bg3.jpg', 'bg4.jpg'); // array of filenames

  $i = rand(0, count($bg)-1); // generate random number size of the array

  $selectedBg = $bg[$i]; // set variable equal to which random filename was chosen

?>
<div class="splashScreen" style="background-image:url(../../img/<? echo $selectedBg;?>);">
<?php


	

    $hostname = "saveCode.db.11797549.hostedresource.com";
    $username = "saveCode";
    $dbname = "saveCode";
    $passwordDB = "Aeiou2012!";
    $usertable = "saveCode";

    mysql_connect($hostname, $username, $passwordDB) OR DIE ("Unable to 
            connect to database! Please try again later.");

    mysql_select_db($dbname);

    $key = strip_tags(mysql_real_escape_string($_GET['key']));



    if($key != ""){


    	$query = mysql_query("SELECT * FROM appUsers WHERE activatedCode = '$key'") or die("Mysql error 1");
    	$row = mysql_fetch_assoc($query);



    	if(mysql_num_rows($query) == 1){
    			//account found -- update activated status in mysql

    			if($row['activated'] == "false"){

    					//account not activated

    					$query2 = mysql_query("UPDATE appUsers SET activated='true' WHERE activatedCode='$key'") or die("Mysql Error when updating users!");


    					echo '<div class="accountActive">
					<h1>Activation Successful!</h1>
					<p>Your account has been verfied and activated! Now get pasting...<br/><a href="index.php"><button class="btn btn-primary">Go</button></a></p>
				      </div>
				            
				</div>';




    			}else {

    					///account already activated!

    				echo '<div class="accountActive">
				<h1>Account already activated!</h1>
				<p>Your account has already been activated!</p>
			      </div>
			            
			</div>';

    			}


    	}
    	else {
    		//account not found

    		echo '<div class="accountActive">
				<h1>Activation Failed</h1>
				<p>No account has been found with that key! <a href="resend.php">Resend activation email</a></p>
			      </div>
			            
			</div>';

    	}




    }
    else {

    	//no key supplied

    	echo '<div class="accountActive">
				<h1>Activation Failed</h1>
				<p>No key was supplied for us to activate your account. <a href="resend.php">Resend activation email</a></p>
			      </div>
			            
			</div>';

    }





?>




</body>
</html>
