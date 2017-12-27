<?php 
require_once "../admin/lib/class.sach.php";
require_once "../admin/lib/class.album.php";
$s = new sach;
$al = new album;
$idSach = (int) $_GET['idSach'];

$chitiet = $s->Sach_ChiTiet($idSach);
$row_ct = mysql_fetch_assoc($chitiet);

if($row_ct['idTG'] > 0 ){
$sach  = $s-> List_DanhMuc($idSach);
echo "<option value=0>Chọn danh mục</option>";
while($row = mysql_fetch_assoc($sach)){
?>

<option ten_muc_luc="<?php echo $row['DanhMuc_KD']; ?>-<?php echo $row['idDM']; ?>" <?php if($_GET['idDM']==$row['idDM']) echo "selected" ;?> idTrang="<?php echo $row['idTrang']; ?>" com="mucluc" value="<?php echo $row['idDM']; ?>"> <?php echo $row['DanhMuc']; ?> </option>
<?php } ?>
<?php } else {?>
<input type="hidden" name="coms" value="album" />
<?php 
$danhmuc = $al -> Album_List_Sach($idSach);
while($row_dm= mysql_fetch_assoc($danhmuc)){
?>
<option <?php if($_GET['idDM']==$row_dm['idAlbum']) echo "selected" ;?>  value="<?php echo $row_dm['idAlbum']; ?>"> <?php echo $row_dm['TenAlbum']; ?> </option>
<?php } ?>
<?php } ?>
