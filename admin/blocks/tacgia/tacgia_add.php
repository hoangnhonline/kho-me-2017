<?php 

if(isset($_POST[btnSumit])){	
	$thanhcong = $tg->TacGia_Them($loi);	
	if($thanhcong==true){
		header("location:?com=tacgia_list");
	}
}
?>
<form action="" method="post" name="form_add_dm_ks">
<div>
	<div>
		<h3>Tác giả : Thêm mới</h3>
    </div>   
    <div class="clr"></div>
</div>
<div id="main_admin">
	
	<div id="main_left">
    
            	<table>
                    <tr class="left">
                    	<td>Tên dịch giả - tác giả</td>
                        <td><input type="text" name="TacGia" id="TacGia" class="tf" />
                        	<span class="error"><?php echo $loi[TacGia];?></span>
                        </td>                        
                    </tr>
                     <tr>
                         <td colspan="2">
                         <div style="padding-left:200px">                           
                                <input type="submit" class="save" name="btnSumit" value="Save" onclick="return validate();"/>		                               
                          
                                <input type="reset" class="cancel" name="btnCancel" value="Reset"/>                                                      
                           
                        </div>
                             </td>
                             
                    </tr>      
                </table>
 
    </div>

    <div class="clr"></div>
</div>
</form>