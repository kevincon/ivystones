<?php #script 7.3 register.php

require_once('mysql_connect.php'); //connect to db

$page_title = 'Profile';
include('header.php');
?>
			<div id ="content">
					<?php 
						if (isset($name)) {
							echo "<h1>$name's profile<h1>";
				
							$pro_result = mysql_query("SELECT stone_id, date_found, location, notes FROM findings WHERE user_id = '$uid'");
							while ($row = mysql_fetch_array($pro_result, MYSQL_ASSOC)) {
								echo "<p>ID: $row[0]  Date: $row[1]</p>";  
							}
						}
						else
							echo "<h1>Log in first!</h1>";
					?>
			</div>
		</div>
	</body>
</html>