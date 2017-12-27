<?php 
require_once("../admin/lib/class.mucluc.php");	
$ml = new mucluc;
$idPA = (int) $_GET['idPA'];
$rs = mysql_query("SELECT File FROM phapam WHERE idPA = $idPA");
$row = mysql_fetch_assoc($rs);

?>    
<embed width="600" height="180" flashvars="&amp;autostart=true&amp;bandwidth=2176&amp;file=http%3A%2F%2Fmedia.dieuphapam.net%2Fportal%2Fplaylist.php%3Fb%3D<?php echo $row["File"];?>&amp;playlist=bottom&amp;plugins=viral-2d&amp;repeat=list&amp;screencolor=0x000000&amp;skin=http%3A%2F%2Fwww.dieuphapam.net%2Fwp-content%2Fplugins%2Fbook-list%2Fjs%2Fskin%2Fstormtrooper.zip" allowfullscreen="true" allowscriptaccess="always" src="http://www.dieuphapam.net/wp-content/plugins/book-list/js/player.swf" type="application/x-shockwave-flash">
     