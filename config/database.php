<?php
	$db = mysql_connect("localhost", "root", "");
	if(!$db) { echo mysql_error(); } 
	$select_db = mysql_select_db("testing");
	if(!$select_db) { echo mysql_error(); }
?>