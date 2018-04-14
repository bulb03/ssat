<?php
    session_start();
    if ($_SESSION["Is_regional"] != true)
    {
        echo "<script>alert('請先登入!')</script>";
        header("Location:RegionalLogin.php");
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="author" content="LoadFoO">
    <meta name="description" content="Site description">
    <meta name="keywords" content="體育署, 體育署防護員">
    <title>體育署防護員申請表單系統</title>
    <link rel="stylesheet" type="text/css" href="../assets/bootstrap.min.css">
    <link href="../assets/main.css" rel="stylesheet">
    <link href="../assets/CSS/formapp.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../assets/CSS/ssats.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!--匯入jQuery-->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <script src="../js/lib/jquery-3.2.1.min.js"></script>
    <script src="../js/lib/ajax.js"></script>
    <script src="../js/regional/regional.js"></script>
</head>

<body>
    <nav class="navbar navbar-dark navbar-expand-md">
        <a href="放首頁.html" class="navbar-brand"><img src="../assets/images/1.png" style="margin: 10%;"><img src="../assets/images/2.png"></a>
        <button type="button" class="navbar-toggler navbar-toggler-right" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>    
        <div class="collapse navbar-collapse flex-row-reverse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle nav-text" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">關於本計畫</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="../About_plan/about.php">計畫依據</a>
                        <a class="dropdown-item" href="../About_plan/aboutOrigin.php">計畫緣起</a>
                        <a class="dropdown-item" href="../About_plan/aboutGoal.php">計畫目標</a>
                        <a class="dropdown-item" href="../About_plan/aboutStrategyAndFocus.php">執行策略與工作重點</a>
                        <a class="dropdown-item" href="../About_plan/aboutExpectedBenefits.php">預期效益</a>
                        <a class="dropdown-item" href="../About_plan/aboutProjectStatus.php">執行現況</a>
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
    </nav>
    <div class="wrapper-login">
        <div class="container">
            <div class="city-wrap">
            	<div class="row">
                    <div class="city-title">
                        <header>
                        	<h1>縣市管理</h1>
                        </header>
                    </div>
                    <div class="city-content">
                    	<div class="city-s">
                        	<p>學年度</p>
                            <select id="yearSelect" class="city-btnTxt">
                            <?php
                                include_once 'YEAR.php';

                                $year = new YEAR;
                                $conn = $year->connect_db();
                                $sql = $year->list_($conn);

                                foreach ($sql as $row) {
                                    echo "<option>".$row["year"]."</option>";
                                }
                            ?>
                            </select>
                        </div>
                         <div class="city-sch">
                            <p>列表學校：
                                <a href="listSchoolFounding.php?isNew=''&year=getSelectedYear()"><button type="button">全部</button></a>
                                <a href="listSchoolFounding.php?isNew='0'&year=getSelectedYear()"><button type="button">膺續學校</button></a>
                                <a href="listSchoolFounding.php?isNew='1'&year=getSelectedYear()"><button type="button">新申請學校</button></a>
                            </p>
                            <p>
                                <a href="export.aspx" onclick="this.href='export.aspx?year='+getSelectedYear()" target="_blank">
                                    <input type="button" name="Button1" onclick="listSchool()" value="匯出PDF" id="Button1" class="btn city-btn"/>
                                </a>
                            </p>    
                            <span>申請經費總額： <span id="totalCosts">0</span>元</span>
                        </div>
                        <div class="city-livebox clearfix">
                            <a href="logout.aspx">
                            	<input type="submit" name="Button1" value="  登出  " id="Button1" class="btn unite-btn" />
                            </a>
                        </div>
                        <table  class="citytable">
                            <colgroup>
                            	<col class="t01">
                            	<col class="t02">
                            	<col class="t03">
                            	<col class="t04">
                            	<col class="t05">
                            	<col class="t06">
                            	<col class="t07">
                            	<col class="t08">
                            	<col class="t09">
                        	</colgroup>
                            <tbody id="schoolTable">
                                <tr>
                                    <td>申請人</td>
                                    <td>申請類型</td>
                                    <td>所屬縣市</td>
                                    <td>學校代碼</td>
                                    <td>學校名稱</td>
                                    <td>人事費</td>
                                    <td>業務費</td>
                                    <td>設備費</td>
                                    <td>總額</td>
                                </tr>
                                <?php

                                ?>
                            </tbody>
                        </table>
                     </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function getSelectedYear() {
            return document.getElementById("yearSelect").value;
        }        
        listYear();
        listSchool();
    </script>
    <footer>
        <div class="f-content">
            <p>教育部體育署</p>
            <div class="f-middle">
                  
              </div>
        </div>
    </footer>
</body>
</html>
