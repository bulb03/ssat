<?php 
    include_once 'USER.php';
    session_start();

    $user_model = new USER;
    $sid = $_SESSION["sid"];
    $email = $_POST['email'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];


    try
    {
        $phone_temp = $phone;
        if (!empty($_POST['phone2']))
        {
            $phone_temp = $phone_temp."#".$phone2;
        }

        $uid = $_SESSION["uid"];

        $conn = $user_model->connect_db();
        
        // 更新資料
        $result = $user_model->updateByUID($conn,$uid,$email,$name,$phone_temp,"0");

        if (!empty($_POST['password']))
        {
            $re_password = $_POST['re_password'];
            $user_model->changePassword($conn,$uid,$re_password);
        }


        // try
        // {

        //     $Subject = "校園運動防護員申請系統 - 註冊驗證";
        //     $url = (@"http://{0}/ap/Verification.aspx?uid={1}&code={2}", hostname, uid, user_model.getVerificationCode(uid));
        //     $Body = "請您點擊以下連結驗證信箱！<br><br>  <a href='{url}'>驗證信箱</a>";

        //     SendMailByGmail(MailList, Subject, Body);


        //     echo "<script>alert('修改完成！信件已寄出到您的信箱，請至信箱收取郵件驗證。'); location.href='Logout.php'; </script>";

        // }
        // catch (Exception ex)
        // {
        //     //user_model.deleteByUID(uid);

        //     Response.Write("<script>alert('修改錯誤：寄信到信箱有誤，請重新註冊。'); location.href='./Registered_2.aspx'; </script>");
        //     //註冊錯誤
        // }
        echo "<script>alert('更新成功!'); location.href='CommonServiceMenu.php'; </script>";
    }
    catch(PDOException $e)
    {
        echo "<script>alert('註冊錯誤：請聯絡管理者！'); location.href='ChangeUserInfo.php'; </script>";
    }
?>