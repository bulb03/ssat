<?php 
    include 'TRAINER.php';
    include 'TRAINER_SALARY_REAL.php';
    include 'SALARY_STANDARDS.php';

    $tid = $_POST['tid'];
    $ID = $_POST['ID'];
    $name = $_POST['name'];
    $grade = $_POST['grade'];
    $years = $_POST['years'];
    $startMonth = $_POST['startMonth'];
    $earlyMonthTotal = $_POST['earlyMonthTotal'];
    $sign = true;

    if ($tid=="" || $ID=="" || $name=="" || $grade=="" || $years=="")
    {
        echo "<script>alert('請輸入證號，並查詢防護員資料!');</script>";
        header("Location:campus_add.php");
    }

    try
    {
        $trainerModel = new TRAINER;
        $conn = $trainerModel->connect_db();
        //System.Diagnostics.Debug.WriteLine(Convert.ToInt32(tid.Value));
        $trainer = $trainerModel->getTrainerByTID($conn, $tid);
        if($trainer[0]["name"]==$name || $trainer[0]["name"]==$grade)
        {
            $fields = ["name", "grade"];
            $trainerModel->updateByTID($conn, $tid, $fields, $name, $grade);
        }

        $trainerSalaryRealModel = new TRAINER_SALARY_REAL;
        $salaryStandardsModel = new SALARY_STANDARDS;
        $month = (12 - $startMonth + 1);
        $bonusMonth = $month + $earlyMonthTotal;
        if($bonusMonth > 12)
        {
            echo "<script>alert('工作月數總和不可大於十二個月');</script>";
            header("Location:campus_add.php");
        }
        $salaryInfo = $salaryStandardsModel->getByYearAndGrade($conn, $years+1, $grade);
        $trainerSalaryInfo = $trainerSalaryRealModel->getTrainerSalaryBySIDAndYear($conn, $_SESSION["sid"], $_SESSION["year"]);
        if ($trainerSalaryInfo && $sign)
        {
            $fields = { "tid", "grade", "salary", "labor", "injury", "employment_insurance", "NHI", "retirement", "bonus", "insurance", "month", "bonus_month" };

            $values = [$tid,$grade,$salaryInfo[0]["salary"],$salaryInfo[0]["labor"],$salaryInfo[0]["injury"],$salaryInfo[0]["employment_insurance"],$salaryInfo[0]["NHI"],$salaryInfo[0]["retirement"],$salaryInfo[0]["nominator_bonus"],$salaryInfo[0]["nominator_insurance"],$month,$bonusMonth];

            $trainerSalaryRealModel->updateByID($conn, $trainerSalaryInfo[0]["id"], $fields, $values);
        }
        else
        {
            $trainerSalaryRealModel->create($conn, $_SESSION["sid"],$tid,$_SESSION["year"],$grade,$salaryInfo[0]["salary"],$salaryInfo[0]["labor"],$salaryInfo[0]["injury"],$salaryInfo[0]["employment_insurance"],$salaryInfo[0]["NHI"],$salaryInfo[0]["retirement"],$salaryInfo[0]["nominator_bonus"],$salaryInfo[0]["nominator_insurance"],$month,$bonusMonth);
        }

        echo "<script>alert('設定成功!')</script>";
        header("Location:campus_add.php");
    }
    catch(Exception $e)
    {
        echo "<script>alert('設定失敗!')</script>";
        header("Location:campus_add.php");
    }
?>