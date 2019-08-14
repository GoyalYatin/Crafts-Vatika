<?php
include('lock.php');
$file='include/serviceContent.txt';
$serviceContent = file_get_contents($file);
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
<!------------------------ Javascript ------------------------>
<script type="text/javascript" src="js/nicEdit.js"></script>
<script type="text/javascript">
bkLib.onDomLoaded(function() {
	new nicEditor({maxHeight : 300}).panelInstance('Editor1');
});
</script>
</head>		
<body>
	<?php
		include('include/header.php');
	?>
	<div class="bodyWrapper">
		<div class="fullWidth">
			<h2>Services Page</h2>
			<form id="form1" method="POST" action="services.php">
				<br/>
				<textarea autofocus name="Editor1" id="Editor1" style="height:300px;width:100%;"><?php echo $serviceContent ?></textarea>
				<br/>
				<input class="floatleft" type="submit" name="Save" value="Save"/>
			</form>   
			<br/>
			<br/>
			<br/>
		</div>
		<?php
		if(count($_POST))
			if($_POST["Editor1"] != "")
				$serviceContent = $_POST["Editor1"];
			file_put_contents($file, $serviceContent);
		?>
	</div>
</body>
</html>