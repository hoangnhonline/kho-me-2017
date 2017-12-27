<?php
function resizeHoang($file,$width,$height,$file_name,$des){
	require_once "lib/class.resize.php";
	$re = new resizes;
	$re->load($file);
	$re->resize($width,$height);
	$re->save($des.$file_name);
}
function changeTitle($str) {
    $str = stripUnicode($str);
    $str = str_replace("?", "", $str);
    $str = str_replace("&", "", $str);
    $str = str_replace("'", "", $str);
    $str = str_replace("  ", " ", $str);
    $str = trim($str);
    $str = mb_convert_case($str, MB_CASE_LOWER, 'utf-8'); // MB_CASE_UPPER/MB_CASE_TITLE/MB_CASE_LOWER
    $str = str_replace(" ", "-", $str);
    $str = str_replace("---", "-", $str);
    $str = str_replace("--", "-", $str);
    $str = str_replace('"', '', $str);
    $str = str_replace('"', "", $str);
    $str = str_replace(":", "", $str);
    $str = str_replace("(", "", $str);
    $str = str_replace(")", "", $str);
    $str = str_replace(",", "", $str);
    $str = str_replace(".", "", $str);
    $str = str_replace("%", "", $str);
    return $str;
}

function stripUnicode($str) {
    if (!$str)
        return false;
    $unicode = array(
        'a' => 'á|à|ả|ã|ạ|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ',
        'A' => 'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ằ|Ẳ|Ẵ|Ặ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
        'd' => 'đ',
        'D' => 'Đ',
        'e' => 'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
        'E' => 'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
        'i' => 'í|ì|ỉ|ĩ|ị',
        'I' => 'Í|Ì|Ỉ|Ĩ|Ị',
        'o' => 'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
        'O' => 'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
        'u' => 'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
        'U' => 'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
        'y' => 'ý|ỳ|ỷ|ỹ|ỵ',
        'Y' => 'Ý|Ỳ|Ỷ|Ỹ|Ỵ',
        '' => '?',
        '-' => '/'
    );
    foreach ($unicode as $khongdau => $codau) {
        $arr = explode("|", $codau);
        $str = str_replace($arr, $khongdau, $str);
    }
    return $str;
}
$allowedExts = array("jpg", "jpeg", "gif", "png","PNG","JPG","JPEG","GIF");
$arrRes['text'] = "<div><ul>";

if(!is_dir("../upload/biasach/"))
mkdir("../upload/biasach/",0777,true);

$url = "../upload/biasach/";
$count = 0;
for($i=0;$i<count($_FILES['images']['name']);$i++){
	$extension = end(explode(".", $_FILES["images"]["name"][$i]));
	if ((($_FILES["images"]["type"][$i] == "image/gif") || ($_FILES["images"]["type"][$i] == "image/jpeg") || ($_FILES["images"]["type"][$i] == "image/png")
	|| ($_FILES["images"]["type"][$i] == "image/pjpeg"))
	&& in_array($extension, $allowedExts))
	  {
	  if ($_FILES["images"]["error"][$i] > 0)
		{
		//echo "Return Code: " . $_FILES["images"]["error"][$i] . "<br />";
		}
	  else
		{

		if (file_exists($url. $_FILES["images"]["name"][$i]))
		  {
		  //echo $_FILES["images"]["name"][$i] . " đã tồn tại. "."<br />";
		  }
		else
		  {
            $arrPartImage = explode('.', $_FILES["images"]["name"][$i]);

            // Get image extension
            $imgExt = array_pop($arrPartImage);

            // Get image not extension
            $img = preg_replace('/(.*)(_\d+x\d+)/', '$1', implode('.', $arrPartImage));
            $img = changeTitle($img);
            $name = "{$img}.{$imgExt}";
            $name_36 = "{$img}_36.{$imgExt}";
            $name_48 = "{$img}_48.{$imgExt}";
            $name_72 = "{$img}_72.{$imgExt}";
            $name_96 = "{$img}_96.{$imgExt}";
		  if(move_uploaded_file($_FILES["images"]["tmp_name"][$i],
		  $url. $name)==true){
			resizeHoang(
				$url.$name,
				36,52,
				$name_36,
				$url
			);
			resizeHoang(
				$url.$name,
				48,70,
				$name_48,
				$url
			);
			resizeHoang(
				$url.$name,
				72,105,
				$name_72,
				$url
			);
			resizeHoang(
				$url.$name,
				96,140,
				$name_96,
				$url
			);
            $count++;
			$arrRes['text'] .="<li style='float:left;display:inline;margin-right:10px;text-align:center'>
				<img src='".$url. $name."' width='96' id='imgHinh' /><br />
				<input type='hidden' name='url_image' value='".str_replace("../","",$url).$name."'  /></li>";

		  }
		  }
		}

	  }

	  $arrRes['text'].="</ul></div>";
}

if($count>0){
	$arrRes['thongbao'] = "Upload thành công";
}else{
	$arrRes['thongbao'] = "Có lỗi xảy ra ! Không upload được file .";
    $arrRes['error']=1;
}
echo json_encode($arrRes);
?>
