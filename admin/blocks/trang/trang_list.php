<?php

$link = "index.php?com=trang_list";
if(isset($_GET['idTrang']) > 0){
    $idTrang = (int) $_GET['idTrang'];
    $list_trang=  mysql_query("SELECT * FROM trang WHERE idTrang = $idTrang");
}else{
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
    if (isset($_GET['idDMs']) && $_GET['idDMs'] > 0) {
        $idDMs = $_GET['idDMs'];
        settype($idDMs, "int");
        $link.="&idDMs=$idDMs";
    } else {
        $idDMs = -1;
    }

    $page_show = 5;

    $limit = 10;

    $trangs = $trang->trang_list_theo_user($idMLs, $idSachs, $idDMs, -1, -1);

    $total_record = mysql_num_rows($trangs);

    $total_page = ceil($total_record / $limit);

    if (isset($_GET['page']) == false) {
        $page = 1;
    } else {
        $page = $_GET['page'];
        settype($page, "int");
    }

    $offset = $limit * ($page - 1);

    $list_trang = $trang->trang_list_theo_user($idMLs, $idSachs, $idDMs, $limit, $offset);
}
?>
<script type="text/javascript">
    $(document).ready(function(){
        $(".linkxoa").live('click',function(){
            var flag = confirm("確定");
            if(flag == true){
                var idTrang = $(this).attr("idTrang");
                $.get('xoa.php',{loai:"trang",id:idTrang},function(data){
                    window.location.reload();
                });
            }
        })

    })
</script>
<script type="text/javascript">
    $(document).ready(function(){
        //$('#idDMs').load('blocks/ajax_laydanhmuctrang.php?idSach=' + $("#idSach").val());
        //$("#idSach").load("blocks/ajax_laysach.php?idML="+ $("#idMLs").val());
<?php if (isset($_GET['idDMs'])) { ?>
                            $('#idDMs').val(<?php echo $_GET['idDMs'] ?>);
<?php } ?>
<?php if (isset($_GET['idSachs'])) { ?>
                            $('#idSach').val(<?php echo $_GET['idSachs'] ?>);
<?php } ?>
<?php if (isset($_GET['idMLs'])) { ?>
                            $('#idMLs').val(<?php echo $_GET['idMLs'] ?> );
<?php } ?>

                        $("#idSach").change(function(){
                            $('#idDMs').load('blocks/ajax_laydanhmuctrang.php?idSach=' + $(this).val());
                        })
                        $("#idMLs").change(function(){
                            $("#idSach").load("blocks/ajax_laysach.php?idML="+ $(this).val());
                        })
                    });

</script>

<div>
    <div>
        <div style="width: 48%;float: left"><h3>頁面 : 詳見清單</h3></div>
        <div style="width: 48%;float: left;text-align: right;padding-top: 20px;text-transform: uppercase;font-size: 15px;font-weight: bold"><a href="index.php?com=trang_add">加页数</a></div>
    </div>

    <div class="clr" style="clear: both"></div>
</div>
<div id="main_admin">

    <div>

        <div>
            <table>
                <thead>
                    <tr>
                        <td colspan="6">
                            <form method="get" action="" name="formTim" id="formTim">
                                資料夾
                                <select name='idMLs' id="idMLs">
                                    <option value='0'>選擇資料夾</option>
                                    <?php
                                    $MucLuc1 = $ml->MucLuc_List();
                                    while ($row1 = mysql_fetch_assoc($MucLuc1)) {
                                        ?>
                                        <option <?php if (isset($_GET['idMLs']) && $_GET['idMLs'] == $row1['idML']) echo "selected"; ?> value='<?php echo $row1['idML'] ?>'><?php echo $row1['TenMucLuc']; ?></option>
<?php } ?>
                                </select>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                書籍
                                <select name='idSachs' id="idSach" class="tacgia">
                                    <option value='0'>选择书籍</option>

                                </select>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                類目
                                <select name='idDMs' id="idDMs" class="tacgia">
                                    <option value='0'>Chọn 類目</option>
                                </select>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <span style="color:red;font-weight: bold">PageID</span> <input type="text" name="idTrang" id="idTrang" value="<?php echo isset($_GET['idTrang']) ? $_GET['idTrang'] : ""; ?>"/>
                                <input type="submit" name="btnSubmit" id="btnSubmit" value="  看 " />
                                <br /><br />
                                <input type="hidden" name="com" value="trang_list"  />
                            </form>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="6"><?php echo $ml->phantrang($page, $page_show, $total_page, $link); ?></td>
                    </tr>
                    <tr>
                        <th width="1%"></th>
                        <th align="center" width="1%">PageID</th>
                        <th align="left">书名 </th>
                        <th align="left">類目 </th>
                        <th align="center" width="1%">順序</th>
                        <th width="1%">移動</th>

                    </tr>
                </thead>

                <tbody>
                    <?php
                    $i = 0;
                    while ($row_trang = mysql_fetch_assoc($list_trang)) {
                        $TenSach = $s->LayTenSach($row_trang['idSach']);
                        $TenMucLuc = $dm->LayTenDanhMuc($row_trang['idDM']);
                        $i++;
                        ?>
                        <tr <?php if ($i % 2 == 0) echo "bgcolor='#CCC'"; ?>>
                            <td><input type="checkbox" name="chon" idDM=<?php echo $row_trang['idTrang'] ?>></td>
                            <td align="center"><?php echo $row_trang['idTrang'] ?></td>
                            <td align="left"><?php echo $TenSach; ?></td>
                            <td align="left"><?php echo $TenMucLuc; ?></td>
                            <td align="center"><?php echo $row_trang['ThuTu'] ?></td>

                            <td style="white-space:nowrap"><a href="index.php?com=trang_edit&amp;idTrang=<?php echo $row_trang['idTrang'] ?>"><img src="../img/icons/user_edit.png" alt="" title="" border="0"></a>
                            &nbsp;&nbsp;
                                <img class="linkxoa" idTrang="<?php echo $row_trang['idTrang'] ?>" src="../img/icons/trash.png" alt="刪除" title="刪除" border="0"></td>

<?php } ?>
                    <tr>
                        <td colspan="6"><?php echo $ml->phantrang($page, $page_show, $total_page, $link); ?></td>
                    </tr>
                </tbody>

            </table>
        </div>
    </div>


    <div class="clr"></div>
</div>
