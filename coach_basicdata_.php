<?php
	include 'USER_AREA_COUNSELING_CENTER.php';
	include 'USER_AREA_COUNSELING_CENTER_MEMBER.php';


	$name = $_POST['name'];
	$account = $_POST['account'];
	$pi_id = $_POST['pi_id'];
    $pi_name = $_POST['pi_name'];
	$pi_tel = $_POST['pi_tel'];
	$pi_phone = $_POST['pi_phone'];
	$pi_email = $_POST['pi_email'];
	$coPi1_id = $_POST['coPi1_id'];
	$coPi1_name = $_POST['coPi1_name'];
	$coPi1_tel = $_POST['coPi1_tel'];
	$coPi1_phone = $_POST['coPi1_phone'];
	$coPi1_email = $_POST['coPi1_email'];
	$coPi2_id = $_POST['coPi2_id'];
	$coPi2_name = $_POST['coPi2_name'];
	$coPi2_tel = $_POST['coPi2_tel'];
	$coPi2_phone = $_POST['coPi2_phone'];
	$coPi2_email = $_POST['coPi2_email'];
	$coPi3_id = $_POST['coPi3_id'];
	$coPi3_name = $_POST['coPi3_name'];
	$coPi3_tel = $_POST['coPi3_tel'];
	$coPi3_phone = $_POST['coPi3_phone'];
	$coPi3_email = $_POST['coPi3_email'];
	$assistant1_id = $_POST['assistant1_id'];
	$assistant1_name = $_POST['assistant1_name'];
	$assistant1_tel = $_POST['assistant1_tel'];
	$assistant1_phone = $_POST['assistant1_phone'];
	$assistant1_email = $_POST['assistant1_email'];
	$assistant2_id = $_POST['assistant2_id'];
	$assistant2_name = $_POST['assistant2_name'];
	$assistant2_tel = $_POST['assistant2_tel'];
	$assistant2_phone = $_POST['assistant2_phone'];
	$assistant2_email = $_POST['assistant2_email'];

    $uaccModel = new USER_AREA_COUNSELING_CENTER;

    $conn = $uaccModel->connect_db();

    if (!empty($_POST['password']))
    {
        $password = $_POST['password'];
        $uaccModel->changePassword($conn,$_SESSION["regional_id"],$password);
    }

    $uaccmModel = new USER_AREA_COUNSELING_CENTER_MEMBER;

    $conn = $uaccModel->connect_db();
        
    $fields = ["name", "tel", "phone", "email"];
    try
    {
        if ($pi_id=="")
        {
            $uaccmModel->create($conn,$pi_name, $pi_tel, $pi_phone, $pi_email, "計畫主持人", $_SESSION["regional_id"]);
        }
        else
        {
            $uaccmModel->updateByID($conn, $pi_id, $fields, $pi_name, $pi_tel, $pi_phone, $pi_email);
        }

        if ($coPi1_id=="")
        {
           $uaccmModel->create($conn, $coPi1_name, $coPi1_tel, $coPi1_phone, $coPi1_email, "協同主持人1", $_SESSION["regional_id"]);
        }
        else
        {
            $uaccmModel->updateByID($conn, $coPi1_id, $fields, $coPi1_name, $coPi1_tel, $coPi1_phone, $coPi1_email);
        }

        if ($coPi2_id=="")
        {
            $uaccmModel->create($conn, $coPi2_name, $coPi2_tel, $coPi2_phone, $coPi2_email, "協同主持人2", $_SESSION["regional_id"]);
        }
        else
        {
            $uaccmModel->updateByID($conn, $coPi2_id, $fields, $coPi2_name, $coPi2_tel, $coPi2_phone, $coPi2_email);
        }

        if ($coPi3_id=="")
        {
            $uaccmModel->create($conn, $coPi3_name, $coPi3_tel, $coPi3_phone, $coPi3_email, "協同主持人3", $_SESSION["regional_id"]);
        }
        else
        {
            $uaccmModel->updateByID($conn, $coPi3_id, $fields, $coPi3_name, $coPi3_tel, $coPi3_phone, $coPi3_email);
        }

        if ($assistant1_id=="")
        {
            $uaccmModel->create($conn, $assistant1_name, $assistant1_tel, $assistant1_phone, $assistant1_email, "專任助理1",$_SESSION["regional_id"]);
        }
        else
        {
            $uaccmModel->updateByID($conn,$assistant1_id, $fields, $assistant1_name, $assistant1_tel, $assistant1_phone, $assistant1_email);
        }

        if ($assistant2_id=="")
        {
            $uaccmModel->create($conn, $assistant2_name, $assistant2_tel, $assistant2_phone, $assistant2_email, "專任助理2",$_SESSION["regional_id"]);
        }
        else
        {
            $uaccmModel->updateByID($conn,$assistant2_id, $fields, $assistant2_name, $assistant2_tel, $assistant2_phone, $assistant2_email);
        }
        echo "<script>alert('更新成功!'); location.href='coach_service.php'</script>";
    }
    catch(PDOException $e)
    {
        echo "<script>alert('更新失敗!'); location.href='coach_basicdata.php'</script>";
    }
?>