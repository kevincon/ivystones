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
	
	//Check for valid picture
	if ((($_FILES["picture"]["type"] == "image/gif")
|| ($_FILES["picture"]["type"] == "image/jpeg")
|| ($_FILES["picture"]["type"] == "image/pjpeg"))
&& ($_FILES["picture"]["size"] < 2000000))
	{
		if ($_FILES["picture"]["error"] > 0)
		{
			echo "Return Code: " . $_FILES["picture"]["error"] . "<br />";
		}	
		else
		{
			echo "Upload: " . $_FILES["picture"]["name"] . "<br />";
			echo "Type: " . $_FILES["picture"]["type"] . "<br />";
			echo "Size: " . ($_FILES["picture"]["size"] / 1024) . " Kb<br />";
			echo "Temp picture: " . $_FILES["picture"]["tmp_name"] . "<br />";
			if (file_exists("uploads/" . $_FILES["picture"]["name"]))
			{
				echo $_FILES["picture"]["name"] . " already exists. ";
			}
			else
			{
			move_uploaded_file($_FILES["picture"]["tmp_name"], 
			"uploads/" . $_FILES["picture"]["name"]);
			echo "Stored in: " . "uploads/" . $_FILES["picture"]["name"];
			}
		}
	}
	else
	{
		$errors[]='Invalid picture, please make sure your picture is in either .JPG or .GIF format and is under 2 MB.';
	}
	
	$date = $_POST['year']."-".$_POST['month']."-".$_POST['day'];
	
	if(empty($errors)) { //if everything is ok
	
	    // add user to the database
	    require_once('mysql_connect.php'); //connect to db
	    
	    //make the db query
	    $query="INSERT INTO findings (stone_id, user_id, date_found, location, notes)
	    VALUES ('$selected','$uid','$date','$loc','$desc')";
	    $result =@mysql_query ($query); //run the query
	    
	    if($result) { //query sucessful
	    
	        echo"<h1> Logging Successful!</h1>
	            <p> You have now logged a find of the Ivy Stone of the Class of $selected. </p>\n";
				
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
		<form action="" method="post" enctype="multipart/form-data">
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
			<td>Date Found:</td>
			<td>
				<select name=month value='' style="width: 80px">Month</option>
					<option value='01'>January</option>
					<option value='02'>February</option>
					<option value='03'>March</option>
					<option value='04'>April</option>
					<option value='05'>May</option>
					<option value='06'>June</option>
					<option value='07'>July</option>
					<option value='08'>August</option>
					<option value='09'>September</option>
					<option value='10'>October</option>
					<option value='11'>November</option>
					<option value='12'>December</option>
				</select>
				<select name=day value='' style="width: 40px">Day</option>
					<option value='01'>01</option>
					<option value='02'>02</option>
					<option value='03'>03</option>
					<option value='04'>04</option>
					<option value='05'>05</option>
					<option value='06'>06</option>
					<option value='07'>07</option>
					<option value='08'>08</option>
					<option value='09'>09</option>
					<option value='10'>10</option>
					<option value='11'>11</option>
					<option value='12'>12</option>
					<option value='13'>13</option>
					<option value='14'>14</option>
					<option value='15'>15</option>
					<option value='16'>16</option>
					<option value='17'>17</option>
					<option value='18'>18</option>
					<option value='19'>19</option>
					<option value='20'>20</option>
					<option value='21'>21</option>
					<option value='22'>22</option>
					<option value='23'>23</option>
					<option value='24'>24</option>
					<option value='25'>25</option>
					<option value='26'>26</option>
					<option value='27'>27</option>
					<option value='28'>28</option>
					<option value='29'>29</option>
					<option value='30'>30</option>
					<option value='31'>31</option>
				</select>
				<select id="year" name="year" style="width: 55px">
					<option value="2009">2009</option>
					<option value="2008">2008</option>
					<option value="2007">2007</option>
					<option value="2006">2006</option>
					<option value="2005">2005</option>
					<option value="2004">2004</option>
					<option value="2003">2003</option>
					<option value="2002">2002</option>
					<option value="2001">2001</option>
					<option value="2000">2000</option>
					<option value="1999">1999</option>
					<option value="1998">1998</option>
					<option value="1997">1997</option>
					<option value="1996">1996</option>
					<option value="1995">1995</option>
					<option value="1994">1994</option>
					<option value="1993">1993</option>
					<option value="1992">1992</option>
					<option value="1991">1991</option>
					<option value="1990">1990</option>
					<option value="1989">1989</option>
					<option value="1988">1988</option>
					<option value="1987">1987</option>
					<option value="1986">1986</option>
					<option value="1985">1985</option>
					<option value="1984">1984</option>
					<option value="1983">1983</option>
					<option value="1982">1982</option>
					<option value="1981">1981</option>
					<option value="1980">1980</option>
					<option value="1979">1979</option>
					<option value="1978">1978</option>
					<option value="1977">1977</option>
					<option value="1976">1976</option>
					<option value="1975">1975</option>
					<option value="1974">1974</option>
					<option value="1973">1973</option>
					<option value="1972">1972</option>
					<option value="1971">1971</option>
					<option value="1970">1970</option>
					<option value="1969">1969</option>
					<option value="1968">1968</option>
					<option value="1967">1967</option>
					<option value="1966">1966</option>
					<option value="1965">1965</option>
					<option value="1964">1964</option>
					<option value="1963">1963</option>
					<option value="1962">1962</option>
					<option value="1961">1961</option>
					<option value="1960">1960</option>
					<option value="1959">1959</option>
					<option value="1958">1958</option>
					<option value="1957">1957</option>
					<option value="1956">1956</option>
					<option value="1955">1955</option>
					<option value="1954">1954</option>
					<option value="1953">1953</option>
					<option value="1952">1952</option>
					<option value="1951">1951</option>
					<option value="1950">1950</option>
					<option value="1949">1949</option>
					<option value="1948">1948</option>
					<option value="1947">1947</option>
					<option value="1946">1946</option>
					<option value="1945">1945</option>
					<option value="1944">1944</option>
					<option value="1943">1943</option>
					<option value="1942">1942</option>
					<option value="1941">1941</option>
					<option value="1940">1940</option>
					<option value="1939">1939</option>
					<option value="1938">1938</option>
					<option value="1937">1937</option>
					<option value="1936">1936</option>
					<option value="1935">1935</option>
					<option value="1934">1934</option>
					<option value="1933">1933</option>
					<option value="1932">1932</option>
					<option value="1931">1931</option>
					<option value="1930">1930</option>
					<option value="1929">1929</option>
					<option value="1928">1928</option>
					<option value="1927">1927</option>
					<option value="1926">1926</option>
					<option value="1925">1925</option>
					<option value="1924">1924</option>
					<option value="1923">1923</option>
					<option value="1922">1922</option>
					<option value="1921">1921</option>
					<option value="1920">1920</option>
					<option value="1919">1919</option>
					<option value="1918">1918</option>
					<option value="1917">1917</option>
					<option value="1916">1916</option>
					<option value="1915">1915</option>
					<option value="1914">1914</option>
					<option value="1913">1913</option>
					<option value="1912">1912</option>
					<option value="1911">1911</option>
					<option value="1910">1910</option>
					<option value="1909">1909</option>
					<option value="1908">1908</option>
					<option value="1907">1907</option>
					<option value="1906">1906</option>
					<option value="1905">1905</option>
					<option value="1904">1904</option>
					<option value="1903">1903</option>
					<option value="1902">1902</option>
					<option value="1901">1901</option>
					<option value="1900">1900</option>
   </select></p>
			</td>
		</tr>
		<tr>
			<td>Location:<br>(50 char max)</td>
			<td>
				<input type="text" name="location" size="25" maxlength="50" value="" />
			</td>
		</tr>
		<tr>
			<td>Description:<br>(100 char max)</td>
			<td>
				<textarea name="description" cols="28" rows="4"></textarea>
			</td>
		</tr>
		<tr>
			<td>Picture:</td>
			<td>
				<input type="hidden" name="MAX_FILE_SIZE" value="2000000" />
				<input type="file" name="picture" value="" />
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