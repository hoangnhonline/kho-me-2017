<?php
// Lưu 内容 sau khi file php chạy xong vào file cache
$cached = fopen($cachefile, 'w');
fwrite($cached, ob_get_contents());
fclose($cached);
ob_end_flush(); // Dừng buffer, gửi 内容 đến trình duyệt
?>