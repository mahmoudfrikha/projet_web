<?php
session_start();
isset($_SESSION['id'])
{
echo "hello" .$_SESSION["username"];
echo $_SESSION["id"];
}
?>