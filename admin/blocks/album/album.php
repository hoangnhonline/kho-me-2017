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
<div>
	<div>
		<h3>Album : <?php echo (isset($_GET['idAlbum']) ? "Cập nhật" : "Thêm mới")?></h3>
    </div>     
    <div class="clr"></div>
</div>
<div id="main_admin">
	
	<div id="main_left">
    
            	<table>
                    <tr class="left">
                    	<td>Tên album</td>
                        <td><input type="text" name="TenAlbum" id="TenAlbum" class="tf" value="<?php echo isset($row['TenAlbum']) ? $row['TenAlbum'] : "";?>" />
                        	<span class="error"><?php echo isset($loi['TenAlbum']) ? $loi['TenAlbum'] : "";?></span>
                        </td>                        
                    </tr>   
                    <td>Hình đại diện</td>
                    <td><input type="text" name="UrlHinh" id="UrlHinh" class="tf" value="<?php echo isset($row['UrlHinh']) ? $row['UrlHinh'] : "";?>"/>
                        <input type="button" name="btnChonFile" value="Chọn hình" onclick="BrowseServer('Images:/','UrlHinh')"  />
                        <div id="preview">
                            <div id="thumbnails"></div>
                        </div>   
                        <span class="error"><?php echo isset($loi['UrlHinh']) ? $loi['UrlHinh'] : "";?></span>
                    </td>                
                </table>
            
    </div>
    <div class="clear"></div>
	<div>
    	
            	<div style="text-align: center">                     
                    <table id="rounded-corner" summary="2007 Major IT Companies&#39; Profit">
                        <thead>
                            <tr>
                                <th scope="col" class="rounded-company"></th>       
                                <th  align="center">ID</th>
                                <th  align="left">Tên album</th> 
                                <th  align="left">Người tạo</th>                                  
                                <th >回復更新</th>
                                <th>刪除</th>
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
                                <td><input type="checkbox" name="chon" idML=<?php echo $row['idAlbum']?>></td>  
                                <td><?php echo $row['idAlbum']?></td> 
                                <td align="left"><?php echo $row['TenAlbum']?></td> 
                                <td align="left"><?php echo ($row['idUser']==1) ? "admin@khmerbeta.org " : "Chưa rõ ";?></td>  
                               	
                                <td><a href="index.php?com=album&amp;idAlbum=<?php echo $row['idAlbum']?>"><img src="../img/icons/user_edit.png" alt="" title="" border="0"></a></td>
                                <td><img class="linkxoa" idAlbum=<?php echo $row['idAlbum']?> src="../img/icons/trash.png" alt="" title="" border="0"></td>
      <?php } ?>
                        </tbody>
                    </table>
                    </div>   
    </div>
   
    <div class="clr"></div>
</div>
</form>