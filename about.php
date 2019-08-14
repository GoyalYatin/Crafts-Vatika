<?php
$file='admin_panel/include/aboutContent.txt';
$aboutContent = file_get_contents($file);
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<!------------------------ Title ------------------------------>
<title>CraftVatika</title>
<!------------------------ Meta Tags -------------------------->
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<meta http-equiv="content-language" content="en" />
<meta name="keywords" content="CraftVatika,Handicraft,Handmade,craft work" />
<meta name="description" content="Information Portal for Handicrafts" />
<meta name="robots" content="INDEX,FOLLOW" />
<meta name="author" content="CraftVatika" />
<meta name="subject" content="Vatika" />
<meta http-equiv="Content-Script-Type" content="text/javascript">
<meta http-equiv="content-style-type" content="text/css" />
<meta name="viewport" content="width=device-width" />
<!------------------------ Favicon --------------------------->
<link rel="shortcut icon" href="img/favicon.ico" />
<!------------------------ StyleSheets ----------------------->
<link rel="stylesheet" href="css/styles.css" type="text/css" />
<!--<link rel="stylesheet" media="only screen and (max-width: 1024px)" href="css/styles_1024.css" />
<link rel="stylesheet" media="only screen and (max-width: 480px)" href="css/styles_480.css" />-->

</head>		
<body>
	<?php
		include('include/header.php');
	?>
	<div class="bodyWrapper">
		<div class='breadcrumb_navigation'>
			<ul class="breadcrums-wrapper-list">
				<li class="breadcrums-first">
					<a href="index.php">Home</a>
				</li>
				<li>
					<span>About Us</span>
				</li>
			</ul>
		</div>
		<div class="textPageContent">
			<h2 class='page_heading'><span> About Us </span></h2>
			<div class="textPagePara">
				<?php 
					echo $aboutContent;
				?>
			</div>
		</div>
	</div>
	<?php
		include('include/footer.php');
	?>
</body>
</html>