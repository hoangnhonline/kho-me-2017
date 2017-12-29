<?php 
$idDM = $_GET[idDM];settype($idDM,"int");
$chitiet = $dm->DanhMuc_ChiTiet($idDM);
$row = mysql_fetch_assoc($chitiet);

if(isset($_POST[btnSumit])){	
	$thanhcong = $dm->DanhMuc_Sua($idDM,$loi);	
	if($thanhcong==true){
		header("location:?com=danhmuc_list");
	}
}
?>
<form action="" method="post" name="form_add_dm_ks">
<div id="admin_navigation">
	<div style="float:left;width:90%">
		<h3>類目 : 回復更新</h3>
    </div>
    <div style="float:left;width:5%;padding-top:5px">
    	<input type="submit" class="save" name="btnSumit" value=""/><br />		
        <span>重置</span>
    </div>
    <div style="float:left;width:5%;padding-top:5px">
    	<input type="reset" class="cancel" name="btnCancel" value=""/><br />		
        <span>上载</span>
    </div>
    <div class="clr"></div>
</div>
<div id="main_admin">
	
	<div id="main_left">
    	<fieldset>
        	<legend>Thông tin chi tiết</legend>
            	<table>
					<tr class="left">
                    	<td>书名</td>
                        <td>
							<select name='idSach'>
								<option value='0'>选择书籍</option>
								<?php $sach = $s->Sach_List();
								while($row_ml =  mysql_fetch_assoc($sach)){
								?>
								<option <?php if($row_ml[idSach]==$row[idSach]) echo "selected"; ?> value='<?php echo $row_ml[idSach]?>'><?php echo $row_ml['TenSach']; ?></option>
								<?php } ?>
							</select>
                        </td>                        
                    </tr>     
                    <tr class="left">
                    	<td>Tên 類目</td>
                        <td><input type="text" name="DanhMuc" id="DanhMuc" class="tf" value="<?php echo $row[DanhMuc]; ?>" />
                        	<span class="error"><?php echo $loi[DanhMuc];?></span>
                        </td>                        
                    </tr>                
                </table>
            
        </fieldset>
    </div>
	<div id="main_right">
    	<fieldset class="details_form">
        	<legend>Metadata</legend>
            <table>
                <tr>
                    <td>Title</td>
                    <td><input type="text" name="Title" id="Title" class="tf" /></td>                        
                </tr>
                <tr>
                    <td>Meta Description</td>
                    <td><textarea class="meta" name="MetaD"></textarea></td>                        
                </tr>
                <tr>
                    <td>Meta Keyword</td>
                    <td><textarea class="meta" name="MetaK"></textarea></td>                        
                </tr>                    
            </table>
        </fieldset>
    </div>
   
    <div class="clr"></div>
</div>
</form>