<?php #script 7.3 register.php

require_once('mysql_connect.php'); //connect to db

$page_title = 'Profile';
include('header.php');
?>
			<div id ="content">
					<?php 
						if (isset($name)) {
							echo "<h3 style=\"float: right;\"><a href=\"stones.php\" style=\"text-decoration: underline;\">Log or View Stones!</a></h3>";
							echo "<h1>$name's profile</h1>";
							
							$pro_result = mysql_query("SELECT stone_id, date_found, location, notes, pic_filename FROM findings WHERE user_id = '$uid'");
							$num = mysql_num_rows($pro_result);
							
							if ($num == 0)
								echo "<h2>No finds yet, log some <a href=\"stones.php\" style=\"text-decoration: underline;\">here</a>!</h2>";
							echo "<ul class=\"biglist\">";
							while ($row = mysql_fetch_array($pro_result, MYSQL_ASSOC)) {
								$stone = $row['stone_id'];
								$date = $row['date_found'];
								$location = $row['location'];
								$notes = $row['notes'];
								$pic = $row['pic_filename'];
								
								echo "<li class=\"find\">";
								if ($pic == '')
									echo "<img class=\"find_img\" src=\"images/d_silhouette.gif\" alt=\"$stone Image Replacement\" />";
								else
									echo "<img class=\"find_img\" src=\"uploads/$pic\" alt=\"$stone Image\" width=\"200\" height=\"126\" />";
								echo "<span class=\"find_stone\">Class of $stone, found $date at $location</span>";
								echo "<p class=\"find_desc\">";
								echo "<span style=\"font-style: normal;\">Find description: </span>".$notes."</p>";
								echo "</li>";
							}
							echo "</ul>";

						}
						else
							echo '<img src="images/arrow.png">';
					?>
			</div>
		</div>
	</body>
</html>