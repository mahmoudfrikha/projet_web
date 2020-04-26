<?php
session_start();
if (isset($_SESSION['id']) AND ( $_SESSION['role'] == "client" ))
{
echo "hello client" .$_SESSION["username"];
echo $_SESSION["id"];
}
else 
{
	header('Location: ' . $_SERVER['HTTP_REFERER']);
	exit;
}
?>