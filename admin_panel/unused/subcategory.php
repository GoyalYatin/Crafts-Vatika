<?php
include('lock.php');
include("include/config.php");
$sql ="select * from category";
$sql_count ="select count(*) from category";
if(isset($_POST['search'])){
	$id=$_POST['srch_id'];
	$name=$_POST['srch_name'];
	$city=$_POST['srch_city'];
	$state=$_POST['srch_state'];
	$del=$_POST['del'];
	$sortby=$_POST['sort'];
	$inorder=$_POST['ascdesc'];
	if($id!=''){
		$sql .= " where cat_id='".$id."'";
		$sql_count .= " where cat_id='".$id."'";
		if($name!=''){
			$sql .=" and cat_name='".$name."'";
			$sql_count .=" and cat_name='".$name."'";
		}
		if($city!=''){
			$sql .=" and cat_city='".$city."'";
			$sql_count .=" and cat_city='".$city."'";
		}
		if($state!=''){
			$sql .=" and cat_state='".$state."'";
			$sql_count .=" and cat_state='".$state."'";
		}
		if($del!='any'){
			$sql .=" and cat_isDeleted='".$del."'";
			$sql_count .=" and cat_isDeleted='".$del."'";
		}
	}
	elseif($name!=''){
		$sql .= " where cat_name='".$name."'";
		$sql_count .= " where cat_name='".$name."'";
		if($city!=''){
			$sql .=" and cat_city='".$city."'";
			$sql_count .=" and cat_city='".$city."'";
		}
		if($state!=''){
			$sql .=" and cat_state='".$state."'";
			$sql_count .=" and cat_state='".$state."'";
		}
		if($del!='any'){
			$sql .=" and cat_isDeleted='".$del."'";
			$sql_count .=" and cat_isDeleted='".$del."'";
		}
	}
	elseif($city!=''){
		$sql .= " where cat_city='".$city."'";
		$sql_count .= " where cat_city='".$city."'";
		if($state!=''){
			$sql .=" and cat_state='".$state."'";
			$sql_count .=" and cat_state='".$state."'";
		}
		if($del!='any'){
			$sql .=" and cat_isDeleted='".$del."'";
			$sql_count .=" and cat_isDeleted='".$del."'";
		}
	}
	elseif($state!=''){
		$sql .=" where cat_state='".$state."'";
		$sql_count .=" where cat_state='".$state."'";
		if($del!='any'){
			$sql .=" and cat_isDeleted='".$del."'";
			$sql_count .=" and cat_isDeleted='".$del."'";
		}
	}
	elseif($del!='any'){
		$sql .=" where cat_isDeleted='".$del."'";
		$sql_count .=" where cat_isDeleted='".$del."'";
	}
	$sql .=" order by ".$sortby." ".$inorder;
}
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
<script>
var j=1;
</script>
</head>		
<body>
	<?php
		include('include/header.php');
	?>
	<div class="bodyWrapper">
		<div class="fullWidth">
			<h2>Category Information</h2>
		</div>
		<div class="fullWidth">
			<br/>
			<form action="category.php" method="POST" name="searchform">
				<span>ID :</span>
				<input type="text" name="srch_id"/>&nbsp;&nbsp;&nbsp;
				<span>Name :</span>
				<input type="text" name="srch_name"/>&nbsp;&nbsp;&nbsp;
				<span>City :</span>
				<input type="text" name="srch_city"/>&nbsp;&nbsp;&nbsp;
				<span>State :</span>
				<input type="text" name="srch_state"/>&nbsp;&nbsp;&nbsp;
				<span>Del :</span>
				<select name="del">
					<option value="any">Any</option>
					<option value="N">N</option>
					<option value="Y">Y</option>
				</select>
				<br/><br/>
				<span>Sort by :</span>
				<select name="sort">
					<option value="cat_id">id</option>
					<option value="cat_name">name</option>
					<option value="cat_city">city</option>
					<option value="cat_state">state</option>
					<option value="cat_popularityIndex">Popularity</option>
					<option value="cat_isDeleted">IsDeleted</option>
					<option value="cat_rowtimestamp">Timestamp</option>
				</select>
				<select name="ascdesc">
					<option value="asc">asc</option>
					<option value="desc">desc</option>
				</select>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<input class="link_button" type="submit" value="GO" name="search"/>
				<input class="link_button" type="reset" value="Reset" name="Reset"/>
				<script>
					document.searchform.srch_id.value='<?php echo $id; ?>';
					document.searchform.srch_name.value='<?php echo $name; ?>';
					document.searchform.srch_city.value='<?php echo $city; ?>';
					document.searchform.srch_state.value='<?php echo $state; ?>';
					document.searchform.del.value='<?php echo $del; ?>';
					document.searchform.sort.value='<?php echo $sortby; ?>';
					document.searchform.ascdesc.value='<?php echo $inorder; ?>';
				</script>
			</form>
			<br/>
			<div class="note_content">
				<sup>*</sup>&nbsp;&nbsp; : To update click on Id of particular row.<br/>
				<sup>**</sup>&nbsp;: To delete/undelete click on Isdeleted(N/Y) of particular row resp.<br/><br/>
			</div>
			<div class="link_button_group">
				<a class="link_button" href="addCategory.php">Add Category</a>
				<a class="link_button" href="include/dataExport.php?sql=<?php echo $sql ?>" target="_blank">Export to Excel</a>
			</div>
			<div class="pagination">
				<?php
				$res=mysql_query($sql_count);
				$array=mysql_fetch_array($res);
				$total_items = $array[0];
				$perpage = 5;
				$total_pages = ceil($total_items/$perpage);
				if(count($_GET))
					if($_GET['page'] == '')
						$current_page = 1;
					else
						$current_page = $_GET['page'];
				else
					$current_page = 1;
				$offset = ($current_page-1)*$perpage;
				$sql .=" LIMIT ".$offset.",".$perpage;
				$result=mysql_query($sql);
				for ($i=1; $i<=$total_pages; $i++){
					if($i==$current_page){
						echo '<a class="activeLink" href="category.php?page='.$i.'">'.$i.'</a> ';
					}
					else{
						echo '<a href="category.php?page='.$i.'">'.$i.'</a> ';
					}
				}
				?>
			</div>
			<table border="2" cellpadding="3" cellspacing="0" align="center" width="100%" style="color:black;text-align:center;">
			<tr class="heading_row">
				<td>Id<sup>*</sup></td>
				<td>Name</td>
				<td>City</td>
				<td>State</td>
				<td>Description</td>
				<td>Picture</td>
				<td>Priority</td>
				<td>IsDeleted<sup>**</sup></td>
				<td>Timestamp</td>
			</tr>
			<?php
				while($row = mysql_fetch_array($result)){
					$pos=strpos($row['cat_description'], ' ', 150);
					if($row['cat_isDeleted']=='Y')
						echo "<tr class='table_row deleted_row'>";
					else
						echo "<tr class='table_row'>";
							echo "<td><a href='updateCategory.php?id=" . $row['cat_id'] . "' title='Click to update this row'>". $row['cat_id'] ."</a></td>";
							echo "<td>" . $row['cat_name'] . " </td>";
							echo "<td>" . $row['cat_city'] . "</td>";
							echo "<td>" . $row['cat_state'] . "</td>";
							echo "<td>". substr($row['cat_description'],0,$pos ) . "...</td>";
							echo "<td><img width='80' height='80' src='../img/category/" . $row['cat_picture'] . ".jpg'/></td>";
							echo "<td>" . $row['cat_popularityIndex'] . "</td>";
							if($row['cat_isDeleted']=='N')
								echo "<td><a href='category.php' title='Click to delete'>" . $row['cat_isDeleted'] . "</a></td>";
							else
								echo "<td><a href='category.php' title='Click to undelete'>" . $row['cat_isDeleted'] . "</a></td>";
							echo "<td>" . $row['cat_rowtimestamp'] . "</td>";
						echo "</tr>";	
				}
					echo "</table>";
			?>
			<br/>
			<br/>
			<br/>
		</div>
	</div>
</body>
</html>