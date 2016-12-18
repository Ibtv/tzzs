<?php
	require_once("My_SQL/_link_index.php");
	$Ja = 0;
?>
<script>
var _hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  hm.src = "//hm.baidu.com/hm.js?210199798fee13dbcd69249745b5bddf";
  var s = document.getElementsByTagName("script")[0];
  s.parentNode.insertBefore(hm, s);
})();
</script>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

    <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
    <meta http-equiv="Content-Language" content="zh-CN">
    <meta name="author" content="Powerless">
    <title>香港国际投资招商 - 树森国际文化传媒（北京）有限责任公司</title>
    <meta name="Copyright" content="树森国际文化传媒（北京）有限责任公司">
	<meta name="keywords" content="<?php echo $Keyword_keywords;?>" />
	<meta name="description" content="<?php echo $Keyword_description;?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="GENERATOR" content="MSHTML 9.00.8112.16533">
    <link rel="shortcut icon" href="images/ico.png" type="Styles/res/x-icon">
    <link rel="stylesheet" type="text/css" href="css/css.css">
	<script type="text/javascript" src="js/banner.js"></script>
    <script type="text/javascript" src="js/jquery.js"></script>



</head>
<body>
<!--main start-->
<div class="wrapper">
<div id="mainbg">
	<div class="zazhilogo"><img src="images/logo.jpg" width="980" height="152" /></div>

</div>
<!--main end-->
<div class="mainv">
	<div class="banner" id="banner">
    <?php
		while($Slide_sql_row = mysql_fetch_array($Slide_sql_result)){
		echo '<a href="#" class="d1" style="background:url('.mb_substr($Slide_sql_row['s_Image'],3,96,'utf-8').') center no-repeat;"></a>';
		}
		?>
		<div class="d2" id="banner_id">
			<table cellspacing="0" cellpadding="0">
				<tr>
					<td><div>1</div></td>
					<td><div>2</div></td>
					<td><div>3</div></td>
				</tr>
			</table>
		</div>
	</div>
	<script type="text/javascript">banner()</script>
	<div id="servicesBox">
		<div class="newpostbg">
			<div class="noticebg"><h1 style="font-size:18px">公告信息</h1></div>
			<div class="informationbg">
            <h5>
            <?php
                 echo $Notice_content;
			?>
            <h5>
            </div>
		</div>
		<div id="serBox3" class="serBox" onClick="serFocus(3)" >
			<div class="serBoxOn"></div>
            <?php
					echo'
						<div class="pic1 mypng"><h1><a href="main.php?edition='.$newedition.'">最新发布</a></h1></div>
						<div class="pic2 mypng"><h1><a href="main.php?edition='.$newedition.'">最新发布</a></h1></div>
						<div class="txt1"><a href="main.php?edition='.$newedition.'"><span class="tit">'.$newtime.'</span></a></div>
						<div class="txt2"><a href="main.php?edition='.$newedition.'"><span class="tit">'.$newtime.'</span></a></div>

					';
			?>
		</div>
		<div id="serBox4" class="serBox" onClick="serFocus(4)"style="margin-right:0px;">
			<div class="serBoxOn"></div>
            <?php
					echo'
						<div class="pic1 mypng"><h1><a href="main.php?edition='.$hotedition.'">点击最多</a></h1></div>
						<div class="pic2 mypng"><h1><a href="main.php?edition='.$hotedition.'">点击最多</a></h1></div>
						<div class="txt1"><a href="main.php?edition='.$hotedition.'"><span class="tit">'.mb_substr($hottime,0,10,'utf-8').'</span></a></div>
						<div class="txt2"><a href="main.php?edition='.$hotedition.'"><span class="tit">'.mb_substr($hottime,0,10,'utf-8').'</span></a></div>
					';
			?>
		</div>
	</div>
</div>
<script type="text/javascript">
$(document).ready(function(){

	$(".serBox").hover(function(){
		$(this).children().stop(false,true);
		$(this).children(".serBoxOn").fadeIn("slow");
		$(this).children(".pic1").animate({right: -110},400);
		$(this).children(".pic2").animate({left: 43},400);
		$(this).children(".txt1").animate({left: -176},400);
		$(this).children(".txt2").animate({right: 10},400);
	},function(){
		$(this).children().stop(false,true);

		$(this).children(".serBoxOn").fadeOut("slow");
		$(this).children(".pic1").animate({right:43},400);
		$(this).children(".pic2").animate({left: -110},400);
		$(this).children(".txt1").animate({left: 10},400);
		$(this).children(".txt2").animate({right: -176},400);
	});

});

function serFocus(i){
	$(".servicesPop").slideDown("normal");
	changeflash(i);
}
function closeSerPop(){
	$(".servicesPop").slideUp("fast");
}

var currentindex=1;
function changeflash(i){
	currentindex=i;
	for (j=1;j<=6;j++){
		if(j==i){
			$("#flash"+j).fadeIn("normal");
			$("#flash"+j).css("display","block");
			$("#f"+j).removeClass();
			$("#f"+j).addClass("dq");
		}else{
			$("#flash"+j).css("display","none");
			$("#f"+j).removeClass();
			$("#f"+j).addClass("no");
		}
	}
}
</script>
</div>

<div class="wrapper">
    <div id="contentbg">
        <div class="jianjie">杂志简介</div>
        <div class="jianjienei">
        	<h2>香港国际投资招商</h2>
            <h5><?php echo $Introduction_description;?></h5>
        </div>
  </div>
</div>
<!--效果开始-->
<div class="wrapper">
<div class="bd_con4">
 <div class="bd_t3">投资招商杂志刊号</div>
 <div class="bd_c4l">
  <ul>
      <?php
		while($J_edition = mysql_fetch_array($Journal_edition)){
			$Ja++;
			if($Ja == 1){
				echo '<li class="bd_cutLi">'.$J_edition['j_Edition'].'</li>';
				}
			else
			{
				echo '<li>'.$J_edition['j_Edition'].'</li>';
				}
		}
		?>
  </ul>
 </div>
 <div class="bd_c4r">
  <div class="bd_c4top">
   <a href="javascript:void(0)" class="bd_lbtn"></a>
   <div class="bd_chgBox">
    <div class="bd_long">
     <ul>
      <?php
		while($Journal_a = mysql_fetch_array($Journal_all_result)){
			$jt=$Journal_a['j_Theme'];
			$je=$Journal_a['j_Edition'];
			$jp=$Journal_a['j_Pathfile'];
			$jc=$Journal_a['j_Content'];
		?>
          <li>
			<div class="bc_chgTitle"><?php echo $jt;?></div>
			<span><a href="<?php echo 'main.php?edition='.$je;?>" target="blank"><img src="<?php echo $jp;?>1.jpg" width="246" height="330" /></a></span>
			<p><a href="<?php echo 'main.php?edition='.$je;?>" target="blank"><?php echo $jc;?></a></p>
          </li>
        <?php
		}
		?>
     </ul>
    </div>
   </div>
   <a href="javascript:void(0)" class="bd_rbtn"></a>
  </div>
 </div>
</div>
<script language="javascript">
var cutItm=0;
<?php $Ja--;?>
function autoPlay(){
	cutItm++;
	if(cutItm><?php echo $Ja;?>){
		cutItm=0;
	}
	$(".bd_c4l li").removeClass("bd_cutLi");
	$(".bd_c4l li").eq(cutItm).addClass("bd_cutLi");
    var leftVal=cutItm*310;
    $(".bd_long").animate({left:-leftVal},500);
}

var timeer=setInterval(autoPlay,3000);
$(".bd_c4l,.bd_c4top").hover(function(){clearInterval(timeer)},function(){timeer=setInterval(autoPlay,3000);});

$(".bd_c4l li").click(function(){
	cutItm=$(".bd_c4l li").index(this);
	$(".bd_c4l li").removeClass("bd_cutLi");$(this).addClass("bd_cutLi");
	var leftVal=cutItm*310;
    $(".bd_long").animate({left:-leftVal},500);
	});
$(".bd_lbtn").click(function(){
	cutItm--;
	if(cutItm<0){
		cutItm=<?php echo $Ja;?>;
	}
	$(".bd_c4l li").removeClass("bd_cutLi");
	$(".bd_c4l li").eq(cutItm).addClass("bd_cutLi");
    var leftVal=cutItm*310;
    $(".bd_long").animate({left:-leftVal},500);
});
$(".bd_rbtn").click(function(){
	cutItm++;
	if(cutItm><?php echo $Ja;?>){
		cutItm=0;
	}
	$(".bd_c4l li").removeClass("bd_cutLi");
	$(".bd_c4l li").eq(cutItm).addClass("bd_cutLi");
    var leftVal=cutItm*310;
    $(".bd_long").animate({left:-leftVal},500);
});
</script>
</div>
<!--js End-->
<!--content start-->
<div class="wrapper">
    <div id="contentbg">
        <div class="liuyanbg">联系我们</div>
            <?php $code = mb_substr(str_shuffle("abcdefghijklmnopqrstuvwxyz1234567890"),0,4,'utf-8');?>
        	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
             <ul>
        		<li>昵称：<input name="Name" type="text" placeholder="Name" maxlength=16  required style="width:450px;"/></li>
        		<li>邮箱：<input name="Email" type="text" placeholder="Email" maxlength=32 required onbeforepaste = "clipboardData.setData('text',clipboardData.getData('text').replace(/[^\d]/g,''))" style="width:450px;"/></li>
        		<li>标题：<input name="Subject" type="text" placeholder="Subject" maxlength=32 onbeforepaste = "clipboardData.setData('text',clipboardData.getData('text').replace(/[^\d]/g,''))" style="width:450px;"/></li>
				<li>内容：<textarea name="Content" type="text" placeholder="Content" maxlength=512 style="width:450px; height:150px;"></textarea></li>
                <li>验证码：<input name="Code" type="text" placeholder="Code" maxlength="4" required style="width:286px;">
				<b style="margin: 0 28px;"><?php echo $code;?></b>
				<input type="submit" name="submit" value="  发送  "/></li>
             </ul>
			</form>
            <?php
			if(isset($_POST['submit']))
			{
				$m_name = strip_tags($_POST['Name']);
				$m_email = strip_tags($_POST['Email']);
				$m_subject = strip_tags($_POST['Subject']);
				$myip=$_SERVER['REMOTE_ADDR'];
				$regdate = date("Y-m-d H:i:s", time());
				$m_content = htmlspecialchars(strip_tags($_POST['Content']));
				$m_code =  $_POST['Code'];
				//if(strtolower($code) == strtolower($m_code))
				//{
					$check_query = mysql_query("select m_Id from i_message where m_Name = '$m_name' && m_Email = '$m_email' && m_Subject = '$m_subject' &&m_Content = '$m_content'");
					if(!mysql_fetch_array($check_query))
					{
						$sql = "INSERT INTO i_message(m_Name,m_Email,m_Subject,m_PublishIp,m_Publishtime,m_Content)
											VALUES('$m_name','$m_email','$m_subject','$myip','$regdate','$m_content')";
						if(mysql_query($sql,$con))
						{
							@header("refresh:0;url=index.php");
						}
						else
						{
							echo "<script language=javascript>alert('提交出现错误、请使用其它方式');history.back();</script>";
						}
					}
				/*}
				else{
						echo "<script language=javascript>alert('验证码错误，请重新输入');history.back();< /script>";
					}*/
			}
			?>
        <div class="addressbg">
            <h1>客户联系方式</h1>
            <ul>
				<li><h5>如果你有什么好的意见或者建议可以通过<br>电子邮件、电话、通信地址等方式与我们联系.</h5></li>
                <li>联系电话：<?php echo $Contact_phone;?></li>
                <li>通讯地址：<?php echo $Contact_address1;?></li>
                <li>　　　　　<?php echo $Contact_address2;?></li>
                <li>电子邮箱：<?php echo $Contact_mailbox;?></li>
            </ul>
        </div>
  </div>
</div>
<div class="wrapper">
    <div id="contentbg">
        <div class="youqing">友情链接</div>
        <div class="youqingnei">
             <?php
                while ($Friend_sql_row=mysql_fetch_array($Friend_sql_result))
                {
            ?>
                 <a target = "_blank" href="<?php echo $Friend_sql_row['f_Url'];?>" title="<?php echo $Friend_sql_row['f_Name'];?>">
                 	<img src="<?php echo mb_substr( $Friend_sql_row['f_Image'],3,96,'utf-8');?>" title="<?php echo $Friend_sql_row['f_Name'];?>" alt="<?php echo $Friend_sql_row['f_Url'];?>"width="190" height="80" onerror="nofind();"/>
                 </a>
            <?php
                }
            ?>
        </div>
  </div>
    	<br>
</div>
<div class="wrapper">
<div class="bottominfo">
    	<br>
    	<p>Copyright &copy; 2008 - <?php echo date("Y", time());?>
        树森国际文化传媒（北京）有限责任公司 by
        <a href="http://t.qq.com/wzxaini9" target = "_blank">"Powerless"</a> All Rights Reserved.
    	<br>
    	<br>
        ICP备案信息：<a href="http://www.miitbeian.gov.cn" target="_blank"><?php echo $Record_ipc?></a></p>
    	<br>
    </div>
</div>
<!--content End-->
		<?php
        mysql_free_result($Record_sql_result);
		mysql_close($con);
        ?>


</body>
</html>
