<?php
    session_start();
    if ($_SESSION["sid"] == null)
    {
        echo "<script>alert('請先登入!')</script>";
        header("Location:SchoolLogin.php");
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
    <link rel="stylesheet" type="text/css" href="../assets/CSS/login_form.css">
    <link rel="stylesheet" type="text/css" href="../assets/CSS/rwd.css">
    <link rel="stylesheet" type="text/css" href="../assets/CSS/font-awesome.min.css">
    <!--引入自訂CSS-->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!--引入bootstrap 4 JS JQUERY-->
    <style>
    .campus-title{
        padding: 0px 60px;
    }
    </style>
</head>
<body>
        <!--頂部導覽列區塊開始-->
    <nav class="navbar navbar-dark navbar-expand-xs navbar-expand-md navbar-expand-lg">
        <div id="Topitem">
            <h1><a href="#">學校申請與管理</a></h1>
            <h2><a href="/">回首頁</a></h2>
            <div class="container">
            </div>
        </div>
        <button type="button" class="navbar-toggler navbar-toggler-right" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!--頂部LOGO結束-->
        <!--頂部導覽列開始-->
    <?php 
        include 'menu.php';
    ?>
    <!--頂部導覽列區塊結束-->
    <!--內文區塊開始-->
     <div class="wrapper-login">
            <div class="container">
                <div class="campus-wrap">
                <div class="campusbox">
                    <a href="logout.php">
                        <input type="submit" name="" value="登出" id="" class="btn campus-btn" />
                    </a>
                    <hr></hr>
                </div>
                <div class="container_form">
                    <div class="row">
                        <div class="col-md-3 i-box">
                            <i class="school"></i>
                            <p class="s">                                
                            <?php echo "<a href=\"ChangeUserInfo.php?sid=".$_SESSION['sid']."&uid=".$_SESSION['uid']."\">承辦人資料修改</a>";?>
                            </p>
                        </div>
                        <div class="col-md-5 offset-md-4 i-box">
                            <i class="school"></i>
                            <p class="s">
                                <?php
                                include_once 'EXPIRE.php';

                                $expire = new EXPIRE;
                                $data = $expire->getExpireByYear();
                                $start = $data[0]["start"];
                                $startYear = $start["Year"] - 1911;
                                $startMonth = $start["Month"] < 10 ? "0".$start["Month"] : $start["Month"];
                                $startDay = $start["Day"] < 10 ? "0".$start["Day"] : $start["Day"];
                                $end = $data[0]["end"];
                                $endYear = $end["Year"] - 1911;
                                $endMonth = $end["Month"] < 10 ? "0".$end["Month"] : $end["Month"];
                                $endDay = $end["Day"] < 10 ? "0".$end["Day"] : $end["Day"];                                
                                echo "<p><a href=\"application.php?action=0\" id=\"applicationExpire\">計畫申請".$startDay."/".$startMonth."/".$startYear."/".$endDay."/".$endMonth."/".$endYear."</a><span></span></p>";
                                ?>
                                </p>
                            </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 i-box">
                            <i class="school"></i>
                            <p class="s"><a href="Review.php">計畫審查結果</a></p>
                        </div>
                        <div class="col-md-5 offset-md-4 i-box">
                            <i class="school"></i>
                            <p class="s"><a href="Fchange.php">經費變更申請</a></p>
                            
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 i-box">
                            <i class="school"></i>
                            <p class="s"><a href="Flnquire.php">經費核撥狀況查詢</a></p>
                        </div>
                        <div class="col-md-5 offset-md-4 i-box">
                            <i class="school"></i>
                            <p class="s"><a href="campus_add.php">聘任防護員資料新增或修改</a></p>
                            
                        </div>
                    </div>
                </div>
                <div class="campus-title">
                    <header>
                        <h2>新增或更改聘任防護員資料</h2>
                    </header>
                </div>
                <section class="campus-content">
                    <div class="campus-boder">
                        <table class="campus-table">
                            <colgroup>
                                <col class="campustitleA01">
                                <col class="campustitleA02">
                               
                            </colgroup>
                        <tbody>
                        	<tr>                        
                                <td colspan="2"><h3>請輸入欲聘任之運動防護員或物理治療師證號</h3>
                                <input name="searchID" type="text" id="searchID" class="campus-inputA01"><input name="Change" type="button" value="查詢" id="searchBtn" class="btn btn-lg campus-btn" onclick="set_value_and_echo()"/>
                                <div class="float-right clearfix">
                                	<a href="campus_addGuardian.php"><input type="button" name="Change" value="新增防護員" class="btn btn-lg campus-btn"></a>
                                	
                                </div>
                                </td>
                            </tr>
                            <form method="POST" action="campus-add_.php">
                            <?php
                                //include_once 'campus_search.php';
                                include_once 'TRAINER_SALARY_REAL.php';
                                include_once 'TRAINER.php';

                                $trainerSalaryRealModel = new TRAINER_SALARY_REAL;

                                $conn = $trainerSalaryRealModel->connect_db();
                                
                                $trainerSalaryInfo = $trainerSalaryRealModel->getTrainerSalaryBySIDAndYear($conn, $_SESSION["sid"], $_SESSION["year"]);

                                $trainerYears = $trainerSalaryRealModel->getYearByTid($conn, $trainerSalaryInfo[0]["tid"]);                                

                                //Response.Redirect("campus_add_p.aspx", true);
                                $trainerModel = new TRAINER;
                                
                                $trainer = $trainerModel->getTrainerByTID($conn, $trainerSalaryInfo[0]["tid"]);
                                
                                set_value_and_echo($trainer,$trainerSalaryInfo,$trainerYears);
                                
                                function set_value_and_echo($trainer,$trainerSalaryInfo,$trainerYears){


                                    //session_start();

                                    if(!empty($_POST["searchID"])){
                                        search_id($_POST["searchID"]);
                                    }

                                    function search_id($searchID){
                                        if ($searchID=="")
                                        {
                                            echo "<script>alert('請輸入證號!');</script>";
                                            header("Location:campus_add.php");
                                        }

                                        $trainerModel = new TRAINER;
                                        $conn = $trainerModel->connect_db();
                                        $trainer = $trainerModel->getTrainerByCertificateNo($conn, $searchID);
                                        
                                        if($trainer)
                                        {
                                            $trainerSalaryRealModel_ = new TRAINER_SALARY_REAL;
                                            $trainerSalaryInfo = $trainerSalaryRealModel_->getTrainerSalaryBySIDAndYear($conn, $_SESSION["sid"], $_SESSION["year"]);
                                            $trainerYears = $trainerSalaryRealModel_->getYearByTid($conn, $trainerSalaryInfo[0]["tid"]);
                                            set_value_and_echo($trainer,$trainerSalaryInfo,$trainerYears);
                                        }
                                        else
                                        {
                                            echo "<script>if(confirm('此防護員不存在，是否新增防護員?')){location.href='campus_addGuardian.php'};</script>";
                                        }
                                    }
                                        foreach ($trainer as $row) {
                                            echo "<tr>";
                                            echo "<td>運動防護員證號</td>";
                                            echo "<td>";
                                            echo "<input name=\"ID\" type=\"text\" id=\"ID\" class=\"campus-input\" value=\"".$row["certificate_no"]."\" readonly>";
                                            echo "<input name=\"tid\" type=\"hidden\" id=\"tid\" class=\"campus-input\" value=\"".$row["tid"]."\">";
                                            echo "</td>";
                                            echo "</tr>";
                                            echo "<tr>";
                                            echo "<td>運動防護員姓名</td>";
                                            echo "<td><input name=\"name\" type=\"text\" id=\"name\" class=\"campus-input\" value=\"".$row["name"]."\"></td>";
                                            echo "</tr>";            
                                            echo "<tr>";
                                            echo "<td>運動防護員學歷</td>";
                                            echo "<td><select id=\"grade\" class=\"select01\" value=\"".$row["grade"]."\">";
                                            echo "<option value=\"學士\">學士</option>";
                                            echo "<option value=\"碩士\">碩士</option>";
                                            echo "</select></td>";
                                            echo "</tr>"; 
                                            echo "<tr>";
                                            echo "<td>運動防護員年資</td>";
                                            echo "<td>";
                                            echo "<input name=\"years\" type=\"text\" id=\"years\" class=\"campus-input\" value=\"".$trainerYears."\" readonly>";
                                            echo "</td>";
                                            echo "</tr>";
                                            echo "<tr>";
                                            echo "<td colspan=\"2\">";
                                            echo "<div class=\"campus-selectcon\">";
                                            echo "<div class=\"campus-selectbox\">";
                                            echo "<h3>起聘月份</h3>";
                                            echo "<select id=\"startMonth\" class=\"select01\" value=\"".(string)(12 - (int)$trainerSalaryInfo[0]["month"]+1)."\">";
                                            echo "<option value=\"8\">8</option>";
                                            echo "<option value=\"9\">9</option>";
                                            echo "<option value=\"10\">10</option>";
                                            echo "<option value=\"11\">11</option>";
                                            echo "<option value=\"12\">12</option>";
                                            echo "</select>";
                                            echo "</div>";
                                            echo "<div class=\"campus-selectbox\">";
                                            echo "<h3>今年前半年工作月數</h3>";
                                            echo "<select id=\"earlyMonthTotal\" class=\"select01\" value=\"".($trainerSalaryInfo[0]["bonus_month"] - $trainerSalaryInfo[0]["month"])."\">";
                                            echo "<option value=\"0\">0</option>";
                                            echo "<option value=\"1\">1</option>";
                                            echo "<option value=\"2\">2</option>";
                                            echo "<option value=\"3\">3</option>";
                                            echo "<option value=\"4\">4</option>";
                                            echo "<option value=\"5\">5</option>";
                                            echo "<option value=\"6\">6</option>";
                                            echo "<option value=\"7\">7</option>";
                                            echo "<option value=\"8\">8</option>";
                                            echo "<option value=\"9\">9</option>";
                                            echo "<option value=\"10\">10</option>";
                                            echo "<option value=\"11\">11</option>";
                                            echo "</select>";
                                            echo "</div>";
                                            echo "</div>";
                                            echo "</td>";
                                            echo "</tr>";                                    
                                        
                                        echo "</tbody>";
                                        echo "</table>";
                                        echo "</div>";
                                        echo "<div class=\"offset-form\">";
                                        echo "<ul>";
                                        echo "<li><input type=\"submit\" name=\"Change\" Text=\"確認\" id=\"save\" class=\"btn btn-lg campus-btn\"/> </li>";
                                        echo "<li>";
                                        echo "</li>";
                                        echo "</ul>";
                                        echo "<div class=\"float-left form-inblock\">";
                                        echo "</div>";
                                        echo "</div>";
                                        echo "</form>";        
                                    }
                                }
                            ?>
                </section> 