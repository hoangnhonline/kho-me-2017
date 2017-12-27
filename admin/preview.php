<?php	
require_once("lib/class.trang.php");
$tr = new trang;	

$idML = (int) $_POST['idML'];
$trang = (int) $_POST['idTrang'];
if($trang == 0) {
    $trang = $tr->getIdMin($idML);
}
$idTrangMin = $tr->getIdMin($idML);
$idTrangMax = $tr ->getIdMax($idML);
$idTrangNext = $tr ->getIdNext($idML,$trang);
$idTrangPre = $tr ->getIdPre($idML,$trang);

$chitiet = $tr->Trang_ChiTiet($trang);
$row = mysql_fetch_assoc($chitiet);
?>
<h3 style="color:red;text-align: center"><span style="color:blue;">ID :</span> <?php echo $trang; ?></h3>
<div style="width:700px;height:450px;margin: auto">
    <div style="float:left;width: 30px;padding-top: 200px">
        <?php if($idTrangPre >= $idTrangMin) {?>
        <img src="img/icons/previous.png" style="cursor: pointer" idML="<?php echo $idML; ?>" idTrang="<?php echo $idTrangPre; ?>" class="pre_img"/> 
        <?php } ?>
    </div>
    <div style="float:left;width: 620px;padding-top: 20px;padding-left: 10px;padding-right: 10px;font-size: 18px">
        <?php echo $row['NoiDung']; ?>
    </div>
    <div style="float:left;width: 30px;padding-top: 200px">
        <?php if($idTrangNext <= $idTrangMax) {?>
        <img src="img/icons/next.png" style="cursor: pointer" idML="<?php echo $idML; ?>" idTrang="<?php echo $idTrangNext; ?>" class="next_img" /> 
        <?php } ?>
    </div>
</div>
<script type="text/javascript">
    $(function(){
        $('.pre_img , .next_img').click(function(){
            var idML = $(this).attr('idML');
            var idTrang = $(this).attr('idTrang');
            preview_trang_img(idML,idTrang);
        });
    });
    function preview_trang_img(idML,idTrang){        
        $.ajax({
            url: "preview.php",
            type: "POST",
            async: false,
            data: {"idML":idML,'idTrang':idTrang},
            success: function(data){
                $("#preview_trang_trong_mucluc").html(data);
            }
        });       

        return false;
    }
</script>