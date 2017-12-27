<?php
$link = "index.php?com=sach_list";

if (isset($_GET['tukhoa']) && ($_GET['tukhoa']!='')) {
    $tukhoa = $tg->processData($_GET['tukhoa']);
    $link.="&tukhoa=$tukhoa";
    $idDD = -1;
    $idTG = -1;
    $idML = -1;
    $idUsers = -1;
} else {
    $idUsers = -1;
    $tukhoa = "";
    if (isset($_GET['idML']) && $_GET['idML'] > 0) {
        $idML = (int) $_GET['idML'];
        $link.="&idML=$idML";
    } else {
        $idML = -1;
    }
    if (isset($_GET['idTG']) && $_GET['idTG'] > 0) {
        $idTG = (int) $_GET['idTG'];
        $link.="&idTG=$idTG";
    } else {
        $idTG = -1;
    }
    if (isset($_GET['idUsers']) && $_GET['idUsers'] > 0) {
        $idUsers = (int) $_GET['idUsers'];
        $link.="&idUsers=$idUsers";
    } else {
        $idDD = -1;
    }
}

if (isset($_GET['idML']) && $_GET['idML'])
    $limit = 1000; else $limit = 20;

$sach = $s->Sach_List($idML, $idTG, $idUsers, $tukhoa, $limit, 0);
$timduoc = mysql_num_rows($sach);
?>
<script type="text/javascript">
    $(document).ready(function(){
        $(".linkxoa").live('click',function(){
            var flag = confirm("確定");
            if(flag == true){
                var idSach = $(this).attr("idSach");
                $.get('xoa.php',{loai:"sach",id:idSach},function(data){
                    window.location.reload();
                });
            }
        })

    })
</script>

<div>
    <div style="width: 48%;float: left"><h3>書籍管理 : 詳見清單</h3></div>
        <div style="width: 48%;float: left;text-align: right;padding-top: 20px;text-transform: uppercase;font-size: 15px;font-weight: bold"><a href="index.php?com=sach_add">新增書籍</a></div>

</div>
<div style="clear:both"></div>
<div id="main_admin">

    <div>
        <table id="drag">
            <thead>
                <tr>
                    <td colspan="11">
                        <input type="hidden" id="str_order" value="">
                        <input type="hidden" id="idML" value="<?php echo $_GET['idML']; ?>">
                        <form method="get" action="" name="formTim" id="formTim">
                            資料夾
                            <select name='idML' id="idML_search">
                                <option value='0'>選擇資料夾</option>
                                <?php
                                $MucLuc = $ml->MucLuc_List();
                                while ($row = mysql_fetch_assoc($MucLuc)) {
                                    ?>
                                    <option <?php if (isset($_GET['idML']) && $_GET['idML'] == $row['idML']) echo "selected"; ?> value='<?php echo $row['idML'] ?>'><?php echo $row['TenMucLuc']; ?></option>
<?php } ?>
                            </select>
                            &nbsp;&nbsp;&nbsp;
                            譯者-作者
                            <select name='idTG' id="idTG" class="tacgia">
                                <option value='0'>選擇作者</option>
                                <?php
                                $MucLuc = $tg->TacGia_List();
                                while ($row = mysql_fetch_assoc($MucLuc)) {
                                    ?>
                                    <option <?php if (isset($_GET['idTG']) && $_GET['idTG'] == $row['idTG']) echo "selected"; ?> value='<?php echo $row['idTG'] ?>'><?php echo $row['TacGia']; ?></option>
                            <?php } ?>
                            </select>
<?php if ($_SESSION['group'] == 2) { ?>
                                &nbsp;&nbsp;&nbsp;
                                發佈人<select name='idUsers' id="idUsers_search">
                                    <option value='0'>選擇發佈人</option>
                                    <?php
                                    $user_list = $u->user_list();
                                    while ($row_u = mysql_fetch_assoc($user_list)) {
                                        ?>
                                        <option <?php if (isset($_GET['idTG']) && $_GET['idTG'] == $row_u['idUser']) echo "selected"; ?> value='<?php echo $row_u['idUser']; ?>'><?php echo $row_u['email']; ?></option>
    <?php } ?>
                                </select>
                                &nbsp;&nbsp;&nbsp;
                                依書名搜尋/書籍ID<input type="text" name="tukhoa" id="tukhoa" width="150" value="<?php echo isset($_GET['tukhoa']) ? $_GET['tukhoa'] : ""; ?>" />
<?php } ?>
                            <input type="submit" name="btnSubmit" id="btnSubmit" value="  看 " />

                            <input type="hidden" name="com" value="sach_list"  />
                        </form>
                        <br />
                        <br />
                    </td>
                </tr>
                <tr><td colspan="11"><input type="button" value="更新順序" id="capnhat_thutu"></td></tr>
                <tr>
                    <th with="1%"></th>
                    <th with="1%">ID</th>
                    <th align="left" width="50%">书名 </th>
                    <th align="left" width="10%">封面照片 </th>
                    <th>順序</th>
                    <th width="1%">狀態</th>
                    <th align="left"> 資料夾 </th>
                    <th> 编入者 </th>
                    <th align="left" width="15%"> 譯者-作者 </th>
                    <th align="left"> 编入日期 </th>
                    <th width="1%">移動</th>
                </tr>
            </thead>

            <tbody>

                <?php
                if (isset($_GET['idML']) && $_GET['idML'] > 0) {
                    if ($timduoc > 0) {
                        $i = 0;
                        while ($row = mysql_fetch_assoc($sach)) {
                            $i++;
                            ?>
                            <tr id="rows_<?php echo $row['idSach']; ?>">
                                <td><input type="checkbox" name="chon" idSach=<?php echo $row['idSach'] ?>></td>
                                <td><?php echo $row['idSach'] ?></td>
                                <td><?php echo $row['TenSach'] ?></td>
                                <td>
                                    <?php if($row['url_image']!=''){                                     
                                    ?>
                                    <a href="index.php?com=sach_edit&amp;idSach=<?php echo $row['idSach'] ?>">
                                    <img class="lazy" data-original="../<?php echo str_replace(".","_96.",$row['url_image']); ?>" />
                                    </a>
                                    <?php }else{ ?>
                                    <a href="index.php?com=sach_edit&amp;idSach=<?php echo $row['idSach'] ?>">
                                        選擇照片
                                    </a>
                                    <?php } ?>
                                </td>
                                <td width="1%" align="center" style="font-weight: bold;color: blue;"><?php echo $row['thutu'] ?></td>
                                <td align="center">
                                <?php
                                if ($row['status'] == 0) {
                                    ?>
                                    <img src="img/icons/disable.gif" alt="Chưa duyệt" title="Chưa duyệt" border="0" status="1"
                                   class="duyet_mucluc" idSach="<?php echo $row['idSach'] ?>">
                                <?php } else { ?>
                                    <img class="lazy" data-original="img/icons/enable.gif" alt="Đã duyệt" title="Đã duyệt" border="0" class="duyet_mucluc" status="0" idSach="<?php echo $row['idSach'] ?>">
                                    <?php
                                }
                                ?>
                            </td>
                                <td><?php echo $row['TenMucLuc'] ?></td>
                                <td><?php echo $u->get_ten_tac_gia($row['idUsers']); ?></td>
                                <td><?php echo $row['TacGia'] ?></td>
                                <td><?php echo date('d-m-Y', $row['ThoiGian']); ?></td>


                                <td style="white-space: nowrap">
                                    <a href="index.php?com=mucluc_list&amp;idSachs=<?php echo $row['idSach']; ?>&amp;idMLs=<?php echo $row['idML'] ?>">
                                        <img class="lazy" data-original="img/icons/detail.png" alt="Dach sách 類目" title="Dach sách 類目" border="0">
                                    </a>&nbsp;&nbsp;
                                    <a href="index.php?com=sach_edit&amp;idSach=<?php echo $row['idSach'] ?>">
                                        <img class="lazy" data-original="../img/icons/user_edit.png" alt="回復更新" title="回復更新" border="0">
                                    </a>&nbsp;&nbsp;
                                    <img class="linkxoa lazy" idSach="<?php echo $row['idSach'] ?>" data-original="../img/icons/trash.png" alt="刪除 sách" title="刪除 sách" border="0">
                                </td>
                        <?php }
                    } else {
                        ?>
                        <tr> <td colspan="11"> 相册类型 !!!</td></tr>
    <?php }
} else { ?>
                    <tr> <td colspan="11" align="center"><span style="font-size: 15px;color:red;"> 選擇資料夾 选择看书！</td></tr>
<?php } ?>
            </tbody>
        </table>
    </div>




    <div class="clr"></div>
</div>
<style type="text/css">
    td {vertical-align: top}
</style>
<script type="text/javascript">
    $(function(){
<?php if ($_GET['idML'] > 0) { ?>
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
<?php } ?>
              $('#capnhat_thutu').click(function(){
                  $.ajax({
                      url: "capnhat_thutu_sach.php",
                      type: "POST",
                      async: false,
                      data: {"str_order":$('#str_order').val(),'idML':$('#idML').val()},
                      success: function(data){
                          alert('Cập nhật thành công');
                          window.location.reload();
                      }
                  });

              });
              $('.duyet_mucluc').click(function(){
                    var status = $(this).attr('status');
                   var hoi = (status==0) ? "BỎ DUYỆT sách ?" : "DUYỆT sách ?";
                  if(confirm(hoi)){
                      var idSach = $(this).attr('idSach');
                        $.ajax({
                            url: "duyetsach.php",
                            type: "POST",
                            async: false,
                            data: {"status":status,'idSach' :idSach},
                            success: function(data){
                                alert(data);
                                window.location.reload();
                            }
                        });

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
              $("#idML_search, #idUsers_search, #idTG").change(function(){
              	  $("#formTim").submit();
              });
          });

</script>
