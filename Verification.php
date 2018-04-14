<?php
    include_once 'USER_AREA_COUNSELING_CENTER.php';
    session_start();

	try
	{
        if ((int)$_SESSION["is_actived"] == 1)
		{
            echo "<script>alert('登入成功！'); location.href='CommonServiceMenu.php'</script>";
        }
		else
		{
            echo "<script>alert('您還未認證信箱，請先去信箱收取認證信！'); location.href='SchoolLogin.php'</script>";
            unset($_SESSION["is_actived"]);
            do_ver($_SESSION["uid"], $_SESSION["code"]);
        }
	}
	catch (PDOException $e)
	{
        echo "<script>alert('".$e->getMessage()."'); location.href='SchoolLogin.php'; </script>";
	}

    function do_ver($uid, $code)
    {
        $temp = new USER_AREA_COUNSELING_CENTER;
        $conn = $temp->connect_db();

        if ($temp->checkVerificationCode($conn, $uid, $code))
        {
            echo "<script>alert('驗證成功！'); location.href='CommonServiceMenu.php'</script>";
        }
        else
        {
            echo "<script>alert('驗證失敗！'); location.href='SchoolLogin.php'</script>";
        }
    }
?>