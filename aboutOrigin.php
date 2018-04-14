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
                <h1>計畫緣起</h1>
                <p class="p_text">為建立優秀運動人才培育體系，給予運動參與者運動教育、培育運動能力的同時，期能更積極照顧基層運動人才，避免因運動傷害影響其運動發展，依據「高中以下學校體育班設置辦法」第十一條， 主管機關應輔導學校聘任具有運動防護員資格人員，辦理運度防護工作，故教育部體育署103年2月 (102學年度第二學期) 起，遴選四所國立高中職作為運動防護員巡迴服務試行推動學校，103年8月訂定「教育部體育署補助各級學校 約用運動防護員巡迴服務試行計畫」，擬定三年期計畫，與地方政府共同進行區域性中小學運動人才培育學校之運動防護與管理工作，整合運動防護科學與醫療服務資源，建立完整之區域醫療服務網與運動防護科學輔導網，取得醫師、教練、 運動防護員、學者專家與家長之良性互動，完善體育班選手之運動訓練與健康照顧架構。
                </p>
                <p class="p_text">
                    試行期間，執行情形如下：
                </p>
                <div class="offset-md-1">
                    <ol class="ulsign">
                        <li class="li_text">102學年度補助4所學校聘任運動防護員執行體育班學生之運動防護工作。</li>
                        <li class="li_text">103學年度補助14所學校聘任運動防護員執行體育班學生之運動防護工作。</li>
                        <li class="li_text">104學年度補助30所學校聘任運動防護員執行體育班學生之運動防護工作。</li>
                        <li class="li_text">105學年度補助60所學校聘任運動防護員執行體育班學生之運動防護工作。</li>
                    </ol>
                </div>
                <p class="p_text">
                    試行期間，獲得廣大迴響，成效卓著，教育部體育署特於106學年度全面推動，並將計畫修訂為「教育部體育署補助各級學校約用運動防護員巡迴服務計畫」，並將申請資格開放予參與近三學年度學生運動聯賽成績優異之非設體育班 之學校，擴大受惠範圍，落實基層運動人才之運動防護與健康照護工作。
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