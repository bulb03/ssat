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
                        <h2>訪視指導清單</h2>
                    </header>
                </div>
                <section class="coach-wrap">
                	<div class="reg-wrap">
                        
                        <table class="region-table">
                        <colgroup>
                            <col class="newstitle01">
                            <col class="newstitle02">
                            <col class="newstitle03">
                            <col class="newstitle04">
                            <col class="newstitle05">
                            <col class="newstitle06">
                        </colgroup>
                        <thead>
                            <tr>
                                <th class="td-center">學校名稱</th>
                                <th>日期</th>
                                <th>訪視目的</th>
                                <th>訪視人員</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody id="visits" runat="server">
                        <?php
                            include_once 'VISIT.php';
                            include_once 'Utils.php';

                            $visitModel = new VISIT;                            
                            $Util = new Utils;
                            $conn = $visitModel->connect_db();
                            $visit=$visitModel->listByUACCIDAndYear($conn, $_SESSION["regional_id"], $Util->currentSchoolYear());
                            foreach ($visit as $row)
                            {
                                $timestamp = strtotime($row['date']);
                                $new_date = date("Y/m/d",$timestamp);
                                echo "<tr>";
                                echo "<td class=\"td-center\"><a href =\"coach_visit_rec_revise.php?visitID=".$row['id']."\">".$row['schoolName']."</a></td>";
                                echo "<td>".$new_date."</td>";
                                echo "<td>".$row['purpose']."</td>";
                                echo "<td><a href=\"javascript:;\"'>".$row['num']."</a></td>";
                                echo "<td><a href = \"coach_visit_rec_revise.php?visitID=".$row['id']."\"><input type=\"submit\" name=\"updateBtn\" value=\"修改\" id=\"updateBtn\" class=\"btn btn-lg region-btn\"/></a></td>";
                                echo "<td><a href = \"coach_visit_delete.php?visitID=".$row['id']."\" ><input type=\"button\" name=\"deleteBtn\" value=\"刪除\" id=\"deleteBtn\" class=\"btn btn-lg region-btn\" /></a></td>";
                                echo "</tr>";
                                //deleteVisit找不到
                            }
                        ?>
                        </tbody>
                    </table>
                    </div>
                    
                    
                    	<div class="coach-inblock">
                            <form method="POST" action="coach_visit_rec_add.php">
                                <input type="submit" name="login" value="新增" id="login" class="btn btn-lg region-btn"/>
                      
                            </form> 
                        </div>                  
                    
                </section>