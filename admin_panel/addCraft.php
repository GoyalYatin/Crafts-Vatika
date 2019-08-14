<?php
include('lock.php');
include('include/config.php');
$sql="select * from states";
$result = mysql_query($sql);
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
			<h2>Add new Craft</h2>
			<br/>
			<form id="addNewCraft" method="POST" action="addCraft.php" name="addNewCraft" enctype="multipart/form-data">
				<table class="table_add_new">
					<tr>
						<td><span>Craft Name </span></td>
						<td><input type="text" name="craftName"/></td>
					</tr>
					<tr class='error_message'>
						<td></td>
						<td>Craft already exists.To Update ""</td>
					</tr>
					<tr>
						<td><span>Craft State </span></td>
						<td>
							<select name="craftState" id="craftState" onchange="showCities(this.value)">
								<option value="">Select State</option>
								<?php
								while($row = mysql_fetch_array($result)){
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
						<td>
							<select name="craftType" id="craftType">
								<option value="">Select Type</option>
								<option value="Furniture">Furniture</option>
								<option value="Home Decor">Home Decor</option>
								<option value="Lifestyle">Lifestyle</option>
								<option value="Jewellery">Jewellery</option>
							</select>
						</td>
					</tr>
					<tr>
						<td><span>Craft Picture </span></td>
						<td>
						<img height="200px" width="200px" src="" id='imagepreview1'><br/>
						<input type="file" name="file" id="file" accept="image/*"/>
						</td>
					</tr>
					<tr>
						<td><span>Craft Description </span></td>
						<td><textarea name="craftDesc" id="craftDesc" style="height:200px;width:100%;"></textarea></td>
					</tr>
					<tr>
						<td></td>
						<td><input type="submit" name="addrow" value="Add" id="addrow"/></td>
					</tr>
				</table>
			</form>   
			<br/>
			<br/>
			<br/>
		</div>
		<?php  
		include "include/uploadCraftPicture.php";
		include "include/addNewCraft.php";
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

$("#file").click(function () {

    $('#imagepreview1').attr('src','');
});




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
	xmlhttp.open("GET","include/showCities.php?q="+str,true);
	xmlhttp.send();
}

$("#addNewCraft").validate({
	ignore: [],
    rules:{
	    craftName:{
			required: true,
		}, 
		craftType:{
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