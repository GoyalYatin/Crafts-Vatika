<?php
include('lock.php');
include('include/config.php');
if(count($_GET)){
	$id=$_GET['id'];
}
else{
	header('Location: ../404-page-not-found.html');
}
$sql="select * from states";
$result = mysql_query($sql);
$sql_cat="select * from craft where craftId=$id";
$result_cat= mysql_query($sql_cat);
$row_cat=mysql_fetch_array($result_cat);
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
<script type="text/javascript">
bkLib.onDomLoaded(function() {
	new nicEditor({maxHeight : 200}).panelInstance('craftDesc');
});
</script>


</head>		
<body>
	<?php
		include('include/header.php');
	?>
	<div class="bodyWrapper">
		<div class="fullWidth">
			<h2>Update Craft</h2>
			<br/>
			<form id="updateCraft" method="POST" action="updateCraft.php" name="updateCraft" enctype="multipart/form-data">
				<table class="table_add_new">
					<tr>
						<td><span>Craft Name </span></td>
						<td><?php echo $row_cat['craftName'] ;?></td>
					</tr>
					<tr>
						<td><span>Craft State </span></td>
						<td>
							<select name="craftState" id="craftState" onchange="showCities(this.value)">
								<option value="">Select State</option>
								<?php
								while($row = mysql_fetch_array($result)){
									if($row_cat['craftState']==$row['state_name']){
										echo "<option value='". $row['state_name'] ."' selected>". $row['state_name'] ."</option>";
									}
									else
										echo "<option value='". $row['state_name'] ."'>". $row['state_name'] ."</option>";
								}
								?>
							</select>
						</td>
					</tr>
					<tr>
						<td><span>Craft City </span></td>
						<td>
 							<select name="craftCity" id="craftCity">
								<option value="">Select City</option>
							</select>
						</td>
					</tr>
					<tr>
						<td><span>Craft Type </span></td>
						<td><?php echo $row_cat['craftType'] ;?></td>
					</tr>
					<tr>
						<td><span>Craft Picture </span></td>
						<td>
						<img height="200px" width="200px" src="../img/craft/<?php echo $row_cat['craftPicture'];?>" id='imagepreview1'><br/>
						<input type="file" name="file" id="file" accept="image/*"/>
						</td>
					</tr>
					<tr>
						<td><span>Craft Description </span></td>
						<td><textarea name="craftDesc" id="craftDesc" style="height:200px;width:100%;"><?php echo $row_cat['craftDescription'];?></textarea></td>
					</tr>
					<tr>
						<td></td>
						<td><input type="submit" name="updaterow" value="Update" id="updaterow"/></td>
					</tr>
				</table>
			</form>   
			<br/>
			<br/>
			<br/>
		</div>
		<?php  
		include "include/uploadCraftPicture.php";
		/*Update query*/
		?>
	</div>
<script type="text/javascript" src='js/jquery.min.js'></script>	
<script type="text/javascript" src='js/jquery.validate.js'></script>
<script>
  

 /*********************** for upload image preview *********************/
 function readURL(input) {

    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#imagepreview1').prop('src', e.target.result).show();
        }

        reader.readAsDataURL(input.files[0]);
    }
}

$("#file").change(function () {
    readURL(this);
    $('#imagepreview1').show();
});

//$("#file").click(function () {

    //$('#imagepreview1').attr('src','');
//});

var state="<?php echo $row_cat['craftState'];?>";
var city="<?php echo $row_cat['craftCity'];?>";
showCities(state);
function showCities(str){
	var xmlhttp;    
	if (str==""){
		document.getElementById("craftCity").innerHTML="";
		return;
	}
	if (window.XMLHttpRequest){// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
	}
	else{// code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange=function(){
		if (xmlhttp.readyState==4 && xmlhttp.status==200){
			document.getElementById("craftCity").innerHTML=xmlhttp.responseText;
		}
	}
	xmlhttp.open("GET","include/showCities.php?q="+str+"&city="+city,true);
	xmlhttp.send();
}

$("#updateCraft").validate({
	ignore: [],
    rules:{
	    craftName:{
			required: true,
		},  
		craftState:{
			required: true,
		},       
		craftCity:{             
			required: true,	
		},
		file:{             
			required: true,	
		},
		craftDesc:{
			required: true,
			minlength: 10,
			maxlength: 30000,
		}
	}
});

</script>

</body>
</html>