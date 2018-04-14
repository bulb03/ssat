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
            <h2>會議資料</h2>
        </header>
    </div>
    <section class="coach-wrap">
        <form id="form1" method="POST" action="coach_meeting_revise_.php">
            <?php
                include_once 'CONFERENCE.php';

                $meeting = new CONFERENCE;
                $conn = $meeting->connect_db();
                $meetingInfo = $meeting->getByID($conn,$_GET['meetingID']);
                foreach($meetingInfo as $row)
                {
                    $timestamp = strtotime($row["date"]);
                    $date_Y = date("Y",$timestamp);
                    $date_M = date("M",$timestamp);
                    $date_D = date("D",$timestamp);
                    echo "<input type=\"hidden\" id=\"meetingID\" name=\"meetingID\" value=\"".$row['id']."\">";
                    echo "<p>";
                    echo "<label class=\"label\">會議名稱</label>";             
                    echo "<input type=\"text\" class=\"btnTxt\" id=\"mem_name\" name=\"mem_name\" value=\"".$row['name']."\">";
                    echo "</p>";     
                    
                    echo "<p>";
                    echo "<label class=\"label\">會議類型</label>";
                    
                    echo "<input type=\"checkbox\" name=\"type[]\" id=\"type1\" value=\"計畫執行籌備工作會\">計畫執行籌備工作會";
                    
                    echo "<input type=\"checkbox\" name=\"type[]\" id=\"type2\" value=\"主聘學校工作協調會\">主聘學校工作協調會";
                                
                    echo "<input type=\"checkbox\" name=\"type[]\" id=\"type3\" value=\"區域輔導會議\">區域輔導會議";
                    
                    echo "<input type=\"checkbox\" name=\"type[]\" id=\"type4\" value=\"區域醫療網聯絡會議\">區域醫療網聯絡會議";
                    
                    echo "</p>";
                }       
                echo "<p>";
                echo "<label class=\"label\">會議地點</label>";
                echo "<input class=\"membtn-control btnTxt\"  type=\"text\" name=\"location\" id=\"location\" value=\"".$row['location']."\">";
                echo "</p>";
                echo "<p>";
                echo "<label class=\"label\">會議日期</label>";
                echo "<select id=\"selRegistBoxYearPage\" name=\"selRegistBoxYearPage\" class=\"select-stm1 btnTxt\" placeholder=\"".$date_Y."\">";
                echo "<option value=\"2017\">2017</option>";
                echo "<option value=\"2018\">2018</option>";
                echo "<option value=\"2019\">2019</option>";
                echo "<option value=\"2020\">2020</option>";
                echo "<option value=\"2021\">2021</option>";
                echo "<option value=\"2022\">2022</option>";
                echo "<option value=\"2023\">2023</option>";
                echo "<option value=\"2024\">2024</option>";
                echo "<option value=\"2025\">2025</option>";
                echo "<option value=\"2026\">2026</option>";
                echo "<option value=\"2027\">2027</option>";
                echo "<option value=\"2028\">2028</option>";
                echo "<option value=\"2029\">2029</option>";
                echo "<option value=\"2030\">2030</option>";
                echo "<option value=\"2031\">2031</option>";
                echo "<option value=\"2032\">2032</option>";
                echo "<option value=\"2033\">2033</option>";
                echo "<option value=\"2034\">2034</option>";
                echo "<option value=\"2035\">2035</option>";
                echo "<option value=\"2036\">2036</option>";
                echo "<option value=\"2037\">2037</option>";
                echo "<option value=\"2038\">2038</option>";
                echo "<option value=\"2039\">2039</option>";
                echo "<option value=\"2040\">2040</option>";
                echo "<option value=\"2041\">2041</option>";
                echo "<option value=\"2042\">2042</option>";
                echo "<option value=\"2043\">2043</option>";
                echo "<option value=\"2044\">2044</option>";
                echo "<option value=\"2045\">2045</option>";
                echo "<option value=\"2046\">2046</option>";
                echo "<option value=\"2047\">2047</option>";
                echo "<option value=\"2048\">2048</option>";
                echo "</select>";
                echo "<select id=\"selRegistBoxMonthPage\" name=\"selRegistBoxMonthPage\" class=\"select-stm1 btnTxt\" placeholder=\"".$date_M."\">";
                echo "<option value=\"01\">01</option>";
                echo "<option value=\"02\">02</option>";
                echo "<option value=\"03\">03</option>";
                echo "<option value=\"04\">04</option>";
                echo "<option value=\"05\">05</option>";
                echo "<option value=\"06\">06</option>";
                echo "<option value=\"07\">07</option>";
                echo "<option value=\"08\">08</option>";
                echo "<option value=\"09\">09</option>";
                echo "<option value=\"10\">10</option>";
                echo "<option value=\"11\">11</option>";
                echo "<option value=\"12\">12</option>";
                echo "</select>";
                echo "<select id=\"selRegistBoxDayPage\" name=\"selRegistBoxDayPage\" class=\"select-stm1 btnTxt\" placeholder=\"".$date_D."\">";
                echo "<option value=\"01\">01</option>";
                echo "<option value=\"02\">02</option>";
                echo "<option value=\"03\">03</option>";
                echo "<option value=\"04\">04</option>";
                echo "<option value=\"05\">05</option>";
                echo "<option value=\"06\">06</option>";
                echo "<option value=\"07\">07</option>";
                echo "<option value=\"08\">08</option>";
                echo "<option value=\"09\">09</option>";
                echo "<option value=\"10\">10</option>";
                echo "<option value=\"11\">11</option>";
                echo "<option value=\"12\">12</option>";
                echo "<option value=\"13\">13</option>";
                echo "<option value=\"14\">14</option>";
                echo "<option value=\"15\">15</option>";
                echo "<option value=\"16\">16</option>";
                echo "<option value=\"17\">17</option>";
                echo "<option value=\"18\">18</option>";
                echo "<option value=\"19\">19</option>";
                echo "<option value=\"20\">20</option>";
                echo "<option value=\"21\">21</option>";
                echo "<option value=\"22\">22</option>";
                echo "<option value=\"23\">23</option>";
                echo "<option value=\"24\">24</option>";
                echo "<option value=\"25\">25</option>";
                echo "<option value=\"26\">26</option>";
                echo "<option value=\"27\">27</option>";
                echo "<option value=\"28\">28</option>";
                echo "<option value=\"29\">29</option>";
                echo "<option value=\"30\">30</option>";
                echo "<option value=\"31\">31</option>";
                echo "</select>";
                echo "</p>";
                echo "<p>";
                echo "<label class=\"label\">會議參與人數</label>";
                echo "<input type=\"text\" class=\"btnTxt\" placeholder=\"\" id=\"mem_num\" name=\"mem_num\" value=\"".$row['num']."\">";
                echo "</p>";                                             
                          
                // <!--<p>
                //     <label class="label">會議名稱(上傳)</label>
                //     <input type="file" name="file" id="file" class="btnTxt select-box" />
                //     <input type="submit" name="submit" value="上傳檔案" class="btnTxt" />
                // </p>-->
                echo "<div class=\"coach-inblock\">";
                echo "<input type=\"submit\" name=\"addBtn\" value=\"確認\" id=\"addBtn\" class=\"btn btn-lg region-btn\" />";
                echo "</div>";
            ?>
        </form>
    </section>
</body>