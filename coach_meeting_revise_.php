<?php
    include_once 'CONFERENCE.php';

    $meeting = new CONFERENCE;
    
    $id = $_POST['meetingID'];
    $mem_type = $_POST['type'];
    $year = $_POST['selRegistBoxYearPage'];
    $month = $_POST['selRegistBoxMonthPage'];
    $day = $_POST['selRegistBoxDayPage'];
    $location = $_POST['location'];
    $mem_num = $_POST['mem_num'];


    try
    {
        $time_ = $year."-".$month."-".$day;

        $conn = $meeting->connect_db();
        $result = $meeting->updateByID($conn,$id,$mem_type,$time_,$location,$mem_num);

        if(!$result)
        {
            echo "<script>alert('更新失敗'); </script>";
            header("Location:coach_meeting_revise.php");
        }
        else
        {
            echo "<script>alert('更新成功!');</script>";
            header("Location:coach_meetinglist.php");
        }
    }
    catch(PDOException $e)
    {
        echo "<script>alert('更新失敗'); </script>";
        header("Location:coach_meeting_revise.php");
    }
?>