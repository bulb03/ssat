<?php
    session_start();
    if ($_SESSION["Is_regional"] != true)
    {
        echo "<script>alert('請先登入!');</script>";
        header("Location:RegionalLogin.php");
    }
?>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!--響應式-->
    <title>體育署防護員申請表單系統</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!--引入bootstrap 4CSS-->
    <link rel="stylesheet" type="text/css" href="../assets/CSS/ssats.css">
    <link rel="stylesheet" type="text/css" href="../assets/CSS/ssats_form.css">
    <link rel="stylesheet" type="text/css" href="../assets/CSS/font-awesome.min.css">
    <!--引入自訂CSS-->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!--引入bootstrap 4 JS JQUERY-->
</head>

<body>
    <!--頂部導覽列區塊開始-->
    <!--頂部LOGO開始-->
    <nav class="navbar navbar-dark navbar-expand-xs navbar-expand-md navbar-expand-lg">
        <div id="Topitem">
            <h1><a href="#">區域輔導中心系統</a></h1>
            <h2><a href="/">回首頁</a></h2>
            <div class="container">
            </div>
        </div>
        <button type="button" class="navbar-toggler navbar-toggler-right" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!--頂部LOGO結束-->
        <!--頂部導覽列開始-->
        <div class="collapse navbar-collapse flex-row-reverse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle nav-text" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">關於本計畫</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="計畫依據.html">計畫依據</a>
                        <a class="dropdown-item" href="計畫緣起.html">計畫緣起</a>
                        <a class="dropdown-item" href="計畫目標.html">計畫目標</a>
                        <a class="dropdown-item" href="執行策略與工作重點.html">執行策略與工作重點</a>
                        <a class="dropdown-item" href="預期效益.html">預期效益</a>
                        <a class="dropdown-item" href="執行現況.html">執行現況</a>
                    </div>
                </li>
                <li class="nav-item nav-link">
                    <a href="" class="nav-text">最新消息</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle nav-text" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">計畫申請與管理</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle nav-text" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">運動防護紀錄系統</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="運動防護員帳號啟動.html">運動防護員帳號啟動</a>
                        <a class="dropdown-item" href="運動防護紀錄系統.html">運動防護紀錄系統</a>
                    </div>
                </li>
                <li class="nav-item nav-link">
                    <a href="" class="nav-text">資源分享</a>
                </li>
            </ul>
        </div>
        <!--頂部導覽列結束-->
    </nav>
    <!--頂部導覽列區塊結束-->
    <!--內文區塊開始-->
    <div class="wrapper-login">
        <div class="container">
            <div class="regionbox">
                <div class="coachlivebox">
                    <a href="logout.php">
                        <input type="submit" name="" value="登出" id="" class="btn region-btn" />
                    </a>
                    <hr></hr>
                </div>
                <div class="container_form">
                    <div class="row">
                        <div class="col-auto mr-auto i-box">
                            <i class="i-settings"></i>
                            <p><a href="coach_meetinglist.php">會議召開</a></p>
                        </div>
                        <div class="col-auto i-box">
                            <i class="i-settings"></i>
                            <p><a href="coach_edulecturelist.php">教育講座辦理</a></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-auto mr-auto i-box">
                            <i class="i-settings"></i>
                            <p><a href="coach_visit_reclist.php">訪視指導紀錄</a></p>
                        </div>
                        <div class="col-auto i-box">
                            <i class="i-settings"></i>
                            <p><a href="coach_schlist.php">輔導學校資料</a></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-auto mr-auto i-box">
                            <i class="i-settings"></i>
                            <p><a href="news_coach.php">最新消息發布</a></p>
                        </div>
                        <div class="col-auto i-box">
                            <i class="i-settings"></i>
                            <p><a href="coach_basicdata.php">基本資料修改</a></p>
                        </div>
                    </div>
                    <div style="margin-top: 5%" class="row">
                        <header>
                            <h2>會議召開清單</h2>
                        </header>
                        <table class="region-table">
                            <colgroup>
                                <col class="meeting01">
                                <col class="meeting02">
                                <col class="meeting03">
                                <col class="meeting04">
                                <col class="meeting05">
                            </colgroup>
                            <thead>
                                <tr>
                                    <th class="newstitle01">會議名稱</th>
                                    <th>會議日期</th>
                                    <th>會議類型</th>
                                    <th>會議地點</th>
                                    <th>會議參與人數</th>
                                </tr>
                            </thead>
                            <tbody id="meetings">
	                        <?php
	                            include_once 'CONFERENCE.php';
	                            include_once 'Utils.php';

	                            $conferenceModel = new CONFERENCE;
	                            $Util = new Utils;

	                            $conn = $conferenceModel->connect_db();
	                            $meeting = $conferenceModel->listByUACCIDAndYear($conn,$_SESSION["regional_id"], $Util->currentSchoolYear());                      
                                $timestamp = strtotime($meeting[0]["date"]);
                                $date_ = date("Y/m/d",$timestamp);
                                echo "<tr>";
                                echo "<td><a href=\"coach_meeting_revise.php?meetingID=".$meeting[0]["id"]."\"> ".$meeting[0]["name"]." </a></td>";
                                echo "<td> ".$date_." </td> ";
                                echo "<td> ".$meeting[0]["type"]." </td> ";
                                echo "<td> ".$meeting[0]["location"]." </td> ";
                                echo "<td><a href = \"javascript:;\" > ".$meeting[0]["num"]." </a></td> ";
                                echo "</tr>";                             
	                        ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <header>
                            <h2>教育講座清單</h2>
                        </header>
                        <table class="region-table">
                            <colgroup>
                                <col class="newstitleC01">
                                <col class="newstitleC02">
                                <col class="newstitleC03">
                                <col class="newstitleC04">
                            </colgroup>
                            <thead>
                                <tr>
                                    <th class="newstitle01">主題</th>
                                    <th>日期</th>
                                    <th>地點</th>
                                    <th>參與講座人數</th>
                                </tr>
                            </thead>
                            <tbody id="lectures">
                            <?php
                                include_once 'EDUCATIONAL_LECTURE.php';
                                include_once 'Utils.php';

                                $edulectureModel = new EDUCATIONAL_LECTURE;

                                $conn = $edulectureModel->connect_db();
                                $lecture_ = $edulectureModel->listByUACCIDAndYear($conn,$_SESSION["regional_id"], $Util->currentSchoolYear());
                                foreach ($lecture_ as $row)
                                {                                
                                    $timestamp = strtotime($row["date"]);
                                    $date_ = date("Y/m/d",$timestamp);
                                    echo "<tr>";
                                    echo "<td><a href =\"coach_edulecture_revise.php?edulectureID=".$row["id"]."\"> ".$row["topic"]." </a></td>";
                                    echo "<td> ".$date_." </td>";
                                    echo "<td> ".$row["location"]." </td>";
                                    echo "<td><a href = \"javascript:;\" > ".$row["num"]." </a></td>";
                                    echo "</tr>";
                                }
                            ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <header>
                            <h2>訪視指導清單</h2>
                        </header>
                        <table class="region-table">
                            <colgroup>
                                <col class="newstitleC01">
                                <col class="newstitleC02">
                                <col class="newstitleC03">
                                <col class="newstitleC04">
                            </colgroup>
                            <thead>
                                <tr>
                                    <th class="td-center">學校名稱</th>
                                    <th>日期</th>
                                    <th>訪視目的</th>
                                    <th>訪視人員</th>
                                </tr>
                            </thead>
                            <tbody id="visits">
	                        <?php
	                            include_once 'VISIT.php';
	                            include_once 'Utils.php';

	                            $visitModel = new VISIT;
	                            $Util = new Utils;

	                            $conn = $visitModel->connect_db();
	                            $visit = $visitModel->listByUACCIDAndYear($conn,$_SESSION["regional_id"], $Util->currentSchoolYear());
	                            foreach ($visit as $row)
	                            {
	                                $timestamp = strtotime($row["date"]);
	                                $date_ = date("Y/m/d",$timestamp);

	                                echo "<tr>";
	                                echo "<td class=\"td-center\"><a href = \"./record/coach_visit_rec_revise.php?visitID=".$row["id"]."\" > ".$row["schoolName"]." </a></td>";
	                                echo "<td> ".$date_." </td>";
	                                echo "<td> ".$row["purpose"]." </td>";
	                                echo "<td><a href=\"javascript:;\">".$row["num"]."</a></td>";
	                                echo "</tr>";
	                            }
	                        ?> 
                            </tbody>
                        </table>
                    </div>
                </div>
</body>

</html>