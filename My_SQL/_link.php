<?php
	$DB_HOST = "localhost";
	$DB_USER = "root_sql_en";
	$DB_PASS = "ibtv_rootmysql";
	$DB_NAME = "ibtv_zzdb";
	$con = mysql_connect($DB_HOST,$DB_USER,$DB_PASS);
	mysql_select_db($DB_NAME);
	mysql_query('set names utf8');
	if (!$con)
	  {
	  	die('错误: ' . mysql_error());
	  }
?>
