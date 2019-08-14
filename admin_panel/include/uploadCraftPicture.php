<?php
ini_set('display_errors', '0');    
error_reporting(none); 
if(empty($_FILES) && empty($_POST) && isset($_SERVER['REQUEST_METHOD']) && strtolower($_SERVER['REQUEST_METHOD']) == 'post'){ //catch file overload error...
        $postMax = ini_get('post_max_size'); //grab the size limits...
        echo "<p style=\"color: #F00;\">files larger than 5 Mb not allowed"; // echo out error and solutions...
        
}
else{
$allowedExts = array("gif", "jpeg", "jpg", "png");
$extension = end(explode(".", $_FILES["file"]["name"]));
if ((($_FILES["file"]["type"] == "image/gif")
|| ($_FILES["file"]["type"] == "image/jpeg")
|| ($_FILES["file"]["type"] == "image/jpg")
|| ($_FILES["file"]["type"] == "image/pjpeg")
|| ($_FILES["file"]["type"] == "image/x-png")
|| ($_FILES["file"]["type"] == "image/png"))
&& ($_FILES["file"]["size"] < 5388608)
&& in_array($extension, $allowedExts))
  {
  if ($_FILES["file"]["error"] > 0)
    {
    echo 'error';
    }
  else
    {
   $a=1;

    if (file_exists("../img/craft/" . $_FILES["file"]["name"]))
      {
      $a++;
      }
    
	  
	  $fileName = date('dmYHis').'.'. pathinfo($_FILES['file']['name'],PATHINFO_EXTENSION);
      move_uploaded_file($_FILES["file"]["tmp_name"],"../img/craft/" . $fileName);
    
      
    }
  }
}
  ?>