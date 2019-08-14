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
			<h2>Messages recieved as queries</h2>
			<div class="buttonsWrapper">
				all(sorted by id), sort by phone, sort by email, sort by rowtimestamp ,delete, export to excel 
			</div>
		</div>
		<div class="fullWidth">
			<?php
				$i=1;
				$result = mysql_query("select * from contact");
			?>
			<table border="2" cellpadding="3" cellspacing="0" align="center" width="100%" style="color:black;text-align:center;">
			<tr class="heading_row">
				<td>Query Id</td>
				<td>Phone Number</td>
				<td>Email</td>
				<td>Queries</td>
				<td>IsDeleted</td>
				<td>Row Timestamp</td>
			</tr>
			<?php
				$i=1;
				while($row = mysql_fetch_array($result)){
					echo "<tr class='table_row'>";
						echo "<td>" . $row['ctc_id'] . "</td>";
						echo "<td>" . $row['ctc_phone'] . "</td>";
						echo "<td>" . $row['ctc_mail'] . "</td>";
						echo "<td>" . $row['ctc_query'] . "</td>";
						echo "<td>" . $row['ctc_isDeleted'] . "</td>";
						echo "<td>" . $row['ctc_rowtimestamp'] . "</td>";
					echo "</tr>";	
					$i=$i+1;
				}
					echo "</table>";
				

			?>

		</div>
	</div>
</body>
</html>