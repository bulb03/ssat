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
            <h2><a href="about.php">回首頁</a></h2>
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
    <script>
        function reloadValidCode() {
            document.getElementById('Image1').src = 'checkcode_test.php?' + new Date().getTime();
        }
    </script>
    <div class="wrapper-login">
        <div class="container">
            <div class="form-wrap">
                <div class="row">
                    <div class="form-title">
                        <header>
                            <h1>學校申請與管理</h1>
                        </header>
                    </div>
                    <div  class="inner-form">
                        <h2>請輸入帳號密碼</h2>
                        <div class="inner-white-form">
                            <div class="well">
                                <form id="form1" class="form-horizontal" method="POST" action="SchoolLogin_.php">
                                    <div class="aspNetHidden">
                                        <input type="hidden" name="__VIEWSTATE" id="__VIEWSTATE" value="tfbOc48esw4vgr2L/0zWyyGuoAQbE7njZzytFlutK6pAWR3jqdM2ytv8ZVZDP/LD34Wr7bRU3gqJ7L9c0sqQyZAgdMP+37o6eE84YFMc6xU=">
                                    </div>
                                    <!-- <div class="aspNetHidden">
                                        <input type="hidden" name="__VIEWSTATEGENERATOR" id="__VIEWSTATEGENERATOR" value="932B7FE7">
                                        <input type="hidden" name="__EVENTVALIDATION" id="__EVENTVALIDATION" value="+khgGrzRVe3oNRRqgjCcr6eH/L8hEVcTm5zITPNl1cTDJIbiksteEg+bhA/hcrlmv0oll98OQta62dTf/33QI0SgW2B7z60fJMAyLHV1uHyEDnFFlwuvVxHlMkXo9lyDLzbvjj52K/+FzfT8X8JzyldExCJ3yIeqRVRhvgttuBhD1zklrMm/MgN7MXmt4GMBsp63MyZdTH5V3SxfVnYvqTVsDVbSXtGsqnU6JUC6srM=">
                                    </div> -->
                                    <div class="label"><span style="font-size:X-Large;">請輸入帳號：</span></div>
                                    <input name="account" type="text" id="account" class="form-control">
                                    <div class="label"><span style="font-size:X-Large;">請輸入密碼：</span></div>
                                    <input name="password" type="password" id="password" class="form-control">
                                    <label class="label">
                                        <div class="label">
                                            <div class="float-left form-inblock pa-top10">
                                                <span style="font-size:X-Large;">請輸入右方驗證碼：</span>
                                            </div>
                                            <input name="code_" type="text" id="MainContentPlaceHolder_TitleTopMenuContentPlaceHolder_code" class="form-control" style="width:68px;">

                                        </div> <img id="Image1" src="checkcode_test.php">
                                    </label>
                                    <div class="button-form">
                                        <div class="float-left form-inblock">
                                            <input type="submit" name="ctl00$ctl00$MainContentPlaceHolder$TitleTopMenuContentPlaceHolder$login" value="  登入  " id="MainContentPlaceHolder_TitleTopMenuContentPlaceHolder_login" class="btn btn-lg school-btn">
                                            <script>
                                            function reloadValidCode() {
                                                document.getElementById('Image1').src = 'checkcode_test.php?' + new Date().getTime();
                                            }
                                            </script>
                                            <input type="button" id="reflash" value="重整驗證碼" onclick="reloadValidCode()" class="btn btn-lg school-btn">
                                        </div>
                                    </div>
                                </form>
                                <span id="hint"></span>
                            </div>
                            <div class="txt">
                                <span>
                                歡迎使用本申請系統，用於補助各級學校約用運動防護員巡迴服務計畫， <br>
                                請先登入後依序填寫表單，如沒有帳號請點選註冊！</span>
                            </div>
                        </div>
                    </div>
                    <!--end content-form-->
                </div>
            </div>
        </div>
    </div>
    <!--內文區塊結束-->
    <!--頁尾區塊開始-->
    <?php 
        include 'footer.php';
    ?>
    <!--頁尾區塊結束-->
</body>

</html>