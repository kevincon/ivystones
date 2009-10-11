<?php #script 7.3 register.php

$page_title = 'Log a Find';
$selected = $_GET['stones'];
include('header.php');
echo'<div id ="content">';
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
	
	//Check for a password
	if(empty($_POST['password1'])) {
	    $errors[]='You forgot to enter the password.';
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
	    $query="INSERT INTO members (First_Name, Last_Name, Email, Password)
	    VALUES ('$fn','$ln','$e', SHA('$p'))";
	    $result =@mysql_query ($query); //run the query
	    
	    if($result) { //query sucessful
	    
	        echo"<h1> THANK YOU!</h1>
	            <p> $fn $ln is now registered. </p>\n";
	            $mailBody = "Thank you for registering!\nYour password is '{#_POST['password1'])'.\n\n
				Sincerely,\nThe ivy stones Team";
				mail($_POST['email'],'Thanks for registering!',$mailBody,'From: no-reply@ivystones.com');
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
	<h1 style="text-align: center;">Log a Find</h1>
	<form action="" method="post">
	<table style="margin: auto;">
		<tr>					
			<td>Stone:</td>
			<td>
				<?php echo $selected; ?>
			</td>
		</tr>
		<tr>
			<td>Last Name:</td>
			<td>
				<input type="text" name="last_name" size="20" maxlength="30" value="<?php if (isset($_POST['last_name'])) echo $_POST['last_name']; ?>" />
			</td>
		<tr>
			<td colspan="2">
				<input type="submit" name="submit" value="Log!" class="submit" />
			</td>
		</tr>
	</table>
	<input type="hidden" name="submitted" value="TRUE" />
	</form>
</div>
</div>
</body>
</html>