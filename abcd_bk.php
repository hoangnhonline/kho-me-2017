<?php
require_once('blocks/seo.php');
$idSach = (int) $_GET['hoanga'];
if($idSach >0){			
	$rs1 = mysql_query("SELECT idSach, idDM, MIN( ThuTu ) , idTrang FROM trang WHERE idSach = $idSach GROUP BY idDM") or die(mysql_error());
echo "<h1>".$idSach."</h1>";
	while($row1 = mysql_fetch_assoc($rs1)){		
		$idTrang = $row1['idTrang'];
		$idDM = $row1['idDM'];
		echo $idDM." - ".$idTrang."<br />";
		mysql_query("UPDATE danhmuc SET idTrang = $idTrang WHERE idDM = $idDM") or die(mysql_error());
	}
}
 ?>