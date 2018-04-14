<?php
    include_once 'VISIT.php';

    $visit = new VISIT;

    $id = $_GET['visitID'];

    try
    {
        $conn = $visit->connect_db();
        $result = $visit->deleteByID($conn,$id);

        if(!$result)
        {
            echo "<script>alert('刪除失敗'); </script>";
            header("Location:coach_visit_reclist.php");
        }
        else
        {
            echo "<script>alert('刪除成功!');</script>";
            header("Location:coach_visit_reclist.php");
        }
    }
    catch(PDOException $e)
    {
        echo "<script>alert('刪除失敗'); </script>";
        header("Location:coach_visit_reclist.php");
    }
?>