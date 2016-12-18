<?php
	require_once("_link.php");
	/*关键字*/
	$Keyword_sql = "SELECT `k_Description`,`k_Keywords` FROM `i_keyword` order by `k_Id` DESC LIMIT 1";
  	$Keyword_sql_result = mysql_query($Keyword_sql) or die("关键字查询失败!");
	$Keyword_sql_result_row = mysql_fetch_array($Keyword_sql_result);
	/*杂志*/
	@$edition = $_GET['edition'];
	$Journal_sql ="select `j_Id`,`j_Amount`,`j_Pathfile`,`j_Click` from `i_journal` where j_Edition = '$edition'";
  	$Journal_sql_result = mysql_query($Journal_sql) or die("杂志查询失败!");
	$Journal_sql_result_row = mysql_fetch_array($Journal_sql_result);
	$Journal_Id = $Journal_sql_result_row['j_Id'];

	/*上一期*/
	$Journal_up_sql ="SELECT `j_Edition` FROM `i_journal` where j_Id < '$Journal_Id' order by j_Id desc";
  	$Journal_up_sql_result = mysql_query($Journal_up_sql) or die("上一期杂志查询失败!");
	$Journal_up_sql_row = mysql_fetch_array($Journal_up_sql_result);
	$Journal_up_edition = $Journal_up_sql_row['j_Edition'];
	/*下一期*/
	$Journal_down_sql ="SELECT `j_Edition` FROM `i_journal` where j_Id > '$Journal_Id'";
  	$Journal_down_sql_result = mysql_query($Journal_down_sql) or die("下一期杂志查询失败!");
	$Journal_down_sql_row = mysql_fetch_array($Journal_down_sql_result);
	$Journal_down_edition = $Journal_down_sql_row['j_Edition'];

?>
