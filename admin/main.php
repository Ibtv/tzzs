<?php
	error_reporting(E_ALL);
	$i=isset($_GET['i']) ? intval($_GET['i']) : 0;
	require_once("../My_SQL/_link.php");
	//  防止全局变量造成安全隐患
	$TZZS = false;
	//  启动会话
	session_start();
	@$session_path = "../_Sessionpath/".$_SESSION['TZZS'];//上传路径  
	if(!file_exists($session_path))  
	{  
		//检查是否有该文件夹，如果没有就创建，并给予最高权限  
		mkdir("$session_path", 0700);  
	}
	session_save_path(realpath($session_path)); 
	@setcookie(session_name(),session_id(),time()+900,"/".$_SESSION['TZZS']);  	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns = "http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv = "Content-Type" content = "text/html; charset=utf-8" />
<title>后台管理系统</title>
<link rel = "stylesheet" href = "css/main.css">
<?php 
	//  判断是否登陆
	if (isset($_SESSION['TZZS']) and $_SESSION['TZZS'] != 0)
	{
			$id = $_SESSION['TZZS'];
			$group = $_SESSION['GroupId'];
			$name = $_SESSION['UserName'];
			$regdate = date("Y-m-d H:i:s", time());
			$ip = $_SERVER['REMOTE_ADDR'];
		if($_SESSION['land']!= 0)
		{
			$_SESSION['land'] = 0;
			$update_sql = "update `i_user` set u_Lasttime = u_Thistime , u_Thistime = '$regdate' , u_LastIp = u_ThisIp , u_ThisIp = '$ip', u_Number = u_Number + 1  where u_Id = $id";
			$down_path = "../file/";//上传路径  
			if(!file_exists($down_path))  
			{  
				//检查是否有该文件夹，如果没有就创建，并给予最高权限  
				mkdir("$down_path", 0700);  
			}
			mysql_query($update_sql,$con);	
		}
	}
	else
	{
		$_SESSION["TZZS"] = $_SESSION['land'] = $_SESSION['GroupId'] = $_SESSION['UserName'] = $_SESSION['Number'] = $group = $name = $TZZS;	
		die("<div align = 'center' style = 'margin-top:20%'><h1>登陆超时，请重新登陆<h1></div>");
	}
?>
</head>
<body>
<!--[if IE]>    
        <div style = "left:50%; margin-left:-20px; margin-top:15%;">本后台暂不支持IE内核浏览器。请使用其它浏览器。如Google Chrome、Opera、Maxthon、火狐浏览器等最新版本浏览器已完美展示本页面</div>
   		<meta http-equiv = "Refresh" content = "1;URL = index.html" />
<![endif]-->
    <div align = "center"></div>
    <div id = "top">
    	<h2>你好<?php echo $name;?></h2>
        <div class = jg></div>
        <div id = "topTags">
            <ul><li><?php 
				if		($i == 0 ){$Top_Title = '欢迎访问投资招商杂志（电子版）后台管理系统';}
				else if ($i == 10 ){$Top_Title = '个人资料';}
				else if ($i == 11 ){$Top_Title = '个人信息修改';}
				else if ($i == 20 ){$Top_Title = '用户管理';}
				else if ($i == 21 ){$Top_Title = '添加新用户';}
				else if ($i == 22 ){$Top_Title = '用户删除';}
				else if ($i == 30 ){$Top_Title = '公告管理';}
				else if ($i == 31 ){$Top_Title = '添加公告信息';}
				else if ($i == 32 ){$Top_Title = '删除公告信息';}
				else if ($i == 40 ){$Top_Title = '杂志上传';}
				else if ($i == 41 ){$Top_Title = '添加杂志信息';}
				else if ($i == 42 ){$Top_Title = '删除杂志信息';}
				else if ($i == 50 ){$Top_Title = '联系我们';}
				else if ($i == 51 ){$Top_Title = '添加新的地址';}
				else if ($i == 52 ){$Top_Title = '删除地址信息';}
				else if ($i == 60 ){$Top_Title = '友情连接';}
				else if ($i == 61 ){$Top_Title = '添加友情连接';}
				else if ($i == 62 ){$Top_Title = '删除友情连接';}
				else if ($i == 70 ){$Top_Title = '幻灯片';}
				else if ($i == 71 ){$Top_Title = '添加幻灯片信息';}
				else if ($i == 72 ){$Top_Title = '删除幻灯片信息';}
				else if ($i == 80 ){$Top_Title = '关键字';}
				else if ($i == 81 ){$Top_Title = '添加关键字信息';}
				else if ($i == 82 ){$Top_Title = '删除关键字信息';}
				else if ($i == 90 ){$Top_Title = '备案信息';}
				else if ($i == 91 ){$Top_Title = '添加备案信息';}
				else if ($i == 92 ){$Top_Title = '删除备案信息';}
				else if ($i == 100){$Top_Title = '访客留言信息';}
				else if ($i == 102){$Top_Title = '删除留言信息';}
				/*else if ($i == 110 ){$Top_Title = '企业员工';}
				else if ($i == 111 ){$Top_Title = '添加员工信息';}
				else if ($i == 112 ){$Top_Title = '删除员工信息';}*/
				else if ($i == 120 ){$Top_Title = '杂志简介';}
				else if ($i == 121 ){$Top_Title = '添加简介信息';}
				else if ($i == 122 ){$Top_Title = '删除简介信息';}
				else if ($i == 190){$Top_Title = '帮助文档';}
				else if ($i == 200){$Top_Title = '退出登录';}
				else			   {$Top_Title = '提示信息';}
				echo $Top_Title;
			?></li></ul>
        </div>
    </div>
<div id = "main"> 
<div id = "leftMenu">
<ul>
<a href = "?i=0  "><li>后台首页</li></a>
<a href = "?i=10 "><li>个人资料</li></a>
<a href = "?i=20 "><li>用户管理</li></a>
<a href = "?i=30 "><li>公告管理</li></a>
<a href = "?i=40 "><li>杂志上传</li></a>
<a href = "?i=50 "><li>联系我们</li></a>
<a href = "?i=60 "><li>友情连接</li></a>
<a href = "?i=70 "><li>幻灯片</li></a>
<a href = "?i=80 "><li>关键字</li></a>
<a href = "?i=90 "><li>备案信息</li></a>
<a href = "?i=100"><li>访客留言</li></a>
<!--a href = "?i=110"><li>企业员工</li></a-->
<a href = "?i=120"><li>杂志简介</li></a>
<a href = "?i=190"><li>帮助文档</li></a>
<a href = "?i=200"><li>退出登录</li></a>
</ul>
</div>
<div class = jg></div>
<div id = "content">
    <div id = "welcome" class = "content" style = "display:block;">
<?php
switch($i){
case 0:
?>
        <div align = "center">
            <br /><br />
                <script charset = "Shift_JIS" src = "js/honehone_clock.js"></script>
            <br /><br />

                <?php
$User_sql = "SELECT `u_Id`,`u_LastIp`,`u_Lasttime`,`u_ThisIp` FROM `i_user` order by u_Id ";
$User_result = mysql_query($User_sql) or die("个人资料查询失败!");
$User_row = mysql_fetch_array($User_result);
?>
<table align = "center" width = "700" border = "0">
  <tr>
    <td style = "width:90px">欢迎您</td><td style = "width:180px"><?php echo $name;?></td>
    <td style = "width:90px">登陆次数</td><td style = "width:180px"><?php echo $_SESSION['Number'];?></td>
  </tr>
  <tr>
    <td>操作系统</td><td><?php echo PHP_OS;?></td>
    <td>运行环境</td><td><?php echo $_SERVER["SERVER_SOFTWARE"];?></td>
  </tr>
  <tr>
    <td>PHP运行方式</td><td><?php echo php_sapi_name();?></td>
    <td>MYSQL版本</td><td><?php echo mysql_get_server_info();?></td>
  </tr>
  <tr>
    <td>上传附件限制</td><td><?php echo ini_get('upload_max_filesize');?></td>
    <td>执行时间限制</td><td><?php if(!ini_get('max_execution_time')){echo '无限制';}else{echo ini_get('max_execution_time');};?></td>
  </tr>
  <tr>
    <td>文件地址</td><td><?php echo $_SERVER["DOCUMENT_ROOT"];?></td>
    <td>剩余空间</td><td><?php echo round((@disk_free_space(".") / (1024 * 1024)), 2) . 'M';?></td>
  </tr>
  <tr>
    <td>本次登陆时间</td><td style = "width:185px"><?php echo date("Y-m-d", time());?></td>
    <td>本次登陆IP</td><td style = "width:185px"><?php echo $ip;?></td>
  </tr>
  <tr>
    <td>上次登陆时间</td><td><?php echo $User_row['u_Lasttime'];?></td>
    <td>上次登陆IP</td><td><?php echo $User_row['u_LastIp'];?></td>
  </tr>
</table>

        </div>
    </div>
<?php
break;
case 10:
$User_sql = "SELECT `u_Id`,`u_Name`,`u_Sex`,`u_GroupId`,`u_CreateDate`,`u_Address`,`u_QQ`,`u_Phone`,`u_Mailbox`,`u_LastIp`,`u_Lasttime`,`u_ThisIp` FROM `i_user` order by u_Id ";
$User_result = mysql_query($User_sql) or die("个人资料查询失败!");
$User_group = 0;
while ($User_row = mysql_fetch_array($User_result)) 
{
	if(250 < $User_row['u_GroupId']){$User_group = '超级管理员';}
	if(250 == $User_row['u_GroupId']){$User_group = '高级管理员';}
	if(200 == $User_row['u_GroupId']){$User_group = '普通管理员';}
	if(150 == $User_row['u_GroupId']){$User_group = '信息审核员';}
	if(100 == $User_row['u_GroupId']){$User_group = '信息发布员';}
	if(50 == $User_row['u_GroupId']){$User_group = '无权限';}
	if(50 > $User_row['u_GroupId']){$User_group = '游客';}
	if ($_SESSION['TZZS'] == $User_row['u_Id'])
	{?>
<table align = "center" width = "700" border = "1">
  <tr>
    <td style = "width:80px">用户ID</td><td style = "width:185px"><?php echo $User_row['u_Id'];?></td>
    <td style = "width:80px">用户名</td><td style = "width:185px"><?php echo $User_row['u_Name'];?></td>
  </tr>
  <tr>
    <td>性别</td><td><?php echo $User_row['u_Sex'];?></td>
    <td>用户权限</td><td><?php echo $User_group;?></td>
  </tr>
  <tr>
    <td>电话</td><td><?php echo $User_row['u_Phone'];?></td>
    <td>地址</td><td><?php echo $User_row['u_Address'];?></td>
  </tr>
  <tr>
    <td>QQ</td><td><?php echo $User_row['u_QQ'];?></td>
    <td>邮箱</td><td><?php echo $User_row['u_Mailbox'];?></td>
  </tr>
  <tr>
    <td>注册日期</td><td><?php echo $User_row['u_CreateDate'];?></td>
    <td>上次登陆IP</td><td><?php echo $User_row['u_LastIp'];?></td>
  </tr>
  <tr>
    <td>上次登陆时间</td><td><?php echo $User_row['u_Lasttime'];?></td>
    <td>本次登陆IP</td><td><?php echo $User_row['u_ThisIp'];?></td>
  </tr>
</table>

<?php
	}
}
?>
<div style="text-align:center;">
<a href = "?i=11" class="dilog_bmit">修改资料</a>
<a href = "?i=12" class="dilog_bmit">修改密码</a>
</div>
<?php
mysql_free_result($User_result);
break;
case 11:
$User_select_sql = "SELECT `u_Id`,`u_Name`,`u_Sex`,`u_Password`,`u_CreateDate`,`u_Address`,`u_QQ`,`u_Phone`,`u_Mailbox`,`u_Lasttime`,`u_LastIp`,`u_ThisIp`FROM `i_user` order by u_Id ";
$User_result = mysql_query($User_select_sql) or die("个人信息修改查询失败!");
while ($User_row = mysql_fetch_array($User_result)) 
{
	if ($_SESSION['TZZS'] == $User_row['u_Id'])
	{
		?>
<form name = "RegForm" method = "post" action = "?i=16" onSubmit = "return InputCheck(this)">
<table align = "center" width = "700" border = "1">
  <tr>
    <td style = "width:80px">用户ID</td><td style = "width:165px"><input name = "u_Id" type = "text" class = "table_Name"  value = "<?php echo $User_row['u_Id'];?>" readonly /></td>
    <td style = "width:80px">用户名</td><td style = "width:165px"><input name = "u_Name" type = "text" class = "table_Name"  value = "<?php echo $User_row['u_Name'];?>" readonly /></td>
  </tr>
  <tr>
    <td>性别</td>
    <td>
        <select name = "u_Sex" class = "table_Name" type = "text" >
            <?php
				if($User_row['u_Sex'] == '女')
				{
					?>
                        <option selected>男</option>
                        <option selected>女</option>
                    <?php
					}
					
				if($User_row['u_Sex'] == '男')
				{
					?>
                        <option selected>女</option>
                        <option selected>男</option>
                    <?php
					}
			?>
        </select>
	</td>
    <td>电话</td>
    <td><input name = "u_Phone" type = "text" class = "table_Name"  value = "<?php echo $User_row['u_Phone'];?>" onkeyup="this.value=this.value.replace(/\D/g,'')" onafterpaste="this.value=this.value.replace(/\D/g,'')" maxlength = 13 /></td>
  </tr>
  <tr>
</table>
<table align = "center" width = "700" border = "1" style="margin-top:-1px;">
    <td style = "width:110px">地址</td>
    <td>
        <select id="s_province" name = "u_Province" style="width:187px;" selected></select>
        <select id="s_city" name = "u_City" style="width:186px;" selected></select>	
        <select id="s_county" name = "u_County" style="width:186px;" selected></select>	
		<script class="resources library" src="js/area.js" type="text/javascript"></script>
        <script type="text/javascript">_init_area();</script>
     </td>
  </tr>
</table>
<table align = "center" width = "700" border = "1" style="margin-top:-1px;">
  <tr>
    <td style = "width:110px">QQ</td>
    <td><input name = "u_QQ" type = "text" class = "table_Name"  value = "<?php echo $User_row['u_QQ'];?>" onkeyup="this.value=this.value.replace(/\D/g,'')" onafterpaste="this.value=this.value.replace(/\D/g,'')" maxlength = 10/></td>
    <td>邮箱</td>
    <td><input name = "u_Mailbox" type = "text" class = "table_Name"  value = "<?php echo $User_row['u_Mailbox'];?>" /></td>
  </tr>
  <tr>
    <td>注册日期</td>
    <td><input name = "u_Id" type = "text" class = "table_Name"  value = "<?php echo $User_row['u_CreateDate'];?>" readonly /></td>
    <td>上次登陆IP</td>
    <td><input name = "u_LastIp" type = "text" class = "table_Name"  value = "<?php echo $User_row['u_LastIp'];?>" readonly /></td>
  </tr>
  <tr>
    <td>上次登陆时间</td>
    <td><input name = "u_Lasttime" type = "text" class = "table_Name"  value = "<?php echo $User_row['u_Lasttime'];?>" readonly /></td>
    <td>本次登陆IP</td>
    <td><input name = "u_ThisIp" type = "text" class = "table_Name"  value = "<?php echo $User_row['u_ThisIp'];?>" readonly /></td>
  </tr>
</table>
    <div style="text-align:center;">
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
        <input type = "Submit" id="btnSubmit" name = "btnSubmit" class="submitStyle" value = "确定" />
    </div>
</form>

		<?php
	}
}
mysql_free_result($User_result);
break;
case 12:
?>
<form name = "RegForm" method = "post" action = "?i=17" onSubmit = "return InputCheck(this)">
<table align = "center" width = "500" border = "1">
  <tr>
    <td style = "width:80px">旧密码<a style = "float:right">*</a></td>
    <td style = "width:165px"><input type = "password"  name = "temp_Password" class = "table_Name" maxlength = "32" onKeypress = "javascript:if(event.keyCode == 32)event.returnValue = false;" required = "required" /></td>
  </tr>
<tr>
    <td>密码<a style = "float:right">*</a></td>
    <td><input type = "password" class = "table_Name" name = "u_Password" maxlength = "32" onKeypress = "javascript:if(event.keyCode == 32)event.returnValue = false;" required = "required" /></td>
</tr>
<tr>
    <td>确认密码<a style = "float:right">*</a></td>
    <td><input type = "password" class = "table_Name" name = "u_Password2" maxlength = "32" onKeypress = "javascript:if(event.keyCode == 32)event.returnValue = false;" required = "required" /></td>
    </tr>
</table>
    <div style="text-align:center;">
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
        <input type = "Submit" id="btnSubmit" name = "btnSubmit" class="submitStyle" value = "确定" />
    </div>
</form>
<?php
break;
case 16:
if(!isset($_REQUEST['btnSubmit'])){
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">非法访问</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   	break;
}

$sex = $_REQUEST['u_Sex'];
$phone = $_REQUEST['u_Phone'];
$province = $_REQUEST['u_Province'];
$city = $_REQUEST['u_City'];
$county = $_REQUEST['u_County'];
if($province == '省份')
{$province='';}
if($city == '地级市')
{$city='';}
if($county == '市、县级市')
{$county='';}
$address = $province.'-'.$city.'-'.$county;
$qq = $_REQUEST['u_QQ'];
$mailbox = $_REQUEST['u_Mailbox'];
$uesr_update_sql = "update i_user set 
u_Sex = '$sex',
u_Address = '$address',
u_QQ = '$qq',
u_Phone = '$phone',
u_Mailbox = '$mailbox'
where u_Id = $id";
if(mysql_query($uesr_update_sql,$con))
{
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">个人信息修改成功</h4>
        <a href = "?i=10" class="dilog_bmit">返回</a>
    </div>
    <?php
		break;
} 
else {
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">添加数据失败</h4>
    	<h4 style="margin:10px 0"><?php mysql_error();?></h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
		break;
}
break;
case 17:
if(!isset($_REQUEST['btnSubmit'])){
	?>
    <div style="text-align:center;">
    	
    	<h4 style="margin:10px 0">非法访问</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   	break;
}
$temp_Password = $_REQUEST['temp_Password'];
$temp_Password2 = sha1($name.md5($_REQUEST['temp_Password']));
$password = sha1($name.md5($_REQUEST['u_Password']));
$password2 = sha1($name.md5($_REQUEST['u_Password2']));
if ($temp_Password)
{
 $sql = "SELECT * FROM i_user WHERE (u_Name = '$name') and (u_Password ='$temp_Password2')";
 $res = mysql_query($sql);
 $rows = mysql_num_rows($res);
 if(!$rows)
 {
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">旧密码错误</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
	 break;
 }
}else
{
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">密码不能为空</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
		break;
	}
if($password != $password2)
{
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">两次输入的密码不一致</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
		break;
}
$uesr_update_sql = "update i_user set u_Password = '$password' where u_Id = $id";
if(mysql_query($uesr_update_sql,$con))
{
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">用户密码修改成功</h4>
        <a href = "?i=10" class="dilog_bmit">返回</a>
    </div>
    <?php
		break;
} 
else {
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">添加数据失败</h4>
    	<h4 style="margin:10px 0"><?php mysql_error();?></h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
		break;
}
break;
case 20:
?>
	<table width = "1200" border = "1">
  <tr>
    <td style = "width:20px">ID</td>
    <td style = "width:80px">用户名</td>
    <td style = "width:30px">性别</td>
    <td style = "width:60px">用户权限</td>
    <td style = "width:140px">注册日期</td>
    <td style = "width:250px">地址</td>
    <td style = "width:70px">QQ</td>
    <td style = "width:70px">电话</td>
    <td style = "width:90px">邮箱</td>
    <td style = "width:135px">上次登陆时间</td>
    <td style = "width:80px">上次登陆IP</td>
  </tr>
  <?php
	$User_select_sql = "SELECT `u_Id`,`u_Name`,`u_Sex`,`u_GroupId`,`u_CreateDate`,`u_Address`,`u_QQ`,`u_Phone`,`u_Mailbox`,`u_Lasttime`,`u_LastIp`FROM `i_user` order by u_Id ";
  	$User_result = mysql_query($User_select_sql) or die("用户管理查询失败!");
	$User_group = 0;
	while ($User_row = mysql_fetch_array($User_result)) 
	{ 
	if(250 < $User_row['u_GroupId']){$User_group = '超级管理员';}
	if(250 == $User_row['u_GroupId']){$User_group = '高级管理员';}
	if(200 == $User_row['u_GroupId']){$User_group = '普通管理员';}
	if(150 == $User_row['u_GroupId']){$User_group = '信息审核员';}
	if(100 == $User_row['u_GroupId']){$User_group = '信息发布员';}
	if(50 == $User_row['u_GroupId']){$User_group = '无权限';}
	if(50 > $User_row['u_GroupId']){$User_group = '游客';}
	?>
<tr>
    <td><?php echo $User_row['u_Id'];?></td>
    <td><?php echo $User_row['u_Name'];?></td>
    <td><?php echo $User_row['u_Sex'];?></td>
    <td><?php echo $User_group;?></td>
    <td><?php echo $User_row['u_CreateDate'];?></td>
    <td><?php echo $User_row['u_Address'];?></td>
    <td><?php echo $User_row['u_QQ'];?></td>
    <td><?php echo $User_row['u_Phone'];?></td>
    <td><?php echo $User_row['u_Mailbox'];?></td>
    <td><?php echo $User_row['u_Lasttime'];?></td>
    <td><?php echo $User_row['u_LastIp'];?></td>
</tr>
 		<?php
	}
?>
</table>
<div style="text-align:center;">
    <a href = "?i=21" class="dilog_bmit">添加用户</a>
    <a href = "?i=22" class="dilog_bmit">删除用户</a>
    <a href = "?i=23" class="dilog_bmit">权限修改</a>
</div>
<?php 
	mysql_free_result($User_result);
break;
case 21:
	$User_result = mysql_query("select * from `i_user`");
	list($User_result_count) = mysql_fetch_row($User_result);
	if($User_result_count >= 10)
	{
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">用户数量达到上限。请删除后在添加</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
		break;
	}
	else if($group < 200)
	{
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">权限不足，无法执行该操作</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
		break;
	}
	else
?>
<form name = "RegForm" method = "post" action = "?i=26" onSubmit = "return InputCheck(this)">
<table align = "center" width = "700" border = "1">
  <tr>
    <td style = "width:80px">用户名<a style = "float:right">*</a></td><td style = "width:165px"><input name = "u_Name" class = "table_Name"  onkeyup="value=value.replace(/[^\w\.\/]/ig,'')" onKeypress="javascript:if(event.keyCode == 32)event.returnValue = false;" maxlength = 16 required = "required" /></td>
    <td>权限<a style = "float:right">*</a></td>
    <td>
    <select name = "u_GroupId" class = "table_Name" type = "text" >
            <option selected>高级管理员</option>
            <option selected>普通管理员</option>
            <option selected>信息审核员</option>
            <option selected>信息发布员</option>
            <option selected>无权限</option>
            <option selected>游客</option>
    </select>
    </td>
  </tr>
  <tr>
    <td style = "width:80px">密码<a style = "float:right">*</a></td><td style = "width:165px"><input type = "password" class = "table_Name" name = "u_Password"  maxlength = 32 required = "required" onKeypress = "javascript:if(event.keyCode == 32)event.returnValue = false;"/></td>
    <td style = "width:80px">再次输入<a style = "float:right">*</a></td><td style = "width:165px"><input type = "password" class = "table_Name" name = "u_Password2"  maxlength = 32 required = "required" onKeypress = "javascript:if(event.keyCode == 32)event.returnValue = false;"/></td>
  </tr>
  <tr>
    <td>性别</td><td>
        <select name = "u_Sex" class = "table_Name" type = "text" >
            <option selected>女</option>
            <option selected>男</option>
        </select></td>
    <td>电话</td><td><input name = "u_Phone" class = "table_Name" onkeyup="this.value=this.value.replace(/\D/g,'')" onafterpaste="this.value=this.value.replace(/\D/g,'')" maxlength = 12/></td>
  </tr>
  <tr>
    <td>QQ</td><td><input name = "u_QQ" class = "table_Name" onkeyup="this.value=this.value.replace(/\D/g,'')" onafterpaste="this.value=this.value.replace(/\D/g,'')" maxlength = 10/></td>
    <td>邮箱</td><td><input name = "u_Mailbox" type = "text" class = "table_Name" /></td>
  </tr>
  </table>
<table align = "center" width = "700" border = "1" style="margin-top:-1px;">
    <td style = "width:110px">地址</td>
    <td>
        <select id="s_province" name = "u_Province" style="width:187px;" selected></select>
        <select id="s_city" name = "u_City" style="width:186px;" selected></select>	
        <select id="s_county" name = "u_County" style="width:186px;" selected></select>	
		<script class="resources library" src="js/area.js" type="text/javascript"></script>
        <script type="text/javascript">_init_area();</script>
     </td>
  </tr>
</table>
    <div style="text-align:center;">
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
        <input type = "Submit" id="btnSubmit" name = "btnSubmit" class="submitStyle" value = "确定" />
    </div>
</form>
<?php
	mysql_free_result($User_result);
break;
case 22:
if($group < 200)
{
	 	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">权限不足，无法执行该操作</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
	break;
}
?>
<form name = "RegForm" method = "post" action = "?i=27" onSubmit = "return InputCheck(this)">
<table align = "center" width = "500" border = "1">
<tr>
	<td style = "width:80px">用户ID<a style = "float:right">*</a></td>
    <td style = "width:165px"><input name = "u_Id" class = "table_Name" onkeyup="this.value=this.value.replace(/\D/g,'')" onafterpaste="this.value=this.value.replace(/\D/g,'')" maxlength = 3 required = "required" /></td>
    </tr>
<tr>
	<td>用户名<a style = "float:right">*</a></td>
    <td><input name = "u_Name" class = "table_Name" onkeyup = "value = value.replace(/[\W]/g,'') " onbeforepaste = "clipboardData.setData('text',clipboardData.getData('text').replace(/[^\d]/g,''))" maxlength = 16 required = "required" /></td>
    </tr>
    <tr>
	<td>权限<a style = "float:right">*</a></td>
    <td>
    <select name = "u_GroupId" class = "table_Name" type = "text" >
            <option selected>高级管理员</option>
            <option selected>普通管理员</option>
            <option selected>信息审核员</option>
            <option selected>信息发布员</option>
            <option selected>无权限</option>
            <option selected>游客</option>
    </select></td>
</tr>
<tr>
	<td>密码<a style = "float:right">*</a></td>
    <td><input name = "u_Password" type = "password" class = "table_Name" maxlength = 32 required = "required" onKeypress = "javascript:if(event.keyCode == 32)event.returnValue = false;"/></td>
    </tr>
    <tr>
	<td>再次输入<a style = "float:right">*</a></td>
    <td><input name = "u_Password2" type = "password" class = "table_Name" maxlength = 32 required = "required" onKeypress = "javascript:if(event.keyCode == 32)event.returnValue = false;"/></td>
</tr>
  <tr>
    <td>注</td><td><input class = "table_Name" value = "带*号为必填项目" readonly/></td>
  </tr>
</table>
    <div style="text-align:center;">
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
        <input type = "Submit" id="btnSubmit" name = "btnSubmit" class="submitStyle" value = "确定" />
    </div>
</form>
<?php
break;
case 23:
if($group < 200)
{
	 	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">权限不足，无法执行该操作</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
	break;
}
?>
<form name = "RegForm" method = "post" action = "?i=28" onSubmit = "return InputCheck(this)">
<table align = "center" width = "500" border = "1">
<tr>
	<td style = "width:80px">用户ID<a style = "float:right">*</a></td>
    <td style = "width:165px"><input name = "u_Id" class = "table_Name" onkeyup="this.value=this.value.replace(/\D/g,'')" onafterpaste="this.value=this.value.replace(/\D/g,'')" maxlength = 3 required = "required" /></td>
    </tr>
<tr>
	<td>用户名<a style = "float:right">*</a></td>
    <td><input name = "u_Name" class = "table_Name" onkeyup = "value = value.replace(/[\W]/g,'') " onbeforepaste = "clipboardData.setData('text',clipboardData.getData('text').replace(/[^\d]/g,''))" maxlength = 16 required = "required" /></td>
    </tr>
    <tr>
	<td>权限<a style = "float:right">*</a></td>
    <td>
    <select name = "u_GroupId" class = "table_Name" type = "text" >
            <option selected>高级管理员</option>
            <option selected>普通管理员</option>
            <option selected>信息审核员</option>
            <option selected>信息发布员</option>
            <option selected>无权限</option>
            <option selected>游客</option>
    </select></td>
</tr>
<tr>
	<td>密码<a style = "float:right">*</a></td>
    <td><input name = "u_Password" type = "password" class = "table_Name" maxlength = 32 required = "required" onKeypress = "javascript:if(event.keyCode == 32)event.returnValue = false;"/></td>
    </tr>
    <tr>
	<td>再次输入<a style = "float:right">*</a></td>
    <td><input name = "u_Password2" type = "password" class = "table_Name" maxlength = 32 required = "required" onKeypress = "javascript:if(event.keyCode == 32)event.returnValue = false;"/></td>
</tr>
  <tr>
    <td>注</td><td><input class = "table_Name" value = "带*号为必填项目" readonly/></td>
  </tr>
</table>
    <div style="text-align:center;">
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
        <input type = "Submit" id="btnSubmit" name = "btnSubmit" class="submitStyle" value = "确定" />
    </div>
</form>
<?php
break;
case 26:
if(!isset($_REQUEST['btnSubmit'])){
	?>
    <div style="text-align:center;">
    	
    	<h4 style="margin:10px 0">非法访问</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   	break;
}

$Username = $_REQUEST['u_Name'];
$temp_Password = $_REQUEST['u_Password'];
$password = sha1($Username.md5($_REQUEST['u_Password']));
$password2 = sha1($Username.md5($_REQUEST['u_Password2']));
$permissions = $_REQUEST['u_GroupId'];
	if($permissions == '高级管理员'){$groupid = 250;}
	if($permissions == '普通管理员'){$groupid = 200;}
	if($permissions == '信息审核员'){$groupid = 150;}
	if($permissions == '信息发布员'){$groupid = 100;}
	if($permissions == '无权限'){$groupid = 50;}
	if($permissions == '游客'){$groupid = 0;}
$sex = $_REQUEST['u_Sex'];
$province = $_REQUEST['u_Province'];
$city = $_REQUEST['u_City'];
$county = $_REQUEST['u_County'];
if($province == '省份')
{$province='';}
if($city == '地级市')
{$city='';}
if($county == '市、县级市')
{$county='';}
$address = $province.'-'.$city.'-'.$county;
$qq = $_REQUEST['u_QQ'];
$phone = $_REQUEST['u_Phone'];
$mailbox = $_REQUEST['u_Mailbox'];
if(!$temp_Password){
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">密码不能为空</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
		break;
}
if(!preg_match('/^[\w\x80-\xff]{4,16}$/', $Username))
{
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">用户名需大于4个字符并小于16个字符</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
    break;
}
if($password != $password2)
{
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">两次输入的密码不一致</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
    break;
}
if(strlen($temp_Password) < 6 and strlen($temp_Password) > 32){
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">密码长度需大于6个字符并小于32个字符</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
    break;
}
$check_query = mysql_query("select u_Name from i_user where u_Name = '$Username' limit 1");
if(mysql_fetch_array($check_query))
{
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">用户名"<?php echo $Username;?>"已存在</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
    break;
}
if($groupid >= $group)
{
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">添加人员权限不得大于当前用户权限</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
    break;
}

if(!$mailbox == "")   
{   
	preg_match("/^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+(.[a-zA-Z0-9_-])+/",$mailbox);
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">邮箱地址不正确</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php 
    break;
	  
}

$User_into_sql = "INSERT INTO `i_user`(
u_Name,u_Password,u_Sex,u_GroupId,u_CreateDate,u_Address,u_QQ,u_Phone,u_Mailbox,u_number)VALUES(
'$Username','$password','$sex','$groupid','$regdate','$address','$qq','$phone','$mailbox','0')";

if(mysql_query($User_into_sql,$con)){
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">用户添加成功</h4>
        <a href = "?i=20" class="dilog_bmit">返回</a>
    </div>
    <?php
    break;
} 
else {
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">添加数据失败</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
    break;
}
break;
case 27:
if(!isset($_REQUEST['btnSubmit'])){
	?>
    <div style="text-align:center;">
    	
    	<h4 style="margin:10px 0">非法访问</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   	break;
}
$UserId = $_REQUEST['u_Id'];
$Username = $_REQUEST['u_Name'];
$temp_Password = $_REQUEST['u_Password'];
$password = sha1($Username.md5($_REQUEST['u_Password']));
$password2 = sha1($Username.md5($_REQUEST['u_Password2']));
$permissions = $_REQUEST['u_GroupId'];
	if($permissions == '高级管理员'){$groupid = 250;}
	if($permissions == '普通管理员'){$groupid = 200;}
	if($permissions == '信息审核员'){$groupid = 150;}
	if($permissions == '信息发布员'){$groupid = 100;}
	if($permissions == '无权限'){$groupid = 50;}
	if($permissions == '游客'){$groupid = 0;}

if(!$temp_Password){
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">提示:密码不能为空</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
		break;
}
if(strlen($temp_Password) < 6 and strlen($temp_Password) > 32){
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">密码长度需大于6个字符并小于32个字符</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
    break;
}
//检测用户名是否已经存在
$check_query = mysql_query("select u_Id from i_user where u_Id = '$UserId'");
if(!mysql_fetch_array($check_query)){
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">用户ID"<?php echo $UserId;?>"不存在</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
    break;
}
$check_query = mysql_query("select u_Id from i_user where u_Id = '$UserId' and u_Name = '$Username'");
if(!mysql_fetch_array($check_query)){
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">用户名"<?php echo $Username,'"与"',$UserId;?>"不匹配，请输入正确的用户ID</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
    break;
}
if($name == $Username){
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">不可以删除自己</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
    break;
}
//删除信息判断
$check_query = mysql_query("select u_Id from i_user where u_Id = '$UserId' and u_Name = '$Username' and  u_GroupId = '$groupid'");
if(!mysql_fetch_array($check_query)){
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">用户权限错误，无法删除"<?php echo $Username;?>"</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
    break;
}
if($group < $groupid)
{
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">用户权限小于对方，无法删除"<?php echo $Username;?>"</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
    break;
}
if($password != $password2)
{
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">两次输入的密码不一致</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
    break;
}
$check_query = mysql_query("select u_Id from i_user where u_Id = '$UserId' and u_Name = '$Username' and  u_Groupid >= '$groupid' and u_Password = '$password'");
if(!mysql_fetch_array($check_query))
{
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">用户名"<?php echo $Username;?>"的密码不正确,无法进行删除操作，请重新输入</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
    break;
}

//删除数据

	$User_delete_sql = "DELETE FROM i_user WHERE  u_Id = '$UserId' and u_Name = '$Username' and u_Password = '$password' and  u_GroupId = '$groupid'";
	if(mysql_query($User_delete_sql,$con))
	{
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">用户删除成功</h4>
        <a href = "?i=20" class="dilog_bmit">返回</a>
    </div>
    <?php
    	break;
	}
	else
	{
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">添加数据失败</h4>
    	<h4 style="margin:10px 0"><?php mysql_error();?></h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   		break;
	}
break;
case 28:
if(!isset($_REQUEST['btnSubmit'])){
	?>
    <div style="text-align:center;">
    	
    	<h4 style="margin:10px 0">非法访问</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   	break;
}
$UserId = $_REQUEST['u_Id'];
$Username = $_REQUEST['u_Name'];
$temp_Password = $_REQUEST['u_Password'];
$password = sha1($Username.md5($_REQUEST['u_Password']));
$password2 = sha1($Username.md5($_REQUEST['u_Password2']));
$permissions = $_REQUEST['u_GroupId'];
	if($permissions == '高级管理员'){$groupid = 250;}
	if($permissions == '普通管理员'){$groupid = 200;}
	if($permissions == '信息审核员'){$groupid = 150;}
	if($permissions == '信息发布员'){$groupid = 100;}
	if($permissions == '无权限'){$groupid = 50;}
	if($permissions == '游客'){$groupid = 0;}

if(!$temp_Password){
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">提示:密码不能为空</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
		break;
}
if(strlen($temp_Password) < 6 and strlen($temp_Password) > 32){
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">密码长度需大于6个字符并小于32个字符</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
    break;
}
if($name == $Username){
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">不可以修改自己的权限</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
    break;
}

if($password != $password2)
{
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">两次输入的密码不一致</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
    break;
}
//检测用户名是否已经存在
$check_query = mysql_query("select u_Id from i_user where u_Id = '$UserId'");
if(!mysql_fetch_array($check_query)){
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">用户ID"<?php echo $UserId;?>"不存在</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
    break;
}
$check_query = mysql_query("select u_Id from i_user where u_Id = '$UserId' and u_Name = '$Username'");
if(!mysql_fetch_array($check_query)){
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">用户名"<?php echo $Username,'"与"',$UserId;?>"不匹配，请输入正确的用户ID</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
    break;
}

$check_query = mysql_query("select u_Id from i_user where u_Id = '$UserId' and u_Name = '$Username' and  u_GroupId <= 'group'");
if(!mysql_fetch_array($check_query))
{
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">用户权限小于对方，无法修改"<?php echo $Username;?>"</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
    break;
}
$check_query = mysql_query("select u_Id from i_user where u_Id = '$UserId' and u_Name = '$Username' and  u_GroupId <= '$group' and  u_Password = '$password'");
if(!mysql_fetch_array($check_query))
{
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">用户名"<?php echo $Username;?>"的密码不正确,无法进行修改操作，请重新输入</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
    break;
}
$uesr_update_sql = "update i_user set 
u_GroupId = '$groupid'
where 
u_Id = '$UserId' and 
u_Name = '$Username' and 
u_GroupId <= '$group'  and 
u_Password = '$password'";
if(mysql_query($uesr_update_sql,$con))
{
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">用户权限修改成功</h4>
        <a href = "?i=20" class="dilog_bmit">返回</a>
    </div>
    <?php
		break;
} 
else {
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">数据修改失败</h4>
    	<h4 style="margin:10px 0"><?php mysql_error();?></h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
		break;
}
break;
case 30:
?>
<table align = "center" width = "805" border = "1">
  <tr>
    <td style = "width:30px">序号</td>
    <td style = "width:600px">公告内容</td>
    <td style = "width:90px">添加人员</td>
    <td style = "width:120px">添加时间</td>
  </tr>
    <?php
	$Page_size=10; 
	$result=mysql_query('select * from i_notice'); 
	$count = mysql_num_rows($result); 
	$page_count = ceil($count/$Page_size); 
	$init=1; 
	$page_len=9; 
	$max_p=$page_count; 
	$pages=$page_count; 
	//判断当前页码 
	if(empty($_REQUEST['page'])||$_REQUEST['page']<0){ 
	$page=1; 
	}else { 
	$page=$_REQUEST['page']; 
	} 
	$offset=$Page_size*($page-1); 
	$Notice_select_sql = "SELECT `n_Id`,`n_Author`,`n_Publishtime`,`n_Content` FROM `i_notice` order by n_Id limit $offset,$Page_size";
  	$Notice_result = mysql_query($Notice_select_sql) or die("公告信息查询失败!");
	while ($Notice_row = mysql_fetch_array($Notice_result)) 
	{
		?>
<tr>
    <td><?php echo $Notice_row['n_Id'];?></td>
    <td><?php echo $Notice_row['n_Content'];?></td>
    <td><?php echo $Notice_row['n_Author'];?></td>
    <td><?php echo $Notice_row['n_Publishtime'];?></td>
</tr>
		<?php
	}
	$page_len = ($page_len%2)?$page_len:$pagelen+1;//页码个数 
	$pageoffset = ($page_len-1)/2;//页码个数左右偏移量 
	
	$key='<div class="page">'; 
	$key.="<span>$page/$pages</span> "; //第几页,共几页 
	if($page!=1){ 
	$key.="<a href=\"".$_SERVER['PHP_SELF']."?i=30&page=1\">|<<</a> "; //第一页 
	$key.="<a href=\"".$_SERVER['PHP_SELF']."?i=30&page=".($page-1)."\"><</a>"; //上一页 
	}else { 
	$key.="|<< ";//第一页 
	$key.="<"; //上一页 
	} 
	if($pages>$page_len){ 
	//如果当前页小于等于左偏移 
	if($page<=$pageoffset){ 
	$init=1; 
	$max_p = $page_len; 
	}else{//如果当前页大于左偏移 
	//如果当前页码右偏移超出最大分页数 
	if($page+$pageoffset>=$pages+1){ 
	$init = $pages-$page_len+1; 
	}else{ 
	//左右偏移都存在时的计算 
	$init = $page-$pageoffset; 
	$max_p = $page+$pageoffset; 
	} 
	} 
	} 
	for($f=$init;$f<=$max_p;$f++){ 
	if($f==$page){ 
	$key.=' <span>'.$f.'</span>'; 
	} else { 
	$key.=" <a href=\"".$_SERVER['PHP_SELF']."?i=30&page=".$f."\">".$f."</a>"; 
	} 
	} 
	if($page!=$pages){ 
	$key.=" <a href=\"".$_SERVER['PHP_SELF']."?i=30&page=".($page+1)."\">></a> ";//下一页 
	$key.="<a href=\"".$_SERVER['PHP_SELF']."?i=30&page={$pages}\">>>|</a>"; //最后一页 
	}else { 
	$key.=" > ";//下一页 
	$key.=">>|"; //最后一页 
	} 
	$key.='</div>'; 
  ?>
</table>
<div align="center"><?php echo $key?></div>
<div style="text-align:center;">
    <a href = "?i=31" class="dilog_bmit">添加信息</a>
    <a href = "?i=32" class="dilog_bmit">删除信息</a>
</div>
<?php
mysql_free_result($Notice_result);
break;
case 31:
if($group < 100)
{
	 	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">权限不足，无法执行该操作</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
	break;
}
	else
?>
<form name = "RegForm" method = "post" action = "?i=36" onSubmit = "return InputCheck(this)">
<table align = "center" width = "500" border = "1">
  <tr>
    <td>公告内容<a style = "float:right">*</a></td>
    <td><textarea name = "n_Content" type = "text" class = "textarea_Name" required = "required"  rows="20"></textarea></td>
  </tr>
</table>
    <div style="text-align:center;">
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
        <input type = "Submit" id="btnSubmit" name = "btnSubmit" class="submitStyle" value = "确定" />
    </div>
</form>
<?php
break;
case 32:
if($group < 150)
{
	 	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">权限不足，无法执行该操作</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
	break;
}
?>
<form name = "RegForm" method = "post" action = "?i=37" onSubmit = "return InputCheck(this)">
<table align = "center" width = "500" border = "1">
  <tr>
    <td style = "width:80px">序号<a style = "float:right">*</a></td>
    <td style = "width:165px"><input name = "n_Id"  class = "table_Name" onkeyup="this.value=this.value.replace(/\D/g,'')" onafterpaste="this.value=this.value.replace(/\D/g,'')" maxlength = 3 required = "required" /></td>
  </tr>
  <tr>
    <td>添加人名称<a style = "float:right">*</a></td>
    <td><input name = "n_Author"  class = "table_Name" onkeyup = "value = value.replace(/[\W]/g,'') " onbeforepaste = "clipboardData.setData('text',clipboardData.getData('text').replace(/[^\d]/g,''))" maxlength = 16 required = "required" /></td>
  </tr>
<tr>
<td>注意！</td>
<td><input class = "table_Name" value = "删除操作不可恢复。请慎重操作" readonly/></td>
</tr>
</table>
    <div style="text-align:center;">
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
        <input type = "Submit" id="btnSubmit" name = "btnSubmit" class="submitStyle" value = "确定" />
    </div>
</form>
<?php
break;
case 36:
if(!isset($_REQUEST['btnSubmit'])){
	?>
    <div style="text-align:center;">
    	
    	<h4 style="margin:10px 0">非法访问</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   	break;
}
$content = $_REQUEST['n_Content'];

$notice_query = mysql_query("select n_Id from i_notice where n_Content = '$content' limit 1");
if(mysql_fetch_array($notice_query)){
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">公告内容"<?php echo $content;?>"已存在</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
	break;
}
$notice_into_sql = "INSERT INTO `i_notice`(n_Author,n_GroupId,n_PublishIp,n_Publishtime,n_Content)
									VALUES('$name','$group','$ip','$regdate','$content')";

if(mysql_query($notice_into_sql,$con)){
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">公告信息发布成功</h4>
        <a href = "?i=30" class="dilog_bmit">返回</a>
    </div>
    <?php
   		break;
} else {
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">添加数据失败</h4>
    	<h4 style="margin:10px 0"><?php mysql_error();?></h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   		break;
}
break;
case 37:
if(!isset($_REQUEST['btnSubmit'])){
	?>
    <div style="text-align:center;">
    	
    	<h4 style="margin:10px 0">非法访问</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   	break;
}
$id = $_REQUEST['n_Id'];
$author = $_REQUEST['n_Author'];
//验证ID
$notice_query = mysql_query("select n_Id from i_notice where n_Id = '$id'");
if(!mysql_fetch_array($notice_query)){
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">公告编号"<?php echo $id;?>"不存在</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   		break;
}
//验证ID所对应的名称的作者
$notice_query = mysql_query("select n_Id from i_notice where n_Id = '$id' and n_Author = '$author'");
if(!mysql_fetch_array($notice_query)){
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">公告编号"<?php echo $id,'"与添加人员："',$author;?>"不匹配</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   		break;
}
//验证ID所对应的名称的作者的权限
$notice_query = mysql_query("select n_Id from i_notice where n_Id = '$id' and n_Author = '$author' and n_GroupId > '$group'");
if(mysql_fetch_array($notice_query))
{
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">用户权限小于对方，无法删除编号为："<?php echo $id;?>"的公告信息</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   		break;
}

//删除数据

	$notice_delete_sql = "DELETE FROM i_notice WHERE  n_Id = '$id' and n_Author = '$author' and n_GroupId <= '$group'";
	if(mysql_query($notice_delete_sql,$con))
	{
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">公告信息删除成功</h4>
        <a href = "?i=30" class="dilog_bmit">返回</a>
    </div>
    <?php
   		break;
	}
	else
	{
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">删除数据失败</h4>
    	<h4 style="margin:10px 0"><?php mysql_error();?></h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   		break;
	}
break;
case 40:
?>
<table align = "center" width = "805" border = "1">
  <tr>
    <td style = "width:30px">序号</td>
    <td style = "width:120px">主题</td>
    <td style = "width:60px">版本</td>
    <td style = "width:30px">页数</td>
    <td style = "width:340px">杂志简介</td>
    <td style = "width:50px">点击量</td>
    <td style = "width:90px">添加人员</td>
    <td style = "width:120px">添加时间</td>
  </tr>
    <?php
	$Page_size=10; 
	$result=mysql_query('select * from i_journal'); 
	$count = mysql_num_rows($result); 
	$page_count = ceil($count/$Page_size); 
	$init=1; 
	$page_len=9; 
	$max_p=$page_count; 
	$pages=$page_count; 
	//判断当前页码 
	if(empty($_REQUEST['page'])||$_REQUEST['page']<0){ 
	$page=1; 
	}else { 
	$page=$_REQUEST['page']; 
	} 
	$offset=$Page_size*($page-1); 
	$Journal_select_sql = "SELECT `j_Id`,`j_Theme`,`j_Edition`,`j_Amount`,`j_Author`,`j_Publishtime`,`j_Content`,`j_Click` FROM `i_journal` order by j_Id limit $offset,$Page_size";
  	$Journal_result = mysql_query($Journal_select_sql) or die("杂志信息查询失败!");
	while ($Journal_row = mysql_fetch_array($Journal_result)) 
	{
		?>
<tr>
    <td><?php echo $Journal_row['j_Id'];?></td>
    <td><?php echo $Journal_row['j_Theme'];?></td>
    <td><?php echo $Journal_row['j_Edition'];?></td>
    <td><?php echo $Journal_row['j_Amount'];?></td>
    <td><?php echo mb_substr($Journal_row['j_Content'],0,24,'utf-8');?></td>
    <td><?php echo $Journal_row['j_Click'];?></td>
    <td><?php echo $Journal_row['j_Author'];?></td>
    <td><?php echo $Journal_row['j_Publishtime'];?></td>
</tr>
		<?php
	}
	$page_len = ($page_len%2)?$page_len:$pagelen+1;//页码个数 
	$pageoffset = ($page_len-1)/2;//页码个数左右偏移量 
	
	$key='<div class="page">'; 
	$key.="<span>$page/$pages</span> "; //第几页,共几页 
	if($page!=1){ 
	$key.="<a href=\"".$_SERVER['PHP_SELF']."?i=40&page=1\">|<<</a> "; //第一页 
	$key.="<a href=\"".$_SERVER['PHP_SELF']."?i=40&page=".($page-1)."\"><</a>"; //上一页 
	}else { 
	$key.="|<< ";//第一页 
	$key.="<"; //上一页 
	} 
	if($pages>$page_len){ 
	//如果当前页小于等于左偏移 
	if($page<=$pageoffset){ 
	$init=1; 
	$max_p = $page_len; 
	}else{//如果当前页大于左偏移 
	//如果当前页码右偏移超出最大分页数 
	if($page+$pageoffset>=$pages+1){ 
	$init = $pages-$page_len+1; 
	}else{ 
	//左右偏移都存在时的计算 
	$init = $page-$pageoffset; 
	$max_p = $page+$pageoffset; 
	} 
	} 
	} 
	for($f=$init;$f<=$max_p;$f++){ 
	if($f==$page){ 
	$key.=' <span>'.$f.'</span>'; 
	} else { 
	$key.=" <a href=\"".$_SERVER['PHP_SELF']."?i=40&page=".$f."\">".$f."</a>"; 
	} 
	} 
	if($page!=$pages){ 
	$key.=" <a href=\"".$_SERVER['PHP_SELF']."?i=40&page=".($page+1)."\">></a> ";//下一页 
	$key.="<a href=\"".$_SERVER['PHP_SELF']."?i=40&page={$pages}\">>>|</a>"; //最后一页 
	}else { 
	$key.=" > ";//下一页 
	$key.=">>|"; //最后一页 
	} 
	$key.='</div>'; 
  ?>
</table>
<div align="center"><?php echo $key?></div>
<div style="text-align:center;">
    <a href = "?i=41" class="dilog_bmit">添加信息</a>
    <a href = "?i=42" class="dilog_bmit">删除信息</a>
</div>
<?php
mysql_free_result($Journal_result);
break;
case 41:
if($group < 100)
{
	 	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">权限不足，无法执行该操作</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
	break;
}
?>
<form name = "RegForm" method = "post" action = "?i=46" onSubmit = "return InputCheck(this)" enctype = "multipart/form-data" action = "<?php $_SERVER['PHP_SELF']?>?submit = 1" >
<table align = "center" width = "700" border = "1">  <tr>
    <td style = "width:80px">主题<a style = "float:right">*</a></td>
    <td style = "width:600px"><input name = "j_Theme" type = "text" class = "table_Name"  required = "required"  maxlength = 20 /></td>
  </tr>
  <tr>
    <td style = "width:80px">期刊号<a style = "float:right">*</a></td>
    <td style = "width:600px"><input name = "j_Edition" type = "text" required = "required" style="float: left;width: 69.5%;height: 30px;border: 1px solid #00F;padding: 0px;margin: 0px;color: #ff0000;"  maxlength = 20 />例：2015年1月刊则输入201501</td>
  </tr>
  <tr>
    <td>压缩包上传<a style = "float:right">*</a></td>
    <td><input name = "j_Pathfile" id = "j_Pathfile" type = "file">(20 MB max)</td>
  </tr>
  <tr>
    <td>杂志页数<a style = "float:right">*</a></td>
    <td><input name = "j_Amount" type = "text" class = "table_Name"  onkeyup="this.value=this.value.replace(/\D/g,'')" onafterpaste="this.value=this.value.replace(/\D/g,'')"  required = "required"  maxlength = 3 /></td>
  </tr>
  <tr>
  <td>杂志简介<a style = "float:right">*</a></td>
    <td><textarea name = "j_Content" class = "table_Content" required = "required"></textarea></td>
  </tr>
</table>
    <div style="text-align:center;">
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
        <input type = "Submit" id="btnSubmit" name = "btnSubmit" class="submitStyle" value = "确定" />
    </div>
</form>
<?php
break;
case 42:
if($group < 150)
{
	 	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">权限不足，无法执行该操作</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
	break;
}
?>
<form name = "RegForm" method = "post" action = "?i=47" onSubmit = "return InputCheck(this)">
<table align = "center" width = "500" border = "1">
  <tr>
    <td style = "width:80px">序号<a style = "float:right">*</a></td>
    <td style = "width:165px"><input name = "j_Id" class = "table_Name" onkeyup="this.value=this.value.replace(/\D/g,'')" onafterpaste="this.value=this.value.replace(/\D/g,'')" maxlength = 3 required = "required" /></td>
  </tr>
  <tr>
    <td>期刊号<a style = "float:right">*</a></td>
    <td><input name = "j_Edition" type = "text" class = "table_Name"  required = "required" maxlength = 20 /></td>
  </tr>
  <tr>
    <td>上传人<a style = "float:right">*</a></td>
    <td><input name = "j_Author" class = "table_Name"  onkeyup = "value = value.replace(/[\W]/g,'') " onbeforepaste = "clipboardData.setData('text',clipboardData.getData('text').replace(/[^\d]/g,''))" maxlength = 16 required = "required" /></td>
  </tr>
<tr>
<td>注意！</td>
<td><input class = "table_Name" value = "删除操作不可恢复。请慎重操作" readonly/></td>
</tr>
</table>
    <div style="text-align:center;">
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
        <input type = "Submit" id="btnSubmit" name = "btnSubmit" class="submitStyle" value = "确定" />
    </div>
</form>
<?php
break;
case 46:
if(!isset($_REQUEST['btnSubmit'])){
	?>
    <div style="text-align:center;">
    	
    	<h4 style="margin:10px 0">非法访问</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   	break;
}
$theme = $_REQUEST['j_Theme'];
$edition = $_REQUEST['j_Edition'];
$amount = $_REQUEST['j_Amount'];
$content = $_REQUEST['j_Content'];
if(!preg_match('/^[\w\x80-\xff]{4,24}$/', $theme)){
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">主题长度应大于4位并且小于24位</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   		break;
}
if(!preg_match('/^[\w\x80-\xff]{6,24}$/', $edition)){
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">版本号长度应大于6位并且小于24位</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   		break;
}
//验证杂志是否存在
$check_query = mysql_query("select j_Id from `i_journal` where j_Edition = '$edition'");
if(mysql_fetch_array($check_query)){
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">杂志编号已存在</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   		break;
}

// Check post_max_size (http://us3.php.net/manual/en/features.file-upload.php#73762)
	$POST_MAX_SIZE = ini_get('post_max_size');
	$unit = strtoupper(substr($POST_MAX_SIZE, -1));
	$multiplier = ($unit == 'M' ? 1048576 : ($unit == 'K' ? 1024 : ($unit == 'G' ? 1073741824 : 1)));

	if ((int)$_SERVER['CONTENT_LENGTH'] > $multiplier*(int)$POST_MAX_SIZE && $POST_MAX_SIZE) {
		header("HTTP/1.1 500 Internal Server Error"); // This will trigger an uploadError event in 
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">POST 超过最大允许大小</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   		break;
	}

// Settings
	$save_path = "../file/".$edition."/";				// The path were we will save the file (getcwd() may not be reliable and should be tested in your environment)
	if(!file_exists($save_path))  
	{  
		//检查是否有该文件夹，如果没有就创建，并给予最高权限  
		mkdir("$save_path", 0700);  
	}
	$upload_name = "j_Pathfile";
	$max_file_size_in_bytes = 20971520;				// 20MB in bytes
	$extension_whitelist = array("zip");	// Allowed file extensions
	$valid_chars_regex = '.A-Z0-9_ !@#$%^&()+={}\[\]\',~`-';				// Characters allowed in the file name (in a Regular Expression format)
	
// Other variables	
	$MAX_FILENAME_LENGTH = 260;
	$file_name = "";
	$file_extension = "";
	$uploadErrors = array(
        0=>"没有错误,文件上传成功",
        1=>"上传文件超过upload_max_filesize指令在php . ini",
        2=>"上传文件超过MAX_FILE_SIZE指令中指定的HTML表单",
        3=>"上传文件只是部分上传",
        4=>"没有文件被上传",
        6=>"缺少一个临时文件夹"
	);


// Validate the upload
	if (!isset($_FILES[$upload_name])) {
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">
		<?php
		HandleError("No upload found in \$_FILES for " . $upload_name);
		?>
   		</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   		break;
	} else if (isset($_FILES[$upload_name]["error"]) && $_FILES[$upload_name]["error"] != 0) {
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0"><?php  echo $uploadErrors[$_FILES[$upload_name]["error"]];?></h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   		break;
	} else if (!isset($_FILES[$upload_name]["tmp_name"]) || !@is_uploaded_file($_FILES[$upload_name]["tmp_name"])) {
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">上传失败is_uploaded_file测试</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   		break;
	} else if (!isset($_FILES[$upload_name]['name'])) {
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">文件没有名字</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   		break;
	}
	
// Validate the file size (Warning: the largest files supported by this code is 2GB)
	$file_size = @filesize($_FILES[$upload_name]["tmp_name"]);
	if (!$file_size || $file_size > $max_file_size_in_bytes) {
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">文件超过了最大允许的大小</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   		break;
	}
	
	if ($file_size <= 0) {
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">文件大小外允许下限</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   		break;

	}


// Validate file name (for our purposes we'll just remove invalid characters)
	$file_name = preg_replace('/[^'.$valid_chars_regex.']|\.+$/i', "", basename($_FILES[$upload_name]['name']));
	if (strlen($file_name) == 0 || strlen($file_name) > $MAX_FILENAME_LENGTH) {
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">无效文件名</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   		break;
	}


// Validate that we won't over-write an existing file
	if (file_exists($save_path . $file_name)) {
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">具有该名称的文件已经存在</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   		break;
	}

// Validate file extension
	$path_info = pathinfo($_FILES[$upload_name]['name']);
	$file_extension = $path_info["extension"];
	$is_valid_extension = false;
	foreach ($extension_whitelist as $extension) {
		if (strcasecmp($file_extension, $extension) == 0) {
			$is_valid_extension = true;
			break;
		}
	}
	if (!$is_valid_extension) {
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">无效的文件扩展名</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   		break;
	}

	if (!@move_uploaded_file($_FILES[$upload_name]["tmp_name"], $save_path.$file_name)) {
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">文件不能被保存</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   		break;
	}

function HandleError($message) {
	echo $message;
}
$Journal_type = $_FILES[$upload_name]["name"];
/*解压部分*/
$zip_filename = $Journal_type;
$zip_filename = key_exists('zip', $_GET) && $_GET['zip']?$_GET['zip']:$zip_filename;
$zip_filepath = str_replace('\\', '/', dirname(__FILE__)) . '/' . $save_path. $zip_filename;
if(!is_file($zip_filepath))
{
	 ?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">文件:"<?php echo $zip_filepath;?>"不存在</h4>
        <a href = "?i=40" class="dilog_bmit">返回</a>
    </div>
    <?php
	 break;
}
$zip = new ZipArchive();
$rs = $zip->open($zip_filepath);
if($rs !== TRUE)
{
	 ?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">解压失败!Error Code:"<?php echo $rs;?>"</h4>
        <a href = "?i=40" class="dilog_bmit">返回</a>
    </div>
    <?php
	 break;
}
$zip->extractTo($save_path);
$zip->close();
/*入库部分*/
	$journal_into_sql = "INSERT INTO `i_journal`(j_Theme,j_Edition,j_Pathfile,j_Amount,j_Author,j_GroupId,j_PublishIp,j_Publishtime,j_Content)
										VALUES('$theme','$edition','$save_path','$amount','$name','$group','$ip','$regdate','$content')";
	if(mysql_query($journal_into_sql,$con)){
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">杂志发布成功</h4>
        <a href = "?i=40" class="dilog_bmit">返回</a>
    </div>
    <?php
			break;
	} else {	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">添加数据失败</h4>
    	<h4 style="margin:10px 0"><?php mysql_error();?></h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php	
}
break;
case 47:
if(!isset($_REQUEST['btnSubmit'])){
	?>
    <div style="text-align:center;">
    	
    	<h4 style="margin:10px 0">非法访问</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   	break;
}
$Journalid = $_REQUEST['j_Id'];
$edition = $_REQUEST['j_Edition'];
$author = $_REQUEST['j_Author'];
//验证ID
$check_query = mysql_query("select j_Id from i_journal where j_Id = '$Journalid'");
if(!mysql_fetch_array($check_query)){
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">杂志编号"<?php echo $Journalid;?>"不存在</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
	break;
}
//验证标题
$check_query = mysql_query("select j_Id from i_journal where j_Id = '$Journalid'  and j_Edition = '$edition'");
if(!mysql_fetch_array($check_query)){
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">杂志版本"<?php echo $edition;?>"不存在</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
	break;
}
//验证ID所对应作者
$check_query = mysql_query("select j_Id from i_journal where j_Id = '$Journalid' and j_Edition = '$edition' and j_Author = '$author'");
if(!mysql_fetch_array($check_query)){
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">杂志版本"<?php echo $showname,'"与添加人员 ："',$author;?>"不匹配</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
	break;
}
//验证ID所对应的名称的作者的权限
$check_query = mysql_query("select j_Id from i_journal where j_Id = '$Journalid' and j_Edition = '$edition' and j_Author = '$author' and j_GroupId > '$group'");
if(mysql_fetch_array($check_query))
{
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">用户权限小于对方，无法删除杂志版本为"<?php echo $edition;?>"的数据</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
	break;
}
//删除的文件
$delete_path = mysql_query("select j_Pathfile from i_journal where j_Id = '$Journalid' and j_Edition = '$edition' and j_Author = '$author'");
$delete_file = mysql_fetch_array($delete_path);
$cacheDir = $delete_file['j_Pathfile'];
@$dh = opendir($cacheDir);
while (@$file = readdir($dh)){
if (($file == '.') || ($file == '..')) { continue; }

if (file_exists( $cacheDir . '/' .$file)) {
if (!unlink($cacheDir . '/' . $file)) {
break;
}
}
}
@closedir($dh);
  //删除当前文件夹：
  if(@!rmdir($cacheDir))
  {
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">文件夹删除失败</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
		break;
	}
//删除数据
	$Journal_delete_sql = "DELETE FROM i_journal WHERE j_Id = '$Journalid' and j_Edition = '$edition' and j_Author = '$author' and j_GroupId <= '$group'";
	if(mysql_query($Journal_delete_sql,$con))
	{
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">杂志删除成功</h4>
        <a href = "?i=40" class="dilog_bmit">返回</a>
    </div>
    <?php
		break;
	}
	else
	{
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">删除数据失败</h4>
    	<h4 style="margin:10px 0"><?php mysql_error();?></h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
		break;
	}
break;
case 50:
?>
<table align = "center" width = "805" border = "1">
  <tr>
    <td style = "width:30px">序号</td>
    <td style = "width:90px">电话</td>
    <td style = "width:90px">邮箱</td>
    <td style = "width:150px">省市区</td>
    <td style = "width:150px">楼名层数</td>
    <td style = "width:90px">添加人员</td>
    <td style = "width:120px">添加时间</td>
  </tr>
    <?php
	$Contact_select_sql = "SELECT `c_Id`,`c_Phone`,`c_Mailbox`,`c_Address1`,`c_Address2`,`c_Author`,`c_Publishtime` FROM `i_contact` order by c_Id ";
  	$Contact_result = mysql_query($Contact_select_sql) or die("联系我们查询失败!");
	while ($Contact_row = mysql_fetch_array($Contact_result)) 
{?>
<tr>
    <td><?php echo $Contact_row['c_Id'];?></td>
    <td><?php echo $Contact_row['c_Phone'];?></td>
    <td><?php echo $Contact_row['c_Mailbox'];?></td>
    <td><?php echo $Contact_row['c_Address1'];?></td>
    <td><?php echo $Contact_row['c_Address2'];?></td>
    <td><?php echo $Contact_row['c_Author'];?></td>
    <td><?php echo $Contact_row['c_Publishtime'];?></td>
</tr>
  <?php
}
  ?>
</table>
<div style="text-align:center;">
    <a href = "?i=51" class="dilog_bmit">添加信息</a>
    <a href = "?i=52" class="dilog_bmit">删除信息</a>
</div>
<?php
mysql_free_result($Contact_result);
break;
case 51:
if($group < 100)
{
	 	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">权限不足，无法执行该操作</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
	break;
}
	$Contact_result = mysql_query("select * from i_contact");
	list($Contact_result_count) = mysql_fetch_row($Contact_result);
	if($Contact_result_count >= 5)
	{
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">地址信息达到上限。请删除后在添加</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   		break;
	}
	else

?>
<form name = "RegForm" method = "post" action = "?i=56" onSubmit = "return InputCheck(this)" enctype = "multipart/form-data" action = "<?php $_SERVER['PHP_SELF']?>?submit = 1">
<table align = "center" width = "500" border = "1">
    <td style = "width:80px">电话<a style = "float:right">*</a></td>
    <td style = "width:165px"><input name = "c_Phone"  class = "table_Name" onkeyup="this.value=this.value.replace(/\D/g,'')" onafterpaste="this.value=this.value.replace(/\D/g,'')" maxlength = 13 required = "required" /></td>
  </tr>
  <tr>
    <td>邮箱<a style = "float:right">*</a></td>
    <td><input name = "c_Mailbox" type = "text" class = "table_Name"  maxlength = 32 required = "required" /></td>
  </tr>
  <tr>
    <td>地址(市区县街)<a style = "float:right">*</a></td>
    <td><input name = "c_Address1" type = "text" class = "table_Name"  maxlength = 32 required = "required" /></td>
  </tr>
  <tr>
    <td>地址(楼名层数)<a style = "float:right">*</a></td>
    <td><input name = "c_Address2" type = "text" class = "table_Name"  maxlength = 32 required = "required" /></td>
  </tr>
</table>
    <div style="text-align:center;">
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
        <input type = "Submit" id="btnSubmit" name = "btnSubmit" class="submitStyle" value = "确定" />
    </div>
</form>
<?php
break;
case 52:
if($group < 150)
{
	 	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">权限不足，无法执行该操作</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
	break;
}
?>
<form name = "RegForm" method = "post" action = "?i=57" onSubmit = "return InputCheck(this)">
<table align = "center" width = "500" border = "1">
  <tr>
    <td style = "width:80px">序号<a style = "float:right">*</a></td>
    <td style = "width:165px"><input name = "c_Id"  class = "table_Name" onkeyup="this.value=this.value.replace(/\D/g,'')" onafterpaste="this.value=this.value.replace(/\D/g,'')" maxlength = 3 required = "required" /></td>
  </tr>
  <tr>
    <td>添加人名称<a style = "float:right">*</a></td>
    <td><input name = "c_Author"  class = "table_Name" onkeyup = "value = value.replace(/[\W]/g,'') " onbeforepaste = "clipboardData.setData('text',clipboardData.getData('text').replace(/[^\d]/g,''))" maxlength = 16 required = "required" /></td>
  </tr>
<tr>
<td>注意！</td>
<td><input class = "table_Name" value = "删除操作不可恢复。请慎重操作" readonly/></td>
</tr>
</table>
    <div style="text-align:center;">
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
        <input type = "Submit" id="btnSubmit" name = "btnSubmit" class="submitStyle" value = "确定" />
    </div>
</form>
<?php
break;
case 56:
if(!isset($_REQUEST['btnSubmit'])){
	?>
    <div style="text-align:center;">
    	
    	<h4 style="margin:10px 0">非法访问</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   	break;
}
$phone = $_REQUEST['c_Phone'];
$address1 = $_REQUEST['c_Address1'];
$address2 = $_REQUEST['c_Address2'];
$mailbox = $_REQUEST['c_Mailbox'];
$check_query = mysql_query("select c_Phone from i_contact where c_Phone = '$phone' and c_Address2 = '$address2' and  c_Mailbox = '$mailbox' limit 1");
if(mysql_fetch_array($check_query)){
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">地址信息"<?php echo $phone,'——',$address1.$address2,'——',$mailbox;?>"已存在</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   		break;
}
if(!$mailbox == "")   
{
	if(!preg_match("/^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+(.[a-zA-Z0-9_-])+/",$mailbox))
	{
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">邮箱地址不正确</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php 
    break;
	}
	  
}
$Contact_into_sql = "INSERT INTO `i_contact`(c_Phone,c_Mailbox,c_Address1,c_Address2,c_Author,c_GroupId,c_PublishIp,c_Publishtime)
									VALUES('$phone','$mailbox','$address1','$address2','$name','$group','$ip','$regdate')";
if(mysql_query($Contact_into_sql,$con)){
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">地址添加成功</h4>
        <a href = "?i=50" class="dilog_bmit">返回</a>
    </div>
    <?php
   		break;
} else {
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">添加数据失败</h4>
    	<h4 style="margin:10px 0"><?php mysql_error();?></h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   		break;
}
break;
case 57:
if(!isset($_REQUEST['btnSubmit'])){
	?>
    <div style="text-align:center;">
    	
    	<h4 style="margin:10px 0">非法访问</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   	break;
}
$Contactid = $_REQUEST['c_Id'];
$author = $_REQUEST['c_Author'];
//验证ID
$check_query = mysql_query("select c_Id from i_contact where c_Id = '$Contactid'");
if(!mysql_fetch_array($check_query)){
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">编号"<?php echo $Contactid;?>"不存在</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   		break;
}
//验证ID所对应作者
$check_query = mysql_query("select c_Id from i_contact where c_Id = '$Contactid' and c_Author = '$author'");
if(!mysql_fetch_array($check_query)){
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">编号"<?php echo $Contactid,'"与添加人员"',$author;?>"不匹配</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   		break;
}
//验证ID所对应的名称的作者的权限
$check_query = mysql_query("select c_Id from i_contact where c_Id = '$Contactid' and c_Author = '$author' and c_GroupId > '$group'");
if(mysql_fetch_array($check_query))
{
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">用户权限小于对方，无法删除编号为"<?php echo $Contactid;?>"的数据</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   		break;
}
//删除数据

	$Contact_delete_sql = "DELETE FROM i_contact WHERE c_Id = '$Contactid' and c_Author = '$author' and c_GroupId <= '$group'";
	if(mysql_query($Contact_delete_sql,$con))
	{
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">地址删除成功</h4>
        <a href = "?i=50" class="dilog_bmit">返回</a>
    </div>
    <?php
   		break;
	}
	else
	{
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">删除数据失败</h4>
    	<h4 style="margin:10px 0"><?php mysql_error();?></h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   		break;
	}

break;
case 60:
?>
<table align = "center" width = "805" border = "1">
  <tr>
    <td style = "width:30px">序号</td>
    <td style = "width:180px">伙伴名称</td>
    <td style = "width:160px">伙伴LOGO</td>
    <td style = "width:180px">伙伴网址</td>
    <td style = "width:90px">添加人员</td>
    <td style = "width:120px">添加时间</td>
  </tr>
    <?php
	$Page_size=10; 
	$result=mysql_query('select * from i_friend'); 
	$count = mysql_num_rows($result); 
	$page_count = ceil($count/$Page_size); 
	$init=1; 
	$page_len=9; 
	$max_p=$page_count; 
	$pages=$page_count; 
	//判断当前页码 
	if(empty($_REQUEST['page'])||$_REQUEST['page']<0){ 
	$page=1; 
	}else { 
	$page=$_REQUEST['page']; 
	} 
	$offset=$Page_size*($page-1); 
	$Friend_select_sql = "SELECT `f_Id`,`f_Name`,`f_Image`,`f_Url`,`f_Author`,`f_Publishtime` FROM `i_friend` order by f_Id limit $offset,$Page_size";
  	$Friend_result = mysql_query($Friend_select_sql) or die("友情链接查询失败!");
	while ($Friend_row = mysql_fetch_array($Friend_result)) 
	{
		?>
<tr>
    <td><?php echo $Friend_row['f_Id'];?></td>
    <td><?php echo $Friend_row['f_Name'];?></td>
    <td><a target="_blank" href="<?php echo $Friend_row['f_Image']?>"><?php echo mb_substr($Friend_row['f_Image'],19,100,'utf-8');?></a></td>
    <td><?php echo $Friend_row['f_Url'];?></td>
    <td><?php echo $Friend_row['f_Author'];?></td>
    <td><?php echo $Friend_row['f_Publishtime'];?></td>
</tr>
		<?php
	}
	$page_len = ($page_len%2)?$page_len:$pagelen+1;//页码个数 
	$pageoffset = ($page_len-1)/2;//页码个数左右偏移量 
	
	$key='<div class="page">'; 
	$key.="<span>$page/$pages</span> "; //第几页,共几页 
	if($page!=1){ 
	$key.="<a href=\"".$_SERVER['PHP_SELF']."?i=60&page=1\">|<<</a> "; //第一页 
	$key.="<a href=\"".$_SERVER['PHP_SELF']."?i=60&page=".($page-1)."\"><</a>"; //上一页 
	}else { 
	$key.="|<< ";//第一页 
	$key.="<"; //上一页 
	} 
	if($pages>$page_len){ 
	//如果当前页小于等于左偏移 
	if($page<=$pageoffset){ 
	$init=1; 
	$max_p = $page_len; 
	}else{//如果当前页大于左偏移 
	//如果当前页码右偏移超出最大分页数 
	if($page+$pageoffset>=$pages+1){ 
	$init = $pages-$page_len+1; 
	}else{ 
	//左右偏移都存在时的计算 
	$init = $page-$pageoffset; 
	$max_p = $page+$pageoffset; 
	} 
	} 
	} 
	for($f=$init;$f<=$max_p;$f++){ 
	if($f==$page){ 
	$key.=' <span>'.$f.'</span>'; 
	} else { 
	$key.=" <a href=\"".$_SERVER['PHP_SELF']."?i=60&page=".$f."\">".$f."</a>"; 
	} 
	} 
	if($page!=$pages){ 
	$key.=" <a href=\"".$_SERVER['PHP_SELF']."?i=60&page=".($page+1)."\">></a> ";//下一页 
	$key.="<a href=\"".$_SERVER['PHP_SELF']."?i=60&page={$pages}\">>>|</a>"; //最后一页 
	}else { 
	$key.=" > ";//下一页 
	$key.=">>|"; //最后一页 
	} 
	$key.='</div>'; 
  ?>
</table>
<div align="center"><?php echo $key?></div>
<div style="text-align:center;">
    <a href = "?i=61" class="dilog_bmit">添加信息</a>
    <a href = "?i=62" class="dilog_bmit">删除信息</a>
</div>
<?php
mysql_free_result($Friend_result);
break;
case 61:
if($group < 100)
{
	 	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">权限不足，无法执行该操作</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
	break;
}
?>
<form name = "RegForm" method = "post" action = "?i=66" onSubmit = "return InputCheck(this)" enctype = "multipart/form-data" action = "<?php $_SERVER['PHP_SELF']?>?submit = 1" >
<table align = "center" width = "500" border = "1">
  <tr>
    <td style = "width:80px">伙伴名称<a style = "float:right">*</a></td>
    <td style = "width:165px"><input name = "f_Name" type = "text" class = "table_Name"  required = "required" maxlength = 12/></td>
  </tr>
  <tr>
    <td>伙伴LOGO<a style = "float:right">*</a></td>
    <td><input name = "f_Image" type = "file">(200 KB max)</td>
  </tr>
  <tr>
  <style type="text/css">
.web_add {
width: 91.3%;
height: 30px;
border: 1px solid #00F;
padding: 0px;
margin: 0px;
color: #ff0000;
}
  </style>
    <td>伙伴网址</td>
    <td>http://<input name = "f_Url" type = "text"  class = "web_add" maxlength = 64/></td>
  </tr>
  <tr>
</table>
    <div style="text-align:center;">
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
        <input type = "Submit" id="btnSubmit" name = "btnSubmit" class="submitStyle" value = "确定" />
    </div>
</form>
<?php
break;
case 62:
if($group < 150)
{
	 	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">权限不足，无法执行该操作</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
	break;
}
?>
<form name = "RegForm" method = "post" action = "?i=67" onSubmit = "return InputCheck(this)">
<table align = "center" width = "500" border = "1">
  <tr>
    <td style = "width:80px">序号<a style = "float:right">*</a></td>
    <td style = "width:165px"><input name = "f_Id"  class = "table_Name" onkeyup="this.value=this.value.replace(/\D/g,'')" onafterpaste="this.value=this.value.replace(/\D/g,'')" maxlength = 3 required = "required" /></td>
  </tr>
  <tr>
    <td>伙伴名称<a style = "float:right">*</a></td>
    <td><input name = "f_Name" type = "text" class = "table_Name" required = "required" /></td>
  </tr>
<tr>
<td>注意！</td>
<td><input class = "table_Name" value = "删除操作不可恢复。请慎重操作" readonly/></td>
</tr>
</table>
    <div style="text-align:center;">
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
        <input type = "Submit" id="btnSubmit" name = "btnSubmit" class="submitStyle" value = "确定" />
    </div>
</form>
<?php
break;
case 66:
if(!isset($_REQUEST['btnSubmit'])){
	?>
    <div style="text-align:center;">
    	
    	<h4 style="margin:10px 0">非法访问</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   	break;
}
$Friendname = $_REQUEST['f_Name'];
$Friend_image_path = "../file/Logo/";        //上传路径  
if(!file_exists($Friend_image_path))  
{  
	//检查是否有该文件夹，如果没有就创建，并给予最高权限  
	mkdir("$Friend_image_path", 0700);  
} 
//允许上传的文件格式  
$Friend_image_type = array("image/gif","image/jpeg","image/pjpeg","image/png","image/x-png","image/bmp");  
//检查上传文件是否在允许上传的类型  
if(!in_array($_FILES["f_Image"]["type"],$Friend_image_type))
{  
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">伙伴LOGO格式不正确，只可上传gif、jpg、png、bmp格式图像文件</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php  
	break;  
} 
if($_FILES["f_Image"]["name"])  
{  
		$Friend_image_type1 = $_FILES["f_Image"]["name"];  
		$Friend_image_type2 = $Friend_image_path.time().$Friend_image_type1;
}
if($_FILES["f_Image"]["size"]>200000)  
{ 
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">伙伴LOGO文件大小不得超过200KB</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   	break;
}
if(@preg_match("/[\x7f-\xff]/","$Friend_image_type2"))
{
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">伙伴LOGO文件名称不能含有中文字符</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   	break;
}else{
	$Friend_image_type = move_uploaded_file($_FILES["f_Image"]["tmp_name"],$Friend_image_type2);
}
$url = $_REQUEST['f_Url'];
if('' == $url)
{
	$url = '#';
	}else{
			$url = 'http://'.$url;
		}
$check_query = mysql_query("select f_Name from i_friend where f_Name = '$Friendname' limit 1");
if(mysql_fetch_array($check_query)){
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">伙伴信息"<?php echo $Friendname;?>"已存在</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   		break;
}
$Friend_into_sql = "INSERT INTO `i_friend`(f_Name,f_Image,f_Url,f_Author,f_GroupId,f_PublishIp,f_Publishtime)
								VALUES('$Friendname','$Friend_image_type2','$url','$name','$group','$ip','$regdate')";

if(mysql_query($Friend_into_sql,$con)){
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">合作伙伴添加成功</h4>
        <a href = "?i=60" class="dilog_bmit">返回</a>
    </div>
    <?php
   		break;
} else {
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">添加数据失败</h4>
    	<h4 style="margin:10px 0"><?php mysql_error();?></h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   		break;
}
break;
case 67:
if(!isset($_REQUEST['btnSubmit'])){
	?>
    <div style="text-align:center;">
    	
    	<h4 style="margin:10px 0">非法访问</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   	break;
}
$Friendid = $_REQUEST['f_Id'];
$Friendname = $_REQUEST['f_Name'];
//验证ID
$check_query = mysql_query("select f_Id from i_friend where f_Id = '$Friendid'");
if(!mysql_fetch_array($check_query)){
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">伙伴编号"<?php echo $Friendid;?>"不存在</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   		break;
}
//验证ID所对应作者
$check_query = mysql_query("select f_Id from i_friend where f_Id = '$Friendid' and f_Name = '$Friendname'");
if(!mysql_fetch_array($check_query)){
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">伙伴编号"<?php echo $Friendid,'"与伙伴名称 ："',$Friendname;?>"不匹配</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   		break;
}

//验证ID所对应的名称的作者的权限
$check_query = mysql_query("select f_Id from i_friend where f_Id = '$Friendid' and f_Name = '$Friendname' and f_GroupId > '$group'");
if(mysql_fetch_array($check_query))
{
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">用户权限小于对方,无法删除伙伴编号为"<?php echo $Friendid;?>"的数据</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   	break;
}

//删除的文件
$delete_image = mysql_query("select f_Image from i_friend where f_Id = '$Friendid' and f_Name = '$Friendname' and f_GroupId <= '$group'");
$delete_file = mysql_fetch_array($delete_image);
$file = $delete_file['f_Image'];
if (file_exists($file))
{
    $delete_ok = unlink ($file);
}
//删除数据
$Friend_delete_sql = "DELETE FROM i_friend WHERE f_Id = '$Friendid' and f_Name = '$Friendname' and f_GroupId <= '$group'";
if(mysql_query($Friend_delete_sql,$con))
{
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">合作伙伴删除成功</h4>
        <a href = "?i=60" class="dilog_bmit">返回</a>
    </div>
    <?php
	break;
}
else
{
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">添加数据失败</h4>
    	<h4 style="margin:10px 0"><?php mysql_error();?></h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
	break;
}
break;
case 70:
?>
<table align = "center" width = "805" border = "1">
  <tr>
    <td style = "width:30px">序号</td>
    <td style = "width:400px">标题</td>
    <td style = "width:90px">添加人员</td>
    <td style = "width:120px">添加时间</td>
  </tr>
    <?php
	$Page_size=10; 
	$result=mysql_query('select * from i_slide'); 
	$count = mysql_num_rows($result); 
	$page_count = ceil($count/$Page_size); 
	$init=1; 
	$page_len=9; 
	$max_p=$page_count; 
	$pages=$page_count; 
	//判断当前页码 
	if(empty($_REQUEST['page'])||$_REQUEST['page']<0){ 
	$page=1; 
	}else { 
	$page=$_REQUEST['page']; 
	} 
	$offset=$Page_size*($page-1); 
	$Slide_select_sql = "SELECT `s_Id`,`s_Image`,`s_Name`,`s_Author`,`s_Publishtime` FROM `i_slide` order by s_Id limit $offset,$Page_size";
  	$Slide_result = mysql_query($Slide_select_sql) or die("幻灯片查询失败!");
	while ($Slide_row = mysql_fetch_array($Slide_result)) 
{?>
<tr>
    <td><?php echo $Slide_row['s_Id'];?></td>
    <td><a target="_blank" href="<?php echo $Slide_row['s_Image']?>"><?php echo mb_substr($Slide_row['s_Name'],0,10,'utf-8');?></a></td>
    <td><?php echo $Slide_row['s_Author'];?></td>
    <td><?php echo $Slide_row['s_Publishtime'];?></td>
</tr>
  <?php
	}
	$page_len = ($page_len%2)?$page_len:$pagelen+1;//页码个数 
	$pageoffset = ($page_len-1)/2;//页码个数左右偏移量 
	
	$key='<div class="page">'; 
	$key.="<span>$page/$pages</span> "; //第几页,共几页 
	if($page!=1){ 
	$key.="<a href=\"".$_SERVER['PHP_SELF']."?i=70&page=1\">|<<</a> "; //第一页 
	$key.="<a href=\"".$_SERVER['PHP_SELF']."?i=70&page=".($page-1)."\"><</a>"; //上一页 
	}else { 
	$key.="|<< ";//第一页 
	$key.="<"; //上一页 
	} 
	if($pages>$page_len){ 
	//如果当前页小于等于左偏移 
	if($page<=$pageoffset){ 
	$init=1; 
	$max_p = $page_len; 
	}else{//如果当前页大于左偏移 
	//如果当前页码右偏移超出最大分页数 
	if($page+$pageoffset>=$pages+1){ 
	$init = $pages-$page_len+1; 
	}else{ 
	//左右偏移都存在时的计算 
	$init = $page-$pageoffset; 
	$max_p = $page+$pageoffset; 
	} 
	} 
	} 
	for($f=$init;$f<=$max_p;$f++){ 
	if($f==$page){ 
	$key.=' <span>'.$f.'</span>'; 
	} else { 
	$key.=" <a href=\"".$_SERVER['PHP_SELF']."?i=70&page=".$f."\">".$f."</a>"; 
	} 
	} 
	if($page!=$pages){ 
	$key.=" <a href=\"".$_SERVER['PHP_SELF']."?i=70&page=".($page+1)."\">></a> ";//下一页 
	$key.="<a href=\"".$_SERVER['PHP_SELF']."?i=70&page={$pages}\">>>|</a>"; //最后一页 
	}else { 
	$key.=" > ";//下一页 
	$key.=">>|"; //最后一页 
	} 
	$key.='</div>'; 
  ?>
</table>
<div align="center"><?php echo $key?></div>
<div style="text-align:center;">
    <a href = "?i=71" class="dilog_bmit">添加信息</a>
    <a href = "?i=72" class="dilog_bmit">删除信息</a>
</div>
<?php
mysql_free_result($Slide_result);
break;
case 71:
if($group < 100)
{
	 	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">权限不足，无法执行该操作</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
	break;
}
?>
<form name = "RegForm" method = "post" action = "?i=76" onSubmit = "return InputCheck(this)" enctype = "multipart/form-data" action = "<?php $_SERVER['PHP_SELF']?>?submit = 1" >
<table align = "center" width = "500" border = "1">
  <tr>
    <td style = "width:80px">标题<a style = "float:right">*</a></td>
    <td style = "width:600px"><input name = "s_Name" type = "text" class = "table_Name"  required = "required"  maxlength = 20 /></td>
  </tr>
  <tr>
    <td>图片<a style = "float:right">*</a></td>
    <td><input name = "s_Image" type = "file">(500 KB max)</td>
  </tr>
</table>
    <div style="text-align:center;">
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
        <input type = "Submit" id="btnSubmit" name = "btnSubmit" class="submitStyle" value = "确定" />
    </div>
</form>
<?php
break;
case 72:
if($group < 150)
{
	 	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">权限不足，无法执行该操作</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
	break;
}
?>
<form name = "RegForm" method = "post" action = "?i=77" onSubmit = "return InputCheck(this)">
<table align = "center" width = "500" border = "1">
  <tr>
    <td style = "width:80px">序号<a style = "float:right">*</a></td>
    <td style = "width:165px"><input name = "s_Id" class = "table_Name" onkeyup="this.value=this.value.replace(/\D/g,'')" onafterpaste="this.value=this.value.replace(/\D/g,'')" maxlength = 3 required = "required" /></td>
  </tr>
  <tr>
    <td>标题<a style = "float:right">*</a></td>
    <td><input name = "s_Name" type = "text" class = "table_Name"  required = "required" maxlength = 20 /></td>
  </tr>
  <tr>
    <td>作者<a style = "float:right">*</a></td>
    <td><input name = "s_Author" class = "table_Name"  onkeyup = "value = value.replace(/[\W]/g,'') " onbeforepaste = "clipboardData.setData('text',clipboardData.getData('text').replace(/[^\d]/g,''))" maxlength = 16 required = "required" /></td>
  </tr>
<tr>
<td>注意！</td>
<td><input class = "table_Name" value = "删除操作不可恢复。请慎重操作" readonly/></td>
</tr>
</table>
    <div style="text-align:center;">
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
        <input type = "Submit" id="btnSubmit" name = "btnSubmit" class="submitStyle" value = "确定" />
    </div>
</form>
<?php
break;
case 76:
if(!isset($_REQUEST['btnSubmit'])){
	?>
    <div style="text-align:center;">
    	
    	<h4 style="margin:10px 0">非法访问</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   	break;
}
$Slidename = $_REQUEST['s_Name'];
$Slide_image_path = "../file/Slide/";        //幻灯片图片上传路径  
if(!file_exists($Slide_image_path))  
{  
	//检查是否有该文件夹，如果没有就创建，并给予最高权限  
	mkdir("$Slide_image_path", 0700);  
} 
//允许上传的文件格式  
$Slide_image_type = array("image/gif","image/jpeg","image/pjpeg","image/bmp");  
//检查上传文件是否在允许上传的类型  
if(!in_array($_FILES["s_Image"]["type"],$Slide_image_type))
{ 
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">幻灯片图片格式不正确</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php  
	break;  
} 
if($_FILES["s_Image"]["name"])  
{  
		$Slide_image_type1 = $_FILES["s_Image"]["name"];  
		$Slide_image_type2 = $Slide_image_path.time().$Slide_image_type1;
}
if($_FILES["s_Image"]["size"]>500000)  
{ 
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">图片文件大小不得超过500KB</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   	break;
}
if(!preg_match('/^[\w\x80-\xff]{8,80}$/', $Slidename)){
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">标题长度需大于2个字并小于20个字</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
	break;
}
$check_query = mysql_query("select s_Name from i_slide where s_Name = '$Slidename' limit 1");
if(mysql_fetch_array($check_query)){
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">文章标题"<?php echo $Slidename;?>"已存在</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
	break;
}
if(@preg_match("/[\x7f-\xff]/","$Slide_image_type2"))
{
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">图片文件名称不能含有中文字符</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   	break;
}else{
	$Slide_image_type = move_uploaded_file($_FILES["s_Image"]["tmp_name"],$Slide_image_type2);
}
$Slide_into_sql = "INSERT INTO `i_slide`(s_Image,s_Name,s_Author,s_GroupId,s_PublishIp,s_Publishtime)
								VALUES('$Slide_image_type2','$Slidename','$name','$group','$ip','$regdate')";

if(mysql_query($Slide_into_sql,$con)){
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">文章发布成功</h4>
        <a href = "?i=70" class="dilog_bmit">返回</a>
    </div>
    <?php
	break;
} else {
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">添加数据失败</h4>
    	<h4 style="margin:10px 0"><?php mysql_error();?></h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
	break;
}
break;
case 77:
if(!isset($_REQUEST['btnSubmit'])){
	?>
    <div style="text-align:center;">
    	
    	<h4 style="margin:10px 0">非法访问</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   	break;
}
$Slideid = $_REQUEST['s_Id'];
$Slidename = $_REQUEST['s_Name'];
$author = $_REQUEST['s_Author'];
//验证ID
$check_query = mysql_query("select s_Id from i_slide where s_Id = '$Slideid'");
if(!mysql_fetch_array($check_query)){
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">文章编号"<?php echo $Slideid;?>"不存在</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
	break;
}
//验证标题
$check_query = mysql_query("select s_Id from i_slide where s_Id = '$Slideid'  and s_Name = '$Slidename'");
if(!mysql_fetch_array($check_query)){
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">文章名称"<?php echo $Slidename;?>"不存在</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
	break;
}
//验证ID所对应作者
$check_query = mysql_query("select s_Id from i_slide where s_Id = '$Slideid' and s_Name = '$Slidename' and s_Author = '$author'");
if(!mysql_fetch_array($check_query)){
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">文章编号"<?php echo $showname,'"与添加人员 ："',$author;?>"不匹配</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
	break;
}
//验证ID所对应的名称的作者的权限
$check_query = mysql_query("select s_Id from i_slide where s_Id = '$Slideid' and s_Name = '$Slidename' and s_Author = '$author' and s_GroupId > '$group'");
if(mysql_fetch_array($check_query))
{
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">用户权限小于对方，无法删除文章标题为"<?php echo $Slidename;?>"的数据</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
	break;
}
//删除的文件
$delete_image = mysql_query("select s_Image from i_slide where s_Id = '$Slideid' and s_Name = '$Slidename'");
$delete_file = mysql_fetch_array($delete_image);
$file = $delete_file['s_Image'];
if (file_exists($file))
{
    $delete_ok = unlink ($file);
}
//删除数据
	$Slide_delete_sql = "DELETE FROM i_slide WHERE s_Id = '$Slideid' and s_Name = '$Slidename' and s_Author = '$author' and s_GroupId <= '$group'";
	if(mysql_query($Slide_delete_sql,$con))
	{
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">文章删除成功</h4>
        <a href = "?i=70" class="dilog_bmit">返回</a>
    </div>
    <?php
		break;
	}
	else
	{
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">删除数据失败</h4>
    	<h4 style="margin:10px 0"><?php mysql_error();?></h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
		break;
	}
break;
case 80:
?>
<table align = "center" width = "805" border = "1">
  <tr>
    <td style = "width:30px">序号</td>
    <td style = "width:300px">网站描述</td>
    <td style = "width:200px">网站关键字</td>
    <td style = "width:90px">添加人员</td>
    <td style = "width:120px">添加时间</td>
  </tr>
    <?php
	$Keyword_select_sql = "SELECT `k_Id`,`k_Description`,`k_Keywords`,`k_Author`,`k_Publishtime` FROM `i_keyword` order by k_Id ";
  	$Keyword_result = mysql_query($Keyword_select_sql) or die("关键字查询失败!");
	while ($Keyword_row = mysql_fetch_array($Keyword_result)) 
{?>
<tr>
    <td><?php echo $Keyword_row['k_Id'];?></td>
    <td><?php echo mb_substr($Keyword_row['k_Description'],0,24,'utf-8');?></td>
    <td><?php echo $Keyword_row['k_Keywords'];?></td>
    <td><?php echo $Keyword_row['k_Author'];?></td>
    <td><?php echo $Keyword_row['k_Publishtime'];?></td>
</tr>
  <?php
}
  ?>
</table>
<div style="text-align:center;">
    <a href = "?i=81" class="dilog_bmit">添加信息</a>
    <a href = "?i=82" class="dilog_bmit">删除信息</a>
</div>
<?php
mysql_free_result($Keyword_result);
break;
case 81:
if($group < 100)
{
	 ?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">权限不足，无法执行该操作</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
	break;
}
	$Keyword_result = mysql_query("select * from i_keyword");
	list($Keyword_result_count) = mysql_fetch_row($Keyword_result);
	if($Keyword_result_count >= 5)
	{
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">关键字信息达到上限。请删除后在添加</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   		break;
	}
	else
?>
<form name = "RegForm" method = "post" action = "?i=86" onSubmit = "return InputCheck(this)">
<table align = "center" width = "500" border = "1">
    <td style = "width:80px">网站描述<a style = "float:right">*</a></td>
    <td style = "width:165px"><input name = "k_Description" type = "text" class = "table_Name"  required = "required" maxlength = 256/></td>
  </tr>
  <tr>
    <td>网站关键字<a style = "float:right">*</a></td>
    <td><input name = "k_Keywords" type = "text" class = "table_Name"  maxlength = 32 required = "required" /></td>
  </tr>
<tr>
<td>提示！</td>
<td><input class = "table_Name" value = "多个关键字请用、符号分割" readonly/></td>
</tr>
</table>
    <div style="text-align:center;">
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
        <input type = "Submit" id="btnSubmit" name = "btnSubmit" class="submitStyle" value = "确定" />
    </div>
</form>
<?php
break;
case 82:
if($group < 150)
{
	 	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">权限不足，无法执行该操作</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
	break;
}
?>
<form name = "RegForm" method = "post" action = "?i=87" onSubmit = "return InputCheck(this)">
<table align = "center" width = "500" border = "1">
  <tr>
    <td style = "width:80px">序号<a style = "float:right">*</a></td>
    <td style = "width:165px"><input name = "k_Id"  class = "table_Name" onkeyup="this.value=this.value.replace(/\D/g,'')" onafterpaste="this.value=this.value.replace(/\D/g,'')" maxlength = 3 required = "required" /></td>
  </tr>
  <tr>
    <td>添加人名称<a style = "float:right">*</a></td>
    <td><input name = "k_Author"  class = "table_Name" onkeyup = "value = value.replace(/[\W]/g,'') " onbeforepaste = "clipboardData.setData('text',clipboardData.getData('text').replace(/[^\d]/g,''))" maxlength = 16 required = "required" /></td>
  </tr>
<tr>
<td>注意！</td>
<td><input class = "table_Name" value = "删除操作不可恢复。请慎重操作" readonly/></td>
</tr>
</table>
    <div style="text-align:center;">
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
        <input type = "Submit" id="btnSubmit" name = "btnSubmit" class="submitStyle" value = "确定" />
    </div>
</form>
<?php
break;
case 86;
if(!isset($_REQUEST['btnSubmit'])){
	?>
    <div style="text-align:center;">
    	
    	<h4 style="margin:10px 0">非法访问</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   	break;
}

$description = $_REQUEST['k_Description'];
$Keywords = $_REQUEST['k_Keywords'];
$Keyword_query = mysql_query("select k_Keywords from i_keyword where k_Description = '$description' limit 1");
if(mysql_fetch_array($Keyword_query)){
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">网站描述"<?php echo $description;?>"已存在</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
	break;
}
$Keyword_query = mysql_query("select k_Description from i_keyword where k_Keywords = '$Keywords' limit 1");
if(mysql_fetch_array($Keyword_query)){
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">网站关键字"<?php echo $Keywords;?>"已存在</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
	break;
}
$Keyword_into_sql = "INSERT INTO `i_keyword`(k_Description,k_Keywords,k_Author,k_GroupId,k_PublishIp,k_Publishtime)
									VALUES('$description','$Keywords','$name','$group','$ip','$regdate')";

if(mysql_query($Keyword_into_sql,$con)){
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">关键字发布成功</h4>
        <a href = "?i=80" class="dilog_bmit">返回</a>
    </div>
    <?php
   		break;
} else {
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">添加数据失败</h4>
    	<h4 style="margin:10px 0"><?php mysql_error();?></h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   		break;
}
break;
case 87;
if(!isset($_REQUEST['btnSubmit'])){
	?>
    <div style="text-align:center;">
    	
    	<h4 style="margin:10px 0">非法访问</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   	break;
}
$Keywordid = $_REQUEST['k_Id'];
$author = $_REQUEST['k_Author'];
//验证ID
$Keyword_query = mysql_query("select k_Id from i_keyword where k_Id = '$Keywordid'");
if(!mysql_fetch_array($Keyword_query)){
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">关键字编号"<?php echo $Keywordid;?>"不存在</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   		break;
}
//验证ID所对应的名称的作者
$Keyword_query = mysql_query("select k_Id from i_keyword where k_Id = '$Keywordid' and k_Author = '$author'");
if(!mysql_fetch_array($Keyword_query)){
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">关键字编号"<?php echo $Keywordid,'与添加人员：',$author;?>"不匹配</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   		break;
}
//验证ID所对应的名称的作者的权限
$Keyword_query = mysql_query("select k_Id from i_keyword where k_Id = '$Keywordid' and k_Author = '$author' and k_GroupId > '$group'");
if(mysql_fetch_array($Keyword_query))
{
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">用户权限小于对方，无法删除关键字编号为"<?php echo $Keywordid;?>"的数据</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   		break;
}

//删除数据

	$Keyword_delete_sql = "DELETE FROM i_keyword WHERE k_Id = '$Keywordid' and k_Author = '$author' and k_GroupId <= '$group'";
	if(mysql_query($Keyword_delete_sql,$con))
	{
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">关键字删除成功</h4>
        <a href = "?i=80" class="dilog_bmit">返回</a>
    </div>
    <?php
   		break;
	}
	else
	{
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">删除数据失败</h4>
    	<h4 style="margin:10px 0"><?php mysql_error();?></h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   		break;
	}
break;
case 90:
?>
<table align = "center" width = "805" border = "1">
  <tr>
    <td style = "width:30px">序号</td>
    <td style = "width:200px">ICP备案信息</td>
    <td style = "width:90px">添加人员</td>
    <td style = "width:120px">添加时间</td>
  </tr>
    <?php
	$Record_select_sql = "SELECT `r_Id`,`r_ICP`,`r_Publishtime`,`r_Author` FROM `i_record` order by r_Id ";
  	$Record_result = mysql_query($Record_select_sql) or die("联系我们查询失败!");
	while ($Record_row = mysql_fetch_array($Record_result)) 
{?>
<tr>
    <td><?php echo $Record_row['r_Id'];?></td>
    <td><?php echo $Record_row['r_ICP'];?></td>
    <td><?php echo $Record_row['r_Author'];?></td>
    <td><?php echo $Record_row['r_Publishtime'];?></td>
</tr>
  <?php
}
  ?>
</table>
<div style="text-align:center;">
    <a href = "?i=91" class="dilog_bmit">添加信息</a>
    <a href = "?i=92" class="dilog_bmit">删除信息</a>
</div>
<?php
mysql_free_result($Record_result);
break;
case 91:
if($group < 100)
{
	 	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">权限不足，无法执行该操作</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
	break;
}
	$Record_result = mysql_query("select * from i_record");
	list($Record_result_count) = mysql_fetch_row($Record_result);
	if($Record_result_count >= 5)
	{
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">提示:备案信息达到上限。请删除后在添加</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   		break;
	}
	else
?>
<form name = "RegForm" method = "post" action = "?i=96" onSubmit = "return InputCheck(this)">
<table align = "center" width = "500" border = "1">
    <td style = "width:80px">ICP备案信息<a style = "float:right">*</a></td>
    <td style = "width:165px"><input name = "r_ICP" type = "text" class = "table_Name"  maxlength = 32 required = "required" /></td>
  </tr>
</table>
    <div style="text-align:center;">
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
        <input type = "Submit" id="btnSubmit" name = "btnSubmit" class="submitStyle" value = "确定" />
    </div>
</form>
<?php
break;
case 92:
if($group < 150)
{
	 	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">权限不足，无法执行该操作</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
	break;
}
?>
<form name = "RegForm" method = "post" action = "?i=97" onSubmit = "return InputCheck(this)">
<table align = "center" width = "500" border = "1">
  <tr>
    <td style = "width:80px">序号<a style = "float:right">*</a></td>
    <td style = "width:165px"><input name = "r_Id"  class = "table_Name" onkeyup="this.value=this.value.replace(/\D/g,'')" onafterpaste="this.value=this.value.replace(/\D/g,'')" maxlength = 3 required = "required" /></td>
  </tr>
  <tr>
    <td>ICP备案信息<a style = "float:right">*</a></td>
    <td><input name = "r_ICP" type = "text" class = "table_Name"  maxlength = 32 required = "required" /></td>
  </tr>
  <tr>
    <td>添加人名称<a style = "float:right">*</a></td>
    <td><input name = "r_Author"  class = "table_Name" onkeyup = "value = value.replace(/[\W]/g,'') " onbeforepaste = "clipboardData.setData('text',clipboardData.getData('text').replace(/[^\d]/g,''))" maxlength = 16 required = "required" /></td>
  </tr>
<tr>
<td>注意！</td>
<td><input class = "table_Name" value = "删除操作不可恢复。请慎重操作" readonly/></td>
</tr>
</table>
    <div style="text-align:center;">
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
        <input type = "Submit" id="btnSubmit" name = "btnSubmit" class="submitStyle" value = "确定" />
    </div>
</form>
<?php
break;
case 96:
if(!isset($_REQUEST['btnSubmit'])){
	?>
    <div style="text-align:center;">
    	
    	<h4 style="margin:10px 0">非法访问</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   	break;
}
$Record = $_REQUEST['r_ICP'];
$Record_query = mysql_query("select r_ICP from i_record where r_ICP = '$Record' limit 1");
if(mysql_fetch_array($Record_query)){
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">备案信息"<?php echo $Record;?>"已存在</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
	break;
}
$Record_into_sql = "INSERT INTO `i_record`(r_ICP,r_Author,r_GroupId,r_PublishIp,r_Publishtime)
VALUES('$Record','$name','$group','$ip','$regdate')";

if(mysql_query($Record_into_sql,$con)){
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">备案信息发布成功</h4>
        <a href = "?i=90" class="dilog_bmit">返回</a>
    </div>
    <?php
   		break;
} else {
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">添加数据失败</h4>
    	<h4 style="margin:10px 0"><?php mysql_error();?></h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   		break;
}
break;
case 97:
if(!isset($_REQUEST['btnSubmit'])){
	?>
    <div style="text-align:center;">
    	
    	<h4 style="margin:10px 0">非法访问</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   	break;
}
$Recordid = $_REQUEST['r_Id'];
$Record = $_REQUEST['r_ICP'];
$author = $_REQUEST['r_Author'];
//验证ID
$Record_query = mysql_query("select r_Id from i_record where r_Id = '$Recordid'");
if(!mysql_fetch_array($Record_query)){
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">备案编号"<?php echo $Recordid;?>"不存在</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   		break;
}
//验证ID所对应的名称的作者
$Record_query = mysql_query("select r_Id from i_record where r_Id = '$Recordid' and r_ICP = '$Record'");
if(!mysql_fetch_array($Record_query)){
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">ICP备案网站信息"<?php echo $Record;?>"不存在</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   		break;
}
//验证ID所对应的名称的作者
$Record_query = mysql_query("select r_Id from i_record where r_Id = '$Recordid' and r_ICP = '$Record' and r_Author = '$author'");
if(!mysql_fetch_array($Record_query)){
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">ICP备案网站信息"<?php echo $Record,'"与添加人员："',$author;?>"不匹配</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   		break;
}
//验证ID所对应的名称的作者的权限
$Record_query = mysql_query("select r_Id from i_record where r_Id = '$Recordid' and r_ICP = '$Record' and r_Author = '$author' and r_GroupId > '$group'");
if(mysql_fetch_array($Record_query))
{
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">用户权限小于对方，无法删除ICP备案网站信息"<?php echo $Record;?>"</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   		break;
}

//删除数据

	$Record_delete_sql = "DELETE FROM i_record WHERE  r_Id = '$Recordid' and r_ICP = '$Record' and r_Author = '$author' and r_GroupId <= '$group'";
	if(mysql_query($Record_delete_sql,$con))
	{
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">备案信息删除成功</h4>
        <a href = "?i=90" class="dilog_bmit">返回</a>
    </div>
    <?php
   		break;
	}
	else
	{
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">删除数据失败</h4>
    	<h4 style="margin:10px 0"><?php mysql_error();?></h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   		break;
	}
break;
case 100:
?>
<table align = "center" width = "805" border = "1">
  <tr>
    <td style = "width:30px">序号</td>
    <td style = "width:50px">名称</td>
    <td style = "width:80px">地址</td>
    <td style = "width:80px">主题</td>
    <td style = "width:400px">内容</td>
  </tr>
    <?php
	$Page_size=10; 
	$result=mysql_query('select * from i_message'); 
	$count = mysql_num_rows($result); 
	$page_count = ceil($count/$Page_size); 
	$init=1; 
	$page_len=9; 
	$max_p=$page_count; 
	$pages=$page_count; 
	//判断当前页码 
	if(empty($_REQUEST['page'])||$_REQUEST['page']<0){ 
	$page=1; 
	}else { 
	$page=$_REQUEST['page']; 
	} 
	$offset=$Page_size*($page-1); 
	$message_select_sql = "SELECT `m_Id`,`m_Name`,`m_Email`,`m_Subject`,`m_Content` FROM `i_message` order by m_Id limit $offset,$Page_size";
  	$message_result = mysql_query($message_select_sql) or die("访客留言查询失败!");
	while ($message_row = mysql_fetch_array($message_result)) 
	{
	?>
<tr>
    <td><?php echo $message_row['m_Id'];?></td>
    <td><?php echo $message_row['m_Name'];?></td>
    <td><?php echo $message_row['m_Email'];?></td>
    <td><?php echo $message_row['m_Subject'];?></td>
    <td><?php echo str_replace("","",strip_tags($message_row['m_Content']));?></td>
</tr>
	<?php
	}
	$page_len = ($page_len%2)?$page_len:$pagelen+1;//页码个数 
	$pageoffset = ($page_len-1)/2;//页码个数左右偏移量 
	
	$key='<div class="page">'; 
	$key.="<span>$page/$pages</span> "; //第几页,共几页 
	if($page!=1){ 
	$key.="<a href=\"".$_SERVER['PHP_SELF']."?i=100&page=1\">|<<</a> "; //第一页 
	$key.="<a href=\"".$_SERVER['PHP_SELF']."?i=100&page=".($page-1)."\"><</a>"; //上一页 
	}else { 
	$key.="|<< ";//第一页 
	$key.="<"; //上一页 
	} 
	if($pages>$page_len){ 
	//如果当前页小于等于左偏移 
	if($page<=$pageoffset){ 
	$init=1; 
	$max_p = $page_len; 
	}else{//如果当前页大于左偏移 
	//如果当前页码右偏移超出最大分页数 
	if($page+$pageoffset>=$pages+1){ 
	$init = $pages-$page_len+1; 
	}else{ 
	//左右偏移都存在时的计算 
	$init = $page-$pageoffset; 
	$max_p = $page+$pageoffset; 
	} 
	} 
	} 
	for($f=$init;$f<=$max_p;$f++){ 
	if($f==$page){ 
	$key.=' <span>'.$f.'</span>'; 
	} else { 
	$key.=" <a href=\"".$_SERVER['PHP_SELF']."?i=100&page=".$f."\">".$f."</a>"; 
	} 
	} 
	if($page!=$pages){ 
	$key.=" <a href=\"".$_SERVER['PHP_SELF']."?i=100&page=".($page+1)."\">></a> ";//下一页 
	$key.="<a href=\"".$_SERVER['PHP_SELF']."?i=100&page={$pages}\">>>|</a>"; //最后一页 
	}else { 
	$key.=" > ";//下一页 
	$key.=">>|"; //最后一页 
	} 
	$key.='</div>'; 
  ?>
</table>
<div align="center"><?php echo $key?></div>
<div style="text-align:center;">
    <a href = "?i=102" class="dilog_bmit">删除信息</a>
</div>
<?php
mysql_free_result($message_result);
break;
case 102:
if($group < 150)
{
	 	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">权限不足，无法执行该操作</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
	break;
}
?>
<form name = "RegForm" method = "post" action = "?i=107" onSubmit = "return InputCheck(this)">
<table align = "center" width = "500" border = "1">
  <tr>
    <td style = "width:80px">序号<a style = "float:right">*</a></td>
    <td style = "width:165px"><input name = "m_Id" class = "table_Name" onkeyup="this.value=this.value.replace(/\D/g,'')" onafterpaste="this.value=this.value.replace(/\D/g,'')" maxlength = 3 required = "required" /></td>
  </tr>
  <tr>
    <td>名称<a style = "float:right">*</a></td>
    <td style = "width:165px"><input name = "m_Name" type = "text" class = "table_Name"  required = "required" maxlength = 32 /></td>
  </tr>
  <tr>
    <td>主题<a style = "float:right">*</a></td>
    <td><input name = "m_Subject" class = "table_Name" onkeyup = "value = value.replace(/[\W]/g,'') " onbeforepaste = "clipboardData.setData('text',clipboardData.getData('text').replace(/[^\d]/g,''))" maxlength = 16 required = "required" /></td>
  </tr>
<tr>
<td>注意！</td>
<td><input class = "table_Name" value = "删除操作不可恢复。请慎重操作" readonly/></td>
</tr>
</table>
    <div style="text-align:center;">
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
        <input type = "Submit" id="btnSubmit" name = "btnSubmit" class="submitStyle" value = "确定" />
    </div>
</form>
<?php
break;
case 107:
if(!isset($_REQUEST['btnSubmit'])){
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">非法访问</h4>
    </div>
    <?php
    header("refresh:1;url = ?i=0");
   	break;
}
$messageid = $_REQUEST['m_Id'];
$messagename = $_REQUEST['m_Name'];
$subject = $_REQUEST['m_Subject'];
//验证ID
$check_query = mysql_query("select m_Id from i_message where m_Id = '$messageid'");
if(!mysql_fetch_array($check_query)){
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">留言编号<?php echo $messageid;?>不存在</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
    break;
}
//验证ID所对应作者
$check_query = mysql_query("select m_Id from i_message where m_Id = '$messageid' && m_Name = '$messagename'");
if(!mysql_fetch_array($check_query)){
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">留言编号<?php echo $messageid,' 与主题 ：',$messagename;?>不匹配</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
    break;
}
$check_query = mysql_query("select m_Id from i_message where m_Id = '$messageid' && m_Name = '$messagename'&& m_Subject = '$subject'");
if(!mysql_fetch_array($check_query)){
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">留言编号<?php echo $messageid,' 与内容 ：',$subject;?>不匹配</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
    break;
}
//删除数据

	$message_delete_sql = "DELETE FROM i_message WHERE m_Id = '$messageid' && m_Name = '$messagename' && m_Subject = '$subject'";
	if(mysql_query($message_delete_sql,$con))
	{
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">留言删除成功</h4>
        <a href = "?i=100" class="dilog_bmit">返回</a>
    </div>
    <?php
   		break;
	}
	else
	{
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">删除数据失败</h4>
    	<h4 style="margin:10px 0"><?php mysql_error();?></h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   		break;
	}
break;
case 110:
?>
<table align = "center" width = "805" border = "1">
  <tr>
    <td style = "width:30px">序号</td>
    <td style = "width:50px">姓名</td>
    <td style = "width:80px">职务</td>
    <td style = "width:400px">简介</td>
  </tr>
    <?php
	$Page_size=5; 
	$result=mysql_query('select * from i_staff'); 
	$count = mysql_num_rows($result); 
	$page_count = ceil($count/$Page_size); 
	$init=1; 
	$page_len=9; 
	$max_p=$page_count; 
	$pages=$page_count; 
	//判断当前页码 
	if(empty($_REQUEST['page'])||$_REQUEST['page']<0){ 
	$page=1; 
	}else { 
	$page=$_REQUEST['page']; 
	} 
	$offset=$Page_size*($page-1); 
	$staff_select_sql = "SELECT `s_Id`,`s_Name`,`s_Position`,`s_Image`,`s_Content` FROM `i_staff` order by s_Id limit $offset,$Page_size";
  	$staff_result = mysql_query($staff_select_sql) or die("员工信息查询失败!");
	while ($staff_row = mysql_fetch_array($staff_result)) 
	{
	?>
<tr>
    <td><?php echo $staff_row['s_Id'];?></td>
    <td><a target="_blank" href="<?php echo $staff_row['s_Image']?>"><?php echo $staff_row['s_Name'];?></a></td>
    <td><?php echo $staff_row['s_Position'];?></td>
    <td><?php echo mb_substr($staff_row['s_Content'],0,256,'utf-8');?></td>
</tr>
	<?php
	}
	$page_len = ($page_len%2)?$page_len:$pagelen+1;//页码个数 
	$pageoffset = ($page_len-1)/2;//页码个数左右偏移量 
	
	$key='<div class="page">'; 
	$key.="<span>$page/$pages</span> "; //第几页,共几页 
	if($page!=1){ 
	$key.="<a href=\"".$_SERVER['PHP_SELF']."?i=110&page=1\">|<<</a> "; //第一页 
	$key.="<a href=\"".$_SERVER['PHP_SELF']."?i=110&page=".($page-1)."\"><</a>"; //上一页 
	}else { 
	$key.="|<< ";//第一页 
	$key.="<"; //上一页 
	} 
	if($pages>$page_len){ 
	//如果当前页小于等于左偏移 
	if($page<=$pageoffset){ 
	$init=1; 
	$max_p = $page_len; 
	}else{//如果当前页大于左偏移 
	//如果当前页码右偏移超出最大分页数 
	if($page+$pageoffset>=$pages+1){ 
	$init = $pages-$page_len+1; 
	}else{ 
	//左右偏移都存在时的计算 
	$init = $page-$pageoffset; 
	$max_p = $page+$pageoffset; 
	} 
	} 
	} 
	for($f=$init;$f<=$max_p;$f++){ 
	if($f==$page){ 
	$key.=' <span>'.$f.'</span>'; 
	} else { 
	$key.=" <a href=\"".$_SERVER['PHP_SELF']."?i=110&page=".$f."\">".$f."</a>"; 
	} 
	} 
	if($page!=$pages){ 
	$key.=" <a href=\"".$_SERVER['PHP_SELF']."?i=110&page=".($page+1)."\">></a> ";//下一页 
	$key.="<a href=\"".$_SERVER['PHP_SELF']."?i=110&page={$pages}\">>>|</a>"; //最后一页 
	}else { 
	$key.=" > ";//下一页 
	$key.=">>|"; //最后一页 
	} 
	$key.='</div>'; 
  ?>
</table>
<div align="center"><?php echo $key?></div>
<div style="text-align:center;">
    <a href = "?i=111" class="dilog_bmit">添加信息</a>
    <a href = "?i=112" class="dilog_bmit">删除信息</a>
</div>
<?php
mysql_free_result($staff_result);
break;
case 111:
if($group < 100)
{
	 	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">权限不足，无法执行该操作</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
	break;
}
?>
<form name = "RegForm" method = "post" action = "?i=116" onSubmit = "return InputCheck(this)" enctype = "multipart/form-data" action = "<?php $_SERVER['PHP_SELF']?>?submit = 1" >
<table align = "center" width = "500" border = "1">
  <tr>
    <td style = "width:80px">姓名<a style = "float:right">*</a></td>
    <td style = "width:165px"><input name = "s_Name" type = "text" class = "table_Name"  required = "required" maxlength = 12/></td>
  </tr>
  <tr>
    <td>职务<a style = "float:right">*</a></td>
    <td><input name = "s_Position" type = "text" class = "table_Name"  required = "required" maxlength = 12/></td>
  </tr>
  <tr>
    <td>介绍<a style = "float:right">*</a></td>
    <td><textarea name = "s_Content" type = "text" class = "textarea_Name" required = "required"  rows="20"></textarea></td>
  </tr>
  <tr>
    <td>照片<a style = "float:right">*</a></td>
    <td><input name = "s_Image" type = "file">(500 KB max)</td>
  </tr>
  <tr>
</table>
    <div style="text-align:center;">
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
        <input type = "Submit" id="btnSubmit" name = "btnSubmit" class="submitStyle" value = "确定" />
    </div>
</form>
<?php 
break;
case 112:
if($group < 150)
{
	 	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">权限不足，无法执行该操作</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
	break;
}
?>
<form name = "RegForm" method = "post" action = "?i=117" onSubmit = "return InputCheck(this)">
<table align = "center" width = "500" border = "1">
  <tr>
    <td style = "width:80px">序号<a style = "float:right">*</a></td>
    <td style = "width:165px"><input name = "s_Id"  class = "table_Name" onkeyup="this.value=this.value.replace(/\D/g,'')" onafterpaste="this.value=this.value.replace(/\D/g,'')" maxlength = 3 required = "required" /></td>
  </tr>
  <tr>
    <td style = "width:80px">姓名<a style = "float:right">*</a></td>
    <td style = "width:165px"><input name = "s_Name" type = "text" class = "table_Name"  required = "required" maxlength = 12/></td>
  </tr>
<tr>
<td>注意！</td>
<td><input class = "table_Name" value = "删除操作不可恢复。请慎重操作" readonly/></td>
</tr>
</table>
    <div style="text-align:center;">
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
        <input type = "Submit" id="btnSubmit" name = "btnSubmit" class="submitStyle" value = "确定" />
    </div>
</form>
<?php
break;
case 116:
if(!isset($_REQUEST['btnSubmit'])){
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">非法访问</h4>
    </div>
    <?php
    header("refresh:1;url = ?i=0");
   	break;
}

$Staffname = $_REQUEST['s_Name'];
$Staffposition = $_REQUEST['s_Position'];
$Staffcontent = $_REQUEST['s_Content'];
$Staff_image_path = "../file/Staff/";        //幻灯片图片上传路径  
if(!file_exists($Staff_image_path))  
{  
	//检查是否有该文件夹，如果没有就创建，并给予最高权限  
	mkdir("$Staff_image_path", 0700);  
} 
//允许上传的文件格式  
$Staff_image_type = array("image/gif","image/jpeg","image/pjpeg","image/bmp");  
//检查上传文件是否在允许上传的类型  
if(!in_array($_FILES["s_Image"]["type"],$Staff_image_type))
{ 
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">员工照片格式不正确</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php  
	break;  
} 
if($_FILES["s_Image"]["name"])
{  
		$Staff_image_type1 = $_FILES["s_Image"]["name"];  
		$Staff_image_type2 = $Staff_image_path.time().$Staff_image_type1;
}
if($_FILES["s_Image"]["size"]>500000)  
{ 
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">图片文件大小不得超过500KB</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   	break;
}
if(!preg_match('/^[\w\x80-\xff]{4,80}$/', $Staffname)){
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">标题长度需大于4个字并小于20个字</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
	break;
}
$check_query = mysql_query("select s_Name from i_slide where s_Name = '$Staffname' limit 1");
if(mysql_fetch_array($check_query)){
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">员工"<?php echo $Staffname;?>"已存在</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
	break;
}
if(!$Staffcontent){
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">员工简介不能为空</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
		break;
}
if(@preg_match("/[\x7f-\xff]/","$Staff_image_type2"))
{
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">图片文件名称不能含有中文字符</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   	break;
}else{
	$Staff_image_type = move_uploaded_file($_FILES["s_Image"]["tmp_name"],$Staff_image_type2);
}
$Staff_into_sql = "INSERT INTO `i_staff`(s_Name,s_Author,s_Position,s_Image,s_GroupId,s_PublishIp,s_Publishtime,s_Content)
								VALUES('$Staffname','$name','$Staffposition','$Staff_image_type2','$group','$ip','$regdate','$Staffcontent')";

if(mysql_query($Staff_into_sql,$con)){
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">员工信息发布成功</h4>
        <a href = "?i=110" class="dilog_bmit">返回</a>
    </div>
    <?php
	break;
} else {
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">添加数据失败</h4>
    	<h4 style="margin:10px 0"><?php mysql_error();?></h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
	break;
}
break;
case 117:
if(!isset($_REQUEST['btnSubmit'])){
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">非法访问</h4>
    </div>
    <?php
    header("refresh:1;url = ?i=0");
   	break;
}
$Staffid = $_REQUEST['s_Id'];
$Staffname = $_REQUEST['s_Name'];
//验证ID
$check_query = mysql_query("select s_Id from i_staff where s_Id = '$Staffid'");
if(!mysql_fetch_array($check_query)){
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">员工编号"<?php echo $Staffid;?>"不存在</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   		break;
}
//验证ID所对应作者
$check_query = mysql_query("select s_Id from i_staff where s_Id = '$Staffid' and s_Name = '$Staffname'");
if(!mysql_fetch_array($check_query)){
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">员工编号"<?php echo $Staffid,'"与员工姓名 ："',$Staffname;?>"不匹配</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   		break;
}

//验证ID所对应的名称的作者的权限
$check_query = mysql_query("select s_Id from i_staff where s_Id = '$Staffid' and s_Name = '$Staffname' and s_GroupId > '$group'");
if(mysql_fetch_array($check_query))
{
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">用户权限小于对方,无法删除员工编号为"<?php echo $Staffid;?>"的数据</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   	break;
}

//删除的文件
$delete_image = mysql_query("select s_Image from i_staff where s_Id = '$Staffid' and s_Name = '$Staffname' and s_GroupId <= '$group'");
$delete_file = mysql_fetch_array($delete_image);
$file = $delete_file['s_Image'];
if (file_exists($file))
{
    $delete_ok = unlink ($file);
}
//删除数据
$Staff_delete_sql = "DELETE FROM i_staff WHERE s_Id = '$Staffid' and s_Name = '$Staffname' and s_GroupId <= '$group'";
if(mysql_query($Staff_delete_sql,$con))
{
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">企业员工删除成功</h4>
        <a href = "?i=110" class="dilog_bmit">返回</a>
    </div>
    <?php
	break;
}
else
{
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">添加数据失败</h4>
    	<h4 style="margin:10px 0"><?php mysql_error();?></h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
	break;
}
break;
case 120:
?>
<table align = "center" width = "805" border = "1">
  <tr>
    <td style = "width:30px">序号</td>
    <td style = "width:300px">杂志描述</td>
    <td style = "width:90px">添加人员</td>
    <td style = "width:120px">添加时间</td>
  </tr>
    <?php
	$Introduction_select_sql = "SELECT `i_Id`,`i_Description`,`i_Author`,`i_Publishtime` FROM `i_introduction` order by i_Id ";
  	$Introduction_result = mysql_query($Introduction_select_sql) or die("杂志介绍查询失败!");
	while ($Introduction_row = mysql_fetch_array($Introduction_result)) 
{?>
<tr>
    <td><?php echo $Introduction_row['i_Id'];?></td>
    <td><?php echo mb_substr($Introduction_row['i_Description'],0,36,'utf-8');?></td>
    <td><?php echo $Introduction_row['i_Author'];?></td>
    <td><?php echo $Introduction_row['i_Publishtime'];?></td>
</tr>
  <?php
}
  ?>

</table>
<div style="text-align:center;">
    <a href = "?i=121" class="dilog_bmit">添加信息</a>
    <a href = "?i=122" class="dilog_bmit">删除信息</a>
</div>
<?php
mysql_free_result($Introduction_result);
break;
case 121:
if($group < 100)
{
	 ?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">权限不足，无法执行该操作</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
	break;
}
	$Keyword_result = mysql_query("select * from i_introduction");
	list($Keyword_result_count) = mysql_fetch_row($Keyword_result);
	if($Keyword_result_count >= 5)
	{
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">关键字信息达到上限。请删除后在添加</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   		break;
	}
	else
?>
<form name = "RegForm" method = "post" action = "?i=126" onSubmit = "return InputCheck(this)">
<table align = "center" width = "500" border = "1">
    <td style = "width:80px">杂志描述<a style = "float:right">*</a></td>
    <td style = "width:165px"><textarea name = "i_Description" type = "text" class = "textarea_Name" required = "required"  rows="30"></textarea></td>
  </tr>
</table>
    <div style="text-align:center;">
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
        <input type = "Submit" id="btnSubmit" name = "btnSubmit" class="submitStyle" value = "确定" />
    </div>
</form>
<?php
break;
case 122:
if($group < 150)
{
	 	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">权限不足，无法执行该操作</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
	break;
}
?>
<form name = "RegForm" method = "post" action = "?i=127" onSubmit = "return InputCheck(this)">
<table align = "center" width = "500" border = "1">
  <tr>
    <td style = "width:80px">序号<a style = "float:right">*</a></td>
    <td style = "width:165px"><input name = "i_Id"  class = "table_Name" onkeyup="this.value=this.value.replace(/\D/g,'')" onafterpaste="this.value=this.value.replace(/\D/g,'')" maxlength = 3 required = "required" /></td>
  </tr>
  <tr>
    <td>添加人名称<a style = "float:right">*</a></td>
    <td><input name = "i_Author"  class = "table_Name" onkeyup = "value = value.replace(/[\W]/g,'') " onbeforepaste = "clipboardData.setData('text',clipboardData.getData('text').replace(/[^\d]/g,''))" maxlength = 16 required = "required" /></td>
  </tr>
<tr>
<td>注意！</td>
<td><input class = "table_Name" value = "删除操作不可恢复。请慎重操作" readonly/></td>
</tr>
</table>
    <div style="text-align:center;">
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
        <input type = "Submit" id="btnSubmit" name = "btnSubmit" class="submitStyle" value = "确定" />
    </div>
</form>
<?php
break;
case 126:
if(!isset($_REQUEST['btnSubmit'])){
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">非法访问</h4>
    </div>
    <?php
    header("refresh:1;url = ?i=0");
   	break;
}
$description = $_REQUEST['i_Description'];
$Introduction_query = mysql_query("select i_Description from i_introduction where i_Description = '$description' limit 1");
if(mysql_fetch_array($Introduction_query)){
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">网站描述"<?php echo $description;?>"已存在</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
	break;
}
$Introduction_into_sql = "INSERT INTO `i_introduction`(i_Description,i_GroupId,i_Author,i_PublishIp,i_Publishtime)
									VALUES('$description','$group','$name','$ip','$regdate')";

if(mysql_query($Introduction_into_sql,$con)){
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">杂志简介发布成功</h4>
        <a href = "?i=120" class="dilog_bmit">返回</a>
    </div>
    <?php
   		break;
} else {
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">添加数据失败</h4>
    	<h4 style="margin:10px 0"><?php mysql_error();?></h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   		break;
}
break;
case 127:
if(!isset($_REQUEST['btnSubmit'])){
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">非法访问</h4>
    </div>
    <?php
    header("refresh:1;url = ?i=0");
   	break;
}
$Introductionid = $_REQUEST['i_Id'];
$author = $_REQUEST['i_Author'];

//验证ID所对应的名称的作者
$Keyword_query = mysql_query("select i_Id from i_introduction where i_Id = '$Introductionid' and i_Author = '$author'");
if(!mysql_fetch_array($Keyword_query)){
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">关键字编号"<?php echo $Introductionid,'与添加人员：',$author;?>"不匹配</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   		break;
}
//验证ID所对应的名称的作者的权限
$Keyword_query = mysql_query("select i_Id from i_introduction where i_Id = '$Introductionid' and i_Author = '$author' and i_GroupId > '$group'");
if(mysql_fetch_array($Keyword_query))
{
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">用户权限小于对方，无法删除关键字编号为"<?php echo $Keywordid;?>"的数据</h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   		break;
}

//删除数据

	$Keyword_delete_sql = "DELETE FROM i_introduction WHERE i_Id = '$Introductionid' and i_Author = '$author' and i_GroupId <= '$group'";
	if(mysql_query($Keyword_delete_sql,$con))
	{
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">杂志简介删除成功</h4>
        <a href = "?i=120" class="dilog_bmit">返回</a>
    </div>
    <?php
   		break;
	}
	else
	{
	?>
    <div style="text-align:center;">
    	<h4 style="margin:10px 0">删除数据失败</h4>
    	<h4 style="margin:10px 0"><?php mysql_error();?></h4>
        <a href = "javascript:history.back(-1);" class="dilog_bmit">返回</a>
    </div>
    <?php
   		break;
	}
break;
case 190:
?>
		  注：全站带*号的为必填项
	<br />一、后台首页：显示当前登陆用户的基础信息，其中包括用户名、当前日期、登陆IP、登陆次数。
    <br />二、个人资料：显示当前登陆用户的个人资料。
    <br />修改:可修改密码、性别、电话、地址、QQ、邮箱信息。
	<br />三、用户管理：显示当前数据库内所有的用户资料、包括ID	、用户名、性别、用户权限、注册日期、地址、QQ、电话、邮箱、上次登陆时间、上次登陆IP等信息。
    <br />添加用户：在总用户数量小于10个的前提下可添加新用户、其中、用户名、权限、密码为必填项、性别、电话、地址、QQ、邮箱可不填。
    <br />删除用户：输入用户ID号、用户名、用户权限、密码以及二次确认密码可删除对应用户。注：只能删除权限低于当前登陆账户的用户。
    <br />四、公告管理：显示产品展示模块对应的序号、标题、作者、发布IP、发表时间和内容。
    <br />添加文章：为产品展示模块添加新的文章信息。
    <br />删除文章：输入文章序号、文章名称及作者名称后确认后可删除。
    <br />五、杂志上传：显示技术支持模块对应的序号、标题、作者、发布IP、发表时间和内容。
    <br />添加文章：为技术支持模块添加新的文章信息。
    <br />删除文章：输入文章序号、文章名称及作者名称后确认后可删除。
    <br />六、联系我们：列表显示所有的联系我们信息、最多可显示5条。首页只会显示最后一条信息。
    <br />添加信息：注释1和注释2是网站首页下方、联系我们板块与发送电子邮件功能之间的两行注释内容。右侧每个空代表一行信息。
    <br />删除信息：只需输入序号和添加人名称即可删除地址信息。
    <br />七、友情链接：展示目前在职员工信息。通过删除减少显示。
    <br />八、关键字：网站关机键信息，百度收录。
    <br />添加信息：为关于我们板块添加新内容。
    <br />删除文章：输入文章序号、文章名称及作者名称后确认后可删除。
    <br />九、幻灯片：按照序号以及图号对应显示首页图片信息。
    <br />添加信息：为幻灯片输入新内容。注:图号为后台对应图像文件的编号。
    <br />删除信息：输入序号、图号、标题、作者信息可删除对应数据。
    <br />十、帮助文档：整站的帮助信息以及是使用说明。
    <br />十一、退出登陆：点击退出登陆、系统会销毁当前登陆用户的数据。
    <br />编码规则：
    <br />数据库部分：表名下划线之前部分为数据库首字母、下划线之后为表功能英文单词。表内字段下划线之前为表名的首字母、下划线之后为功能英文单词。
    <br />数据库名称以及表名全部小写、表内字段名下划线之后首字母大写。
    <br />php部分：sql语句部分首根据所连接的数据库全名+语句类型+语句说明构成、首字母大写。例：Record_delete_sql
    <br />注意：PHP新配的环境需要改以下信息max_execution_time改为0，post_max_size改为50，upload_max_filesize改为25
<?php
break;
case 200:
?>
        <div align = "center" style = "margin-top:15%">
			<?php
			//注销登录
			function deldir($dir)
			{
			   $dh = opendir($dir);
			   while ($file = readdir($dh))
			   {
				  if ($file != "." and $file != "..")
				  {
					 $fullpath = $dir . "/" . $file;
					 if (!is_dir($fullpath))
					 {
						@unlink($fullpath);
					 } else
					 {
						deldir($fullpath);
					 }
				  }
			   }
			   closedir($dh);
			   if (@rmdir($dir))
			   {
				  return true;
			   } else
			   {
				  return false;
			   }
			} 
			deldir($session_path); 
			session_unset(); 
			session_destroy();
            echo '<h2>成功注销登录<h2>';

break;
default:
	$i=0;
break;
}
?>
</div>
</div>
</div>
</div>
    <div id = "footer">
        Copyright &copy; 2014 
        <a href="http://www.intbtv.com/" target="_blank" style="color:#000">国际商务电视台</a> by
        <a href="http://t.qq.com/wzxaini9" target = "_blank" style="color:#000">"Powerless"</a>
        All Rights Reserved.
    </div>
</body>
</html>