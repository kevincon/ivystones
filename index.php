<?php #script 7.3 register.php

$page_title = 'Index';

//Check is form is submitted
if(isset($_POST['submitted'])) {

    $errors=array(); //Initialize error array.
    
	//Check for first name
	if(empty($_POST['first_name'])) {
		$errors[]='You forgot to enter the first name.';
	} else {
		$fn = trim($_POST['first_name']);
	}

	//Check for last name
	if(empty($_POST['last_name'])) {
		$errors[]='You forgot to enter the last name.';
	} else {
		$ln = trim($_POST['last_name']);
	}
	
	//Check for an email address
	if(empty($_POST['email'])) {
	    $errors[]='You forgot to enter the email address.';
	} else {
	    $e= trim($_POST['email']);
	}
	
	//check for password match and confirmation
	
	    if($_POST['password1'] != $_POST['password2']) {
	        $errors[]= 'Your password did not match the confirmed password.';
	    } else {
	        $p= trim($_POST['password1']);
	    }
	
	if(empty($errors)) { //if everything is ok
	
	    // add user to the database
	    require_once('mysql_connect.php'); //connect to db
	    
	    //make the db query
	    $query="INSERT INTO members (first_name, last_name, email, password)
	    VALUES ('$fn','$ln','$e', SHA('$p'))";
	    $result =@mysql_query ($query); //run the query
	    
	    if($result) { //query sucessful
	    
	        echo"<h1> THANK YOU!</h1>
	            <p> $fn $ln is now registered. </p>\n";
	            
	            exit();
	    } else {
	        echo '<h1> System Error </h1>';
	        echo '<p>'. mysql_error().' <br /><br />Query: ' .$query. '</p>';
	        exit();
	    }
	    mysql_close(); //close the db connection
	} else { //report errors
	    echo'<h1>Error!</h1>
	    <p>The following error(s) occured: <br />';
	    foreach($errors as $msg) { //print each error
	        echo " - $msg<br />\n";
	    }
	    echo '</p><p>Please Try again. </p><p><br /></p>';
	
    }
}
?>

<!DOCTYPE html 
          PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
     "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"> 
 
 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

	<head> 
		<title>IvyStones</title> 
		<link rel="stylesheet" type="text/css" href="css/style.css" /> 
		<link rel="shortcut icon" type="image/x-icon" href="../img/favicon.ico" /> 
		<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" /> 
	</head>
	
	<body>
		
		<div id="container" class="main">
			<div id="navbar">
				<ul>
					<li>Home</li>
					<li>Profile</li>
					<li>Stones</li>
					<li>About Us</li>
				</ul>
			</div>
			<div id ="left">
			</div>
			<div id="right">
				<form action="index.php" method="post">
					<fieldset style="width: 366px" >
					<legend>Enter Member Information</legend>
					<p>
						First Name: <input type="text" name="first_name" size="15" maxlength="15" value="<?php if
						(isset($_POST['first_name'])) echo $_POST['first_name']; ?>" />
					</p>
					<p>
					  Last Name: <input type="text" name="last_name" size="15" maxlength="30" value=""<?php if
					(isset($_POST['last_name'])) echo $_POST['last_name']; ?>" />
					</p>
					<p>
					  Email Address: <input type="text" name="email" size="20" maxlength="40" value=""<?php if
					(isset($_POST['email'])) echo $_POST['email']; ?>" />
					</p>
					<p>
					  Password: <input type="password" name="password1" size="10" maxlength="20" />
					</p>
					<p>
					  Confirm Password: <input type="password" name="password2" size="10" maxlength="20" />
					</p>
					<p>
					  <input type="submit" name="submit" value="Register" />
					</p>
					<input type="hidden" name="submitted" value="TRUE" />
				  </fieldset>
					</form>
			</div>

		</div>
		
	</body>
	
</html>