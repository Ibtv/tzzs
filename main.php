<?php
	require_once("My_SQL/_link_main.php");
	error_reporting(E_ALL);
	$click =  $Journal_sql_result_row['j_Click'];
	$click += 1;
	$journal_update_sql = "update `i_journal` set  j_Click = '$click'  where j_Id = $Journal_Id";
	if(!mysql_query($journal_update_sql,$con))
	{
		echo '数据库错误';
	}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="Content-Language" content="zh-CN">
<meta name="author" content="Powerless" /> 
<meta name="Copyright" content="国际商务电视台" /> 
<meta name="description" content="<?php echo $Keyword_sql_result_row['k_Description'];?>" /> 
<meta name="keywords" content="<?php echo $Keyword_sql_result_row['k_Keywords'];?>" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>第<?php echo $edition;?>期 - 投资招商杂志电子版 - 树森国际文化传媒（北京）有限责任公司<</title>
<link rel="shortcut icon" href="images/ico.png" type="Styles/res/x-icon">
<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="js/turn.js"></script>
<script async src="admin/js/Load_Page_Top.js"></script>
<link rel="stylesheet" href="css/style.css">
</head>
<body onselectstart="return false" ondragstart="return false">
<div id="container">
    <!--div class="catalog">
        <img src="< ?php echo mb_substr($Journal_sql_result_row['j_Pathfile'],3,96,'utf-8');? >0.jpg" width="650px" height="880px">
    </div-->
<div id="book">
</div>
<div id="controls">
    <div id="controlsl">
    <?php
		if(isset( $Journal_up_edition))
		{
	?>
        <a style="padding-left:20px;" href="<?php echo '?edition='.$Journal_up_edition;?>">上一期（<?php echo $Journal_up_edition;?>）</a>
    <?php
		}
		else
		{?>
		<a style="padding-left:20px;" href="#">已是最后一期</a>
        <?php
		}
	?>
    </div>
    <div id="controlsc">
        <label for="page-number">第:</label> 
        <input type="text" size="3" id="page-number">
        <label for="page-number">页、 共 <span id="number-pages"></span> 页</label> 
    </div>
    <div id="controlsr">
    <?php
		if(isset( $Journal_down_edition))
		{
	?>
        <a style="margin-right:20px;" href="<?php echo '?edition='.$Journal_down_edition;?>">（<?php echo $Journal_down_edition;?>）下一期</a>
            <?php
		}
		else
		{?>
		<a style="padding-left:20px;" href="#">已是最新一期</a>
        <?php
		}
	?>
    </div>
</div>
<script type="text/javascript">

	// Sample using dynamic pages with turn.js

	var numberOfPages = <?php echo $Journal_sql_result_row['j_Amount'];?>; 


	// Adds the pages that the book will need
	function addPage(page, book) {
		// 	First check if the page is already in the book
		if (!book.turn('hasPage', page)) {
			// Create an element for this page
			var element = $('<div />', {'class': 'page '+((page%2==0) ? 'odd' : 'even'), 'id': 'page-'+page}).html('<i class="loader"></i>');
			// If not then add the page
			book.turn('addPage', element, page);
			// Let's assum that the data is comming from the server and the request takes 0.5s.
			setTimeout(function(){
					element.html('<div><img src="<?php echo mb_substr($Journal_sql_result_row['j_Pathfile'],3,96,'utf-8');?>'+page+'.jpg" width="100%" height="900px;"></div>');
			}, 500);
		}
	}

	$(window).ready(function(){
		$('#book').turn({acceleration: true,
							pages: numberOfPages,
							elevation: 50,
							gradients: !$.isTouch,
							when: {
								turning: function(e, page, view) {

									// Gets the range of pages that the book needs right now
									var range = $(this).turn('range', page);

									// Check if each page is within the book
									for (page = range[0]; page<=range[1]; page++) 
										addPage(page, $(this));

								},

								turned: function(e, page) {
									$('#page-number').val(page);
								}
							}
						});

		$('#number-pages').html(numberOfPages);

		$('#page-number').keydown(function(e){

			if (e.keyCode==13)
				$('#book').turn('page', $('#page-number').val());
				
		});
	});

	$(window).bind('keydown', function(e){

		if (e.target && e.target.tagName.toLowerCase()!='input')
			if (e.keyCode==37)
				$('#book').turn('previous');
			else if (e.keyCode==39)
				$('#book').turn('next');

	});

</script>
</div>
</body>
</html>
