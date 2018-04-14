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
                <h1>執行策略與工作重點</h1>
                <img class="img-fluid mx-auto d-block" src="../../assets/images/3.png">
                <p>
                <ul class="ulsign">
                    <li class="ulsign">一、運動防護與管理
                        <ol>
                            <li>執行病史調查與健康檢查紀錄</li>
                            <li>執行各項運動防護工作，包含：</li>
                            <ul>
                                <li class="lisign">(1)運動傷害預防</li>
                                <ul>
                                    <li class="upper-alpha">透過各項檢測評估運動員的身體狀態，篩檢與傷害、健康有關之危險因子。</li>
                                    <li class="upper-alpha">檢視訓練環境狀態，必要時，提供教練有關運動安全與訓練內容調整之相關建議。</li>
                                    <li class="upper-alpha">定期檢查運動器具及場地安全、護具可使用性與維護。</li>
                                    <li class="upper-alpha">施予合適的貼紮與包紮。</li>
                                    <li class="upper-alpha">協助體能調整與訓練。</li>
                                </ul>
                                <li class="lisign">(2)急性傷害初步評估與處理</li>
                                <ul>
                                    <li class="upper-alpha">評估傷害機轉、受傷範圍與情況、傷害嚴重度。</li>
                                    <li class="upper-alpha">使用適當急救技術，提供送醫前之緊急處置。</li>
                                    <li class="upper-alpha">辦別傷害嚴重程度，必要時啟動運動醫療系統。</li>
                                </ul>
                                <li class="lisign">(3)傷害後防護與復健</li>
                                <ul>
                                    <li class="upper-alpha">安排前往特約醫療院所進行詳細診療，依醫囑執行傷後復建計畫。</li>
                                    <li class="upper-alpha">傷後體能調整與訓練。</li>
                                </ul>
                            </ul>
                            <li>健康管理與傷害防護記錄之建立、填寫與管理</li>
                            <li>擬訂緊急應變計畫</li>
                        </ol>
                    </li>
                    <li class="ulsign">二、區域醫療服務網建置
                        <ol>
                            <li>洽談學校鄰近區域之骨科、復健科、家醫科與內科診所之合作，提供特約運動傷害與運動醫學門診。</li>
                            <li>建置運動醫療服務系統，規劃運動傷害與運動醫學特約門診時間表，提供就醫資訊，提升就醫品質。</li>
                            <li>舉辦每學期舉辦區域醫療服務座談會，說明運動競技特性、體育班學生需求、區域醫療服務重點與運行方式。</li>
                            <li>舉辦運動禁藥講座，認識運動員用藥規範與禁藥管制項目。</li>
                            <li>建立醫療院所與區域巡迴運動傷害防護員之分工合作模式與標準作業流程，建立完整體育班學生診療紀錄與管理。</li>
                        </ol>
                    </li>
                    <li class="ulsign">三、運動防護與科研訪視及輔導
                        <ol class="ulsign">
                            <li>配合區域運科中心之運動科研輔導項目，擴大範圍至區域輔導學校體育班學生。</li>
                            <li>執行功能動作與控制評估，了解運動員於專項運動時之危險因子，做為體能調整之參考依據。</li>
                            <li>舉辦運動防護與營養講座、運動安全與防護衛教講座。</li>
                        </ol>
                    </li>
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