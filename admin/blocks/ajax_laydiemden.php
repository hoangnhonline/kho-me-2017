<?php 
require_once "../lib/class.tour.php";
$tour = new tour;
$quocgia  = $tour->processData($_GET[quocgia]);
if($quocgia==2)   $diemden = $tour ->DiemDen_List_QuocGia(2); 
else $diemden = $tour ->DiemDen_List_QuocGia(1);
while($row = mysql_fetch_assoc($diemden)){
?>    
    <option value="<?php echo $row[idDD]; ?>">
        <?php echo $row[TenDD]; ?>
    </option>
      
<?php } ?>

