<?php 
if(isset($_GET['idML'])){
	$idML = $_GET['idML'];settype($idML,"int");
	$chitiet = $ml->MucLuc_ChiTiet($idML);
	$row = mysql_fetch_assoc($chitiet);
}
if(isset($_POST['btnSumit'])){
	if(isset($_GET['idTG'])){
		$thanhcong = $ml->MucLuc_Sua($idML,$loi);	
	}else{	
		$thanhcong = $ml->MucLuc_Them($loi);	
	}
	if($thanhcong==true){
		header("location:?com=thumuc");
	}
}
?>
<script type="text/javascript">
	$(document).ready(function(){		
		$(".linkxoa").live('click',function(){			
			var flag = confirm("確定");
			if(flag == true){
				var idML = $(this).attr("idML");
				$.get('xoa.php',{loai:"mucluc",id:idML},function(data){
					window.location.reload();			
				});	
			}
		})
        
	})
</script>
<form action="" method="post" name="form_add_dm_ks">
<div>
	<div>
		<h3>thư mục : <?php echo (isset($_GET['idML']) ? "Cập nhật" : "Thêm mới")?></h3>
    </div     
    <div class="clr"></div>

<div id="main_admin">
	
	<div id="main_left">
    	
            	<table>
                    <tr class="left">
                    	<td width="150px">Tên thư mục</td>
                        <td><input type="text" name="TenMucLuc" id="TenMucLuc" class="tf" value="<?php echo $row['TenMucLuc'];?>" style="width: 400px; height: 25px" />
                        	<span class="error"><?php echo $loi['TenMucLuc'];?></span>
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
    <div class="clear"></div>
    <div style="margin-top: 20px">
    	
            	<div style="text-align: center">                     
                    <table>
                        <thead>
                            <tr>
                                <th  width="1%"></th>       
                                <th align="center" width="1%">ID</th>
                                <th align="left">Tên thư mục</th> 
                                <th align="left">Người tạo</th>                                  
                                <th>回復更新</th>
                                <th class="rounded-q4">刪除</th>
                            </tr>
                        </thead>

                        <tbody>
                        <?php 
						
                        $mucluc = $ml->MucLuc_List();
						$i=0;
                        while($row=mysql_fetch_assoc($mucluc)) {                 
						$i++;
                        ?>	
                             <tr <?php if($i%2==0) echo "bgcolor='#CCC'" ; ?>>
                                <td><input type="checkbox" name="chon" idML="<?php echo $row['idML']?>"></td>  
                                <td><?php echo $row['idML']?></td> 
                                <td align="left"><?php echo $row['TenMucLuc']?></td> 
                                <td align="left"><?php echo ($row['idUser']==1) ? "Bé Bé " : "Chưa rõ ";?></td>  
                               	
                                <td><a href="index.php?com=thumuc&amp;idML=<?php echo $row['idML']?>"><img src="../img/icons/user_edit.png" alt="" title="" border="0"></a></td>
                                <td><img class="linkxoa" idML="<?php echo $row['idML']?>" src="../img/icons/trash.png" alt="" title="" border="0"></td>
      <?php } ?>
                        </tbody>
                    </table>
                    </div>       
    </div>
   
    <div class="clr"></div>
</div>
</form>