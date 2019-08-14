<?php
include"config.php";
$page = $_POST['page'];
$cur_page = $page;
$per_page = 3;
$noofpagenumbervisible = 6;
$page -= 1;
$start = $page * $per_page;
$msg = "";
if($_POST['page'])
{
$sql ="select * from craft";
$sql_count ="select count(*) from craft";
if(isset($_POST['search'])){
	$id=$_POST['srch_id'];
	$name=$_POST['srch_name'];
	$city=$_POST['srch_city'];
	$state=$_POST['srch_state'];
	$del=$_POST['del'];
	$type=$_POST['type'];
	$sortby=$_POST['sort'];
	$inorder=$_POST['ascdesc'];
	if($id!=''){
		$sql .= " where craftId='".$id."'";
		$sql_count .= " where craftId='".$id."'";
		if($name!=''){
			$sql .=" and craftName='".$name."'";
			$sql_count .=" and craftName='".$name."'";
		}
		if($city!=''){
			$sql .=" and craftCity='".$city."'";
			$sql_count .=" and craftCity='".$city."'";
		}
		if($state!=''){
			$sql .=" and craftState='".$state."'";
			$sql_count .=" and craftState='".$state."'";
		}
		if($del!='any'){
			$sql .=" and craftIsDeleted='".$del."'";
			$sql_count .=" and craftIsDeleted='".$del."'";
		}
		if($type!='all'){
			$sql .=" and craftType='".$type."'";
			$sql_count .=" and craftType='".$type."'";
		}
	}
	elseif($name!=''){
		$sql .= " where craftName='".$name."'";
		$sql_count .= " where craftName='".$name."'";
		if($city!=''){
			$sql .=" and craftCity='".$city."'";
			$sql_count .=" and craftCity='".$city."'";
		}
		if($state!=''){
			$sql .=" and craftState='".$state."'";
			$sql_count .=" and craftState='".$state."'";
		}
		if($del!='any'){
			$sql .=" and craftIsDeleted='".$del."'";
			$sql_count .=" and craftIsDeleted='".$del."'";
		}
		if($type!='all'){
			$sql .=" and craftType='".$type."'";
			$sql_count .=" and craftType='".$type."'";
		}
	}
	elseif($city!=''){
		$sql .= " where craftCity='".$city."'";
		$sql_count .= " where craftCity='".$city."'";
		if($state!=''){
			$sql .=" and craftState='".$state."'";
			$sql_count .=" and craftState='".$state."'";
		}
		if($del!='any'){
			$sql .=" and craftIsDeleted='".$del."'";
			$sql_count .=" and craftIsDeleted='".$del."'";
		}
		if($type!='all'){
			$sql .=" and craftType='".$type."'";
			$sql_count .=" and craftType='".$type."'";
		}
	}
	elseif($state!=''){
		$sql .=" where craftState='".$state."'";
		$sql_count .=" where craftState='".$state."'";
		if($del!='any'){
			$sql .=" and craftIsDeleted='".$del."'";
			$sql_count .=" and craftIsDeleted='".$del."'";
		}
		if($type!='all'){
			$sql .=" and craftType='".$type."'";
			$sql_count .=" and craftType='".$type."'";
		}
	}
	elseif($del!='any'){
		$sql .=" where craftIsDeleted='".$del."'";
		$sql_count .=" where craftIsDeleted='".$del."'";
		if($type!='all'){
			$sql .=" and craftType='".$type."'";
			$sql_count .=" and craftType='".$type."'";
		}
	}
	elseif($type!='all'){
		$sql .=" where craftType='".$type."'";
		$sql_count .=" where craftType='".$type."'";
	}
	$sql .=" order by ".$sortby." ".$inorder;
}


/* -------------------PAGINATION LOGIC-------------------------- */
$query_pag_num = $sql_count;
$result_pag_num = mysql_query($query_pag_num);
$row = mysql_fetch_array($result_pag_num);
$count = $row[0];
$no_of_paginations = ceil($count / $per_page);

/* ---------------Calculating the starting and ending values for the loop----------------------------------- */
if ($cur_page >= $noofpagenumbervisible) {
    $start_loop = $cur_page - 3;
    if ($no_of_paginations > $cur_page + 3)
        $end_loop = $cur_page + 3;
    else if ($cur_page <= $no_of_paginations && $cur_page > $no_of_paginations - (3+3)) {
        $start_loop = $no_of_paginations - (3+3);
        $end_loop = $no_of_paginations;
    } else {
        $end_loop = $no_of_paginations;
    }
} else {
    $start_loop = 1;
    if ($no_of_paginations > $noofpagenumbervisible)
        $end_loop = $noofpagenumbervisible;
    else
        $end_loop = $no_of_paginations;
}
/* ----------------------------------------------------------------------------------------------------------- */
$msg .= "<div class='pagination'><ul>";

if ($cur_page > 2+3) {
    $msg .= "<li p='1' class='active'>1</li>";
}

if ($cur_page > 2+3) {
    $msg .= "<li class='list_no_design'> ... </li>";
}


for ($i = $start_loop; $i <= $end_loop; $i++) {

    if ($cur_page == $i)
        $msg .= "<li p='$i' class='active activeLink'>{$i}</li>";
    else
        $msg .= "<li p='$i' class='active'>{$i}</li>";
}

if ($cur_page < $no_of_paginations && $end_loop < $no_of_paginations) {
    $msg .= "<li class='list_no_design'> ... </li><li p='$no_of_paginations' class='active'>$no_of_paginations</li>";
}
$msg .= "</div>";

/****************************** DATA LOGIC **********************************************/
$query_pag_data = "$sql LIMIT $start, $per_page";
$result_pag_data = mysql_query($query_pag_data) or die('MySql Error' . mysql_error());

$msg .= "<table border='2' cellpadding='3' cellspacing='0' align='center' width='100%' style='color:black;text-align:center;'>";
$msg .= "<tr class='heading_row'>";
	$msg .= "<td>Id<sup>*</sup></td>";
	$msg .= "<td>Name</td>";
	$msg .= "<td>City</td>";
	$msg .= "<td>State</td>";
	$msg .= "<td>Description</td>";
	$msg .= "<td>Picture</td>";
	$msg .= "<td>Type</td>";
	$msg .= "<td>Priority</td>";
	$msg .= "<td>IsDeleted<sup>**</sup></td>";
	$msg .= "<td>Timestamp</td>";
$msg .= "</tr>";

while ($row = mysql_fetch_array($result_pag_data)) {
	$pos=strpos($row['craftDescription'], ' ', 150);
	if($row['craftIsDeleted']=='Y')
		$msg .="<tr class='table_row deleted_row'>";
	else
		$msg .="<tr class='table_row'>";
			$msg .="<td><a href='updateCraft.php?id=" . $row['craftId'] . "' title='Click to update this row'>". $row['craftId'] ."</a></td>";
			$msg .="<td>" . $row['craftName'] . " </td>";
			$msg .="<td>" . $row['craftCity'] . "</td>";
			$msg .="<td>" . $row['craftState'] . "</td>";
			$msg .="<td>". substr($row['craftDescription'],0,$pos ) . "...</td>";
			$msg .="<td><img width='80' height='80' src='../img/craft/" . $row['craftPicture'] . "'/></td>";
			$msg .="<td>" . $row['craftType'] . " </td>";
			$msg .="<td>" . $row['craftPopularityIndex'] . "</td>";
			if($row['craftIsDeleted']=='N')
				$msg .="<td><a href='?id=" . $row['craftId'] . "' title='Click to delete'>" . $row['craftIsDeleted'] . "</a></td>";
			else
				$msg .="<td><a href='?id=" . $row['craftId'] . "' title='Click to undelete'>" . $row['craftIsDeleted'] . "</a></td>";
			$msg .="<td>" . $row['craftRowTimeStamp'] . "</td>";
		$msg .="</tr>";
}
$msg .="</table>";
$msg = "<div class='data'><ul>" . $msg . "</ul></div>"; // Content for Data
echo $msg;
}