<?php 
require_once "../lib/class.tour.php";
$tour = new tour;
$quocgia  = $tour->processData($_GET[quocgia]);
if($quocgia==2)   $diemden = $tour ->DanhMuc_List_QuocGia(2); 
else 	 $diemden = $tour ->DanhMuc_List_QuocGia(1); 
?>
	<option value="0">--选择nơi đến--</option>
<?php 
while($row = mysql_fetch_assoc($diemden)){
?>    
    <option value="<?php echo $row[idDM_Tour]; ?>">
        <?php echo $row[TenDM_Tour]; ?>
    </option>
      
<?php } ?>

