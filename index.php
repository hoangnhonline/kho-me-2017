<?php 
ini_set('display_errors', 0);
//include "head-cache.php";
require_once('blocks/seo.php');
/*
$idSach = 357;
$rs1 = mysql_query("SELECT idSach, idDM, MIN( ThuTu ) , idTrang FROM trang WHERE idSach = $idSach GROUP BY idDM") or die(mysql_error());
echo "<h1>".$idSach."</h1>";
	while($row1 = mysql_fetch_assoc($rs1)){		
		$idTrang = $row1['idTrang'];
		$idDM = $row1['idDM'];
		echo $idDM." - ".$idTrang;
		mysql_query("UPDATE danhmuc SET idTrang = $idTrang WHERE idDM = $idDM") or die(mysql_error());
	}
*/
?>
<!DOCTYPE html>
<html>
  <head>
    <title><?php if($title) echo $title; else{ ?>Thư viện điện tử Kinh sách Phật giáo tiếng Việt-Vietnamese Buddhist Electronic Text (VNBET)- 越南電子佛典<?php } ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Ứng dụng chức năng tiện ích của bản điện tử, phục vụ việc đọc tụng nghiên cứu, góp phần bảo tồn và hoằng dương Phật pháp." />
	<meta name="keywords" content="Kinh, Luật,luận, sách" />
    <base href="http://<?php echo $_SERVER['SERVER_NAME']; ?>/">
	<meta property="og:title" content="VNBET" />
	<meta property="og:url" itemprop="url" content="http://vnbet.vn" />
	<meta property="og:image" itemprop="thumbnailUrl" content="http://vnbet.vn/img/logo_vnbet.png" />
	<meta content="article" property="og:type"/>  
	<meta content="Thư viện điện tử Kinh sách Phật giáo tiếng Việt-Vietnamese Buddhist Electronic Text (VNBET)- 越南電子佛典" property="og:site_name"/>
	<meta content="Ứng dụng chức năng tiện ích của bản điện tử, phục vụ việc đọc tụng nghiên cứu, góp phần bảo tồn và hoằng dương Phật pháp." itemprop="description" name="description" property="og:description"/> 
	<link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->    
  </head>
  <body>
  <div id="wrapper_vnbet">
    <div class="container visible_xs hide-bg-xs"></div> 
    <div class="container main_vnbet">
        <div class="row">  
            <div class="col-md-12" id="top_rs">
                <div class="logo_site">
                    <a href="http://vnbet.vn"><img src="img/logo.jpg" alt="LOGO VNBET"></a>
                </div>
            </div>          
            <div class="col-md-1 hidden-xs hidden-sm" id="left_rs">
                <?php if($t > 0) {?>
                <a href="<?php echo $row_sach['TenSach_KD']?>/<?php echo $arrMucluc[$idML_pre]['DanhMuc_KD']?>-<?php echo $idML_pre; ?>.html" class="icon_next_pre pre" id="page_pre" title="Xem 類目 trước đó">&nbsp;</a>
                <?php } ?>
            </div>
            <div class="col-md-10" >

              <?php include "blocks/guide.php"; ?>
              
              <?php include "blocks/filter.php"; ?>  

              <?php include "blocks/content.php"; ?>               
                       
            </div>
            <div class="col-md-1 hidden-xs hidden-sm" id="right_rs">
                <?php if($t > 0) {?>
                <a href="<?php echo $row_sach['TenSach_KD']?>/<?php echo $arrMucluc[$idML_next]['DanhMuc_KD']?>-<?php echo $idML_next; ?>.html" class="icon_next_pre next" id="page_next" title="Xem 類目 kế tiếp">&nbsp;</a>
                <?php } ?>
            </div>
            
        </div> <!-- row -->
        <div class="row" id="book_name">
          <div class="col-md-12" >
                <div id="box_name_kinh" class="col-md-12 name_kinh_bottom">              
                   
                    <?php if($s == null) {?>
                    Thư viện điện tử Kinh sách Phật giáo tiếng Việt
                    <?php } else{ 
                        echo $row_sach['TenSach'];
                    } ?>
                   
                </div>
            </div>
        </div>
    </div>    <!-- .container -->
    </div> <!-- wrapper vnbet -->
  <?php include "blocks/float_item.php"; ?>
<?php 
if($t > 0 ) {
    include "blocks/trichdan.php" ; 
}
?>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.js"></script>    
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/home.js"></script>
	<script>
			$(document).ready(function(){
			  $('.bxslider').bxSlider({
			  minSlides: 4,
			  maxSlides: 7,
			  slideWidth: 360,
			  slideMargin: 10
			});
			});
	</script>						
	<script src="js/jquery.bxslider.min.js"></script>
	<!-- bxSlider CSS file -->
	<link href="css/jquery.bxslider.css" rel="stylesheet" />
<?php if($t > 0){ ?>
<script type="text/javascript" src="js/jquery.zclip.js"></script>
<script type="text/javascript" src="js/menuSub.js"></script>
<?php } ?>
<?php if($k!=null) {?>
<script type="text/javascript">
  $(function(){   
    $.ajax({
            url: 'blocks/ajax_find.php',
            type: "POST",                         
            data:{                                                    
                    keyword: $.trim($('#textKeyword').val()),
                    idML: $('#idML_Find').val()                     
            }, 
            beforeSend: function() {
                $('#result_find').html('<div class="waiting"><img src="img/icons/3.gif" style="margin-top:30px" /></div>');
            },                      
            success: function(data){                                                            
                $('#result_find').html(data);
                $('.float_item .btn_control_float').click();
                
            }       
        });  
  });
</script>
<?php } ?>

<?php if($c > 0){ ?>
<script type="text/javascript">
  $(function(){
    $.ajax({
            url: 'ajax/book.php',
            type: "POST",                         
            data:{                                                    
                    id:<?php echo $c; ?>                        
            },                       
            success: function(data){                                       
              $('#idDM_loc').val(<?php echo $c; ?>);
              $('#idSach_loc').html(data).val(<?php echo $s; ?>);
              <?php if($s > 0) { ?>
              $.ajax({
                  url: 'ajax/loaddm.php',
                  type: "POST",                         
                  data:{                                                    
                          id:<?php echo $s; ?>                        
                  },                       
                  success: function(data){                                                        
                    $('#idML_loc').html(data).val(<?php echo $m; ?>);
                    $.ajax({
                      url: 'ajax/page.php',
                      type: "POST",                         
                      data:{                                                    
                              id:<?php echo $m; ?>                        
                      },                       
                      success: function(data){                                                        
                        $('#idTrang_loc').html(data);
                        
                      }       
                  });
                  }       
              });
            <?php } ?>
            }       
        });
  });
</script>
<?php } ?>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-40671394-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
  </body>
</html>