<?php 
require_once "lib/defined.php";
?>
<?php 
	ob_start();	
	session_start();
	require_once "checkLogin.php";
	require_once("lib/classQuanTri.php");	
	require_once("lib/class.mucluc.php");	
	require_once("lib/class.sach.php");	
	require_once("lib/class.danhmuc.php");	
	require_once("lib/class.trang.php");
	require_once("lib/class.tacgia.php");
	require_once("lib/class.album.php");	
	require_once("lib/class.phapam.php");
        require_once("lib/class.user.php");

	
	$ml = new mucluc;
	$s = new sach;
	$dm = new danhmuc;
	$trang = new trang;
	$tg = new tacgia;
	$al = new album;
	$pa = new phapam;
        $u = new user;
	
	$com='';
    if(isset($_GET['com']))
    {
   	    $com = $_GET['com'];
    }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>VNBET ADMIN</title>
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
		<!-- stylesheets -->
		<link rel="stylesheet" type="text/css" href="resources/css/reset.css" />
		<link rel="stylesheet" type="text/css" href="resources/css/style.css" media="screen" />
		<link rel="stylesheet" type="text/css" href="resources/css/style_full.css" />
		<link id="color" rel="stylesheet" type="text/css" href="resources/css/colors/blue.css" />
		<!-- scripts (jquery) -->
		<script src="resources/scripts/jquery-1.4.2.min.js" type="text/javascript"></script>
		<!--[if IE]><script language="javascript" type="text/javascript" src="resources/scripts/excanvas.min.js"></script><![endif]-->
		<script src="resources/scripts/jquery-ui-1.8.custom.min.js" type="text/javascript"></script>		
		<script src="js/jquery.lazyload.min.js" type="text/javascript"></script>
		<script src="resources/scripts/tiny_mce/jquery.tinymce.js" type="text/javascript"></script>
		<!-- scripts (custom) -->
		<script src="resources/scripts/smooth.js" type="text/javascript"></script>
		<script src="resources/scripts/smooth.menu.js" type="text/javascript"></script>		
		<script src="resources/scripts/smooth.table.js" type="text/javascript"></script>		
		<script src="resources/scripts/smooth.dialog.js" type="text/javascript"></script>
		<script src="resources/scripts/smooth.autocomplete.js" type="text/javascript"></script>
                
                <script type="text/javascript" src="ckeditor/ckeditor.js"></script>
                <script type="text/javascript" src="ckfinder/ckfinder.js"></script>
                <script src="js/admin.js" type="text/javascript"></script>	
                <script src="js/drag.js" type="text/javascript"></script>
		<script type="text/javascript">
			$(document).ready(function () {
				$("img.lazy").lazyload({
				    effect : "fadeIn"
				});
				style_path = "resources/css/colors";

				$("#date-picker").datepicker();

				$("#box-tabs, #box-left-tabs").tabs();
                                $("#box_article_comments").dialog({modal:true,title:'Bình luận trên bài viết',width:900,draggable:false,resizable:false});
			});
                     
            $(function(){

                    $(".ngay").datepicker({
                        numberOfMonths: 1,  dateFormat: 'dd-mm-yy',
                        monthNames: ['Một','Hai','Ba','Tư','Năm','Sáu','Bảy','Tám','Chín', 
                        'Mười','Mười một','Mười hai'] ,
                        monthNamesShort: ['Tháng1','Tháng2','Tháng3','Tháng4','Tháng5',
                        'Tháng6','Tháng7','Tháng8','Tháng9','Tháng10','Tháng11','Tháng12'] ,
                        dayNames: ['Chủ nhật', 'Thứ hai', 'Thứ ba', 'Thứ tư', 'Thứ năm',
                        'Thứ sáu', 'Thứ bảy'],
                        dayNamesMin: ['CN', 'T2', 'T3', 'T4', 'T5', 'T6', 'T7'] ,
                        showWeek: true , showOn: 'both',
                        changeMonth: true , changeYear: true,
                        currentText: 'Hôm nay', weekHeader: 'Tuần'

                    });

                })
                    $("#reset").click(function(){
                            $.post('reset.php',{},function(data){
                                    alert(data);
                            })
                    })


		</script>
	</head>
	<body>           
		<div id="colors-switcher" class="color">
			<a href="" class="blue" title="Blue"></a>
			<a href="" class="green" title="Green"></a>
			<a href="" class="brown" title="Brown"></a>
			<a href="" class="purple" title="Purple"></a>
			<a href="" class="red" title="Red"></a>
			<a href="" class="greyblue" title="GreyBlue"></a>
		</div>		
		<!-- header -->
		<div id="header">
			<!-- logo -->
			<div id="logo">
				<h1><a href="" title="VNBET Admin"><img src="img/img_slogan.png" alt="VNBET Admin" width="250" /></a></h1>
			</div>
			<!-- end logo -->
			<!-- user -->
			<ul id="user">				
				<li><a href=""><?php echo $_SESSION['email']; ?> (<?php echo ($_SESSION['group'] == 2) ? "Admin" : "Editor" ; ?>)</a></li>                                				
				<li><a href="thoat.php">Logout</a></li>				
			</ul>
			<!-- end user -->
			<div id="header-inner">
				<div id="home">
					<a href="index.php"></a>
				</div>
				<?php include URL_LAYOUT."menu.php"; ?>
				<!-- end quick -->
				<div class="corner tl"></div>
				<div class="corner tr"></div>
			</div>
		</div>
		<!-- end header -->
		<!-- content -->
		<div id="content">
			<!-- table -->
			<div class="box">
                            <div style="clear:both"></div>
                        <?php	
                        
                             $tmpCom = explode('_',$com);           
                            
                            if ($com=="") include "blocks/sach/sach_list.php";
                            else include "blocks/".$tmpCom[0].'/'.$com.'.php';                         

                            ?>  
			</div>
                        
			<!-- end table -->
			
			
			
		</div>
		<!-- end content -->
		<!-- footer -->
		<div id="footer">
			<p>Copyright &copy; 2000-2010 Your Company. All Rights Reserved.</p>
		</div>
		<!-- end footert -->
	</body>
</html>
