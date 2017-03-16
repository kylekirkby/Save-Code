<?
session_start();
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

  <!--[if IE]>
<meta http-equiv="refresh" content="0; url=http://google.com/chrome" />
<![endif]-->

  <!-- Fav and touch icons -->
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="img/apple-touch-icon-144-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="img/apple-touch-icon-114-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="img/apple-touch-icon-72-precomposed.png">
  <link rel="apple-touch-icon-precomposed" href="img/apple-touch-icon-57-precomposed.png">
  <link rel="shortcut icon" href="img/favicon.ico">
  
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/jquery.cookie.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/scripts.js"></script>
    <script type="text/javascript">
	
		$(document).ready(function(){




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
	               './paste.php',
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


			if($.cookie("getStarted")){
				$(".splashScreen").hide();
				$(".greetBox").hide();
			}
			else {

				$(".splashScreen").fadeIn("slow");

				
			$("#splashScreenBtn").click(function(){
				
				$(".splashScreen").fadeOut("slow");

				
				$.cookie("getStarted", true);
				
				});


				}

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
<div class="left-sidebar">

<div class="logo">


</div><br/><br/>
        
<div class="panel-group" id="panel-131323">
				<div class="panel panel-default">
					<div class="panel-heading">
						 <a class="panel-title" data-toggle="collapse"  data-parent="#panel-131323" href="#panel-element-240486">Save Code</a>
					</div>
					<div id="panel-element-240486" class="panel-collapse collapse">
						<div class="panel-body panelContent">
		<ul class="nav nav-pills nav-stacked">
				<li class="active">
					<a href="#">Discover</a>
				</li>
				<li>
					<a href="#">Share</a>
				</li>
				<li>
					<a href="#">Organise</a>
				</li>
				
			</ul>
						</div>
					</div>
				</div>
  <div class="panel panel-default">
					<div class="panel-heading">
						 <a class="panel-title collapsed" data-toggle="collapse" data-parent="#panel-131323" href="#panel-element-296400">Account</a>
					</div>
					<div id="panel-element-296400" class="panel-collapse collapse in">
						<div class="panel-body">
							Please Login:<br/><br/>
							<div class="alertBoxLogin">

							</div>
                            <form class="form-horizontal" role="form" method="post" id="loginForm">
				<div class="form-group">
					 
					<div class="col-sm-10">
					<!--[if IE]>
<label><strong>Email</strong></label>
<![endif]-->	

						<input class="form-control" id="inputEmail3" name="email" type="email" placeholder="Email">
					</div>
				</div>
				<div class="form-group">
				
					<div class="col-sm-10">
			<!--[if IE]>
<label><strong>Password</strong></label>
<![endif]-->	
						<input class="form-control" id="inputPassword3" name="password" type="password" placeholder="Password">
					</div>
				</div>
				<div class="form-group">
					<div class=" col-sm-10">
						 <button type="submit" name="submit" class="btn btn-primary">Sign in</button>
					</div>
				</div>
			</form>
			<hr/><br/>
			<a href="#"><div class="facebookLogin"></div></a><br/>
			Or Sign up:<br/><br/><div id="alertBoxAccount">

							</div><br/>

                            <form class="form-horizontal" role="form" name="createAccountForm" id="createAccountForm" action="" method="post">
                            <div class="form-group">
				
					<div class="col-sm-10">
								<!--[if IE]>
<label><strong>First Name</strong></label>
<![endif]-->	
						<input class="form-control" id="inputEmail3" name="newFirstName" type="text" placeholder="Your First Name">
					</div>
				</div>
				<div class="form-group">
				
					<div class="col-sm-10">
								<!--[if IE]>
<label><strong>Last Name</strong></label>
<![endif]-->	
						<input class="form-control" id="inputEmail3" name="newLastName" type="text" placeholder="Your First Name">
					</div>
				</div>
				<div class="form-group">
				
					<div class="col-sm-10">
								<!--[if IE]>
<label><strong>Your Email</strong></label>
<![endif]-->	
						<input class="form-control" id="inputEmail3" name="newEmail" type="email" placeholder="Your Email">
					</div>
				</div>
				
				<div class="form-group">
			
					<div class="col-sm-10">
								<!--[if IE]>
<label><strong>Your Password</strong></label>
<![endif]-->	
						<input class="form-control" id="inputPassword3" name="newPassword" type="password" placeholder="Your Password">
					</div>
				</div>

		
					<div class="form-group">
					<div class=" col-sm-10">
						 <button type="submit" class="btn btn-primary" onclick="signUp();">Create Account</button>
					</div>
				</div>
			</form>


	</div>



	

    </div>

    <div class="main-content">

    
       <div class="row clearfix">
		<div class="col-md-12 column">


			<div class="mainContentNav">
				        <ul class="nav nav-pills">
						    <li class="active">
						    <a href="/">Home</a>
						    </li>
						    <li><a href="/trending">Trending</a></li>
						    <li><a href="/recent">Most Recent</a></li>
					    </ul>
			</div>

		<div class="mainFormArea">
						<form name="pasteCodeForm" id="pasteCodeForm" method="POST">

						<div class="formArea">

						<!--[if IE]>
						<label><strong>Paste Code</strong></label><br/>
						<![endif]-->	
							<textarea class="pasteCodeArea" placeholder="Paste your code here..." name="pasteCode" spellcheck='false' ></textarea><br/>
															<!--[if IE]>
						<label><strong>Paste Title (optional)</strong></label><br/>
						<![endif]-->	
						<input class="form-control" id="pasteTitle1" name="pasteTitle" type="text" spellcheck="false" placeholder="Paste Title">
						<!--[if IE]>
						<label><strong>Paste Description (optional)</strong></label><br/>
						<![endif]-->
						<textarea name="pasteDescription" id="textarea1" spellcheck="fasle" id="pasteDescription" placeholder="Paste Description (optional)"></textarea>
						<br/>

		
						<div class="privateBtns">
							<input type="radio" name="pasteVisibility" id="optionsRadios1" value="private"> Private<br/>
							<input type="radio" name="pasteVisibility" id="optionsRadios2" value="public" checked="true"> Public <br/><br/>
		
						</div>

						<div class="form-group">
													 
													<!--[if IE]>
								<label><strong>Language</strong></label>
								<![endif]-->	
							<br/>
							<select name="pasteLanguage" class="form-control languageInput" >
								<option value="4cs">GADV 4CS</option>
								<option value="6502acme">MOS 6502 (6510) ACME Cross Assembler format</option>
								<option value="6502kickass">MOS 6502 (6510) Kick Assembler format</option>
								<option value="6502tasm">MOS 6502 (6510) TASM/64TASS 1.46 Assembler format</option>
								<option value="68000devpac">Motorola 68000 - HiSoft Devpac ST 2 Assembler format</option>
								<option value="abap">ABAP</option>
								<option value="actionscript">ActionScript</option>
								<option value="actionscript3">ActionScript 3</option>
								<option value="ada">Ada</option>
								<option value="aimms">AIMMS3</option>
								<option value="algol68">ALGOL 68</option>
								<option value="apache">Apache configuration</option>
								<option value="applescript">AppleScript</option>
								<option value="apt_sources">Apt sources</option>
								<option value="arm">ARM ASSEMBLER</option>
								<option value="asm">ASM</option>
								<option value="asp">ASP</option>
								<option value="asymptote">asymptote</option>
								<option value="autoconf">Autoconf</option>
								<option value="autohotkey">Autohotkey</option>
								<option value="autoit">AutoIt</option>
								<option value="avisynth">AviSynth</option>
								<option value="awk">awk</option>
								<option value="bascomavr">BASCOM AVR</option>
								<option value="bash">Bash</option>
								<option value="basic4gl">Basic4GL</option>
								<option value="bf">Brainfuck</option>
								<option value="bibtex">BibTeX</option>
								<option value="blitzbasic">BlitzBasic</option>
								<option value="bnf">bnf</option>
								<option value="boo">Boo</option>
								<option value="c">C</option>
								<option value="c_loadrunner">C (LoadRunner)</option>
								<option value="c_mac">C (Mac)</option>
								<option value="c_winapi">C (WinAPI)</option>
								<option value="caddcl">CAD DCL</option>
								<option value="cadlisp">CAD Lisp</option>
								<option value="cfdg">CFDG</option>
								<option value="cfm">ColdFusion</option>
								<option value="chaiscript">ChaiScript</option>
								<option value="chapel">Chapel</option>
								<option value="cil">CIL</option>
								<option value="clojure">Clojure</option>
								<option value="cmake">CMake</option>
								<option value="cobol">COBOL</option>
								<option value="coffeescript">CoffeeScript</option>
								<option value="cpp">C++</option>
								<option value="cpp-qt" class="sublang">&nbsp;&nbsp;C++ (Qt)</option>
								<option value="cpp-winapi" class="sublang">&nbsp;&nbsp;C++ (WinAPI)</option>
								<option value="csharp">C#</option>
								<option value="css">CSS</option>
								<option value="cuesheet">Cuesheet</option>
								<option value="d">D</option>
								<option value="dart">Dart</option>
								<option value="dcl">DCL</option>
								<option value="dcpu16">DCPU-16 Assembly</option>
								<option value="dcs">DCS</option>
								<option value="delphi">Delphi</option>
								<option value="diff">Diff</option>
								<option value="div">DIV</option>
								<option value="dos">DOS</option>
								<option value="dot">dot</option>
								<option value="e">E</option>
								<option value="ecmascript">ECMAScript</option>
								<option value="eiffel">Eiffel</option>
								<option value="email">eMail (mbox)</option>
								<option value="epc">EPC</option>
								<option value="erlang">Erlang</option>
								<option value="euphoria">Euphoria</option>
								<option value="ezt">EZT</option>
								<option value="f1">Formula One</option>
								<option value="falcon">Falcon</option>
								<option value="fo">FO (abas-ERP)</option>
								<option value="fortran">Fortran</option>
								<option value="freebasic">FreeBasic</option>
								<option value="freeswitch">FreeSWITCH</option>
								<option value="fsharp">F#</option>
								<option value="gambas">GAMBAS</option>
								<option value="gdb">GDB</option>
								<option value="genero">genero</option>
								<option value="genie">Genie</option>
								<option value="gettext">GNU Gettext</option>
								<option value="glsl">glSlang</option>
								<option value="gml">GML</option>
								<option value="gnuplot">Gnuplot</option>
								<option value="go">Go</option>
								<option value="groovy">Groovy</option>
								<option value="gwbasic">GwBasic</option>
								<option value="haskell">Haskell</option>
								<option value="haxe">Haxe</option>
								<option value="hicest">HicEst</option>
								<option value="hq9plus">HQ9+</option>
								<option value="html4strict">HTML</option>
								<option value="html5">HTML5</option>
								<option value="icon">Icon</option>
								<option value="idl">Uno Idl</option>
								<option value="ini">INI</option>
								<option value="inno">Inno</option>
								<option value="intercal">INTERCAL</option>
								<option value="io">Io</option>
								<option value="ispfpanel">ISPF Panel</option>
								<option value="j">J</option>
								<option value="java">Java</option>
								<option value="java5">Java(TM) 2 Platform Standard Edition 5.0</option>
								<option value="javascript">Javascript</option>
								<option value="jcl">JCL</option>
								<option value="jquery">jQuery</option>
								<option value="kixtart">KiXtart</option>
								<option value="klonec">KLone C</option>
								<option value="klonecpp">KLone C++</option>
								<option value="latex">LaTeX</option>
								<option value="lb">Liberty BASIC</option>
								<option value="ldif">LDIF</option>
								<option value="lisp">Lisp</option>
								<option value="llvm">LLVM Intermediate Representation</option>
								<option value="locobasic">Locomotive Basic</option>
								<option value="logtalk">Logtalk</option>
								<option value="lolcode">LOLcode</option>
								<option value="lotusformulas">Lotus Notes @Formulas</option>
								<option value="lotusscript">LotusScript</option>
								<option value="lscript">LScript</option>
								<option value="lsl2">LSL2</option>
								<option value="lua">Lua</option>
								<option value="m68k">Motorola 68000 Assembler</option>
								<option value="magiksf">MagikSF</option>
								<option value="make">GNU make</option>
								<option value="mapbasic">MapBasic</option>
								<option value="matlab">Matlab M</option>
								<option value="mirc">mIRC Scripting</option>
								<option value="mmix">MMIX</option>
								<option value="modula2">Modula-2</option>
								<option value="modula3">Modula-3</option>
								<option value="mpasm">Microchip Assembler</option>
								<option value="mxml">MXML</option>
								<option value="mysql">MySQL</option>
								<option value="nagios">Nagios</option>
								<option value="netrexx">NetRexx</option>
								<option value="newlisp">newlisp</option>
								<option value="nginx">nginx</option>
								<option value="nsis">NSIS</option>
								<option value="oberon2">Oberon-2</option>
								<option value="objc">Objective-C</option>
								<option value="objeck">Objeck Programming Language</option>
								<option value="ocaml">OCaml</option>
								<option value="ocaml-brief" class="sublang">&nbsp;&nbsp;OCaml (brief)</option>
								<option value="octave">GNU/Octave</option>
								<option value="oobas">OpenOffice.org Basic</option>
								<option value="oorexx">ooRexx</option>
								<option value="oracle11">Oracle 11 SQL</option>
								<option value="oracle8">Oracle 8 SQL</option>
								<option value="oxygene">Oxygene (Delphi Prism)</option>
								<option value="oz">OZ</option>
								<option value="parasail">ParaSail</option>
								<option value="parigp">PARI/GP</option>
								<option value="pascal">Pascal</option>
								<option value="pcre">PCRE</option>
								<option value="per">per</option>
								<option value="perl">Perl</option>
								<option value="perl6">Perl 6</option>
								<option value="pf">OpenBSD Packet Filter</option>
								<option value="php" selected="selected">PHP</option>
								<option value="php-brief" class="sublang">&nbsp;&nbsp;PHP (brief)</option>
								<option value="pic16">PIC16</option>
								<option value="pike">Pike</option>
								<option value="pixelbender">Pixel Bender 1.0</option>
								<option value="pli">PL/I</option>
								<option value="plsql">PL/SQL</option>
								<option value="postgresql">PostgreSQL</option>
								<option value="povray">POVRAY</option>
								<option value="powerbuilder">PowerBuilder</option>
								<option value="powershell">PowerShell</option>
								<option value="proftpd">ProFTPd configuration</option>
								<option value="progress">Progress</option>
								<option value="prolog">Prolog</option>
								<option value="properties">PROPERTIES</option>
								<option value="providex">ProvideX</option>
								<option value="purebasic">PureBasic</option>
								<option value="pycon">Python (console mode)</option>
								<option value="pys60">Python for S60</option>
								<option value="python">Python</option>
								<option value="q">q/kdb+</option>
								<option value="qbasic">QBasic/QuickBASIC</option>
								<option value="racket">Racket</option>
								<option value="rails">Rails</option>
								<option value="rbs">RBScript</option>
								<option value="rebol">REBOL</option>
								<option value="reg">Microsoft Registry</option>
								<option value="rexx">rexx</option>
								<option value="robots">robots.txt</option>
								<option value="rpmspec">RPM Specification File</option>
								<option value="rsplus">R / S+</option>
								<option value="ruby">Ruby</option>
								<option value="rust">Rust</option>
								<option value="sas">SAS</option>
								<option value="scala">Scala</option>
								<option value="scheme">Scheme</option>
								<option value="scilab">SciLab</option>
								<option value="scl">SCL</option>
								<option value="sdlbasic">sdlBasic</option>
								<option value="smalltalk">Smalltalk</option>
								<option value="smarty">Smarty</option>
								<option value="spark">SPARK</option>
								<option value="sparql">SPARQL</option>
								<option value="sql">SQL</option>
								<option value="stonescript">StoneScript</option>
								<option value="systemverilog">SystemVerilog</option>
								<option value="tcl">TCL</option>
								<option value="teraterm">Tera Term Macro</option>
								<option value="text">Text</option>
								<option value="thinbasic">thinBasic</option>
								<option value="tsql">T-SQL</option>
								<option value="typoscript">TypoScript</option>
								<option value="unicon">Unicon (Unified Extended Dialect of Icon)</option>
								<option value="upc">UPC</option>
								<option value="urbi">Urbi</option>
								<option value="uscript">Unreal Script</option>
								<option value="vala">Vala</option>
								<option value="vb">Visual Basic</option>
								<option value="vbnet">vb.net</option>
								<option value="vbscript">VBScript</option>
								<option value="vedit">Vedit macro language</option>
								<option value="verilog">Verilog</option>
								<option value="vhdl">VHDL</option>
								<option value="vim">Vim Script</option>
								<option value="visualfoxpro">Visual Fox Pro</option>
								<option value="visualprolog">Visual Prolog</option>
								<option value="whitespace">Whitespace</option>
								<option value="whois">Whois (RPSL format)</option>
								<option value="winbatch">Winbatch</option>
								<option value="xbasic">XBasic</option>
								<option value="xml">XML</option>
								<option value="xorg_conf">Xorg configuration</option>
								<option value="xpp">X++</option>
								<option value="yaml">YAML</option>
								<option value="z80">ZiLOG Z80 Assembler</option>
								<option value="zxbasic">ZXBasic</option>
						</select>
		
				</div>

					<div class="form-group captchaArea">

				<?PHP
						require_once('./inc/recaptchalib.php');
  $publickey = "6LdPZvESAAAAANK_9qaqS1X58gZ6Gb0zv_cyvAsz"; // you got this from the signup page
  echo recaptcha_get_html($publickey); ?>
							
</div>					

						<div class=" col-sm-10">
						 <div id="alertBoxPaste"></div><br/>
					</div>
							<div class="form-group">
									
									<input type="submit" name="pasteSubmit" value="Paste" class="form-control btn btn-primary">

						</div> 	

						<div class="form-group">

										    
						</div>

			

						</form>



						</div>
			
		</div>
	</div>

			
			
    </div>

</body>
</html>
