<?php
include('lock.php');
include_once("config.php");
if(isset($_GET['id'])){
	$del_id=$_GET['id'];
	$del_query="select craftName,craftIsDeleted from craft where craftId = $del_id";
	$del_update_query="update craft set craftIsDeleted = 'Y' where craftId = $del_id";
	$undel_update_query="update craft set craftIsDeleted = 'N' where craftId = $del_id";
	$result_del = mysql_query($del_query);
	$row_del = mysql_fetch_array($result_del);
	echo "<div class='delete_confirmation'>";
	echo "</div>";
	if($row_del[1]=='N'){
		echo "<div class='delete_msg_box red_box_content'>";
		echo "<p>".$row_del[0]." is now deleted. To undelete again click on isdeleted value corresponding to ".$row_del[0].".</p>";
		echo "<br/><center><a action='".mysql_query($del_update_query)."' href='craft.php'>OK</a></center>";
	}
	elseif($row_del[1]=='Y'){
		echo "<div class='delete_msg_box green_box_content'>";
		echo "<p>".$row_del[0]." is now undeleted. To delete again click on isdeleted value corresponding to ".$row_del[0].".</p>";
		echo "<br/><center><a action=".mysql_query($undel_update_query)." href='craft.php'>OK</a></center>";
	}
	echo "</div>";
}
$sqlType = "select distinct craftType from craft";
$resultType = mysql_query($sqlType);
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<!------------------------ Title ------------------------------>
<title>CraftVatika</title>
<!------------------------ Favicon --------------------------->
<link rel="shortcut icon" href="img/favicon.ico" />
<!------------------------ StyleSheets ---------------------                            -->
<link rel="stylesheet" href="css/styles.css" type="text/css" />
<!------------------------ Javascript ------------------------>
<script type="text/javascript" src="js/nicEdit.js"></script>
<script type="text/javascript" src="js/jquery-1.4.2.min.js"></script> 

<script type="text/javascript">
	$(document).ready(function(){
		function loadData(page,search,srch_id,srch_name,srch_city,srch_state,del,type,sort,ascdesc){                  
			$.ajax
			({
				type: "POST",
				url: "include/loadCraftData.php",
				data: {page : page, search : search, srch_id : srch_id, srch_name : srch_name, srch_city : srch_city, srch_state : srch_state, del : del,type : type, sort : sort, ascdesc : ascdesc},
				success: function(msg)
				{
					$("#container").ajaxComplete(function(event, request, settings)
					{
						$("#container").html(msg);
					});
				}
			});
		}
		var page = 1;
		var search = true;
		var srch_id = $('#srch_id').val();
		var srch_name = $('#srch_name').val();
		var srch_city = $('#srch_city').val();
		var srch_state = $('#srch_state').val();
		var del = $('#del').val();
		var type = $('#type').val();
		var sort = $('#sort').val();
		var ascdesc = $('#ascdesc').val();
		$('#container .pagination li.active').live('click',function(){
			var page = $(this).attr('p');
			loadData(page,search,srch_id,srch_name,srch_city,srch_state,del,type,sort,ascdesc);
		});
		loadData(page,search,srch_id,srch_name,srch_city,srch_state,del,type,sort,ascdesc);
		$('#queryaction').submit(function(){
			search = true;
			srch_id = $('#srch_id').val();
			srch_name = $('#srch_name').val();
			srch_city = $('#srch_city').val();
			srch_state = $('#srch_state').val();
			del = $('#del').val();
			type = $('#type').val();
			sort = $('#sort').val();
			ascdesc = $('#ascdesc').val();
			$('#container .pagination li.active').live('click',function(){
				page = $(this).attr('p');
				loadData(page,search,srch_id,srch_name,srch_city,srch_state,del,type,sort,ascdesc);
			});
			loadData(page,search,srch_id,srch_name,srch_city,srch_state,del,type,sort,ascdesc);
			return false;
		});
	});
</script>
</head>		
<body>
	<?php
		include('include/header.php');
	?>
	<div class="bodyWrapper">
		<div class="fullWidth">
			<h2>Craft Information</h2>
		</div>
		<div class="fullWidth">
			<br/>
			<form id="queryaction" action="craft.php" method="POST" name="searchform">
				<span>ID :</span>
				<input type="text" name="srch_id" id="srch_id"/>&nbsp;&nbsp;&nbsp;
				<span>Name :</span>
				<input type="text" name="srch_name" id="srch_name"/>&nbsp;&nbsp;&nbsp;
				<span>City :</span>
				<input type="text" name="srch_city" id="srch_city"/>&nbsp;&nbsp;&nbsp;
				<span>State :</span>
				<input type="text" name="srch_state" id="srch_state"/>&nbsp;&nbsp;&nbsp;
				<span>Del :</span>
				<select name="del" id="del">
					<option value="any">Any</option>
					<option value="N">N</option>
					<option value="Y">Y</option>
				</select>
				<br/><br/>
				<span>Type :</span>
				<select name="type" id="type">
					<option value="all">All</option>
					<?php
						while($rowType = mysql_fetch_array($resultType))
							echo "<option value='".$rowType['craftType']."'>".$rowType['craftType']."</option>";
					?>
				</select>&nbsp;&nbsp;&nbsp;
				<span>Sort by :</span>
				<select name="sort" id="sort">
					<option value="craftId">id</option>
					<option value="craftName">name</option>
					<option value="craftCity">city</option>
					<option value="craftState">state</option>
					<option value="craftPopularityIndex">Popularity</option>
					<option value="craftType">Type</option>
					<option value="craftIsDeleted">IsDeleted</option>
					<option value="craftRowTimeStamp">Timestamp</option>
				</select>
				<select name="ascdesc" id="ascdesc">
					<option value="asc">asc</option>
					<option value="desc">desc</option>
				</select>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<input id="search" class="link_button" type="submit" value="GO" name="search"/>
				<input class="link_button" type="reset" value="Reset" name="Reset"/>
			</form>
			<br/>
			<div class="note_content">
				<sup>*</sup>&nbsp;&nbsp; : To update click on Id of particular row.<br/>
				<sup>**</sup>&nbsp;: To delete/undelete click on Isdeleted(N/Y) of particular row resp.<br/><br/>
			</div>
			<div class="link_button_group">
				<a class="link_button" href="addCraft.php">Add Craft</a>
				<a class="link_button" href="include/dataExport.php?table=craft" target="_blank">Export to Excel</a>
			</div>
			<div id="container">
				<div class="pagination"></div>
				<div class="data"></div>
			</div>
			<br/>
			<br/>
			<br/>
		</div>
	</div>
</body>
</html>