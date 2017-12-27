<?php 
require_once("../admin/lib/class.sach.php");	
$s = new sach;

$idSach = (int) $_POST['idSach']; 
$danhmuc = $s -> List_DanhMuc($idSach,1);

while($row_dm= mysql_fetch_assoc($danhmuc)){    
   
?>
<p style='color:brown;cursor:pointer;margin-top:5px;margin-bottom:5px;margin-left:20px' class="danhmuc">
	<a idML="<?php echo $row_dm['idDM']; ?>" class="mls" idTrang="<?php echo $row_dm['idTrang']; ?>" com="mucluc" href="javascript:void(0)" style="color:#903">
		<?php echo $row_dm['DanhMuc']?>
    </a>
</p>
<?php } ?>