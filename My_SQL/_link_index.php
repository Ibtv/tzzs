<?php
	require_once("_link.php");
	/*关键字*/
	$Keyword_sql = "SELECT `k_Description`,`k_Keywords` FROM `i_keyword` order by `k_Id` DESC LIMIT 1";
  	$Keyword_sql_result = mysql_query($Keyword_sql) or die("关键字查询失败!");
	$Keyword_sql_result_row = mysql_fetch_array($Keyword_sql_result);
	$Keyword_keywords = $Keyword_sql_result_row['k_Keywords'];
	$Keyword_description = $Keyword_sql_result_row['k_Description'];
	/*幻灯片*/
	$Slide_sql = "SELECT `s_Image`,`s_Name`FROM `i_slide` order by `s_Id` desc LIMIT 3";
	$Slide_sql_result = mysql_query($Slide_sql) or die("幻灯片查询失败");
	/*公告*/
	$Notice_sql = "SELECT `n_Content` FROM `i_notice` order by `n_Id` desc LIMIT 1";
	$Notice_sql_result = mysql_query($Notice_sql) or die("公告查询失败");
	$Notice_sql_result_row=mysql_fetch_array($Notice_sql_result);
	$Notice_content = $Notice_sql_result_row["n_Content"];
	/*杂志最近*/
	$Journal_all ="SELECT `j_Id`,`j_Edition` FROM `i_journal` order by j_Id DESC LIMIT 12";
  	$Journal_edition = mysql_query($Journal_all) or die("杂志刊号查询失败!");
	/*杂志最近*/
	$Journal_all ="SELECT `j_Id`,`j_Theme`,`j_Edition`,`j_Pathfile`,`j_Content` FROM `i_journal` order by j_Id DESC LIMIT 12";
  	$Journal_all_result = mysql_query($Journal_all) or die("杂志详细查询失败!");
	/*杂志简介*/
	$Introduction_sql = "SELECT `i_Description` FROM `i_introduction` order by `i_Id` DESC LIMIT 1";
  	$Introduction_sql_result = mysql_query($Introduction_sql) or die("关键字查询失败!");
	$Introduction_sql_result_row = mysql_fetch_array($Introduction_sql_result);
	$Introduction_description = $Introduction_sql_result_row['i_Description'];
	/*杂志最新*/
	$Journal_new ="SELECT `j_Id`,`j_Edition`,`j_Publishtime` FROM `i_journal` order by j_Id DESC LIMIT 1";
  	$Journal_new_result = mysql_query($Journal_new) or die("最新杂志查询失败!");
	$Journal_n=mysql_fetch_array($Journal_new_result);
	$newedition = $Journal_n["j_Edition"];
	$newtime = $Journal_n['j_Publishtime'];
	/*杂志最热*/
	$Journal_hot ="SELECT `j_Id`,`j_Edition`,`j_Publishtime` FROM `i_journal` order by j_Click DESC LIMIT 1";
  	$Journal_hot_result = mysql_query($Journal_hot) or die("最热杂志查询失败!");
	$Journal_h=mysql_fetch_array($Journal_hot_result);
	$hotedition = $Journal_h["j_Edition"];
	$hottime = $Journal_h['j_Publishtime'];
	/*联系我们*/
	$Contact_sql = "SELECT `c_Phone`,`c_Mailbox`,`c_Address1`,`c_Address2` FROM `i_contact` order by `c_Id` desc LIMIT 1";
	$Contact_sql_result = mysql_query($Contact_sql) or die("联系信息查询失败");
	$Contact_sql_result_row=mysql_fetch_array($Contact_sql_result);
	$Contact_phone = $Contact_sql_result_row['c_Phone'];
	$Contact_mailbox = $Contact_sql_result_row['c_Mailbox'];
	$Contact_address1 = $Contact_sql_result_row['c_Address1'];
	$Contact_address2 = $Contact_sql_result_row['c_Address2'];
	/*友情链接*/
	$Friend_sql = "SELECT `f_Name`,`f_Image`,`f_Url` FROM `i_friend` order by `f_Id` desc";
	$Friend_sql_result = mysql_query($Friend_sql) or die("友情链接查询失败");
	/*备案信息*/
	$Record_sql = "SELECT `r_Id`,`r_ICP` FROM `i_record` order by `r_Id` desc LIMIT 1";
	$Record_sql_result = mysql_query($Record_sql) or die("备案信息查询失败");
	$Record_sql_result_row=mysql_fetch_array($Record_sql_result);
	$Record_ipc = $Record_sql_result_row['r_ICP'];
		
	$code = mb_substr(str_shuffle("abcdefghijklmnopqrstuvwxyz123456789"),0,4,'utf-8');
?>
