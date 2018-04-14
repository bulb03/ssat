<?php
    session_start();
    if ($_SESSION["Is_regional"] != true)
    {
        echo "<script>alert('請先登入!')</script>";
        header("Location:RegionalLogin.php");
    }

    if ($_GET["edulectureID"] == null)
    {
        header("Location:coach_edulecturelist.php", true);
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
                        <h2>教育講座</h2>
                        <!--<i class="warning">學年度：107</i>-->
                    </header>
                </div>
                <section class="coach-wrap">
                    <form id="form1" method="POST" action="coach_edulecture_revise_.php">
                    <?php
                        include 'EDUCATIONAL_LECTURE.php';

                        $lecture = new EDUCATIONAL_LECTURE;
                        $conn = $lecture->connect_db();
                        $lectureInfo = $lecture->getByID($conn,$_GET["edulectureID"]);
                        foreach ($lectureInfo as $row) 
                        {
                            echo "<input type=\"hidden\" id=\"edulectureID\" name=\"edulectureID\" Value=\"".$row["id"]."\">";
                            echo "<p>";
                            echo "<label class=\"label\">講題</label>";
                            echo "<input class=\"membtn-control btnTxt\" type=\"text\" name=\"topic\" id=\"topic\" value=\"".$row["topic"]."\">";
                            echo "</p>";
                            echo "<p>";  
                            echo "<label class=\"label\">主講人</label>";                     
                            echo "<input class=\"membtn-control btnTxt\" type=\"text\" name=\"name\" id=\"name\" value=\"".$row["name"]."\">";
                            // typeRadio.SelectedValue = lectureInfo["type"].ToString();                        
                            echo "</p>";
                            echo "<p>";
                            echo "<label class=\"label\">講座主題類別</label>";
             
                            echo "<input type=\"checkbox\" name=\"type[]\" id=\"type1\" value=\"運動防護與管理\">運動防護與管理";

                            echo "<input type=\"checkbox\" name=\"type[]\" id=\"type2\" value=\"運動防護與管理\">運動防護與管理";  

                            echo "<input type=\"checkbox\"  name=\"type[]\" id=\"type3\" value=\"運動訓練與調整\">運動訓練與調整";

                            echo "<input type=\"checkbox\"  name=\"type[]\" id=\"type4\" value=\"運動營養\">運動營養";

                            echo "<input type=\"checkbox\"  name=\"type[]\" id=\"type5\" value=\"運動心理\">運動心理";

                            echo "<input type=\"checkbox\"  name=\"type[]\" id=\"type6\" value=\"運動禁藥\">運動禁藥";
                            
                            echo "<input type=\"checkbox\"  name=\"type[]\" id=\"type7\" value=\"其他\">其他";
                            echo "</p>";
                            $timestamp = strtotime($row["date"]);
                            $selRegistBoxYearPage = date("Y",$timestamp);
                            $selRegistBoxMonthPage = date("m",$timestamp);
                            $selRegistBoxDayPage = date("d",$timestamp);
                            $location = $row["location"];
                            $mem_num = $row["num"];

                            echo "<label class=\"label\">講座日期</label>";
                            
                            echo "<select id=\"selRegistBoxYearPage\" name=\"selRegistBoxYearPage\" class=\"select-stm1 btnTxt\">";
                            for ($i=2017; $i<=2047 ; $i+=2) { 
                                echo "<option value=\"".$i."\">".$i."</option><option value=\"".($i+1)."\">".($i+1)."</option>";
                            }                           
                            echo "</select>";
                            echo "<select id=\"selRegistBoxMonthPage\" class=\"select-stm1 btnTxt\" name=\"selRegistBoxMonthPage\">";
                            for ($i=1; $i <= 12; $i++) { 
                                if($i<10)
                                {
                                    echo "<option value=\"0".$i."\">0".$i."</option>";
                                }                               
                                else
                                {
                                    echo "<option value=\"".$i."\">".$i."</option>";
                                } 
                            }
                            echo "</select>";
                            echo "<select id=\"selRegistBoxDayPage\" name=\"selRegistBoxDayPage\" class=\"select-stm1 btnTxt\">";
                            for ($i=1; $i <=31 ; $i++) { 
                                if($i<10)
                                {
                                    echo "<option value=\"0".$i."\">0".$i."</option>";
                                }
                                else
                                {
                                    echo "<option value=\"".$i."\">".$i."</option>";
                                }
                                
                            }
                            echo "</select>";
                            echo "</p>";
                            echo "<label class=\"label\">講座地點</label>";
                            echo "<input class=\"membtn-control btnTxt\" type=\"text\" name=\"location\" id=\"location\"  value=\"".$location."\">";
                            echo "<p>";
                            echo "<label class=\"label\">講座人數</label>";
                            echo "<input class=\"membtn-control btnTxt\" type=\"text\" name=\"mem_num\" id=\"mem_num\" value=\"".$mem_num."\">";
                            echo "</p>";
                        }                        
                    ?>         
              	  <div class="coach-inblock">
                      <input type="submit" value="確認" class="btn btn-lg region-btn">
                    <a href="coach_edulecturelist.php"><input type="button" value="取消" class="btn btn-lg region-btn"></a>
                  </div>                  
                  </form>
              </section>