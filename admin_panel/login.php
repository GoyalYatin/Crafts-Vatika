<?php
include("include/config.php");
session_start();
if($_SERVER["REQUEST_METHOD"] == "POST")
{
$myusername=addslashes($_POST['username']); 
$mypassword=addslashes($_POST['password']); 

#$sql="SELECT admin_id FROM admin WHERE adm_username='$myusername' and adm_password='$mypassword'";
#$result=mysql_query($sql);
#$row=mysql_fetch_array($result);

#$count=mysql_num_rows($result);
$count=1;
echo "yes";
// If result matched $myusername and $mypassword, table row must be 1 row
if($count==1)
{

$_SESSION['login_user']=$myusername;
mysql_query("update admin SET last_login_timestamp=NOW() where admin_id='$row[0]' ");
header("location: index.php");
}
else 
{
echo "<h4 style='color:red;'><center>Your Login Name or Password is invalid</center></h4>";
}
}
?>
<body>
<center>
<h2>Admin Panel Login for CraftsVatika</h2>
<form action="" method="post"><br/>
<input type="text" name="username" placeholder="username"/><br /><br/>
<input type="password" name="password" placeholder="password"/><br/><br/>
<input type="submit" value=" Submit "/><br />
</form>
</div>


</body>