<?php

?>
<!DOCTYPE html>
<html lang="en">

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
                <h1>計畫目標</h1>
                <p>
                    <ul class="ulsign">
                        <li class="ulsign">一、聘任運動防護員，提供區域巡迴學校體育班學生平時訓練與賽季期間之運動傷害預防、傷害初步評估與急救處理、傷後復健等運動防護與管理工作，落實高級中等以下學校體育班運動人才健康照護工作。</li>
                        <li class="ulsign">二、協助區域輔導中心建置醫療服務網，完善體育班學生照護機制，並提升就醫品質與效率。</li>
                        <li class="ulsign">三、增進區域巡迴學校之教師、教練、體育班學生與其家長有關運動防護、運動禁藥、運動營養與運動安全之認知。</li>
                    </ul>
                </p>
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