<?php


	$key = strip_tags(mysql_real_escape_string($_GET['key']));



    $hostname = "saveCode.db.11797549.hostedresource.com";
    $username = "saveCode";
    $dbname = "saveCode";
    $passwordDB = "Aeiou2012!";
    $usertable = "saveCode";

    mysql_connect($hostname, $username, $passwordDB) OR DIE ("Unable to 
            connect to database! Please try again later.");

    mysql_select_db($dbname);


    if($key != ""){


    	$query = mysql_query("SELECT * FROM appUsers WHERE activatedCode = '$key'") or die("Mysql error 1");
    	$row = mysql_fetch_assoc($query);



    	if(mysql_num_rows($query) == 1){
    			//account found -- update activated status in mysql

    			if($row['activated'] == "false"){

    					//account not activated

    					$query2 = mysql_query("UPDATE appUsers SET activated='true' WHERE activatedCode='$key'") or die("Mysql Error when updating users!");







    			}else {

    					///account already activated!

    			}


    	}
    	else {
    		//account not found

    	}




    }
    else {

    	//no key supplied

    }





?>
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
    <!--				
				 var refreshId = setInterval(function(){ //SYNTAX ERROR HERE
        $.load('timeonpage.php?wzx=<?php echo $t; ?>&ip=<?php echo $ip; ?>');
    }, 5000);
-->
    <script type="text/javascript">
	
		$(document).ready(function(){

			$.get( "test.php?value=hello", function( data ) {
				  //$( ".alertBox" ).html( data );
				  alert( "Load was performed." );
				});



			 $("#loginForm").submit( function () {    
	              $.post(
	               './inc/login.php',
	                $(this).serialize(),
	                function(data){
	                  $(".alertBoxLogin").html(data)
	                }
	              );
	              return false;   
	            });   

			 $("#pasteCodeForm").submit( function () {    
	              $.post(
	               './inc/register.php',
	                $(this).serialize(),
	                function(data){
	                  $("#alertBoxPaste").html(data)

	                }
	              );
	              return false;   
	            });   


			 $("#createAccountForm").submit( function () {    
	              $.post(
	               './inc/createAccount.php',
	                $(this).serialize(),
	                function(data){
	                  $("#alertBoxAccount").html(data);
	                  $('#createAccountForm').trigger("reset");
	                }
	              );
	              return false;   
	            });   



			function signUp(){




					var form = new FormData($('#signUp')[0]);

					form.append('view_type','addtemplate');
					$.ajax({
					    type: "POST",
					    url: "test.php",
					    data: form,
					    cache: false,
					    contentType: false,
					    processData: false,
					    success:  function(data){
					        //alert("---"+data);
					        alert("Settings has been updated successfully.");
					        window.location.reload(true);
					    }
					});




			}





				
			$("#splashScreenBtn").click(function(){
				
				$(".splashScreen").fadeOut("slow");
				
				$.cookie("getStarted", "true");
				
				});
				

			});



	
	</script>
    
    
</head>

<body>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_GB/all.js#xfbml=1&appId=1435559816684789";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<footer class="footerPanel">
		
		<span> Developed by <a href="http://www.krixywebdesign.co.uk">Kyle Kirkby</a> | Copyright 2014</span>

	</footer>
	<?php
  $bg = array('bg1.jpg', 'bg2.jpg', 'bg3.jpg', 'bg4.jpg'); // array of filenames

  $i = rand(0, count($bg)-1); // generate random number size of the array

  $selectedBg = $bg[$i]; // set variable equal to which random filename was chosen

?>
<div class="splashScreen" style="background-image:url(../../img/<? echo $selectedBg;?>);">

<div class="jumbotron greetBox">
				<h1>
					print('Welcome Coders!')</h1>
				<p>SaveCode.co.uk is a web app which allows you to easily and quicly share your code and manage all your pastes. Sign up now and get pasting!</p>
				<p>
					<a id="splashScreenBtn" class="btn btn-primary btn-large getStartedBtn" href="#">Get Started</a>
				</p>
      </div>
            
</div>


</body>
</html>
