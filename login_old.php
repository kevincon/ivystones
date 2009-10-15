$message="";

////// Login Section.
$login=$_POST['login'];

if($login){ // If clicked on Login button.
	$username=$_POST['username'];
	$md5_password=md5($_POST['password']); // Encrypt password with md5() function.


// Check matching of username and password.

	$result=mysql_query("select * from members where Email='$username' and Password='$md5_password'");
	
	if(true){ // If match.
		session_start();
		$_SESSION = array();
		$_SESSION['username'] = $username; // Create session username.
		header("location:profile.php"); // Re-direct to profile.php
		exit;
	}
	
	else { // If not match.
		$message="--- Incorrect Username or Password ---";
	}
	


} // End Login authorize check.