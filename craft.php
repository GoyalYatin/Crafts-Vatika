<?php
include("admin_panel/include/config.php");
if(isset($_GET['id'])){
	$craftId=$_GET['id'];
}
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
		$sql = "select * from craft where craftId=$craftId and craftIsdeleted = 'N'";
		$result = mysql_query($sql) or die(header('Location: 404-page-not-found.html'));
		$row = mysql_fetch_array($result);
		if(!$row){
			header('Location: 404-page-not-found.html');
		}
	?>
	<div class="bodyWrapper">
		<div class='breadcrumb_navigation'>
			<ul class="breadcrums-wrapper-list">
				<li class="breadcrums-first">
					<a href="index.php">Home</a> 
					<span> » </span>
				</li>
				<li>
					<a href="category.php?category=<?php echo $row[6] ?>"> <?php echo $row[6] ?></a> 
					<span> » </span>
				</li>
				<li>
					<span><?php echo $row[1] ?></span>
				</li>
			</ul>
		</div>
		<div class='craft_left_side'>
			<div class='craft_content_box'>
			<?php
				echo "<h2 class='craft_heading'><span>".$row[1]."</span></h2>";
				echo "<div class='craft_content'>";
					echo "<h4>".$row[2].", ".$row[3]."</h4>";
					echo "<div class='craft_image'><img src='img/craft/".$row[5]."'/></div>";
					echo "<div class='craft_description'>".$row[4]."</div>";
				echo "</div>";
			?>
			</div>
			<div class="one_line_adv">
				ADV.
			</div>
			<div class='related_craft'>
				<h2><a class="heading_link" href="crafts.php"> Similar Crafts </a></h2>
				<?php
				$sql="select * from craft where craftIsDeleted = 'N' and craftType = '" . $row[6] . "' order by craftPopularityIndex desc LIMIT 6";
				$result=mysql_query($sql);
				while($row_similar = mysql_fetch_array($result)){
				echo "<div class='top_crafts_box'>";
					echo "<img width='100%' height='150px' src='img/craft/". $row_similar['craftPicture'] ."'/>";
					echo "<h3><a class='heading_link' href='craft.php?id=".$row_similar['craftId']."'>". $row_similar['craftName'] ."</a></h3>";
				echo "</div>";
				}
				?>
				<div class="see_all_crafts"><a href='category.php?category=<?php echo $row[6] ?>'>See All</a></div>
			</div>
			<div class="craft_adv_bottom">
				ADV.
			</div>
		</div>
		<div class='craft_right_side'>
			<div class="craft_types_list">
				<h2><a class="heading_link" href="events.php"> Category </a></h2>
				<div class="craft_types_link">
				<?php
				$sql="select distinct craftType from craft where craftIsDeleted = 'N'";
				$result=mysql_query($sql);
				while($row = mysql_fetch_array($result)){
					echo "<a href='category.php?category=". $row['craftType'] ."'>" . $row['craftType'] . "</a>" ;
				}
				?>
				</div>
			</div>
			<div class="follow_us_on">
				<h2> Follow Us On </h2>
				<div class="follow_us_content">
					<img width='25px' height='25px' src='img/social-media/fb.png'/>&nbsp;&nbsp;
					<img width='25px' height='25px' src='img/social-media/gplus.png'/>&nbsp;&nbsp;
					<img width='25px' height='25px' src='img/social-media/pintrest.png'/>&nbsp;&nbsp;
					<img width='25px' height='25px' src='img/social-media/tweetr.png'/>&nbsp;&nbsp;
				</div>
			</div>
			<div class="craft_adv_right">
				ADV.
			</div>
		</div>
	</div>
	<?php
		include('include/footer.php');
	?>

</body>
</html>