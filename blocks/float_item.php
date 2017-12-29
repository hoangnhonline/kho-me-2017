<div class="float_item item_left">  
    <div class="float_content">            
        <div class="ui-widget" id="siteMenuBar">
            <div class="tab_control">
                <a href="kinh.html"  class="tabmenu <?php if($c==1) echo "active"; ?>" idML="1">经</a>
                <a href="luat.html" idML="2" class="tabmenu <?php if($c==2) echo "active"; ?>">律</a>
                <a href="luan.html" idML="3" class="tabmenu <?php if($c==3) echo "active"; ?>">论</a>
                <a href="sach.html" idML="4" class="tabmenu <?php if($c==4) echo "active"; ?>">其他</a>
            </div>
            <div class="box_width_common">
                <div class="content_tab" style="height: 593px;">
                    <div class="ui-widget-header scroll-pane" id="menuContainer">
                        <?php
                        $mucluc = $tc->MucLuc_List($c);
                        $row_ml = mysql_fetch_assoc($mucluc);
                        ?>
                        <div class="baosach">
                            <?php
                            if(!empty($row_ml)){
                            $sachlist = $tc->List_Sach($row_ml['idML']);
                            while ($row_s = mysql_fetch_assoc($sachlist)) {
                            ?>
                            <p class="sach"><a href="<?php echo $row_s['TenSach_KD'] ?>-<?php echo $row_s['idSach'] ?>.html"><?php echo $row_s['TenSach'] ?></a></p> 
                            <?php if($s!=null && $s == $row_s['idSach']) { ?>
                            <div class='baodanhmuc'>
                                <?php
                                $danhmuc = $tc -> List_DanhMuc($s,1);
                                while($row_dm= mysql_fetch_assoc($danhmuc)){   
       
                                ?>
                                <p style='color:brown;cursor:pointer;margin-top:5px;margin-bottom:5px;margin-left:20px' class="danhmuc">
                                    <a  class="mls <?php if($m==$row_dm['idDM']) echo "bold"; ?>"  com="mucluc" 
                                    href="<?php echo $row_s['TenSach_KD'] ?>/<?php echo $row_dm['DanhMuc_KD']; ?>-<?php echo $row_dm['idDM']; ?>.html" style="color:#903">
                                        <?php echo $row_dm['DanhMuc']?>
                                    </a>
                                </p>
                                <?php } ?>

                            </div>
                            <?php } ?>
                            <?php } } ?>                           
                        </div><!-- baosach -->
                    </div><!-- menuContainer -->
                </div><!-- content_tab -->
            </div> <!-- box_width_common -->
        </div>  <!-- siteMenuBar -->
        <div class="control_float_left">
            <a id="btn_left" class="btn_control_float" title="Ẩn/hiện danh mục" href="javascript:;">
                <img alt="icon ẩn hiện danh mục" src="img/icons/icon_ra.gif">
            </a>
        </div>
    </div><!-- float_content -->
</div><!-- item_left -->


<div class="float_top_item item_top hidden-xs"> 
  <div class="float_content row"  >
      <div class="block_search col-md-12" style="padding-left:30px">
            資料夾 
            <select id="idML_Find" name="idML_Find">           
                <option value="1">经</option>
                <option value="2">律</option>
                <option value="3">论</option>
                <option value="4">其他</option>

            </select>
            <input name="keyword" type="text" class="txt_input_search" id="textKeyword" value="<?php if($k!=null) echo $k; else {?>Nhập từ tìm kiếm<?php }?>" onblur="if(this.value=='') this.value=this.defaultValue" onfocus="if(this.value==this.defaultValue) this.value=''">
          
            <input type="submit" name="btnSumit" id="btnFind" value="Tìm kiếm" class="searchbtn">
            
            <div class="clear">&nbsp;</div>
        </div><!-- block_search -->

        <div id="result_find" class="row" style="margin-left:0px">      
            <div class="block_content_float col-md-12" >
                <div class="col-md-1 hidden-xs hidden-sm" ></div>
                <div class="main_content_slide col-md-10" style="margin-left:30px"></div>
                <div class="col-md-1 hidden-xs hidden-sm" ></div>         
            </div>                 

        </div><!-- result_find -->
    
             <div class="control_float">
      <a href="javascript:;" title="Tìm kiếm kinh sách" class="btn_control_float" id="btn_top">
            <img src="img/icons/icon_up.gif" alt="icon ẩn hiện search">
        </a>
        </div>
    </div><!-- float_content -->
</div><!-- item_top -->


<div class="float_top_item item_bottom hidden-xs">
    <div class="float_content">
        <div id="wrapper_phapam">
            <div id="list_phap_am">
                  <div class=" jcarousel-skin-tango"><div class="jcarousel-container jcarousel-container-horizontal" style="position: relative; display: block;"><div class="jcarousel-clip jcarousel-clip-horizontal" style="position: relative;"><ul class="jcarousel-list jcarousel-list-horizontal" id="mycarousel" style="overflow: hidden; position: relative; top: 0px; margin: 0px; padding: 0px; left: 0px; width: 1840px;">
                        <li class="jcarousel-item jcarousel-item-horizontal jcarousel-item-1 jcarousel-item-1-horizontal" style="float: left; list-style: none outside none;" jcarouselindex="1"><img width="145" height="150" src="http://vnbet.vn/upload/images/album/phap_am_kinh/kinhtruongbotap1.png" idpa="10" class="title_phapam">
                <br>
                <span idpa="10" class="title_phapam">Kinh Trường Bộ tập 1</span></li>
                        <li class="jcarousel-item jcarousel-item-horizontal jcarousel-item-2 jcarousel-item-2-horizontal" style="float: left; list-style: none outside none;" jcarouselindex="2"><img width="145" height="150" src="http://vnbet.vn/upload/images/album/phap_am_kinh/kinhtruongbotap2.png" idpa="11" class="title_phapam">
                <br>
                <span idpa="11" class="title_phapam">Kinh Trường Bộ tập 2</span></li>
                        <li class="jcarousel-item jcarousel-item-horizontal jcarousel-item-3 jcarousel-item-3-horizontal" style="float: left; list-style: none outside none;" jcarouselindex="3"><img width="145" height="150" src="http://vnbet.vn/upload/images/album/phap_am_kinh/kinhtrungbotap1.png" idpa="12" class="title_phapam">
                <br>
                <span idpa="12" class="title_phapam">Kinh Trung Bộ tập 1</span></li>
                        <li class="jcarousel-item jcarousel-item-horizontal jcarousel-item-4 jcarousel-item-4-horizontal" style="float: left; list-style: none outside none;" jcarouselindex="4"><img width="145" height="150" src="http://vnbet.vn/upload/images/album/phap_am_kinh/kinhtrungbotap2.png" idpa="13" class="title_phapam">
                <br>
                <span idpa="13" class="title_phapam">Kinh Trung Bộ tập 2</span></li>
                        <li class="jcarousel-item jcarousel-item-horizontal jcarousel-item-5 jcarousel-item-5-horizontal" style="float: left; list-style: none outside none;" jcarouselindex="5"><img width="145" height="150" src="http://vnbet.vn/upload/images/album/phap_am_kinh/kinhtrungbotap3.png" idpa="14" class="title_phapam">
                <br>
                <span idpa="14" class="title_phapam">Kinh Trung Bộ tập 3</span></li>
                        <li class="jcarousel-item jcarousel-item-horizontal jcarousel-item-6 jcarousel-item-6-horizontal" style="float: left; list-style: none outside none;" jcarouselindex="6"><img width="145" height="150" src="http://vnbet.vn/upload/images/album/phap_am_kinh/kinhtuongungbotap1.png" idpa="15" class="title_phapam">
                <br>
                <span idpa="15" class="title_phapam">Kinh Tương Ưng Bộ tập 1</span></li>
                        <li class="jcarousel-item jcarousel-item-horizontal jcarousel-item-7 jcarousel-item-7-horizontal" style="float: left; list-style: none outside none;" jcarouselindex="7"><img width="145" height="150" src="http://vnbet.vn/upload/images/album/phap_am_kinh/kinhtuongungbotap2.png" idpa="16" class="title_phapam">
                <br>
                <span idpa="16" class="title_phapam">Kinh Tương Ưng Bộ tập 2</span></li>
                        <li class="jcarousel-item jcarousel-item-horizontal jcarousel-item-8 jcarousel-item-8-horizontal" style="float: left; list-style: none outside none;" jcarouselindex="8"><img width="145" height="150" src="http://vnbet.vn/upload/images/album/phap_am_kinh/kinhtuongungbotap3.png" idpa="17" class="title_phapam">
                <br>
                <span idpa="17" class="title_phapam">Kinh Tương Ưng Bộ tập 3</span></li>
                        <li class="jcarousel-item jcarousel-item-horizontal jcarousel-item-9 jcarousel-item-9-horizontal" style="float: left; list-style: none outside none;" jcarouselindex="9"><img width="145" height="150" src="http://vnbet.vn/upload/images/album/phap_am_kinh/kinhtuongungbotap4.png" idpa="18" class="title_phapam">
                <br>
                <span idpa="18" class="title_phapam">Kinh Tương Ưng Bộ tập 4</span></li>
                        <li class="jcarousel-item jcarousel-item-horizontal jcarousel-item-10 jcarousel-item-10-horizontal" style="float: left; list-style: none outside none;" jcarouselindex="10"><img width="145" height="150" src="http://vnbet.vn/upload/images/album/phap_am_kinh/kinhtuongungbotap5.png" idpa="19" class="title_phapam">
                <br>
                <span idpa="19" class="title_phapam">Kinh Tương Ưng Bộ tập 5</span></li>
              
            </ul></div><div class="jcarousel-prev jcarousel-prev-horizontal jcarousel-prev-disabled jcarousel-prev-disabled-horizontal" style="display: block;" disabled="disabled"></div><div class="jcarousel-next jcarousel-next-horizontal" style="display: block;"></div></div></div>
            </div><!-- list_phap_am -->
            <span class="hidden" id="nut_hien_list">Xem danh sách 法音</span>
            <span class="hidden" id="dang_nghe">法音 đang nghe</span>
            <div class="hidden" id="hien_phap_am"></div>
        </div> <!-- wrapper_phapam -->        
        
        <a id="btn_bottom" class="btn_control_float" title="Nghe 法音" href="javascript:void(0)">
            <img alt="icon ẩn hiện nghe 法音" src="img/icons/icon_up.gif">
        </a>
    </div><!-- float_content -->
</div><!-- item_bottom -->