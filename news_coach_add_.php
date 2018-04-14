<?php
    session_start();
    if ($_SESSION["Is_regional"] != true)
    {
        echo "<script>alert('請先登入!')</script>";
        header("Location:RegionalLogin.php");
    }

	include 'MESSAGE.php';

	$title = $_POST['title'];
	$content = $_POST['content'];
	$regional_name = $_SESSION["regional_name"];
	$_regional_id = $_SESSION["regional_id"];
    $msgModel = new MESSAGE;
    $sign = false;

    $conn = $msgModel->connect_db();

    // 上傳檔案
    // 原本就是comment掉的狀態
    /*
    if (true)
    {
        string floder = $"C:\\trainer_files\\{Convert.ToInt32(id).ToString().PadLeft(5, '0')}\\";
        string filePath = $"{floder}{}";

        //暫存在uploadFiles檔案夾下面，如果沒有此檔案夾就建立
        if (!Directory.Exists(floder))
        {
            Directory.CreateDirectory(floder);
        }

        // 檢查檔案是否存在，若存在則刪除
        if (File.Exists(filePath))
        {
            File.Delete(filePath);
        }

        //System.Diagnostics.Debug.WriteLine(year + " - " + sid);
        //System.Diagnostics.Debug.WriteLine("file:");
        //System.Diagnostics.Debug.WriteLine(context.Request.Form["pdfFile"]);
        //System.Diagnostics.Debug.WriteLine(context.Request.Files[0].InputStream);
        //寫入檔案
        File.WriteAllBytes(filePath, StreamToBytes(context.Request.Files[0].InputStream));
    }
    */

	try{
        $sign = $msgModel->addRegionalMessage($conn, $title, $content, $regional_name, $regional_name, $_regional_id);

        if($sign)
        {
			echo "<script>alert('新增成功!'); location.href='news_coach.php'</script>";
        }
	}
	catch(PDOException $e){
		echo "<script>alert('".$e->getMessage()."'); location.href='news_coach_add.php'</script>";
	}
?>
