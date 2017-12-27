<?php
$idSach = $_GET['idSach'];
settype($idSach, "int");
$chitiet = $s->Sach_ChiTiet($idSach);
$row = mysql_fetch_assoc($chitiet);

if (isset($_POST['btnSubmit'])) {
    $s->Sach_Sua($idSach, $loi);

    header("location:?com=sach_list&idML=".$_POST['idML']);

}
?>
<form action="" method="post" name="form_add_dm_ks">
    <div>
        <div >
            <h3>書籍管理 : cập nhật</h3>
        </div>

        <div class="clr"></div>
    </div>
    <div id="main_admin">

        <div id="main_left">

            <table>
                <tr class="left">
                    <td width="150px">類目</td>
                    <td>
                        <select name='idML'>
                            <option value='0'>Chọn 類目</option>
                            <?php
                            $MucLuc = $ml->MucLuc_List();
                            while ($row_ml = mysql_fetch_assoc($MucLuc)) {
                                ?>
                                <option <?php if ($row_ml['idML'] == $row['idML']) echo "selected"; ?> value='<?php echo $row_ml['idML'] ?>'><?php echo $row_ml['TenMucLuc']; ?></option>
<?php } ?>
                        </select>
                    </td>
                </tr>
                <tr class="left">
                    <td>Tên sách</td>
                    <td><input type="text" name="TenSach" id="TenSach" class="tf" value="<?php echo $row['TenSach']; ?>" style="width: 400px;height: 25px" />
                        <span class="error"><?php echo $loi['TenSach']; ?></span>
                    </td>
                </tr>
                <tr class="left">
                    <td>譯者-作者</td>
                    <td><select name='idTG' id="idTG" class="tacgia">
                            <option value='0'>選擇作者</option>
                            <?php
                            $MucLuc = $tg->TacGia_List();
                            while ($row_tg = mysql_fetch_assoc($MucLuc)) {
                                ?>
                                <option <?php if ($row_tg['idTG'] == $row['idTG']) echo "selected"; ?>
                                    value='<?php echo $row_tg['idTG'] ?>'><?php echo $row_tg['TacGia']; ?></option>
<?php } ?>
                        </select>
                    </td>
                </tr>
                <tr class="left">
                    <td>出版社</td>
                    <td><input type="text" name="NhaXB" id="NhaXB" class="tf" value="<?php echo $row['NhaXB']; ?>" />
                        <span class="error"><?php echo $loi['NhaXB']; ?></span>
                    </td>
                </tr>
                <tr class="left">
                    <td>出版年</td>
                    <td><input type="text" name="NamXB" id="NamXB" class="tf" value="<?php echo $row['NamXB']; ?>" />
                        <span class="error"><?php echo $loi['NamXB']; ?></span>
                    </td>
                </tr>
                <tr class="left">
                    <td>封面照片</td>
                    <td>
                        <input type="hidden" name="url_image_old" value="<?php echo $row['url_image']; ?>" id="url_image_old" />
                        <div id="hinhanh">
                            <?php if($row['url_image']!= NULL){ ?>
                            <div style="width:100px;float:left;height:150px;margin-right:10px;text-align:center">
                                <img src="../<?php echo $row['url_image']; ?>" width="100px" height="150px" id='imgHinh' />
                            </div>
                            <?php } ?>
                        </div>
                        <div style="clear:both"></div>
                        <?php if($row['url_image']!= NULL){ ?>
                        <input type="button" id="btnUpload" value="Thay ảnh khác" /><input type="button" id="btnXoa" value="刪除 ảnh" />
                        <?php }else{ ?>
                        <input type="button" id="btnUpload" value="選擇照片" /><input type="button" id="btnXoa" value="刪除 ảnh" style="display:none;" />
                        <?php } ?>
                    </td>
                </tr>

                <tr>
                    <td>&nbsp;</td>
                        <td>

                            <input type="submit" class="save" name="btnSubmit" value="Save"/>

                            <input type="reset" class="cancel" name="btnCancel" value="Reset"/>


                            </td>

                </tr>
            </table>

        </div>

        <div class="clr"></div>
    </div>
</form>
<div id="div_upload" style="display:none">
    <form id="upload_images" method="post" enctype="multipart/form-data" enctype="multipart/form-data" action="ajax.php">
        <div style="margin: auto;">
            <div id="wrapper_input_files">
            	<input type="file" name="images[]" />
            </div>
            <div class="clear"></div>
            <button style="margin-top: 10px;"class="button_colour" type="submit" id="btn_upload_images">
                <a href="#">Upload</a>
            </button>
        </div>

    </form>
</div>
<script src="js/form.js" type="text/javascript"></script>
<script type="text/javascript">
$(function(){
   $('#upload_images').ajaxForm({
     		beforeSend: function() {
			},
			uploadProgress: function(event, position, total, percentComplete) {

			},
			complete: function(data) {
				var arrRes = JSON.parse(data.responseText);
				alert(arrRes['thongbao']);
                if(arrRes['error']!=1){
                    $("#hinhanh").html(arrRes['text']);
                    $('#btnXoa').show();
                }
				$( "#div_upload" ).dialog('close');
				
			}
    	});
		$("#btnUpload").click(function(){
			$("#div_upload" ).dialog({
				modal: true,
				title: 'Upload images',
				width: 300,
				draggable: true,
				resizable: false,
				position: "center middle"
			});
		});
		$("#btnXoa").click(function(){
		if(confirm('確定 ảnh bìa này ?')){
			$("#url_image_old, #url_image" ).val('');
			$('#imgHinh').attr('src','');
			}
		});
});
</script>