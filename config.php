<?php
session_start();


if(!isset($_SESSION['logado']) || !$_SESSION['logado']){
	if($_SERVER['REQUEST_URI']!='/login.php'){
		header("location:/login.php");
		exit();
	}
}

date_default_timezone_set('America/Sao_Paulo');

function query($sql) {
	try
	{
		$mysql = @mysql_connect("localhost", "popsell_popsell", "castelo123") or die(mysql_error());
		mysql_select_db("popsell_popsell", $mysql);
		mysql_set_charset('UTF8', $mysql);
		$query = mysql_query($sql, $mysql);
	}
	catch(Exception $e)
	{
		return mysql_errno($mysql);
	}

	if (!$query)
	{
		return mysql_errno($mysql);
	}
	mysql_close($mysql);
	return $query;
}
?>
