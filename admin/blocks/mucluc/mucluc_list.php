<?php
$link = "index.php?com=mucluc_list";
$idSachs = -1;
if (isset($_GET['idMLs']) && $_GET['idMLs'] > 0) {
    $idMLs = $_GET['idMLs'];
    settype($idMLs, "int");
    $link.="&idMLs=$idMLs";
} else {
    $idMLs = -1;
}
if (isset($_GET['idSachs']) && $_GET['idSachs'] > 0) {
    $idSachs = $_GET['idSachs'];
    settype($idSachs, "int");
    $link.="&idSachs=$idSachs";
} else {
    $idSachs = -1;
}

$page_show = 5;

if(isset($_GET['idSachs']) && $_GET['idSachs']) $limit = 500; else $limit = 20;

$sachs = $dm->DanhMuc_List($idMLs, $idSachs, -1, -1);

$total_record = mysql_num_rows($sachs);

$total_page = ceil($total_record / $limit);

if (isset($_GET['page']) == false) {
    $page = 1;
} else {
    $page = $_GET['page'];
    settype($page, "int");
}

$offset = $limit * ($page - 1);
$sach = $dm->DanhMuc_List($idMLs, $idSachs, $limit, $offset);
?>
<script>
    $(function(){	
        $("#idMLs").change(function(){				
            $("select[name=idSachs]").load("blocks/ajax_laysach.php?idML="+ $(this).val());
        })
    })
</script>
<script type="text/javascript">
    $(document).ready(function(){		
        $(".linkxoa").live('click',function(){			
            var flag = confirm("確定");
            if(flag == true){
                var idDM = $(this).attr("idDM");
                $.get('xoa.php',{loai:"danhmuc",id:idDM},function(data){
                    window.location.reload();			
                });	
            }
        })
        $("#idMLs").change(function(){
            $("#idSach").load("blocks/ajax_laysach.php?idML="+ $(this).val());
        })
    })
</script>

<div>
    <div >
        <h3>類目 : មើលបញ្ជី</h3>
    </div>

    <div class="clr"></div>
</div>
<div id="main_admin">

    <div>

        <div style="text-align: center">                
            <input type="hidden" id="str_order" value="">
            <table id="drag">
                <thead>
                    <tr>
                        <td colspan="9">
                            <form method="get" action="" name="formTim" id="formTim">
                                ថត &nbsp;<select name='idMLs' id="idMLs">
                                    <option value='0'>ជ្រើសរើសថត</option>
                                    <?php
                                    $MucLuc = $ml->MucLuc_List();
                                    while ($row = mysql_fetch_assoc($MucLuc)) {
                                        ?>
                                        <option <?php if (isset($_GET['idMLs'] ) && $_GET['idMLs'] == $row['idML']) echo "selected"; ?> value='<?php echo $row['idML'] ?>'><?php echo $row['TenMucLuc']; ?></option>
                                    <?php } ?>
                                </select>
                                &nbsp;&nbsp;&nbsp;&nbsp;
                                書籍 &nbsp;<select name='idSachs' id="isSach">
                                    <option value='0'>选择书籍</option>
                                    <?php
                                    $sachsss = $s->Sach_List();
                                    while ($row = mysql_fetch_assoc($sachsss)) {
                                        ?>
                                        <option <?php if ($_GET['idSachs'] == $row['idSach']) echo "selected=selected"; ?> value='<?php echo $row['idSach'] ?>'><?php echo $row['TenSach']; ?></option>
                                    <?php } ?>
                                </select>&nbsp;&nbsp;&nbsp;<input type="submit" name="btnSubmit" id="btnSubmit" value="  看 " /><input type="hidden" name="com" value="mucluc_list"  />
                            </form>                                 
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2"><input type="button" value="ធ្វើបច្ចុប្បន្នភាពតាមលំដាប់លំដោយ" id="capnhat_thutu"></td>
                        <td colspan="6"><?php echo $ml->phantrang($page, $page_show, $total_page, $link); ?></td>
                    </tr>
                    <tr>
                        <th width="1%"></th>       
                        <th width="1%"> 類目 ID </th>
                        <th align="left">Tên 類目 </th> 
                        <th align="center" width="1%">順序</th> 
                        <th width="1%">狀態</th> 
                        <th width="1%">Preview</th> 
                        <th width="1%">頁碼</th>                               
                        <th width="1%">移動</th>
                    </tr>
                </thead>

                <tbody>
                    <?php if($idMLs > 0 && $idSachs >0){
                    $i = 0;
                    while ($row = mysql_fetch_assoc($sach)) {
                        $i++;
                        $idDM = $row['idDM'];
                        $sql = "SELECT * FROM trang WHERE idDM = $idDM";
                        $rs_1 = mysql_query($sql);
                        $sotrang = mysql_num_rows($rs_1);
                        ?>	
                        <tr id="rows_<?php echo $row['idDM'];?>">
                            <td><input type="checkbox" name="chon" idDM="<?php echo $row['idDM'] ?>"></td>                                
                            <td align="center"><?php echo $row['idDM'] ?></td>                                
                            <td align="left"><?php echo $row['DanhMuc'] ?></td> 
                            <td align="center" style="font-weight: bold;color: blue"><?php echo $row['thutu'] ?></td> 
                            <td align="center">
                                <?php
                                if ($row['status'] == 0) {
                                    ?>
                                    <img src="img/icons/disable.gif" alt="Chưa duyệt" title="Chưa duyệt" border="0" 
                                   class="duyet_mucluc" idML="<?php echo $row['idDM'] ?>">
                                <?php } else { ?>
                                    <img src="img/icons/enable.gif" alt="Đã duyệt" title="Đã duyệt" border="0" class="boduyet_mucluc" idML="<?php echo $row['idDM'] ?>">
                                    <?php
                                }
                                ?>
                            </td>
                            <td align="center">
                                <img class="img_preview" src="img/icons/search.png" alt="Xem trước" title="Xem trước" border="0" idML="<?php echo $row['idDM']; ?>" style="cursor: pointer">                                
                                <input type="hidden" name="sotrang_<?php echo $row['idDM']; ?>" id="sotrang_<?php echo $row['idDM']; ?>" value="<?php echo $sotrang; ?>" />
                                <input type="hidden" name="idSach" id="idSach_<?php echo $row['idDM']; ?>" value="<?php echo $row['idSach']; ?>" />
                            </td>  
                            <td align="center"><?php echo $sotrang; ?></td>
                            <td class="action">
                                <a href="index.php?com=trang_add&idDM=<?php echo $row['idDM']; ?>">加页数</a>&nbsp;&nbsp;
                                <a href="index.php?com=trang_list&amp;idDMs=<?php echo $row['idDM']; ?>">
                                    <img src="img/icons/detail.png" alt="Danh sách trang" title="Danh sách trang" border="0">
                                </a>&nbsp;&nbsp;
                                <a href="index.php?com=mucluc_add&amp;idDM=<?php echo $row['idDM'] ?>">
                                    <img src="../img/icons/user_edit.png" alt="回復更新" title="回復更新" border="0">
                                </a>&nbsp;&nbsp;
                                <img class="linkxoa" idDM="<?php echo $row['idDM'] ?>" src="../img/icons/trash.png" alt="刪除" title="刪除" border="0">
                            </td>
                        <?php } ?>
                    <tr>
                        <td colspan="8"><?php echo $ml->phantrang($page, $page_show, $total_page, $link); ?></td>
                    </tr>
                    <?php } else{ ?>
                     <tr>
                        <td colspan="8"><span style="color:red;font-weight: bold;font-size: 15px">选择书籍以查看 類目</span></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

    </div>


    <div class="clr"></div>
</div>
<div id="preview_trang_trong_mucluc">


</div>
<script type="text/javascript">
    $(function(){
        $("table#drag").tableDnD({        
            onDrop: function(table, row) {
                var rows = table.tBodies[0].rows;
                var strOrder = '';
                var strTemp = '';
                for (var i=0; i<rows.length; i++) {
                    strTemp = rows[i].id;
                    strOrder += strTemp.replace('rows_','') + ";";
                }                
                $('#str_order').val(strOrder);
            },
            onDragClass: "myDragClass"
        });
        $('.img_preview').click(function(){
            var idML = $(this).attr('idML');
			var sotrang = $('#sotrang_' + idML).val();
			if(sotrang==0){
				alert('類目 này chưa có trang nào ! Vui lòng nhập trang hoặc kiểm tra lại.');
				return false;
			}else{
				preview_trang(idML);
			}
           
        });
        $('#capnhat_thutu').click(function(){
            $.ajax({
                    url: "capnhat_thutu_mucluc.php",
                    type: "POST",
                    async: false,
                    data: {"str_order":$('#str_order').val(),'idSach':<?php echo $idSachs; ?>},
                    success: function(data){      
                        alert('回復更新 thành công');
                        window.location.reload();
                    }
            });
           
        });
		$('.duyet_mucluc').click(function(){
                    if(confirm('DUYỆT 類目 này ?')){
			var idML = $(this).attr('idML');
			var sotrang = $('#sotrang_' + idML).val();
			var idSach = $('#idSach_' + idML).val();
			if(sotrang==0){
				alert('類目 này chưa có trang nào ! Vui lòng nhập trang hoặc kiểm tra lại.');
				return false;
			}else{
				$.ajax({
					url: "check_mucluc_truoc.php",
					type: "POST",
					async: false,
					data: {"idML":idML,'idSach' :idSach},
					success: function(data){    
                                            alert(data);
                                            window.location.reload();
					}
				});
			}
                    }else{
                        return false;
                    }
		});
                $('.boduyet_mucluc').click(function(){
                    if(confirm('BỎ DUYỆT 類目 này ?')){
			var idML = $(this).attr('idML');			
                        $.ajax({
                                url: "boduyet_mucluc.php",
                                type: "POST",
                                async: false,
                                data: {"idML":idML},
                                success: function(data){                                    
                                     window.location.reload();
                                }
                        });
                    }else{
                        return false;
                    }     
		});
    });
    function preview_trang(idML){        
        $.ajax({
            url: "preview.php",
            type: "POST",
            async: false,
            data: {"idML":idML},
            success: function(data){
                $("#preview_trang_trong_mucluc").html(data);
            }
        });
		
        $("#preview_trang_trong_mucluc").dialog({
            modal:true,
            title:'Preview',
            width:800,
            draggable:false,
            resizable:false,
            close:function(){$("#preview_trang_trong_mucluc").html('')}
        });

        return false;
    }
</script>