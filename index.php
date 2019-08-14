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
<link rel = 'stylesheet' type = 'text/css' href = 'css/jquery.bxslider.css' />

<script type = 'text/javascript' src = 'js/jquery-1.10.2.js'></script>
<script type = 'text/javascript' src = 'js/jquery-ui-1.10.4.custom.min.js'></script>
<script type = 'text/javascript' src = 'js/jquery.bxslider.min.js'></script>


</head>			
<body>
	<?php
		include('include/header.php');
	?>
	<div class="bodyWrapper">
		<div class="slider_wrapper">
			<ul class="bxslider">
			<?php
				$sql="select * from banner where banner_isdeleted='N' order by banner_rowtimestamp LIMIT 6";
				$result=mysql_query($sql);
				while($row = mysql_fetch_array($result)){
				echo "<li><img width='100%' height='300px' src='img/banner/". $row['banner_picture'] ."' title='". $row['banner_heading'] ."'/></li>";
				}
			?>
			</ul>
		</div>
		<div class="home_content_left">
			<div class="top_crafts">
				<h2><a class="heading_link" href="crafts.php"> Top Crafts </a></h2>
				<?php
				$sql="select * from craft where craftIsDeleted = 'N' order by craftPopularityIndex desc LIMIT 6";
				$result=mysql_query($sql);
				while($row = mysql_fetch_array($result)){
				echo "<div class='top_crafts_box'>";
					echo "<img width='100%' height='150px' src='img/craft/". $row['craftPicture'] ."'/>";
					echo "<h3><a class='heading_link' href='craft.php?id=".$row['craftId']."'>". $row['craftName'] ."</a></h3>";
				echo "</div>";
				}
				?>
			</div>
			<div class="latest_news">
				<h2><a class="heading_link" href="news.php"> Latest News </a></h2>
				<?php
					$sql="select * from news where news_isdeleted = 'N' order by news_rowtimestamp desc LIMIT 2";
					$result=mysql_query($sql);
					while($row = mysql_fetch_array($result)){
						if($row['news_picture'] != NULL){
							$pos=strpos($row['news_description'], ' ', 80);
							echo "<div class='latest_news_content'>";
							echo "<a href='news.php?id=".$row['news_id']."'><img width='50px' height='50px' src='img/news/". $row['news_picture'] ."'/></a>";
							echo "<h3><a href='news.php?id=".$row['news_id']."'>". $row['news_heading'] ."</a></h3>";
							echo "<p>". substr($row['news_description'],0,$pos ) ." ...</p>";
							echo "</div>";
						}
						else{
							$pos=strpos($row['news_description'], ' ', 100);
							echo "<div class='latest_news_content no-image'>";
							echo "<h3><a href='news.php?id=".$row['news_id']."'>". $row['news_heading'] ."</a></h3>";
							echo "<p>". substr($row['news_description'],0,$pos ) ." ...</p>";
							echo "</div>";
						}
					}
				?>
			</div>
			<div class="latest_blogs">
				<h2><a class="heading_link" href="blogs.php"> Latest Blogs </a></h2>
				<?php
					$sql="select * from blog where blog_isdeleted = 'N' order by blog_rowtimestamp desc LIMIT 2";
					$result=mysql_query($sql);
					while($row = mysql_fetch_array($result)){
						if($row['blog_picture'] != NULL){
							$pos=strpos($row['blog_description'], ' ', 80);
							echo "<div class='latest_blog_content'>";
							echo "<a href='blog.php?id=".$row['blog_id']."'><img width='50px' height='50px' src='img/blog/". $row['blog_picture'] ."'/></a>";
							echo "<h3><a href='blog.php?id=".$row['blog_id']."'>". $row['blog_heading'] ."</a></h3>";
							echo "<p>". substr($row['blog_description'],0,$pos ) ." ...</p>";
							echo "</div>";
						}
						else{
							$pos=strpos($row['blog_description'], ' ', 100);
							echo "<div class='latest_blog_content no-image'>";
							echo "<h3><a href='blog.php?id=".$row['blog_id']."'>". $row['blog_heading'] ."</a></h3>";
							echo "<p>". substr($row['blog_description'],0,$pos ) ." ...</p>";
							echo "</div>";
						}
					}
				?>
			</div>
		</div>
		<div class="home_content_right">
			<div class="home_adv_right">
				ADV.
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
			<div class="upcoming_event">
				<h2><a class="heading_link" href="events.php"> Upcoming Events </a></h2>
				<div class="upcoming_event_content">
					<ul class="bxslider1">
					<?php
						$sql="select * from event where event_isdeleted = 'N' order by event_rowtimestamp LIMIT 6";
						$result=mysql_query($sql);
						while($row = mysql_fetch_array($result)){
						echo "<li><a href='event.php?id=".$row['event_id']."'><img width='100%' height='200px' src='img/event/". $row['event_picture'] ."' title='". $row['event_heading'] ."'/></a></li>";
						}
					?>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<?php
		include('include/footer.php');
	?>
	<script type = 'text/javascript'>
		$(document).ready(function(){
			$('.bxslider').bxSlider({
				mode: 'fade',
				captions: true,
				auto: true,
				speed: 500,
				pause: 3000,
				controls: false,
				pager: false
			});
		});
		$(document).ready(function(){
			$('.bxslider1').bxSlider({
				captions: true,
				auto: true,
				speed: 500,
				pause: 3000,
				controls: false,
				pager: false
			});
		});
	</script>
	
</body>
</html>