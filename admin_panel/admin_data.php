<?php
include('lock.php');
include("include/config.php");
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<!------------------------ Title ------------------------------>
<title>CraftVatika</title>
<!------------------------ Favicon --------------------------->
<link rel="shortcut icon" href="img/favicon.ico" />
<!------------------------ StyleSheets ----------------------->
<link rel="stylesheet" href="css/styles.css" type="text/css" />
</head>		
<body>
	<?php
		include('include/header.php');
	?>
	<div class="bodyWrapper">
		<div class="fullWidth">
			<h2>Admin Information</h2>
		</div>
		<div class="fullWidth">
			<?php
				$result = mysql_query("select * from admin");
			?>
			<br/>
			<table border="2" cellpadding="3" cellspacing="0" align="center" width="100%" style="color:black;text-align:center;">
			<tr class="heading_row">
				<td>Username</td>
				<td>Last Login</td>
			</tr>
			<?php
				while($row = mysql_fetch_array($result)){
					echo "<tr class='table_row'>";
						echo "<td>" . $row['adm_username'] . "</td>";
						echo "<td>" . $row['last_login_timestamp'] . "</td>";
					echo "</tr>";	
				}
			?>
			</table>
			<br/>
			<br/>
			<br/>
		</div>
	</div>
</body>
</html>