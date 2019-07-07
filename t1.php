<?php
session_start();
extract($_POST);
$comp_id=$_SESSION['login'];
echo $comp_id;

?>