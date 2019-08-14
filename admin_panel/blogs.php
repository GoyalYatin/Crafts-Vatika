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
			<h2>Blogs</h2>
			<div class="buttonsWrapper">
				all(sorted by id), sort by city, sort by state, delete, update, add, export to excel ,search by id,name,city,state,
			</div>
		</div>
		<div class="fullWidth">
			<?php
				$i=1;
				$result = mysql_query("select * from category");
			?>
			<table border="2" cellpadding="3" cellspacing="0" align="center" width="100%" style="color:black;text-align:center;">
			<tr class="heading_row">
				<td>Category Id</td>
				<td>Category Name</td>
				<td>Category City</td>
				<td>Category State</td>
				<td>Category Description</td>
				<td>Category Picture</td>
			</tr>
			<?php
				$i=1;
				while($row = mysql_fetch_array($result)){
					echo "<tr class='table_row'>";
						echo "<td>" . $row['category_id'] . "</td>";
						echo "<td>" . $row['category_name'] . "</td>";
						echo "<td>" . $row['category_city'] . "</td>";
						echo "<td>" . $row['category_state'] . "</td>";
						echo "<td>" . $row['category_description'] . "</td>";
						echo "<td>" . $row['category_picture'] . "</td>";
					echo "</tr>";	
					$i=$i+1;
				}
					echo "</table>";
				

			?>

		</div>
	</div>
</body>
</html>