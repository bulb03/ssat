<?php
    include_once 'USER.php';
    include_once 'Utils.php';
    session_start();

    $check_code = $_SESSION['CheckCode'];
    $account = $_POST['account'];
    $password = $_POST['password'];
    $code = $_POST['code_'];

    try
    {
        if ($check_code == null)
        {
            echo "<script>alert('驗證碼逾時，請重新輸入！'); location.href='SchoolLogin.php'</script>";
        }
        else
        {
            if ($check_code==$code)
            {
                echo "<script>console.log('判斷登入！');</script>";
                login_process($account, $password);
            }
            else
            {
                echo "<script>alert('驗證碼輸入錯誤！'); location.href='SchoolLogin.php'</script>";
            }
        }
    }
    catch(Exception $ex)
    {
        echo "<script>alert('驗證碼逾時，請重新輸入！');reloadValidCode();</script>";
    }

	function login_process($account, $password)
	{        
        $user = new USER;
        $utils = new Utils;

        $conn = $user->connect_db();
        $UserInfo = $user->schoolLogin($conn, $utils->currentSchoolYear(), $account, $password);
        
        if ($UserInfo == null)
        {
            echo "<script>alert('帳號或是密碼錯誤！'); location.href='SchoolLogin.php'</script>";
        }
        else
		{
            foreach($UserInfo as $row){
                $_SESSION["uid"] = $row["uid"];
                $_SESSION["sid"] = $row["sid"];
                $_SESSION["is_actived"] = (int)$row["is_actived"];
                $_SESSION["year"] = $utils->currentSchoolYear();
            }
            /*
            Session["uid"] = "4";
            Session["sid"] = "87";
            Session["is_actived"] = "True";
            */

            header('Location:Verification.php');
        }
	}
?>