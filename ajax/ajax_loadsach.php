<?php 
require_once "../admin/lib/class.sach.php";
$s = new sach;
$idML = $_GET['idML'];settype($idML,"int");
$sach  = $s-> List_Sach($idML);
echo "<option value=0>Chọn sách</option>";
while($row = mysql_fetch_assoc($sach)){
?>    
    <option ten_sach="<?php echo $row['TenSach_KD']; ?>" <?php if($_GET['idSach']==$row['idSach']) echo "selected" ;?>  value="<?php echo $row['idSach']; ?>">
        <?php echo $row['TenSach']; ?>
    </option>      
<?php } ?>

