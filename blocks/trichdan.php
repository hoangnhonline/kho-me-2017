<?php if($s > 0) { 

$rs_sach = $tc->Sach_ChiTiet($s);
$rows_sach = mysql_fetch_assoc($rs_sach);
?>
<input type="hidden" id="nxb" name="nxb" value="<?php echo $rows_sach['NhaXB']?>" />
<input type="hidden" id="namxb" name="namxb" value="<?php echo $rows_sach['NamXB']?>" />
<input type="hidden" id="ten_sach" name="ten_sach" value="<?php echo $rows_sach['TenSach'];?>" />
<input type="hidden" id="ten_tacgia" name="ten_tacgia" value="<?php echo $tc->getTenTacGia($rows_sach['idTG'])?>" />
<input type="hidden" id="ten_mucluc" name="ten_mucluc" value="<?php echo $row_mucluc['DanhMuc']; ?>" />
<?php } ?>

<div id="menu_sub">
    <ul>
        <li><a href="javascript:;">Trích Dẫn</a></li>
    </ul>
</div>

<div class="popup_block">
    <div class="block_content">
        <ul class="list_icon">
            <li class="icon_print"><a href="javascript:;"><img src="img/icons/icon_print.png"></a></li>
            <li class="icon_email"><a href="javascript:;"><img src="img/icons/icon_email.png"></a></li>
        </ul>
        <div class="clear"></div>      
	  
        <div id="content_select" class="content_select">
			
        </div>
        <div class="clear"></div>
        <div class="form_artical">
            <ul class="list_frm">
            	<li><label>Tác giả/Dịch giả:</label><strong id="ten_tacgia_pu" ></strong></li>
                <li><label>Tên sách:</label><strong id="ten_sach_pu" ></strong></li>
				<li><label>類目:</label><strong id="ten_mucluc_pu" ></strong></li>
                <li><label>出版社:</label><strong id="nhaxuatban" ></strong></li> 
                <li><label>出版年:</label><strong id="namsanxuat" ></strong></li>
            	<li><label>Trang:</label><strong id="current_page_pu" ></strong></li>
            </ul>
			<div class="clear"></div>
        </div>
		<div class="icon_copy"><a id="copyclipboard" href="#">Sao chép</a><a id='btn_cancel' href="javascript:;" style="margin-right:5px">Cancel</a></div>
        <a href="javascript:;" id="btn_close">&nbsp;</a>
    </div>    
</div>