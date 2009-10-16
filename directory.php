<?php
require_once('mysql_connect.php'); //connect to db
$stone = $_GET['stone'];
$page_title = "Ivy Stone of ".$stone;
include('header.php');
?>
			<div id ="content">
					<h1>Ivy Stone of <?php echo $stone; ?></h1>
					<?php

						
						$pro_result = mysql_query("SELECT user_id, date_found, location, notes, pic_filename FROM findings WHERE stone_id = '$stone'");
						$num = mysql_num_rows($pro_result);
						
						if ($num == 0)
							echo "<h2>No finds yet, log some <a href=\"stones.php\" style=\"text-decoration: underline;\">here</a>!</h2>";
						echo "<ul class=\"biglist\">";
						while ($row = mysql_fetch_array($pro_result, MYSQL_ASSOC)) {
							$userid = $row['user_id'];
							$id_result = mysql_query("SELECT First_Name, Last_Name FROM members WHERE USERID = '$userid'");
							$nrow = mysql_fetch_array($id_result, MYSQL_ASSOC);
							$fn = $nrow['First_Name'];
							$ln = $nrow['Last_Name'];
							$date = $row['date_found'];
							$location = $row['location'];
							$notes = $row['notes'];
							$pic = $row['pic_filename'];
							
							echo "<li class=\"find\">";
							if (file_exists($pic))
								echo "<img class=\"find_img\" src=\"images/$pic\" alt=\"$stone Image\" />";
							else
								echo "<img class=\"find_img\" src=\"images/d_silhouette.gif\" alt=\"$stone Image\" />";
							echo "<span class=\"find_stone\">Class of $stone, found $date at $location by $fn $ln</span>";
							echo "<p class=\"find_desc\">";
							echo "<span style=\"font-style: normal;\">Find description: </span>".$notes."</p>";
							echo "</li>";
						}
						echo "</ul>";
					?>
			</div>
		</div>
	</body>
</html>