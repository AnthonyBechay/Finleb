<?php

function connex() {
	
	$idcon=mysqli_connect("localhost", "root", "root", "finleb");
	
	return $idcon;
}
?>