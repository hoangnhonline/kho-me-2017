<?php
require_once("../admin/lib/class.mucluc.php");
require_once("../admin/lib/class.sach.php");
require_once("../admin/lib/class.danhmuc.php");
$ml = new mucluc;
$s = new sach;
$dm = new danhmuc;
$idML = (int) $_POST['idML'];
$mucluc = $ml->MucLuc_List($idML);
$row_ml = mysql_fetch_assoc($mucluc);
?>					
<div class='baosach'>	
    <?php
    if(!empty($row_ml)){
    $sach = $s->List_Sach($row_ml['idML']);
    while ($row_s = mysql_fetch_assoc($sach)) {
        ?>
        <p idSach='<?php echo $row_s['idSach'] ?>' class="sach"><?php echo $row_s['TenSach'] ?></p>


        <div class='baodanhmuc'>	

        </div>	
        <?php } }
    ?>

</div>	