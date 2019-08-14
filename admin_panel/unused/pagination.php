<html>
<head>
<link rel="stylesheet" href="css/styles.css" type="text/css" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script> 
<script type="text/javascript">
	$(document).ready(function(){
		function loadData(page){                  
			$.ajax
			({
				type: "POST",
				url: "load_data.php",
				data: "page="+page,
				success: function(msg)
				{
					$("#container").ajaxComplete(function(event, request, settings)
					{
						$("#container").html(msg);
					});
				}
			});
		}
		loadData(1);  // For first time page load default results
		$('#container .pagination li.active').live('click',function(){
			var page = $(this).attr('p');
			loadData(page);
			
		});          
	});
</script>
</head>
<body>
<div id="container">
	<div class="pagination"></div>
	<div class="data"></div>
</div>	
</body>
</html>