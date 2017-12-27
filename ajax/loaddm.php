<?php 
require_once "../admin/lib/class.sach.php";
$s = new sach;

$idSach = (int) $_POST['id'];

$sach  = $s-> List_DanhMuc($idSach);
echo "<option value=0>Chọn danh mục</option>";
while($row = mysql_fetch_assoc($sach)){
?>
<option ten_muc_luc="<?php echo $row['DanhMuc_KD']; ?>-<?php echo $row['idDM']; ?>" <?php if($_GET['idDM']==$row['idDM']) echo "selected" ;?> idTrang="<?php echo $row['idTrang']; ?>" com="mucluc" value="<?php echo $row['idDM']; ?>"> <?php echo $row['DanhMuc']; ?> </option>
<?php } ?>

