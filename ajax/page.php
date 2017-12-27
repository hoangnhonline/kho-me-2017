<?php 
require_once "../admin/lib/class.trangchu.php";
$tc = new trangchu;
$idDM = (int) $_POST['id'];
$chitiet_trang = $tc->ListTrangTrongMucLuc($idDM);
                  
echo "<option value=0>Chọn trang</option>";
 while($row = mysql_fetch_assoc($chitiet_trang)){
?>    
    <option value="<?php echo $row['ThuTu']; ?>">
        &nbsp;&nbsp;&nbsp;<?php echo $row['ThuTu']; ?>
    </option>      
<?php } ?>