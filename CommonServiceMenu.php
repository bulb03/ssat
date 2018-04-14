<?php
    session_start();
    if ($_SESSION["sid"] == null)
    {
        echo "<script>alert('請先登入!')</script>";
        header("Location:SchoolLogin.php");
    }
?>
<html class="gr__ssats_com_tw">

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
            </div>
        </div>
    </div>
</body>
</html>
