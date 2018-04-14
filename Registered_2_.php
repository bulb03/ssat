<?php
    include_once 'Utils.php';
    include_once 'USER.php';
    include_once 'SCHOOL.php';
    include_once '../phpMailer/class.phpmailer.php';
    mb_internal_encoding('UTF-8');

    $OK = true;
    $sch_name = $_POST['sch_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $re_password = $_POST['re_password'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $phone2 = empty($_POST['phone2']) ? "" : $_POST['phone2'];

    $user_temp = new USER;
    $school_temp = new SCHOOL;
    $util = new Utils;
    $conn = $user_temp->connect_db();
    $temp = $school_temp->getSchoolByName($conn,$sch_name);
    $sid = $temp[0]["sid"];


    if ($user_temp->listBySID($conn,$sid) != 0)
    {
        echo "<script>alert('該學校已註冊過了，請聯絡管理者！'); location.href='Registered_2.php'; </script>";
    }

    if ($user_temp->listByEmail($conn,$email) != 0)
    {
        echo "<script>alert('該信箱已經註冊過了'); location.href='Registered_2.php'; </script>";
    }

    if ( $OK == true )
    {
        try
        {
            $phone_temp = $phone;
            if($phone2 != "")
            {
                $phone_temp = $phone_temp."#".$phone2;
            }
            
            $uid = $user_temp->create($conn, $util->currentSchoolYear(), "學校負責人", $sid, $email, $password, $name, $phone_temp);

            try
            {                    
                $Subject = "校園運動防護員申請系統註冊驗證";
                $url = "http://localhost/PlanningandManage/school_manage/Verification.php?uid=".$uid."&code=".$user_temp->getVerificationCode($conn,$uid);
                $Body = "請您點擊以下連結驗證信箱！<br><br>  <a href='".$url."'>驗證信箱</a>";

                SendMailByGmail_php($email, $Subject, $Body);
                
                echo "<script>alert('註冊完成！信件已寄出到您的信箱，請至信箱收取郵件驗證。'); location.href='SchoolLogin.php'; </script>";

            }
            catch (PDOException $e)
            {
                $user_temp->deleteByUID($uid);

                echo "<script>alert('註冊錯誤：寄信到信箱有誤，請重新註冊。'); location.href='Registered_2.php'; </script>";
                //註冊錯誤
            }
        }
        catch (PDOException $e)
        {
            echo "<script>alert('註冊錯誤：請聯絡管理者！'); location.href='SchoolLogin.php'; </script>";
        }
    }


    //還沒成功，好像是CA認證的問題
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