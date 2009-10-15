<?php #script 7.3 register.php

$page_title = 'Profile';
include('header.php');
?>
			<div id ="content">
					<?php 
						if (isset($name))
							echo "<h1>$name's profile<h1>";
						else
							echo "<h1>Log in first!</h1>";
					?>
			</div>
		</div>
	</body>
</html>