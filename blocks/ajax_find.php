<?php
require_once("../admin/lib/class.mucluc.php");
$ml = new mucluc;
?>
<div class="block_content_float col-md-12" > 
    <div class="col-md-1 hidden-xs hidden-sm" ></div> 
    <div class="main_content_slide col-md-10" style="margin-left:30px">

        <?php
        $keyword = trim(strip_tags($_POST['keyword']));
        $idML = (int) $_POST['idML'];
        $sql = "SELECT a.DanhMuc, b.TenSach,a.DanhMuc_KD,a.idDM
                         FROM danhmuc a
INNER JOIN sach b 
USING(idSach)
 WHERE a.idML = $idML
 AND  MATCH(DanhMuc) AGAINST ('$keyword')  
 ORDER BY idDM

";
            $rs = mysql_query($sql) or die(mysql_error());
            $kq_so = mysql_num_rows($rs);
        
        if ($kq_so > 0) {            
            ?>            
            
            <div class="result_search">
                <div class="menu_slide box_width_common">
                    <div class="block_title">
                        <div class="left"><p>Kết quả tìm kiếm (<?php echo $kq_so; ?>)</p></div>                   
                    </div>
                    <div class="block_content_news box_width_common" style="overflow-y:scroll">
                        <?php                        
                        $count = 0;
                        while ($row_kq = mysql_fetch_assoc($rs)) {                           
                            $count++;
                            ?>
                            <div class="item_news">
                            <!--<a href="#"><img src="images/graphics/img_news.jpg" width="130" height="95" alt="" class="img_news" /></a>-->
                                <p class="title_news"><?php echo $count; ?>. 
                                    <a  class='link_search' href="ket-qua-tim-kiem/<?php echo $row_kq['DanhMuc_KD'];?>-<?php echo $row_kq['idDM'];?>.html&k=<?php echo $keyword;?>&id=<?php echo $idML; ?>">
                                        <?php echo $row_kq['DanhMuc'] ?>
                                    </a>
                                </p>
                                <p class="content_des">
                                    <?php echo $row_kq['TenSach'] ?>
                                </p>
                                <div class="clear">&nbsp;</div>
                            </div>
    <?php } ?>
                    </div>

                </div>
            </div>

        </div><!-- main_content_slide -->
        <div class="col-md-1 hidden-xs hidden-sm" ></div> 
        <div class="clear">&nbsp;</div>
    </div>
<?php }
else echo "<p style='text-align:center;font-weight:bold'>Không tìm thấy kết quả nào !</p>"; ?>
