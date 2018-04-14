<?php
	include 'VISIT.php';
    session_start();

	$regional_id = $_SESSION["regional_id"];
    $Is_regional = $_SESSION["Is_regional"];
    $visit_ID = $_POST['visitID'];
    $schoolName = $_POST['school'];
    $purpose = $_POST['purpose'];
    $memberType = $_POST['memberType'];
    $year = $_POST['selRegistBoxYearPage'];
    $month = $_POST['selRegistBoxMonthPage'];
    $day = $_POST['selRegistBoxDayPage'];
    $num = $_POST['mem_num'];
    $sign = false;

    $a = new VISIT;
    $conn = $a->connect_db();
    $data = $a->getByID($conn,$visit_ID);

    if($data[0]['uaccid'] != $regional_id)
    {
    	echo "<script>alert('無權限變更此筆資料')</script>";
        header("Location:coach_visit_rec_revise.php");
    }

    $date = "";
    $date .= $year."-".$month."-".$day;

    $purpose_ = "";
    $memberType_ = "";

    foreach ($purpose as $row) {
        $purpose_ .= $row.",";
    }

    foreach ($memberType as $row) {
        $memberType_ .= $row.",";
    }

    $sign = $a->updateByID($conn,$visit_ID, $schoolName, $purpose_, $memberType_, $date, $num);
    if($sign)
    {
    	echo "<script>console.log('Succeess')</script>";
        header('Location:coach_visit_reclist.php');
    }
    else
    {
    	echo "<script>console.log('Failed')</script>";
        header('Location:coach_visit_reclist.php');
    }
    //這行是回傳到開發人員工具裡的Console
    //context.Response.Write(JsonConvert.SerializeObject(new SuccessResponse(), Formatting.Indented));

?>