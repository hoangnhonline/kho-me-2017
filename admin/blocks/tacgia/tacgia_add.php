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
		<h3>Tác giả : 新加</h3>
    </div>   
    <div class="clr"></div>
</div>
<div id="main_admin">
	
	<div id="main_left">
    
            	<table>
                    <tr class="left">
                    	<td>相册名称</td>
                        <td><input type="text" name="TacGia" id="TacGia" class="tf" />
                        	<span class="error"><?php echo $loi[TacGia];?></span>
                        </td>                        
                    </tr>
                     <tr>
                         <td colspan="2">
                         <div style="padding-left:200px">                           
                                <input type="submit" class="save" name="btnSumit" value="重置" onclick="return validate();"/>		                               
                          
                                <input type="reset" class="cancel" name="btnCancel" value="上载"/>                                                      
                           
                        </div>
                             </td>
                             
                    </tr>      
                </table>
 
    </div>

    <div class="clr"></div>
</div>
</form>