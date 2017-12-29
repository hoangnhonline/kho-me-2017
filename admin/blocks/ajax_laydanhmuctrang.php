<?php 
require_once "../lib/class.danhmuc.php";
$dm = new danhmuc;
$idSach = $_GET[idSach];settype($idSach,"int");
$sach  = $dm-> DanhMuc_List_Sach($idSach);
echo "<option value=0>选择danh mục</option>";
while($row = mysql_fetch_assoc($sach)){
?>    
    <option <?php if($_GET[idDM]==$row['idDM']) echo "selected" ;?>  value="<?php echo $row[idDM]; ?>">
        <?php echo $row[DanhMuc]; ?>
    </option>
      
<?php } ?>

