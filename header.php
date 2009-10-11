<!DOCTYPE html 
          PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
     "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"> 
 
 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

	<head> 
		<?php echo '<title>IvyStones | '.$page_title.'</title>' ?>
		<link rel="stylesheet" type="text/css" href="css/style.css" /> 
		<link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico" /> 
		<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
		
		<script type="text/javascript">
			function clearText(thefield){
				if (thefield.defaultValue==thefield.value) {
					thefield.value = "";
					document.getElementById("username").style.color = "black"; 
				}
			}
			
			function addText(field) {
				if (field.value == "") {
					field.value="Email";
					field.style.color = "#666";
				}
			}
			
			function pwdBlur() {
				if(document.getElementById("passwordAsterix").value.length == 0) {
					document.getElementById("passwordAsterix").style.display = "none";
					document.getElementById("passwordText").style.display = "inline";
				}
			}
			
			function pwdFocus() {
				document.getElementById("passwordAsterix").style.display = "inline";
				document.getElementById("passwordText").style.display = "none";
				document.getElementById("passwordAsterix").focus();
			}
		</script>
	</head>
	
	<body>
		
		<div id="container" class="main">
			<div id="navbar">
				<img src="images/logo.png" alt="Ivy Stones" />
				<ul>
					<li id="nav-1"><a href="index.php">Home</a></li>
					<li id="nav-2"><a href="profile.php">Profile</a></li>
					<li id="nav-3"><a href="stones.php">Stones</a></li>
					<li id="nav-4"><a href="about.php">About Us</a></li>
					<li id="login">
						<input type="text" name="username" size="20" maxlength="20" id="username" value="Email" style="margin-bottom: 5px; color: #666;" onfocus="clearText(this);" onblur="addText(this);" />
						<script type="text/javascript">
							document.write('<input name="password" id="passwordAsterix" type="password" size="20" value="" onblur="pwdBlur()" onfocus="pwdFocus()" style="display:none;" />');
							document.write('<input name="password" id="passwordText" type="text" size="20" value="Password" style="color: #666;" onfocus="pwdFocus()" />');
						</script>
						<noscript>
							<input name="password" id="passwordnoscript" type="password" size="20" value="" />
						</noscript>
						<input type="submit" name="login" value="Login" class="submit" style="padding: 5px 62px 5px 54px; margin: 5px 5px 5px -2px;" />
					</li>
				</ul>
			</div>