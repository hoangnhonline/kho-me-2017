<?php
// Lưu nội dung sau khi file php chạy xong vào file cache
$cached = fopen($cachefile, 'w');
fwrite($cached, ob_get_contents());
fclose($cached);
ob_end_flush(); // Dừng buffer, gửi nội dung đến trình duyệt
?>