<?php
    include 'USER_COUNTRY.php';
    session_start();

    $check_code = $_SESSION['CheckCode'];
    $account = $_POST['account'];
    $password = $_POST['password'];
    $code = $_POST['code'];

    try
    {
        if ($check_code == null)
        {
            echo "<script>alert('驗證碼逾時，請重新輸入！'); header='cityLogin.php'</script>";
        }
        else
        {
            if ($check_code==$code)
            {
                login_process($account, $password);
            }
            else
            {
                echo "<script>alert('驗證碼輸入錯誤！'); header='cityLogin.php'</script>";
            }
        }
    }
    catch(Exception $ex)
    {
        echo "<script>alert('驗證碼逾時，請重新輸入！');reloadValidCode();</script>";
    }

    function login_process($account, $password)
    {
        $userCountryModel = new USER_COUNTRY;
        $conn = $userCountryModel->connect_db();
        $UserInfo = $userCountryModel->countryLogin($conn,$account,$password);

        if ($UserInfo == null)
        {
            echo "<script>alert('帳號或是密碼錯誤！'); location.href='cityLogin.php'</script>";
        }
        else
        {
            foreach ($UserInfo as $row) {
                $_SESSION["country_uid"] = $row["id"];
                $_SESSION["country_code"] = $row["account"];
                $_SESSION["country_name"] = $row["name"];
                $_SESSION["country_email"] = $row["email"];
                $_SESSION["country_user_name"] = $row["user_name"];
                $_SESSION["country_phone"] = $row["phone"];
                $_SESSION["Is_country"] = "True";
            }

            echo "<script>alert('登入成功！'); location.href='School_.php'</script>";
        }
    }

?>