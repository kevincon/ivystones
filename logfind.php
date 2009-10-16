<?php #script 7.3 register.php

$page_title = 'Log a Find';
$selected = $_GET['stone'];

include('header.php');

echo'<div id ="content">';

//Check is form is submitted
if(isset($_POST['submitted'])) {

    $errors=array(); //Initialize error array.
    
	//Check for location
	if(empty($_POST['location'])) {
		$errors[]='You forgot to enter a location.';
	} else {
		$loc = trim($_POST['location']);
	}

	//Check for description
	if(empty($_POST['description'])) {
		$errors[]='You forgot to enter a description.';
	} else {
		$desc = trim($_POST['description']);
	}
	
	
	if(empty($errors)) { //if everything is ok
	
	    // add user to the database
	    require_once('mysql_connect.php'); //connect to db
	    
	    //make the db query
	    $query="INSERT INTO members (First_Name, Last_Name, Email, Password)
	    VALUES ('$fn','$ln','$e', SHA('$p'))";
	    $result =@mysql_query ($query); //run the query
	    
	    if($result) { //query sucessful
	    
	        echo"<h1> Loggging Successful!</h1>
	            <p> You have now logged a find of the ivy stone of the class of $selected . </p>\n";
				
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

	if (isset($name)) {
	
		echo <<<TEXT
		<h1 style="text-align: center;">Log a Find</h1>
		<form action="" method="post">"
	<table style="margin: auto;">
		<tr>					
			<td>Stone:</td>
			<td>
TEXT;
			echo $selected;
			$_POST['stone'] = $selected;
			echo <<<TEXT
			</td>
		</tr>
		<tr>
			<td>Location:</td>
			<td>
				<input type="text" name="location" size="31" maxlength="31" value="" />
			</td>
		<tr>
			<td>Description:</td>
			<td>
				<textarea name="description" cols="23" rows="4"></textarea>
			</td>
		</tr>
		<tr>
			<td>Picture:</td>
			<td>
				<input type="file" name="picture" size="20" value="" />
			</td>
		</tr>
		<tr>
			<td colspan="2">
				<input type="submit" name="submit" value="Log!" class="submit" />
			</td>
		</tr>
	</table>
	<input type="hidden" name="submitted" value="TRUE" />
	</form>
TEXT;
	}
	else
		echo "<h1>Log in first to log a find!</h1>";
	?>
</div>
</div>
</body>
</html>