<?php
include('config.php');
$q=$_GET["q"];
$city=$_GET["city"];
$sql="SELECT * FROM cities where state_id = (select state_id from states where state_name= '".$q."')";
$result = mysql_query($sql);
echo "<select name='cat_city' id='cat_city'>";
while($row = mysql_fetch_array($result)){
	if($city==$row['city_name']){
		echo "<option value='". $row['city_name'] ."' selected>". $row['city_name'] ."</option>";
	}
	else
		echo "<option value='". $row['city_name'] ."'>". $row['city_name'] ."</option>";
}	
echo "</select> ";
?>