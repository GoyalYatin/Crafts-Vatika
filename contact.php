<?php
include("admin_panel/include/config.php");
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
<!--<link rel="stylesheet" media="only screen and (max-width: 480px)" href="css/styles_480.css" />-->

<link rel = 'stylesheet' type = 'text/css' href = 'css/jquery-ui-1.10.4.custom.css' />

<script type = 'text/javascript' src = 'js/jquery-1.10.2.js'></script>
<script type = 'text/javascript' src = 'js/jquery-ui-1.10.4.custom.min.js'></script>

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
					<span> » </span>
				</li>
				<li>
					<span>Contact</span>
				</li>
			</ul>
		</div>
		<div class='first_of_three_div'>
		
		</div>
		<div class='second_of_three_div'>
			<h2 class='page_heading'><span> Contact Us  </span></h2>
			<form action="contact.php" method="post" name="contactform">
                <table style="color:black;font-family:metal mania;">
               		<tr>
						<td>Phone Number : </td>
						<td><span style="background-color:white;">+91 </span><input type="text" name="phone" size="20" ></td>
					</tr>
                    <tr>
						<td>Email : </td>
						<td><input type="text" name="mail" size="24" /></td>
					</tr>
					<tr>
						<td>Choose Category : </td>
						<td><select name="question" id="question">
							<option value="">Select Category</option>
							<option value=""></option>
							<option value=""></option>
							<option value=""></option>
						</select></td>
					</tr>
                    <tr>
						<td>Queries : </td>
						<td><textarea cols="20" rows="6" name="query"></textarea></td>
					</tr>
					<tr>
						<td></td>
						<td><input type="submit" value="SUBMIT" name="submitcontact" style="font-family:metal mania;background-color:#232121;color:white;font-size:17px;cursor:pointer;"/></td>
					</tr>
                    </table>
              	</form>
		</div>
		<div class='third_of_three_div'>
		
		</div>
	</div>
	<?php
		include('include/footer.php');
	?>
</body>
</html>