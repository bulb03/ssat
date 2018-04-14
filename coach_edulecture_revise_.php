<?php
    include_once 'EDUCATIONAL_LECTURE.php';
    session_start();
    try
    {
        $lectureModel = new EDUCATIONAL_LECTURE;
        $edulectureID = $_POST["edulectureID"];
        $uaccid = $_SESSION["regional_id"];
        $conn = $lectureModel->connect_db();
        $lectureInfo = $lectureModel->getByID($conn,$edulectureID);

        if ($lectureInfo[0]["uaccid"] != $uaccid)
        {
            echo "<script>console.log('".$lectureInfo[0]["uaccid"]."');</script>";
            echo "<script>console.log('".$uaccid."');</script>";
            //echo "<script>alert('無權限變更此筆資料'); location.href='coach_edulecturelist.php'</script>"; 
        }

        $topic = $_POST["topic"];
        $name = $_POST["name"];
        $year = $_POST["selRegistBoxYearPage"];
        $month = $_POST["selRegistBoxMonthPage"];
        $day = $_POST["selRegistBoxDayPage"];
        $location = $_POST["location"];
        $num = $_POST["mem_num"];
        $type = $_POST["type"];
 
        $date_ = $year."-".$month."-".$day; 

        if($lectureModel->updateByID($conn,$edulectureID,$topic,$name,$date_,$location,$num,$type))
        {
            echo "<script>alert('更新成功'); location.href='coach_edulecturelist.php'</script>";
        }
    }
    catch (PDOException $e)
    {
        echo "<script>alert('更新失敗'); location.href='coach_edulecturelist.php'</script>";        
    }
?>