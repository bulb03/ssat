<?php

?>
<!DOCTYPE html>
<html lang="zh-TW">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!--響應式-->
    <title>體育署防護員申請表單系統</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!--引入bootstrap 4CSS-->
    <link rel="stylesheet" type="text/css" href="../../assets/CSS/ssats.css">
    <!--引入自訂CSS-->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!--引入bootstrap 4 JS JQUERY-->
</head>

<body>
    <!--頂部導覽列區塊開始-->
    <!--頂部LOGO開始-->
    <nav class="navbar navbar-dark navbar-expand-md">
        <a href="放首頁.html" class="navbar-brand"><img src="../../assets/images/1.png" style="margin: 10%;"><img src="../../assets/images/2.png"></a>
        <button type="button" class="navbar-toggler navbar-toggler-right" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!--頂部LOGO結束-->
        <!--頂部導覽列開始-->
        <?php
            include '../PlanningandManage/menu.php';
        ?>
        <!--頂部導覽列結束-->
    </nav>
    <!--頂部導覽列區塊結束-->
    <!--內文區塊開始-->
    <div id="main-wrapper">
        <div class="container-fluid">
            <section class="offset-md-1 col-md-10 col-sm-12 col-xs-12">
                <h1>執行現況</h1>
                    <img class="img-fluid mx-auto d-block" src="../../assets/images/about-SubsidyschoolP0001.jpg">
                    <img style="padding-top: 5%" class="img-fluid mx-auto d-block" src="../../assets/images/about-SubsidyschoolP0002.jpg">
            </section>
        </div>
    </div>
    <!--內文區塊結束-->
    <!--頁尾區塊開始-->
    <footer>
        <div class="fixed-bottom">
            <p>教育部體育署</p>
        </div>
    </footer>
    <!--頁尾區塊結束-->
</body>

</html>