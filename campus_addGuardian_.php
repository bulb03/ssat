<?php
    include 'TRAINER.php';
    include 'TRAINER_SALARY_REAL.php';

    $certificate_no = $_POST['certificate_no'];
    $grade = $_POST['grade'];
    $name = $_POST['name'];
    $year = $_POST['years'];

    $trainerModel = new TRAINER;
    $conn = $trainerModel->connect_db();
    $trainer = $trainerModel->getTrainerByCertificateNo($conn, $certificate_no);

    if(!$trainer)
    {
        try
        {
            $tid = $trainerModel->create($conn, $certificate_no, $name, $grade);
            $trainerSalaryRealModel = new TRAINER_SALARY_REAL;
            for($i = 0; $i < $year; $i++)
            {
                $trainerSalaryRealModel->create($conn, $_SESSION["sid"],$tid,$_SESSION["year"]-($i+1),$grade,0,0,0,0,0,0,0,0,12,12);
                echo "<script>alert('新增成功!') location.href='campus_add.php'</script>";        
            }
        }
        catch (Exception $e){
            echo "<script>alert('新增失敗!'); location.href='campus_add.php'</script>";
        }

    }
    else
    {
        echo "<script>alert('此防護員已存在，請直接新增聘用資料!');</script>";
        header("Location:campus_add.php");
    }
?>