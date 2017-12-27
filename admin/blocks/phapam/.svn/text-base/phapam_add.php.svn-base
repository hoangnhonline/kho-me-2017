<?php
$link = "index.php?com=phapam_add";

$page_show=5;

$limit = 10;

$sachs = $pa->PhapAm_List(-1,-1);

$total_record = mysql_num_rows($sachs);

$total_page = ceil($total_record/$limit);

if(isset($_GET[page])==false){
	$page = 1;
}
else{ 
	$page=$_GET[page];
	settype($page,"int");
}

$offset = $limit * ($page - 1);
$sach = $pa->PhapAm_List($limit,$offset);

if(isset($_GET[idPA])){
	$idPA = $_GET[idPA];settype($idPA,"int");
	$chitiet = $pa->PhapAm_ChiTiet($idPA);
	$row_ct = mysql_fetch_assoc($chitiet);
}

if(isset($_POST[btnSumit])){
	if(isset($_GET[idPA])){
		$thanhcong = $pa->PhapAm_Sua($idPA,$loi);	
	}else{	
		$thanhcong = $pa->PhapAm_Them($loi);	
	}
	if($thanhcong==true){
		header("location:?com=phapam_add");
	}
}
?>

<script type="text/javascript">
	$(document).ready(function(){		
		$(".linkxoa").live('click',function(){			
			var flag = confirm("Bạn có chắc chắn xóa");
			if(flag == true){
				var idPA = $(this).attr("idPA");
				$.get('xoa.php',{loai:"phapam",id:idPA},function(data){
					window.location.reload();			
				});	
			}
		})
        
	})
</script>
<form action="" method="post" name="form_add_dm_ks">
<div>
	<div>
		<h3>Quản lý pháp âm: <?php echo (isset($_GET['idPA']) ? "Cập nhật" : "Thêm mới")?></h3>
    </div>    
    <div class="clr"></div>
</div>
<div id="main_admin">
	
	<div id="main_left">    	
            	<table>     
                    <tr class="left">
                    	<td width="150px">Tiêu đề</td>
                        <td width="181"><input type="text" name="TieuDe" id="TieuDe" class="tf" value="<?php echo $row_ct['TieuDe']; ?>"  style="width: 400px;height: 25px" />
                        	<span class="error"><?php echo $loi['TieuDe'];?></span>
                        </td>                        
                    </tr>      
                    <tr>   
                    <td>Hình đại diện</td>
                    <td><input type="text" name="HinhMH" id="HinhMH" class="tf" value="<?php echo $row_ct['HinhMH']?>"/>
                        <input type="button" name="btnChonFile" value="Chọn hình" onclick="BrowseServer('Images:/','HinhMH')"  />
                        <div id="preview">
                            <div id="thumbnails"></div>
                        </div>   
                        <span class="error"><?php echo $loi['UrlHinh'];?></span>
                    </td>                
                    </tr>  
                    <tr class="left">
                    	<td width="61">ID File</td>
                        <td width="181"><input type="text" name="File" id="File" class="tf" value="<?php echo $row_ct['File']; ?>" style="width: 400px;height: 25px"  />
                        	<span class="error"><?php echo $loi['File'];?></span>
                        </td>                        
                    </tr>            
                </table>
       
    </div>
</form>
    <div class="clr"></div>
    
    <div>
    	
            	<div style="text-align: center">                     
                    <table>
                        <thead>
                        <tr>
                                <td colspan="7">&nbsp;</td>
                        </tr>
                        <tr>
                                <td colspan="7"><?php echo $ml->phantrang($page,$page_show,$total_page,$link);?></td>
                            </tr>
                             <tr>
                                <th scope="col" class="rounded-company"></th>       
                               <th scope="col" class="rounded">idPA</th>
                                <th scope="col" class="rounded" align="left">Tiêu đề</th> 
                                <th scope="col" class="rounded">Hình đại diện</th>                               
                                <th scope="col" class="rounded">Sửa</th>
                                <th scope="col" class="rounded-q4">Xóa</th>
                            </tr>
                        </thead>

                        <tbody>
                        <?php                        
                       $i=0;
                        while($row=mysql_fetch_assoc($sach)) {                 
						$i++;   
						$idPA = $row[idPA];
							    
                        ?>	
                           <tr <?php if($i%2==0) echo "bgcolor='#CCC'" ; ?>>
                                <td><input type="checkbox" name="chon" idPA=<?php echo $row[idPA]?>></td>                                <td align="center"><?php echo $row[idPA]?></td>                                
                                <td align="left"><?php echo $row[TieuDe]?></td>  
                               <td align="center"><img src="../<?php echo $row[HinhMH]; ?>"  width="100" height="100"/></td>
                                <td><a href="index.php?com=phapam_add&amp;idPA=<?php echo $row[idPA]?>"><img src="../img/icons/user_edit.png" alt="" title="" border="0"></a></td>
                                <td><img class="linkxoa" idPA=<?php echo $row[idPA]?> src="../img/icons/trash.png" alt="" title="" border="0"></td>
      <?php } ?>
      						<tr>
                                <td colspan="7"><?php echo $ml->phantrang($page,$page_show,$total_page,$link);?></td>
                            </tr>
                        </tbody>
                    </table>
                    </div>
        
    </div>
</div>
