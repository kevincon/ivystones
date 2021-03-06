<?php

$page_title = 'Home';

require_once('mysql_connect.php'); //connect to db

$sql_result = mysql_query('SELECT distinct stone_id FROM findings');
$num_stones = mysql_num_rows($sql_result);
$tot_stones = 175;
$percent = (int)($num_stones/$tot_stones * 100);

include('header.php');
			echo'<div id ="left">
				<div>
					<h1>What is IvyStones?</h1>
					<p>IvyStones is a scavenger hunt to find the many Ivy Day stones hidden around the University of Pennsylvania campus.  <a href="about.php">Read more.</a></p>
					<p id="percent">'.$percent.'%</p>
					<p style="text-align: center;">of Ivy Day stones found.</p>
				</div>
			</div>
			<div id="right">
				';
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
	    
	    //make the db query
	    $query="INSERT INTO members (First_Name, Last_Name, Email, Password)
	    VALUES ('$fn','$ln','$e', MD5('$p'))";
	    $result =@mysql_query ($query); //run the query
	    
	    if($result) { //query sucessful
	    
	        echo"<h1> THANK YOU!</h1>
	            <p> $fn $ln is now registered. </p>\n";
	            /*$mailBody = "Thank you for registering!\nYour password is '{#_POST['password1'])'.\n\n
				Sincerely,\nThe ivy stones Team";
				mail($_POST['email'],'Thanks for registering!',$mailBody,'From: no-reply@ivystones.com');
	            exit();*/
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
	    echo '</p><p>Please try again. </p><p><br /></p>';
	
    }
}


				if (isset($name)) {
				echo '<div align="center"><h1>Welcome, ' . $name . '!</h1><br><br><h3><a href="profile.php">View Your Profile</a></h3><br><h3><a href="stones.php">Look Up A Stone</a></h3></div><br><br><br><br><br><br><br><br>';
				}
				else
				{
				echo '<form action="index.php" method="post">
					<h1>Become an IvyStoner!</h1>
					<table>
						<tr>					
							<td>First Name:</td>
							<td>
								<input type="text" name="first_name" size="20" maxlength="20" value="" />
							</td>
						</tr>
						<tr>
							<td>Last Name:</td>
							<td>
								<input type="text" name="last_name" size="20" maxlength="30" value="" />
							</td>
						</tr>
						<tr>
							<td>Your Email:</td>
							<td>
								<input type="text" name="email" size="20" maxlength="40" value="" />
							</td>
						</tr>
						<tr>
							<td>Password:</td>
							<td>
								<input type="password" name="password1" size="20" maxlength="20" />
							</td>
						</tr>
						<tr>
							<td>Confirm Password:</td>
							<td>
								<input type="password" name="password2" size="20" maxlength="20" />
							</td>
						</tr>
						<tr>
							<td colspan="2">
								<input type="submit" name="submit" value="Register" class="submit" />
							</td>
						</tr>
					</table>
					<input type="hidden" name="submitted" value="TRUE" />
					</form>';					
					}
?>
			</div>

		</div>
	</body>
</html>