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
      <h2>基本資料修改</h2>
  </header>
</div>

<section class="coach-wrap">
<?php
  echo "<form id='form1' method='POST' action='coach_basicdata_.php'>";
  echo "<p>";
  echo "<label class='label'>區域輔導中心名稱</label>";
  echo "<input name='name' type='text' class='btnTxt' id='name' placeholder='由國體大設定，輔導中心不能改' readonly>";
  echo "</p>";
  echo "<p>";
  echo "<label class='label'>帳號</label>";
  echo "<input name='account' type='text' class='btnTxt' id='account' placeholder='(由國體大設定，輔導中心不能改)' readonly>";
  echo "</p>";
  echo "<p>";
  echo "<label class='label'>更改密碼</label>";
  echo "<input type='password' name='psw' class='btnTxt' id='password' placeholder='請輸入密碼'>";
  echo "</p>";
  echo "<table class='region-table'>";
  echo "<colgroup>";
  echo "<col class='newsbasic01'>";
  echo "<col class='newsbasic02'>";
  echo "<col class='newsbasic03'>";
  echo "<col class='newsbasic04'>";
  echo "<col class='newsbasic05'>";
  echo "</colgroup>";
  echo "<tr>"; 
  echo "<th>&nbsp;</th>";
  echo "<th>姓名</th>";
  echo "<th>辦公室連絡電話</th>";
  echo "<th>手機</th>";
  echo "<th>email</th>";
  echo "</tr>";
  include 'USER_AREA_COUNSELING_CENTER_MEMBER.php';


$account = $_SESSION["regional_account"];
$name = $_SESSION["regional_name"];
$uaccmModel = new USER_AREA_COUNSELING_CENTER_MEMBER;
$conn = $uaccmModel->connect_db();
$members = $uaccmModel->listByUaccid($conn,$_SESSION["regional_id"]);

foreach ($members as $Rows)
{
    switch ($Rows["type"])
    {
        case "計畫主持人":
            echo "<tr>";
            echo "<td width='121' valign='top'><p>計畫主持人: </p></td>";
            echo "<input type='hidden' id='pi_id' name='pi_id' value='".$Rows['id']."'>";
            echo "<td valign='top'><input type='text' ID='pi_name' name='pi_name' CssClass='btnTxt02' value='".$Rows['name']."'/></td>";
            echo "<td valign='top'><input type='text' class='btnTxt02' id='pi_tel' name='pi_tel' value='".$Rows['tel']."'></td>";
            echo "<td valign='top'><input type='text' class='btnTxt02' id='pi_phone' name='pi_phone' value='".$Rows['phone']."'></td>";
            echo "<td valign='top'><input type='text' class='btnTxtw90' id='pi_email' name='pi_email' value='".$Rows['email']."'></td>";
            echo "</tr>";
        break;
        case "協同主持人1":
            echo "<tr>";
            echo "<td width='121' valign='top'><p>協同主持人1:</p></td>";
            echo "<input type='hidden' id='coPi1_id' name='coPi1_id' value='".$Rows['id']."'>";
            echo "<td valign='top'><input type='text' class='btnTxt02' name='coPi1_name' id='coPi1_name' value='".$Rows['name']."'></td>";
            echo "<td valign='top'><input type='text' class='btnTxt02' name='coPi1_tel' id='coPi1_tel' value='".$Rows['tel']."'></td>";
            echo "<td valign='top'><input type='text' class='btnTxt02' name='coPi1_phone' id='coPi1_phone' value='".$Rows['phone']."'></td>";
            echo "<td valign='top'><input type='text' class='btnTxtw90' name='coPi1_email' id='coPi1_email' value='".$Rows['email']."'></td>";
            echo "</tr>";
        break;
        case "協同主持人2":
            echo "<tr>";
            echo "<td width='121' valign='top'><p>協同主持人2:</p></td>";
            echo "<input type='hidden' id='coPi2_id' name='coPi2_id' value='".$Rows['id']."'>";
            echo "<td valign='top'><input type='text' class='btnTxt02' name='coPi2_name' id='coPi2_name' value='".$Rows['name']."'></td>";
            echo "<td valign='top'><input type='text' class='btnTxt02' name='coPi2_tel' id='coPi2_tel' value='".$Rows['tel']."'></td>";
            echo "<td valign='top'><input type='text' class='btnTxt02' name='coPi2_phone' id='coPi2_phone' value='".$Rows['phone']."'></td>";
            echo "<td valign='top'><input type='text' class='btnTxtw90' name='coPi2_email' id='coPi2_email' value='".$Rows['email']."'></td>";
            echo "</tr>";
        break;
        case "協同主持人3":
            echo "<tr>";
            echo "<td valign='top'><p>協同主持人3:</p></td>";
            echo "<input type='hidden' id='coPi3_id' name='coPi3_id' value='".$Rows['id']."'>";
            echo "<td valign='top'><input type='text' class='btnTxt02' name='coPi3_name' id='coPi3_name' value='".$Rows['name']."'></td>";
            echo "<td valign='top'><input type='text' class='btnTxt02' name='coPi3_tel' id='coPi3_tel' value='".$Rows['tel']."'></td>";
            echo "<td valign='top'><input type='text' class='btnTxt02' name='coPi3_phone' id='coPi3_phone' value='".$Rows['phone']."'></td>";
            echo "<td valign='top'><input type='text' class='btnTxtw90' name='coPi3_email' id='coPi3_email' value='".$Rows['email']."'></td>";
            echo "</tr>";              
        break;
        case "專任助理1":
            echo "<tr>";
            echo "<td width='121' valign='top'><p>專任助理1:</p></td>";
            echo "<input type='hidden' id='assistant1_id' name='assistant1_id' value='".$Rows['id']."'>";
            echo "<td valign='top'><input type='text' class='btnTxt02' name='assistant1_name' id='assistant1_name' value='".$Rows['name']."'></td>";
            echo "<td valign='top'><input type='text' class='btnTxt02' name='assistant1_tel' id='assistant1_tel' value='".$Rows['tel']."'></td>";
            echo "<td valign='top'><input type='text' class='btnTxt02' name='assistant1_phone' id='assistant1_phone' value='".$Rows['phone']."'></td>";
            echo "<td valign='top'><input type='text' class='btnTxtw90' name='assistant1_email' id='assistant1_email' value='".$Rows['email']."'></td>";
            echo "</tr>";
        break;
        case "專任助理2":
            echo "<tr>";
            echo "<td valign='top'><p>專任助理2:</p></td>";
            echo "<input type='hidden' id='assistant2_id' name='assistant2_id' value='".$Rows['id']."'>";
            echo "<td valign='top'><input type='text' class='btnTxt02' name='assistant2_name' id='assistant2_name' value='".$Rows['name']."'></td>";
            echo "<td valign='top'><input type='text' class='btnTxt02' name='assistant2_tel' id='assistant2_tel' value='".$Rows['tel']."'></td>";
            echo "<td valign='top'><input type='text' class='btnTxt02' name='assistant2_phone' id='assistant2_phone' value='".$Rows['phone']."'></td>";
            echo "<td valign='top'><input type='text' class='btnTxtw90' name='assistant2_email' id='assistant2_email' value='".$Rows['email']."'></td>";
            echo "</tr>";    
        break;
    }
}
echo "</table>";
echo "<div class='coach-inblock'>";
echo "<input type='submit' name='login' value='確定' id='login' class='btn btn-lg region-btn'/>";
echo "</div>";
echo "</form>"; 
?>
</section>