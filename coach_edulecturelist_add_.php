<?php
include 'EDUCATIONAL_LECTURE.php';
include 'Utils.php';

try
{
    $selRegistBoxYearPage = $_POST['selRegistBoxYearPage'];
    $selRegistBoxMonthPage = $_POST['selRegistBoxMonthPage'];
    $selRegistBoxDayPage = $_POST['selRegistBoxDayPage'];
    $uaccid = $_POST['uaccid'];
    $type_ = $_POST['type'];
    $topic = $_POST['topic'];
    $name = $_POST['name'];
    $location = $_POST['location'];
    $mem_num = $_POST['mem_num'];

    $lecture = new EDUCATIONAL_LECTURE;
    $Util = new Utils;

    $conn = $lecture->connect_db();

    $date = $selRegistBoxYearPage.$selRegistBoxMonthPage.$selRegistBoxDayPage;

    $ty = "";

    foreach ($type_ as $row) {
        $ty += $row.",";
    }

    $ty = substr($ty, 0,-1);

    $lecture->create($conn,$uaccid, $Util->currentSchoolYear(), $topic, $name, $date, $ty, $location, $mem_num, 0);

    echo "<script>alert('新增成功!'); location.href='coach_edulecturelist.php'</script>";
}
catch (Exception $e)
{
    echo "<script>alert('新增失敗!'); location.href='coach_edulecturelist_add.php'</script>";
}
?>