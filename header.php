<?php

session_name('YourVisitID');
session_start();

$name = $_SESSION['first_name'];
$not_logged_content = <<<TEXT
					<input type="text" name="username" size="20" maxlength="20" id="username" value="Email" style="margin-bottom: 5px; color: #666;" onfocus="clearText(this);" onblur="addText(this);" />
					<script type="text/javascript">
						document.write('<input name="password" id="passwordText" type="text" size="20" value="Password" style="color: #666;" onfocus="pwdFocus()" />');
						document.write('<input name="password" id="passwordAsterix" type="password" size="20" value="" onblur="pwdBlur()" onfocus="pwdFocus()" style="display:none;" />');
					</script>
					<noscript>
						<input name="password" id="passwordnoscript" type="password" size="20" value="" />
					</noscript>
					<input type="submit" name="login" value="Login" class="submit" style="padding: 5px 62px 5px 54px; margin: 5px 5px 5px -2px;" />
TEXT;

$logged_content = <<<TEXT
					<p>Logged in as $name</p>
					<input type="submit" name="logout" value="Logout" class="submit" style="padding: 5px 62px 5px 54px; margin: 5px 5px 5px -2px;" />
TEXT;

// Check if the form has been submitted

if(isset($_POST['login'])) 
{
    $errors=array(); //initialize error array
	// Connect database.
	require_once('mysql_connect.php'); //connect to db
    //check for username
    if(empty($_POST['username'])) {
        $errors[]= 'You forgot to enter your username';
    } else {
        $un=($_POST['username']);
    }
    
    //check for a password
    if(empty($_POST['password'])) {
        $errors[]= 'You forgot to enter your password';
    } else {
        $pw=($_POST['password']);
    }
    
    if(empty($errors)) { //if everything is ok
    
        //retrieve the user_id and first_name fro the email/password combo
        $query = "SELECT userid, first_name FROM members WHERE email='$un' AND password=md5('$pw')";
        $result=@mysql_query($query); //run the query
        $row=mysql_fetch_array($result, MYSQL_NUM); //return a record if applicable
        
        if($row) { //A record was pulled from the database.
        
            //Set the session data and redirect.
            session_name('YourVisitID');
            session_start();
            $_SESSION['user_id']=$row[0];
            $_SESSION['first_name']=$row[1];
            
            //redirect the user to the loggedin.php page.
            //Start defining the URL
            $url = 'http://' . $_SERVER['HTTP_HOST'] .  dirname($_SERVER['PHP_SELF']);
            //check for a trailing slash.
            if((substr($url,-1)=='/') OR (substr($url, -1)=='\\')) {
                $url=substr($url,0,-1); //chop off the slash
            }
            //Add the page.
            $url .= '/profile.php';
            
            header("Location: $url");
            exit(); //quit the script
          } else { //no record matched the query
            $errors[]='The email address and password entered do not match those on file.';
            //public message
            $errors[] = mysql_error() . '<br /><br />Query: ' . $query; // Debugging message
          }
     } // end of if(empty($errors))
	 
	 else {
	 	    echo'<div style="margin: 15px;">
			<h1>Error!</h1>
	    <p>The following error(s) occured: <br />';
	    foreach($errors as $msg) { //print each error
	        echo " - $msg<br />\n";
	    }
	    echo '</p><p>Please try again. </p><p><br /></p></div>';
     }
	 
     mysql_close(); //close the database connection.
} else { //form has not been submitted.
    $errors= NULL;
}

////// Logout Section. Delete all session variable.
$logout = $_POST['logout'];
if ($logout) {
	$_SESSION = array();
	session_destroy();
	header("Location: index.php");
}

?>

<!DOCTYPE html 
          PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
     "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"> 
 
 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

	<head> 
		<?php echo '<title>IvyStones | '.$page_title.'</title>'; echo "\n"; ?>
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
						<form action="header.php" method="post">
							<div>
								<?php 
									if (isset($_SESSION['user_id']))
										echo $logged_content; 
									else
										echo $not_logged_content;
								?>
							</div>
						</form>
					</li>
				</ul>
			</div>