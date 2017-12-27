<?php
$link = "index.php?com=album_add";
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

$limit = 10;

$sachs = $al->Album_List($idMLs, $idSachs, -1, -1);

$total_record = mysql_num_rows($sachs);

$total_page = ceil($total_record / $limit);

if (isset($_GET['page']) == false) {
    $page = 1;
} else {
    $page = $_GET['page'];
    settype($page, "int");
}

$offset = $limit * ($page - 1);
$sach = $al->Album_List($idMLs, $idSachs, $limit, $offset);

if (isset($_GET['idDM'])) {
    $idDM = $_GET['idDM'];
    settype($idDM, "int");
    $chitiet = $al->Album_ChiTiet($idDM);
    $row_ct = mysql_fetch_assoc($chitiet);
}

if (isset($_POST['btnSumit'])) {
    if (isset($_GET['idDM'])) {
        $thanhcong = $al->Album_Sua($idDM, $loi);
    } else {
        $thanhcong = $al->Album_Them($loi);
    }
    if ($thanhcong == true) {
        header("location:?com=album_add");
    }
}
?>
<script>
    $(function(){
        $("#idML").change(function(){
            $("select[name=idSach]").load("blocks/ajax_laysach.php?idML="+ $(this).val());
        })
        $("#idMLs").change(function(){
            $("select[name=idSachs]").load("blocks/ajax_laysach.php?idML="+ $(this).val());
        })
    })
</script>
<script type="text/javascript">
    $(document).ready(function(){
        $(".linkxoa").live('click',function(){
            var flag = confirm("Bạn có chắc chắn xóa");
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
            <h3>Quản lý album : <?php echo (isset($_GET['idDM']) ? "Cập nhật" : "Thêm mới") ?></h3>
        </div>
      
        <div class="clr"></div>
    </div>
    <div id="main_admin">

        <div id="main_left">
            
                <table>
                    <tr class="left">
                        <td width="150px">Thư mục</td>
                        <td >
                            <select name='idML' id="idML">
                                <option value='0'>Chọn thư mục</option>
                                <?php
                                $MucLuc = $ml->MucLuc_List();
                                while ($row = mysql_fetch_assoc($MucLuc)) {
                                    ?>
                                    <option <?php if ($row_ct['idML'] == $row['idML']) echo "selected"; ?> value='<?php echo $row['idML'] ?>'><?php echo $row['TenMucLuc']; ?></option>
<?php } ?>
                            </select>
                        </td>
                    </tr>
                    <tr class="left">
                        <td  width="150px">Loại album</td>
                        <td>
                            <select name='idSach' id="isSach" style="width: 400px">
                                <option value='0'>Chọn sách</option>
<?php
$sachss = $s->Sach_List();
while ($row = mysql_fetch_assoc($sachss)) {
    ?>
                                    <option <?php if ($row_ct['idSach'] == $row['idSach']) echo "selected"; ?> value='<?php echo $row['idSach'] ?>'><?php echo $row['TenSach']; ?></option>
<?php } ?>
                            </select>
                        </td>
                    </tr>
                    <tr class="left">
                        <td  width="150px">Tên album</td>
                        <td><input type="text" name="TenAlbum" id="TenAlbum" class="tf" value="<?php echo $row_ct['TenAlbum']; ?>" style="width: 400px;height: 25px"  />
                            <span class="error"><?php echo $loi['DanhMuc']; ?></span>
                        </td>
                    </tr>
                    <tr>
                        <td  width="150px">Hình đại diện</td>
                        <td><input type="text" name="UrlHinh" id="UrlHinh" class="tf" value="<?php echo $row_ct['UrlHinh'] ?>"/>
                            <input type="button" name="btnChonFile" value="Chọn hình" onclick="BrowseServer('Images:/','UrlHinh')"  />
                            <div id="preview">
                                <div id="thumbnails"></div>
                            </div>
                            <span class="error"><?php echo $loi['UrlHinh']; ?></span>
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
                        <td colspan="9">
                            <form method="get" action="" name="formTim" id="formTim">
                                Thư mục
                                <select name='idMLs' id="idMLs">
                                    <option value='0'>Chọn thư mục</option>
<?php
$MucLuc = $ml->MucLuc_List();
while ($row = mysql_fetch_assoc($MucLuc)) {
    ?>
                                        <option <?php if ($_GET['idMLs'] == $row['idML']) echo "selected"; ?> value='<?php echo $row['idML'] ?>'><?php echo $row['TenMucLuc']; ?></option>
                                    <?php } ?>
                                </select>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                Loại album
                                <select name='idSachs' id="isSach" style="width: 400px">
                                    <option value='0'>Chọn sách</option>
<?php
$sachs = $s->Sach_List();
while ($row = mysql_fetch_assoc($sachs)) {
    ?>
                                        <option <?php if ($_GET['idSachs'] == $row['idSach']) echo "selected=selected"; ?> value='<?php echo $row['idSach'] ?>'><?php echo $row['TenSach']; ?></option>
<?php } ?>
                                </select>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="submit" name="btnSubmit" id="btnSubmit" value="  Xem " />
                                <br /><br />
                                <input type="hidden" name="com" value="album_add"  />
                            </form>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="8"><?php echo $ml->phantrang($page, $page_show, $total_page, $link); ?></td>
                    </tr>
                    <tr>
                        <th width="1%"></th>
                        <th width="1%"> Album ID </th>
                        <th> Thư mục </th>
                        <th> Loại album </th>
                        <th align="left">Tên Album </th>
                        <th>Hình đại diện</th>
                        <th>Sửa</th>
                        <th>Xóa</th>
                    </tr>
                </thead>

                <tbody>
<?php
$i = 0;
while ($row = mysql_fetch_assoc($sach)) {
    $i++;
    $idAlbum = $row['idAlbum'];
    ?>
                        <tr <?php if ($i % 2 == 0) echo "bgcolor='#CCC'"; ?>>
                            <td><input type="checkbox" name="chon" idDM=<?php echo $row['idAlbum'] ?>></td>                                <td align="center"><?php echo $row[idAlbum] ?></td>                                <td align="left"><?php echo $ml->LayTenThuMuc($row[idML]); ?></td>
                            <td align="left"><?php echo $s->LayTenSach($row['idSach']); ?></td>
                            <td align="left"><?php echo $row['TenAlbum'] ?></td>
                            <td align="center"><img src="../<?php echo $row['UrlHinh']; ?>"  width="100" height="100"/></td>
                            <td><a href="index.php?com=album_add&amp;idDM=<?php echo $row['idAlbum'] ?>"><img src="../img/icons/user_edit.png" alt="" title="" border="0"></a></td>
                            <td><img class="linkxoa" idAlbum="<?php echo $row['idAlbum'] ?>" src="../img/icons/trash.png" alt="" title="" border="0"></td>
<?php } ?>
                    <tr>
                        <td colspan="8"><?php echo $ml->phantrang($page, $page_show, $total_page, $link); ?></td>
                    </tr>
                </tbody>
            </table>
        </div>    
</div>
</div>
