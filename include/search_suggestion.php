<?php
require_once 'config.php';
if($_GET['type'] == 'search'){
	$result = mysql_query("SELECT craftName FROM craft where craftName LIKE '".($_GET['name_startsWith'])."%' and craftIsdeleted = 'N' LIMIT 6");	
	$data = array();
	//$result_full = mysql_query("SELECT cat_name FROM category where cat_name LIKE '%".($_GET['name_startsWith'])."%' and cat_isdeleted = 'N' LIMIT 6");	
	while ($row = mysql_fetch_array($result)) {
		array_push($data, $row['craftName']);	
	}	
	echo json_encode($data);
}

?>