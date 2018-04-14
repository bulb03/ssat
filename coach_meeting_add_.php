<?php
include 'CONFERENCE.php';
include 'Utils.php';
session_start();
try
{
    $sign = false;
    $selRegistBoxYearPage = $_POST['selRegistBoxYearPage'];
    $selRegistBoxMonthPage = $_POST['selRegistBoxMonthPage'];
    $selRegistBoxDayPage = $_POST['selRegistBoxDayPage'];
    $mem_name = $_POST['mem_name'];
    $mem_type = $_POST['type'];
    $location = $_POST['location'];
    $mem_num = $_POST['mem_num'];

    $meeting = new CONFERENCE;
    $Util = new Utils;

    $conn = $meeting->connect_db();
    $date = $selRegistBoxYearPage."-".$selRegistBoxMonthPage."-".$selRegistBoxDayPage;

    $conn = $meeting->connect_db();
    $sign = $meeting->create($conn,$_SESSION["regional_id"], $Util->currentSchoolYear(), $mem_name, $mem_type, $date, $location, $mem_num, 0);
    if($sign)
    {
        echo "<script>console.log('新增成功!')</script>";
        header("Location:coach_meetinglist.php");
    }
}
catch(PDOException $e)
{
    echo "<script>console.log('新增失敗!'); </script>";
    header("Location:coach_meetinglist.php");
}
?>