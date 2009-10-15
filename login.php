<?php
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
		echo $row;
        
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
	 	    echo'<h1>Error!</h1>
	    <p>The following error(s) occured: <br />';
	    foreach($errors as $msg) { //print each error
	        echo " - $msg<br />\n";
	    }
	    echo '</p><p>Please Try again. </p><p><br /></p>';
     }
	 
     mysql_close(); //close the database connection.
} else { //form has not been submitted.
    $errors= NULL;
}

////// Logout Section. Delete all session variable.
$logout = $_POST['logout'];
if ($logout) {
	session_destroy();
}

?>

