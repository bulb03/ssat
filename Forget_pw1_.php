<?php
    include_once './after_login/USER.php';
    include_once 'phpMailer/class.phpmailer.php';
    mb_internal_encoding('UTF-8');

    session_start();

    $check_code = $_SESSION['CheckCode'];
    $account = $_POST['email'];
    $code = $_POST['code'];

    try
    {
        if ($check_code == null)
        {
            echo "<script>alert('驗證碼逾時，請重新輸入！'); location.href='Forget_pw1.php'</script>";
            //echo "<script>console.log('".$_SESSION['CheckCode']."');</script>";
        }
        else
        {
            if ($check_code==$code)
            {
                check($account);
            }
            else
            {
                echo "<script>alert('驗證碼輸入錯誤！');</script>";
            }
        }
    }
    catch(Exception $ex)
    {
        echo "<script>alert('驗證碼逾時，請重新輸入！');reloadValidCode();</script>";
    }

	function check($account)
	{
        $temp = new USER;
        $conn = $temp->connect_db();
        $UserInfo = $temp->listByEmail($conn,$account);

        $Subject = "校園運動防護員申請系統 - 忘記密碼確認";
        $Body = "請您點擊以下連結修改密碼！<br><br>  <a href=\"localhost/PlanningandManage/school_manage/Forget_pw2.php?uid=".$UserInfo[0]["uid"]."&code=".$UserInfo[0]["verification_code"]."\">點擊修改密碼</a>";

        SendMailByGmail_php($account, $Subject, $Body);

        echo "<script>alert('信件已寄出到您的信箱，請至信箱收取郵件以修改密碼。'); location.href='SchoolLogin.php'; </script>";
    }

    function SendMailByGmail_php($mail_to, $Subject, $Body)
    {
        $mail = new PHPMailer;
        $mail->IsSMTP();
        $mail->SMTPAuth = true; // turn on SMTP authentication
        //這幾行是必須的

        $mail->Username = "ssatstrainer@gmail.com";
        $mail->Password = "Cycu!631";
        //這邊是你的gmail帳號和密碼

        $mail->FromName = "申請系統信件";
        // 寄件者名稱(你自己要顯示的名稱)
        $webmaster_email = "ssatstrainer@gmail.com"; 
        //回覆信件至此信箱

        $email=$mail_to;
        // 收件者信箱
        $after_cut = explode("@", $mail_to);
        $name=$after_cut[0];
        // 收件者的名稱or暱稱

        $mail->From = $webmaster_email;


        $mail->AddAddress($email,$name);
        $mail->AddReplyTo($webmaster_email,"Squall.f");
        //這不用改

        $mail->WordWrap = 50;
        //每50行斷一次行

        //$mail->AddAttachment("/XXX.rar");
        // 附加檔案可以用這種語法(記得把上一行的//去掉)

        $mail->IsHTML(true); // send as HTML

        $mail->Subject = $Subject; 
        // 信件標題
        $mail->Body = $Body;
        //信件內容(html版，就是可以有html標籤的如粗體、斜體之類)
        $mail->AltBody = $Body; 
        //信件內容(純文字版)

        if(!$mail->Send()){
            echo "寄信發生錯誤：" . $mail->ErrorInfo;
            //如果有錯誤會印出原因
        }
        else{ 
            echo "寄信成功";
        }
    }
?>