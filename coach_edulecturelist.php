<?php
    session_start();
    if ($_SESSION["Is_regional"] != true)
    {
        echo "<script>alert('請先登入!')</script>";
        header("Location:RegionalLogin.php");
    }
?>

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
<div class="reg-wrap">
                <header>
                    <h2>教育講座辦理清單</h2>
                    <i class="warning">學年度：107</i>
                </header>
            
                <table class="region-table">
                    <colgroup>
                        <col class="titleD01">
                        <col class="titleD02">
                        <col class="titleD03">
                        <col class="titleD04">
                        <col class="titleD05">
                        <col class="titleD06">
                        <col class="titleD07">
                        <col class="titleD08">
                    </colgroup>
                    <thead>
                        <tr>
                            <th class="newstitle01">主題</th>
                            <th>主講人</th>
                            <th>主題類別</th>
                            <th>日期</th>
                            <th>地點</th>
                            <th>參與講座人數</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody id="lectures">
                    <?php
                        include 'EDUCATIONAL_LECTURE.php';
                        include 'Utils.php';

                        $edulectureModel = new EDUCATIONAL_LECTURE;
                        $Util = new Utils;

                        $conn = $edulectureModel->connect_db();
                        $lecture_ = $edulectureModel->listByUACCIDAndYear($conn,$_SESSION["regional_id"], $Util->currentSchoolYear());
                        foreach ($lecture_ as $row)
                        {
                            $timestamp = strtotime($row["date"]);
                            $new_date = date("Y/m/d",$timestamp);
                            echo "<tr>";
                            echo "<td><a href =\"coach_edulecture_revise.php?edulectureID=".$row["id"]."\"> ".$row["topic"]." </a></td>";
                            echo "<td> ".$row["name"]." </td>";
                            echo "<td> ".$row["type"]." </td>";
                            echo "<td> ".$new_date." </td>";
                            echo "<td> ".$row["location"]." </td>";
                            echo "<td><a href = \"javascript:;\" > ".$row["num"]." </a></td>";
                            echo "<td><a href = \"coach_edulecture_revise.php?edulectureID=".$row["id"]."\">";
                            echo "<input type=\"button\" name=\"updateBtn\" value=\"修改\" class=\"btn btn-lg region-btn\"/></a></td>";
                            echo "<td><a href = \"coach_edulecturelist_delete_.php?edulectureID=".$row["id"]."\" ><input type=\"button\" name=\"deleteBtn\" value=\"刪除\" class=\"btn btn-lg region-btn\"/></a>";
                            echo "</td>";
                            echo "</tr>";
                        }
                    ?>   
                    </tbody>
                </table>
            </div>
        <div class="coach-inblock">
            <form method="Get" action="coach_edulecturelist_add.php">
                <input type="submit" name="login" value="新增" id="login" class="btn btn-lg region-btn"/>
            </form>
        </div>