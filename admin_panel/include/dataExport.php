<?php
include("config.php");
$file = date('dmY_His');
$table_name=$_GET['table'];
$sql="select * from $table_name";
$result = mysql_query($sql);
header("Content-type: text/xls");
header("Content-Disposition: attachment; filename=$table_name-$file.xls");
header("Pragma: no-cache");
header("Expires: 0");
$sep = "\t";
for ($i = 0; $i < mysql_num_fields($result); $i++) {
	echo mysql_field_name($result,$i) . "\t";
}
print("\n");

while($row = mysql_fetch_row($result)){
	$schema_insert = "";
	for($j=0; $j<mysql_num_fields($result);$j++){
		if(!isset($row[$j]))
			$schema_insert .= "NULL".$sep;
		elseif ($row[$j] != "")
			$schema_insert .= "$row[$j]".$sep;
		else
			$schema_insert .= "".$sep;
	}
	$schema_insert = str_replace($sep."$", "", $schema_insert);
	$schema_insert = preg_replace("/\r\n|\n\r|\n|\r/", " ", $schema_insert);
	$schema_insert .= "\t";
	print(trim($schema_insert));
	print "\n";
}
?>