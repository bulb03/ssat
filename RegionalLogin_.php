<?php
    include 'USER_AREA_COUNSELING_CENTER.php';
    session_start();
    echo "<script>console.log(".$_SESSION['CheckCode'].")</script>";

    $check_code = $_SESSION['CheckCode'];
    $account = $_POST['TitleTopMenuContentPlaceHolder_account'];
    $password = $_POST['TitleTopMenuContentPlaceHolder_password'];
    $code = $_POST['TitleTopMenuContentPlaceHolder_code'];

    try
    {
        if ($check_code == null)
        {
            echo "<script>alert('驗證碼逾時，請重新輸入！')</script>";
            //header('Location:RegionalLogin.php');
        }
        else
        {
            if ($check_code==$code)
            {
                login_process($account, $password);
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

    function login_process($account, $password)
    {
        $userModel = new USER_AREA_COUNSELING_CENTER;
        $conn = $userModel->connect_db();
        $UserInfo = $userModel->login($conn, $account, $password);

        foreach ($UserInfo as $row) {
            $_SESSION["regional_id"] = $row["id"];
            $_SESSION["regional_account"] = $row["account"];
            $_SESSION["regional_name"] = $row["name"];
            $_SESSION["regional_email"] = $row["email"];
            $_SESSION["is_actived"] = $row["is_actived"];
            $_SESSION["Is_regional"] = "True";                
        }        

        if ($UserInfo == null)
        {
            echo "<script>alert('帳號或是密碼錯誤！'); location.href='RegionalLogin.php'</script>";
        }
        else
        {
            foreach ($UserInfo as $row) {
                $_SESSION["regional_id"] = $row["id"];
                $_SESSION["regional_account"] = $row["account"];
                $_SESSION["regional_name"] = $row["name"];
                $_SESSION["regional_email"] = $row["email"];
                $_SESSION["is_actived"] = $row["is_actived"];
                $_SESSION["Is_regional"] = "True";                
            }

            echo "<script>alert('登入成功！')</script>";
            header("Location:coach_service.php");
        }
    }

?>