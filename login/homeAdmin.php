<?php
session_start();
if (isset($_SESSION['id']) AND ( $_SESSION['role'] == "admin" ))
{
echo "hello Admin :";
echo $_SESSION["id"];
}
else 
{
	header('Location: ' . $_SERVER['HTTP_REFERER']);
	exit;
}
?>