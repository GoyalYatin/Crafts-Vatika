<?php
if(isset($_POST['addrow'])){
	$name=$_POST['craftName'];
	$state=$_POST['craftState'];
	$city=$_POST['craftCity'];
	$file=$fileName;
	$type=$_POST['craftType'];
	$desc=$_POST['craftDesc'];
	$id=1;
	$popularity = 1;
	$del = 'N';
	$sql="select max(craftId) from craft";
	$result=mysql_query($sql);
	$row=mysql_fetch_array($result);
	$id = $row[0]+1;
	
	$sql="select * from craft where craftName='$name'";
	$result=mysql_query($sql);
	$row=mysql_fetch_array($result);
	if($name == $row['craftName']){
		echo "<div class='error_message'>already exists to update please click on link or add with other name and if still need to add with same name contact dev";
		echo "<a href='updateCraft.php?id=". $row['craftId'] ."' target='_blank'>". $row['craftName'] ."</a></div>";
		?>
		<script>document.addNewCraft.craftName.focus();
			document.addNewCraft.craftName.value='<?php echo $name; ?>';
			document.addNewCraft.craftState.value='<?php echo $state; ?>';
			document.addNewCraft.craftCity.value='<?php echo $city; ?>';
			document.addNewCraft.craftType.value='<?php echo $type; ?>';
			document.addNewCraft.file.value='<?php echo $file; ?>';
			document.addNewCraft.craftDesc.value='<?php echo $desc; ?>';
		</script>
		<?php
	}
	else{
		$sql_insert="insert into craft values($id,'$name','$city','$state','$desc','$file','$type',$popularity,'$del',NOW())";
		if (!mysql_query($sql_insert)){
			die(mysql_error());
		}
		?>
		<script> alert("Successfully added")</script>
		<?php
	}
}
?>


