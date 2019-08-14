<?php
include('include/config.php');
session_start();
$user_check=$_SESSION['login_user'];

$ses_sql=mysql_query("select adm_username from admin where adm_username='$user_check' ");

$row=mysql_fetch_array($ses_sql);

$login_session=$row['adm_username'];

if(!isset($login_session))
{
header("Location: login.php");
}
?>