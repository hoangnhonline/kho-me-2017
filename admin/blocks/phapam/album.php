<?php 
if(isset($_GET[idAlbum])){
	$idAlbum = $_GET[idAlbum];settype($idAlbum,"int");
	$chitiet = $al->Album_ChiTiet($idAlbum);
	$row = mysql_fetch_assoc($chitiet);
}
if(isset($_POST[btnSumit])){
	if(isset($_GET[idAlbum])){
		$thanhcong = $al->Album_Sua($idAlbum,$loi);	
	}else{	
		$thanhcong = $al->Album_Them($loi);	
	}
	if($thanhcong==true){
		header("location:?com=album");
	}
}
?>
<script type="text/javascript">
	$(document).ready(function(){		
		$(".linkxoa").live('click',function(){			
			var flag = confirm("確定");
			if(flag == true){
				var idAlbum = $(this).attr("idAlbum");
				$.get('xoa.php',{loai:"album",id:idAlbum},function(data){
					window.location.reload();			
				});	
			}
		})
        
	})
</script>
<form action="" method="post" name="form_add_dm_ks">
<div id="admin_navigation">
	<div style="float:left;width:80%">
		<h3>album : <?php echo (isset($_GET[idAlbum]) ? "Cập nhật" : "新加")?></h3>
    </div>
     <div style="float:left;width:5%;padding-top:5px">
        <a href="index.php?com=thumuc"><input type="button" class="new" name="btnNew" value=""/></a><br />		
        <span>New</span>
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
                    	<td>相册名称</td>
                        <td><input type="text" name="TenAlbum" id="TenAlbum" class="tf" value="<?php echo $row['TenAlbum'];?>" />
                        	<span class="error"><?php echo $loi[TenAlbum];?></span>
                        </td>                        
                    </tr>   
                    <td>图片代表</td>
                    <td><input type="text" name="UrlHinh" id="UrlHinh" class="tf" value="<?php echo $row[UrlHinh]?>"/>
                        <input type="button" name="btnChonFile" value="选择图片" onclick="BrowseServer('Images:/','UrlHinh')"  />
                        <div id="preview">
                            <div id="thumbnails"></div>
                        </div>   
                        <span class="error"><?php echo $loi[UrlHinh];?></span>
                    </td>                
                </table>
            
        </fieldset>
    </div>
    <div class="clear"></div>
	<div>
    	<fieldset>
        	<legend>++ Danh sách ++</legend>
            	<div style="text-align: center">                     
                    <table id="rounded-corner" summary="2007 Major IT Companies&#39; Profit">
                        <thead>
                            <tr style="color:white;background-color:#06F;height:30px">
                                <th scope="col" class="rounded-company"></th>       
                                <th scope="col" class="rounded" align="center">ID</th>
                                <th scope="col" class="rounded" align="left">相册名称</th> 
                                <th scope="col" class="rounded" align="left">编入者</th>                                  
                                <th scope="col" class="rounded">回復更新</th>
                                <th scope="col" class="rounded-q4">刪除</th>
                            </tr>
                        </thead>

                        <tbody>
                        <?php 
						
                        $mucluc = $al->Album_List();
						$i=0;
                        while($row=mysql_fetch_assoc($mucluc)) {                 
						$i++;
                        ?>	
                             <tr <?php if($i%2==0) echo "bgcolor='#CCC'" ; ?>>
                                <td><input type="checkbox" name="chon" idML=<?php echo $row[idAlbum]?>></td>  
                                <td><?php echo $row[idAlbum]?></td> 
                                <td align="left"><?php echo $row[TenAlbum]?></td> 
                                <td align="left"><?php echo ($row[idUser]==1) ? "Bé Bé " : "Chưa rõ ";?></td>  
                               	
                                <td><a href="index.php?com=album&amp;idAlbum=<?php echo $row[idAlbum]?>"><img src="../img/icons/user_edit.png" alt="" title="" border="0"></a></td>
                                <td><img class="linkxoa" idAlbum=<?php echo $row[idAlbum]?> src="../img/icons/trash.png" alt="" title="" border="0"></td>
      <?php } ?>
                        </tbody>
                    </table>
                    </div>
        </fieldset>
    </div>
   
    <div class="clr"></div>
</div>
</form>