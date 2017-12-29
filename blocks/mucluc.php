<?php
$link = "index.php?com=mucluc";

$idML = (int) $_GET[idML];
$link.="&idML=$idML";

$tongsotrang = $ml->TongSoTrangTrongMucLuc($idML);
$TrangMax = $ml->GetIdTrangMax($idML);
$TrangMin = $ml->GetIdTrangMin($idML);

$page_show = 10;

if (isset($_GET[page]) == false) {
    $page = 1;
} else {
    $page = $_GET[page];
    settype($page, "int");
}
if ($tongsotrang > 0) {
    if ($_GET[idTrang]) {
        $idTrang = (int) $_GET[idTrang];
    } else {
        $idTrang = $TrangMin;
    }
    $sach = $s->ChiTiet_Trang($idTrang);
    $row = mysql_fetch_assoc($sach);
    $noidung = $row[NoiDung];
} else {
    $noidung = "Chưa có 内容 !";
}
?>  
<?php if ($idTrang > $TrangMin) { ?>  
    <span style="position: absolute;left:13%;top:45%;cursor: pointer;">
        <a href="index.php?com=mucluc&idML=<?php echo $_GET[idML]; ?>&idTrang=<?php echo $_GET[idTrang] - 1; ?>">Prev</a></span>
<?php } ?>
<?php
if ($idTrang < $TrangMax) {
    if ($idTrang == $TrangMin)
        $trang = $TrangMin + 1;
    else
        $trang = $_GET[idTrang] + 1;
    ?>
    <span style="position: absolute;right:13%;top:45%;cursor: pointer;">
        <a href="index.php?com=mucluc&idML=<?php echo $_GET[idML]; ?>&idTrang=<?php echo $trang; ?>">Next</a></span>
<?php } ?>       
<div style="min-height:350px;width:900px;margin-left:auto;margin-right:auto" style="position:absolute;">
    <?php
    echo $noidung;
    ?>

</div>

<style>
    #thanhphantrang a {padding:3px 5px;background-color:#09F;color:#FFF;text-decoration:none}
    #thanhphantrang a.selected {background-color:#F00;color:#FFF}
</style>
<div style="clear:both;bottom:10px;margin-top:20px;text-align:center" id="thanhphantrang">
    <?
    if ($tongsotrang > 0) {
        $dau = $TrangMin;
        $cuoi = 0;
        $dau = $idTrang - floor($page_show / 2);
        if ($dau < $TrangMin)
            $dau = $TrangMin;
        $cuoi = $dau + $page_show;
        if ($cuoi > $TrangMax) {

            $cuoi = $TrangMax + 1;
            $dau = $cuoi - $page_show;
            if ($dau < $TrangMin)
                $dau = $TrangMin;
        }
        ?>
        <?php if ($idML > 1) { ?>
            <a href="index.php?com=mucluc&idML=<?php echo ($idML - 1); ?>">Previous</a>
        <?php } ?>
        <?
        for ($i = $dau; $i < $cuoi; $i++) {
            if ($i == $idTrang) {
                $class = "selected";
                echo "<a  href='index.php?com=mucluc&idML=" . $idML . "&idTrang=$i' class=" . $class . " >" . $i . "</a>" . " ";
            } else {
                echo "<a  href='index.php?com=mucluc&idML=" . $idML . "&idTrang=$i' >" . $i . "</a>" . " ";
            }
        }
        ?>
        <a href="index.php?com=mucluc&idML=<?php echo ($idML + 1); ?>">Next</a>
        <?
    }
    ?>
</div>