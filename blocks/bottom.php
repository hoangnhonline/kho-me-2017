<div style="text-align:center;margin-top:30px">
    <div id='list_phap_am' style="width:800px;text-align:center;margin:auto;">
          <ul id="mycarousel" class="jcarousel-skin-tango">
            <?php $list_pa = mysql_query("SELECT * FROM phapam ORDER BY idPA");
            while($row_pa = mysql_fetch_assoc($list_pa)){
            ?>
            <li><img class="title_phapam" idPA="<?php echo $row_pa['idPA'];?>" src="<?php echo $row_pa['HinhMH'];?>" width="145" height="150" />
                <br />
                <span class="title_phapam" idPA="<?php echo $row_pa['idPA'];?>"><?php echo $row_pa['TieuDe'];?></span></li>
            <?php } ?>  
          </ul>
    </div>
    <span id="nut_hien_list" style="display:none" >Xem danh sách pháp âm</span>
    <span id="dang_nghe" style="display:none" >Pháp âm đang nghe</span>
    <div id='hien_phap_am' style="display:none"></div>
</div>