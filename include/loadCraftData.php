<?php
include "../admin_panel/include/config.php";
$page = $_POST['page'];
$cur_page = $page;
$per_page = 3;
$noofpagenumbervisible = 6;
$page -= 1;
$start = $page * $per_page;
$msg = "";
if($_POST['page'])
{
	$sql = "select * from craft where craftIsdeleted = 'N'";
	$sql_count = "select count(*) from craft where craftIsdeleted = 'N'";
	$result = mysql_query($sql) or die(header('Location: ../404-page-not-found.html'));
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


/****************************** DATA LOGIC **********************************************/
$query_pag_data = "$sql LIMIT $start, $per_page";
$result_pag_data = mysql_query($query_pag_data) or die('MySql Error' . mysql_error());

$i=0;
while($row = mysql_fetch_array($result_pag_data)){
	$pos=strpos($row['craftDescription'], ' ', 100);
	$msg .= "<div class='search_result'>";
	$msg .= "<a href='craft.php?id=".$row['craftId']."'><img width='50px' height='50px' src='img/craft/". $row['craftPicture'] ."'/></a>";
	$msg .= "<h3><a href='craft.php?id=".$row['craftId']."'>". $row['craftName'] ."</a></h3>";
	$msg .= "<p>". substr($row['craftDescription'],0,$pos ) ." ...</p>";
	$msg .= "</div>";
	$i++;
}
if($i == 0){
	$msg .= "No Result Found";
}
$msg = "<div class='data'><ul>" . $msg . "</ul></div>"; // Content for Data

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
echo $msg;


?>