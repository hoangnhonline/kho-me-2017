<div id="center_rs" class="fck_content ">
	<div class="content_kinh txt_center">
	 <?php if($t==null && $is_home==1){ ?>
                <div class="relative" >
                    <img src="img/nen.jpg" class="img-responsive hidden-xs" alt="Nền VNBET" />  
                    <div class="col-sm-12 hidden-xs huongdan_sm">
                        <div class="col-sm-6 center">
                            <a target="_blank"
                             href="http://phapbao.org/loi-gioi-thieu-ve-phien-ban-dien-tu-kinh-sach-phat-giao-tieng-viet-viet-tat-vnbet/">
                            
                                <img alt="Giới thiệu VNBET" src="img/img_gioithieu.png" height="40" class="hidden-xs">                                
                            </a>
                        </div>
                        <div class="col-sm-6 center">
                            <a target="_blank"
                            href="http://phapbao.org/huong-dan-su-dung-kinh-sach-dien-tu-phat-giao-tieng-viet-2014/" >                          
                                <img alt="Hướng dẫn sử dụng VNBET" src="img/img_huongdansudung.png" height="40" class="hidden-xs">                               
                            </a>
                        </div>
                    </div> 

                    <div class="col-sm-12 visible-xs huongdan_xs">
                        <div class="col-sm-6" style="margin-bottom:10px">
                            <a target="_blank"
                             href="http://phapbao.org/loi-gioi-thieu-ve-phien-ban-dien-tu-kinh-sach-phat-giao-tieng-viet-viet-tat-vnbet/">                            
                                
                                <img alt="Giới thiệu VNBET" src="img/img_gioithieu.png" height="30" class="visible-xs">
                            </a>
                        </div>
                        <div class="col-sm-6 center">
                            <a target="_blank"
                            href="http://phapbao.org/huong-dan-su-dung-kinh-sach-dien-tu-phat-giao-tieng-viet-2014/" >                                                          
                                <img alt="Hướng dẫn sử dụng VNBET" src="img/img_huongdansudung.png" height="30" class="visible-xs">
                            </a>
                        </div>
                    </div>
					<div class="col-sm-12 hidden-sx" style="position: absolute;top:700px">
						<ul class="bxslider">
							<?php $sql = "SELECT * FROM sach WHERE url_image != '' AND status = 1 ORDER BY idSach DESC LIMIT 0,7";
							$rsnew = mysql_query($sql);
							while($rownew = mysql_fetch_assoc($rsnew)){
							?>
						  <li><a href="<?php echo $rownew['TenSach_KD'] ?>-<?php echo $rownew['idSach'] ?>.html">
						  <img src="<?php echo $rownew['url_image']; ?>" alt="<?php echo $rownew['TenSach'];  ?>" />
						  </a></li>
						  <?php } ?>
						</ul>						
					</div>
                </div>
                <?php } elseif($is_home!=1 && !isset($s)){
                    ?>
            <div class="relative" >
                <div class="col-sm-12">
            
            <?php
            if($c > 0){
                
                    $mucluc_content = $tc->MucLuc_List($c);
                        $row_ml_content = mysql_fetch_assoc($mucluc_content);
                        if(!empty($row_ml_content)){
                    $sachlist2 = $tc->List_Sach($row_ml_content['idML']);
                    while($row_sach_2 = mysql_fetch_assoc($sachlist2)){
                        ?>
            
                    <div class="col-sm-4" style="text-align: center;margin-bottom: 15px">
                        <a href="<?php echo $row_sach_2['TenSach_KD'] ?>-<?php echo $row_sach_2['idSach'] ?>.html">
						<img style="width:80%" style="max-height: 200px" class="responsive" 
                             src ="<?php echo $row_sach_2['url_image']; ?>"
                             />
						</a>
                        <a style="display:block;font-size:14px;height:70px;overflow-y: hidden" class="book_name_content" href="<?php echo $row_sach_2['TenSach_KD'] ?>-<?php echo $row_sach_2['idSach'] ?>.html">
                        <?php
                            echo $row_sach_2['TenSach']."<br />";
                        ?>
                        </a>
                    </div>                    
                
                    <?php                      
                    } }}
                    ?>
                      </div>
            </div>  <?php }else if($s >0 && $t==null){
			
			
								$new_sach_ct = $tc->Sach_ChiTiet($s);
								$row_s = mysql_fetch_assoc($new_sach_ct);
			?>
						<div id="content_mucluc" >
							<h1 id="book-name" class="mucluc_sach"><?php echo $row_s['TenSach']; ?></h1>
							<div style="width:90%;margin:auto">
								<?php
                                $danhmuc_content = $tc -> List_DanhMuc($s,1);
                                while($row_dm_content= mysql_fetch_assoc($danhmuc_content)){   									
                                ?>
                                <h2 class="danhmuc_sach">
                                    <a  class="mls_content" href="<?php echo $row_s['TenSach_KD'] ?>/<?php echo $row_dm_content['DanhMuc_KD']; ?>-<?php echo $row_dm_content['idDM']; ?>.html"><?php echo $row_dm_content['DanhMuc']?></a>
                                </h2>
                                <?php } ?>
							</div>
						</div>
                <?php }elseif($m){                   
                    // get chi tiet trang
                    
                    $chitiet_trang = $tc->ListTrangTrongMucLuc($m);
                   while($row_trang = mysql_fetch_assoc($chitiet_trang)){
                        echo "<div class='content_page' thutu='".$row_trang['ThuTu']."' id='content_".$row_trang['ThuTu']."'>".stripslashes($row_trang['NoiDung'])."";
                        echo "</div>";
                        echo "<p class='device_page'>* Trang ".$row_trang['ThuTu']." *<br/>
                                <img src='img/hr.png' style='clear:both' alt='device'/>
                        </p>";
                    }
                } ?>
	</div>
    <?php if($t > 0) {?>
	<div class="col-md-12 visible-xs visible-sm" style="margin-top:5px">
		<div class="col-md-6" class="pre_smart">
			<a href="<?php echo $row_sach['TenSach_KD']?>/<?php echo $arrMucluc[$idML_pre]['DanhMuc_KD']?>-<?php echo $idML_pre; ?>.html" class="icon_next_pre pre" id="page_pre" title="Xem 類目 trước đó">&nbsp;</a>
		</div>
		<div class="col-md-6" class="next_smart">
            <a href="<?php echo $row_sach['TenSach_KD']?>/<?php echo $arrMucluc[$idML_next]['DanhMuc_KD']?>-<?php echo $idML_next; ?>.html" class="icon_next_pre next" id="page_next" title="Xem 類目 kế tiếp">&nbsp;</a>			
		</div>
	</div>
    <?php } ?>
	
</div>
