<?php 
$idML = $_GET[idML];settype($idML,"int");
$chitiet = $ml->MucLuc_ChiTiet($idML);
$row = mysql_fetch_assoc($chitiet);
if(isset($_POST[btnSumit])){	
	$thanhcong = $ml->MucLuc_Sua($idML,$loi);	
	if($thanhcong==true){
		header("location:?com=mucluc_list");
	}
}
?>
<form action="" method="post" name="form_add_dm_ks">
<div id="admin_navigation">
	<div style="float:left;width:90%">
		<h3>thư mục : cập nhật</h3>
    </div>
    <div style="float:left;width:5%;padding-top:5px">
    	<input type="submit" class="save" name="btnSumit" value=""/><br />		
        <span>Save</span>
    </div>
    <div style="float:left;width:5%;padding-top:5px">
    	<input type="reset" class="cancel" name="btnCancel" value=""/><br />		
        <span>Reset</span>
    </div>
    <div class="clr"></div>
</div>
<div id="main_admin">
	
	<div id="main_left">
    	<fieldset>
        	<legend>Thông tin chi tiết</legend>
            	<table>
                    <tr class="left">
                    	<td>Tên thư mục</td>
                        <td><input type="text" name="TenMucLuc" id="TenMucLuc" class="tf" value="<?php echo $row[TenMucLuc]; ?>" />
                        	<span class="error"><?php echo $loi[TenMucLuc];?></span>
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