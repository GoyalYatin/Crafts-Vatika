<?php
include('lock.php');
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
		<div class="floatLeft halfWidth">
			Number of active sellers : <br/>
			Number of total sellers  : <br/>
			Number of active buyers  : <br/>
			Number of total buyers   : <br/>
			Number of total hits     : <br/>
		</div>
		<div class="floatLeft halfWidth">
			Number of total news and updates : <br/>
			Number of total queries asked  : <br/>
			Number of total categories  : <br/>
			Number of total subcategories   : <br/>
		</div>
	</div>
</body>
</html>