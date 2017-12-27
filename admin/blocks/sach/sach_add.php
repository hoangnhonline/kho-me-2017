<?php
if (isset($_POST['btnSubmit'])) {
    $thanhcong = $s->Sach_Them($loi);
    if ($thanhcong == true) {
        header("location:index.php?com=sach_list&idML=".$_POST['idML']);
    }
}
?>
    <div>
        <div >
            <h3>書籍管理 : Thêm mới</h3>
        </div>
        <div class="clr"></div>
    </div>
    <form action="" method="post">
        <div class="form">
                <div class="fields">
                        <div class="field field-first">
                                <div class="label">
                                        <label for="select">資料夾:</label>
                                </div>
                                <div class="select">
                                    <select id="idML" name='idML'>
                                            <option value='0'>選擇資料夾</option>
                                            <?php
                                            $MucLuc = $ml->MucLuc_List();
                                            while ($row = mysql_fetch_assoc($MucLuc)) {
                                                ?>
                                                <option value='<?php echo $row['idML'] ?>'><?php echo $row['TenMucLuc']; ?></option>
                                            <?php } ?>
                                    </select>
                                </div>
                        </div>

                        <div class="field">
                                <div class="label">
                                        <label for="input-medium">書名/相簿名稱:</label>
                                </div>
                                <div class="input">
                                        <input type="text" name="TenSach" id="TenSach" class="medium" />
                                </div>
                        </div>

                            <div class="field field-first">
                                <div class="label">
                                        <label for="select">譯者-作者:</label>
                                </div>
                                <div class="select">
                                    <select  name='idTG' id="idTG"  class="tacgia">
                                            <option value='0'>選擇作者</option>
                                            <?php
                                            $MucLuc = $tg->TacGia_List();
                                            while ($row = mysql_fetch_assoc($MucLuc)) {
                                                ?>
                                                <option value='<?php echo $row['idTG'] ?>'><?php echo $row['TacGia']; ?></option>
                                            <?php } ?>
                                    </select>
                                </div>
                        </div>
                        <div class="field">
                                <div class="label">
                                        <label for="input-small">出版社:</label>
                                </div>
                                <div class="input">
                                        <input type="text"  name="NhaXB" id="NhaXB" class="small" />
                                </div>
                        </div>
                        <div class="field">
                                <div class="label">
                                        <label for="input-small">出版年:</label>
                                </div>
                                <div class="input">
                                        <input type="text" name="NamXB" id="NamXB" class="small" />
                                </div>
                        </div>
                        <div class="field">
                                <div class="label">
                                        <label for="input-medium">封面照片:</label>
                                </div>
                                <div class="input">
                                        <input type="button" id="btnUpload" value="選擇照片" /><input type="button" id="btnXoa" value="刪除 ảnh" style="display:none"/><br />
                                        <div id="hinhanh" style="clear:both"></div>
                                </div>
                        </div>
                        <div class="buttons">
                                <input type="submit" name="btnSubmit" value="Save" />
                                <input type="reset" name="reset" value="Reset" />
                        </div>
                </div>
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
                Upload
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
				$("#hinhanh").html(arrRes['text']);
				$('#btnXoa').show();
				$( "#div_upload" ).dialog('close');
			}
    	});
		$("#btnUpload").click(function(){
			$("#div_upload" ).dialog({
				modal: true,
				title: 'Upload images',
				width: 350,
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