<?php 
require_once "../lib/class.visa.php";
$visa = new visa;
$idCL  = $visa->processData($_POST[idCL]);
if($idCL==2)  { $listdanhmuc = $visa ->ListDichVuVisa(); 
while($row_dm= mysql_fetch_assoc($listdanhmuc)){
?>    
    <option value="<?php echo $row_dm[idDV]; ?>"  
    >
        <?php echo $row_dm[TenDV]; ?>
    </option>
      
<?php } }
else{
	$listdm = $visa ->ListThongTinVisa(); 
while($row_dm = mysql_fetch_assoc($listdm)){
?>
 	<option value="<?php echo $row_dm[idTT]; ?>"             
        >
        <?php echo $row_dm[TenTT]; ?>
    </option>
<?php 
}
}
?>

