<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title></title>
</head>
<body>
    <form id="form1">
        <div>
        	<?php
        		echo "<script>alert('開發中，請不要期待'); location.href = 'news_coach.php';</script></script>";
        		//本來想做，才發現我根本不知道他的檔案放哪，他原本寫的方式滿搞剛的
				// $file = $_GET["msgId"];
				// $file_id = $_GET["fileId"];
				// header("Pragma: public");
				// header("Expires: 0");
				// header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
				// header("Cache-Control: private",false);
				// header("Content-Type: application/octet-stream");
				// header("Content-Disposition: attachment; filename=".basename($file));
				// header("Content-Transfer-Encoding: binary");
				// $fd = fopen($file, "rb");  //大檔案下載的解決方法～readfile($file)會出問題～
				// if($fd)
				// {
				//     ob_end_clean();
				//     fpassthru($fd);
				// }
				// fclose($fd);        	
        	?>
        </div>
    </form>
</body>
</html>
