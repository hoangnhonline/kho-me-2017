<?php 
$idTrang = $_GET['idTrang'];settype($idTrang,"int");
$chitiet = $trang->Trang_ChiTiet($idTrang);
$row = mysql_fetch_assoc($chitiet);

if(isset($_POST['btnSumit'])){	
	$thanhcong = $trang->Trang_Sua($idTrang,$loi);	
	if($thanhcong==true){
		header("location:?com=trang_add");
	}
}
?>
<script type="text/javascript">
	$(document).ready(function(){		
		$("#idSach").change(function(){			
			var idSach = $(this).val();
			$('#idDM').load('blocks/ajax_laydanhmuctrang.php?idSach=' + idSach);
		})
	});
</script>
<form action="" method="post" name="form_add_dm_ks">
<div>
	<div >
		<h3>頁面 : 回復更新</h3>
    </div>    
    <div class="clr"></div>
</div>
<div id="main_admin">
	
	<div id="main_left">
            	<table>
					
                    <tr class="left">
                    	<td class="nowrap">书名</td>
                        <td>
							<select name='idSach' id="idSach" style="width: 400px">
								<option value='0'>Chọn sách</option>
								<?php $sach = $s->Sach_List();
								while($row_s =  mysql_fetch_assoc($sach)){
								?>
								<option <?php if($row_s['idSach']==$row['idSach']) echo "selected"; ?> value='<?php echo $row_s['idSach']?>'><?php echo $row_s['TenSach']; ?></option>
								<?php } ?>
							</select>
                        </td>                        
                    </tr>     
                    <tr class="left">
                    	<td class="nowrap">Tên danh mục</td>
                        <td>
							<select name='idDM' id="idDM" style="width: 400px">
								<option value='0'>Chọn danh mục</option>
								<?php $danhmuc = $dm->DanhMuc_List();
								while($row_dm =  mysql_fetch_assoc($danhmuc)){
								?>
								<option <?php if($row_dm['idDM']==$row['idDM']) echo "selected"; ?> value='<?php echo $row_dm['idDM']?>'><?php echo $row_dm['DanhMuc']; ?></option>
								<?php } ?>
							</select>
                        </td>                             
                    </tr>     
                     <tr class="left">
                    	<td class="nowrap">順序</td>
                        <td><input type="text" name="ThuTu" id="ThuTu" class="tf"  value="<?php echo $row['ThuTu']; ?>"/>
                        	<span class="error"><?php echo $loi['ThuTu'];?></span>
                        </td>                        
                    </tr>     
                     <tr class="left">
                    	<td class="nowrap">注意</td>
                        <td><textarea id="GhiChu" name="GhiChu"  style="width: 400px;height: 70px">
                        <?php echo trim(strip_tags($row['GhiChu'])); ?>
                        </textarea>
                        </td>                        
                    </tr>
   

                <tr>
                    <td class="nowrap">内容</td>
                    <td><div style="width:900px;overflow: hidden">
                        <textarea class="meta" name="NoiDung" id="NoiDung"><?php echo $row[NoiDung]?></textarea>
                        <script type="text/javascript">
                        var editor = CKEDITOR.replace( 'NoiDung',{
                            uiColor : '#9AB8F3',
                            language:'en',
                            skin:'office2003',
                           	height:300,
                            toolbar:[
                            ['Source','-','重置','NewPage','Preview','-','Templates'],
                            ['Cut','Copy','Paste','PasteText','PasteFromWord','-','Print'],
                            ['Undo','Redo','-','Find','Replace','-','SelectAll','RemoveFormat'],
                            ['Form', 'Checkbox', 'Radio', 'TextField', 'Textarea', 'Select', 'Button', 'ImageButton', 'HiddenField'],
                            ['Bold','Italic','Underline','Strike','-','Subscript','Superscript'],
                            ['NumberedList','BulletedList','-','Outdent','Indent','Blockquote','CreateDiv'],
                            ['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],
                            ['Link','Unlink','Anchor'],
                            ['Image','Flash','Table','HorizontalRule','Smiley','SpecialChar','PageBreak'],
                            ['Styles','Format','Font','FontSize'],
                            ['TextColor','BGColor'],
                            ['Maximize', 'ShowBlocks','-','About']
                            ]
                        });		
                        </script>
                        </div>
                    </td>                        
                </tr>    
                <tr>
                         <td colspan="2">
                         <div style="padding-left:200px">                           
                                <input type="submit" class="save" name="btnSumit" value="重置" />		                               
                          
                                <input type="reset" class="cancel" name="btnCancel" value="上载"/>                                                      
                           
                        </div>
                             </td>
                             
                    </tr>   
            </table>
  </div>
   
    <div class="clr"></div>
</div>
</form>