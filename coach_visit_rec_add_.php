<?php
    include_once 'VISIT.php';
    include_once 'Utils.php';

    session_start();
    if ($_SESSION["Is_regional"] != true)
    {
        echo "<script>alert('請先登入!')</script>";
        header("Location:RegionalLogin.php");
    }

    try
    {
        $selRegistBoxYearPage = $_POST['selRegistBoxYearPage']; 
        $selRegistBoxMonthPage = $_POST['selRegistBoxMonthPage'];
        $selRegistBoxDayPage = $_POST['selRegistBoxDayPage'];
        $memberType = $_POST['memberType'];
        $purpose = $_POST['purpose'];
        $mem_num = $_POST['mem_num'];
        $school = $_POST['school'];
        $memberType = $_POST['memberType'];
        $purpose = $_POST['purpose'];
        $sign = false;


        $visit = new VISIT;
        $conn = $visit->connect_db();

        $date_ = $selRegistBoxYearPage."-".$selRegistBoxMonthPage."-".$selRegistBoxDayPage;

        $Util = new Utils;

        $memberType_ = "";
        $purpose_ = "";

        foreach($memberType as $row)
        {
            $memberType_ .= $row.",";
        }
        $memberType_ = substr($memberType_,0,-1);

        foreach ($purpose as $row) 
        {
            $purpose_ .= $row.",";
        }
        $purpose_ = substr($purpose_,0,-1);

        //System.Diagnostics.Debug.WriteLine(Request.Form["purpose"]);
        $sign = $visit->create($conn,$_SESSION["regional_id"], $Util->currentSchoolYear(), $date_, $memberType_, $school, $purpose_, $mem_num);
        if($sign)
        {
            echo "<script>alert('新增成功!');</script>";
            header("Location:coach_visit_reclist.php");                 
        }
    }
    catch (PDOException $e)
    {
        echo "<script>alert('新增失敗!'); </script>";
    }
?>