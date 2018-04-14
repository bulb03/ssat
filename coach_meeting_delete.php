<?php
    include_once 'CONFERENCE.php';

    $meeting = new CONFERENCE;

    $id = $_GET['meetingID'];

    try
    {
        $conn = $meeting->connect_db();
        $result = $meeting->deleteByID($conn,$id);

        if(!$result)
        {
            echo "<script>alert('刪除失敗'); </script>";
            header("Location:coach_meetinglist.php");
        }
        else
        {
            echo "<script>alert('刪除成功!');</script>";
            header("Location:coach_meetinglist.php");
        }
    }
    catch(PDOException $e)
    {
        echo "<script>alert('刪除失敗'); </script>";
        header("Location:coach_meetinglist.php");
    }
?>