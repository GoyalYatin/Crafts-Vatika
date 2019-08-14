<?php
include("admin_panel/include/config.php");
if(isset($_POST['search_box'])){
	$search_query=$_POST['search_box'];
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
<script type="text/javascript">
	$(document).ready(function(){
		function loadData(page,query){                  
			/*$.ajax
			({
				type: "POST",
				url: "include/loadsearchresult.php",
				data: {page : page,query : query},
				success: function(msg)
				{
					$("#container").ajaxComplete(function(event, request, settings)
					{
						$("#container").html(msg);
					});
				}
			});*/
			var ajaxRequest;
			try{
			   ajaxRequest = new XMLHttpRequest();
			}catch (e){
				try{
					ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
				}catch (e) {
					try{
					ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
					}catch (e){
						return false;
					}
				}
			}
			ajaxRequest.onreadystatechange = function(){
			    if(ajaxRequest.readyState == 4){
					var ajaxDisplay = document.getElementById('container');
					ajaxDisplay.innerHTML = ajaxRequest.responseText;
			    }
			}
			ajaxRequest.open("POST", "include/loadsearchresult.php", true);
			ajaxRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			ajaxRequest.send("page="+page+"&query="+query+""); 
		}
		var page = 1;
		var query = "";
		query= <?php  echo json_encode($search_query); ?>;
		$(document).on('click','#container .pagination li.active',function(){
			var page = $(this).attr('p');
			loadData(page,query);
		});
		loadData(page,query);
	});
</script>

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
					<span>Search Result</span>
				</li>
			</ul>
		</div>
		<div class='first_of_three_div'>
		
		</div>
		<div class='second_of_three_div'>
			<h2 class='page_heading'><span> Search Result </span></h2>
			<div id="container">
				<div class="pagination"></div>
				<div class="data"></div>
			</div>
		</div>
		<div class='third_of_three_div'>
		
		</div>
	</div>
	<?php
		include('include/footer.php');
	?>
</body>
</html>