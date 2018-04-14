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
            <h1><a href="#">縣市管理</a></h1>
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
            <div class="form-wrap wrap-city">
                <div class="row">
                    <div class="form-title">
                        <header>
                            <h1 style="color:#ce950d;">縣市管理</h1>
                        </header>
                    </div>
                    <div style="background-color: rgb(237, 175, 91);" class="inner-form">
                        <h2>請輸入帳號密碼</h2>
                        <div class="inner-white-form">
                            <div class="well">
                                <form method="post" action="cityLogin_.php" id="form1" class="form-horizontal" style="">
                                    <div class="aspNetHidden">
                                        <input type="hidden" name="__VIEWSTATE" id="__VIEWSTATE" value="r6HzlLIND8ovJA+rAKCWLgAlBxYwGnwoRni/qe66Sy7Nt+CF8EyBgCQWodrNtpiU6He7LSlX+n/341t/E3srQVgpqQq4dwf7W7do5HSIFec=">
                                    </div>
                                    <!-- <div class="aspNetHidden">
                                        <input type="hidden" name="__VIEWSTATEGENERATOR" id="__VIEWSTATEGENERATOR" value="708EA8F4">
                                        <input type="hidden" name="__EVENTVALIDATION" id="__EVENTVALIDATION" value="atQqDq4poihOFCK6FCcEdkFjN9WG11e0DsbvHS67p9nL4jL0RsmVUzAKhOlnnDZZwHLb3/tIVnf642cvv2ILN/dLkkkKnjyqG0/md3++v7rc98uIEfdi6DonZC2iGwN1HbYwM0CtkF3QqePazGEQnWVkaPfFbZhDkzLiKTmwG4pGbbRqztcCR7TrOaRjqzkz">
                                    </div> -->
                                    <div class="aspNetHidden">
                                        <!--<input type="hidden" name="__VIEWSTATE" id="__VIEWSTATE" value="" />-->
                                    </div>
                                    <div class="aspNetHidden">
                                        <!--
                                    <input type="hidden" name="__VIEWSTATEGENERATOR" id="__VIEWSTATEGENERATOR" value="" />
                                    <input type="hidden" name="__EVENTVALIDATION" id="__EVENTVALIDATION" value="" />
                                    -->
                                    </div>
                                    <div class="label"><span style="font-size:X-Large;">請輸入帳號：</span></div>
                                    <input name="account" type="text" id="account" class="form-control">
                                    <div class="label"><span style="font-size:X-Large;">請輸入密碼：</span></div>
                                    <input name="password" type="password" id="password" class="form-control">
                                    <label class="label">
                                        <div class="label">
                                            <div class="float-left form-inblock pa-top10"><span style="font-size:X-Large;">請輸入右方驗證碼：</span>
                                            </div>
                                            <input name="code" type="text" id="code" class="form-control" style="width:68px;">
                                        </div><img id="Image1" src="checkcode_test.php">
                                    </label>
                                    <div class="button-form">
                                        <div class="float-left form-inblock">
                                            <input type="submit" name="login" value="  登入  " id="login" class="btn btn-lg city-button">
                                            <input type="submit" name="reg" value="  註冊  " id="reg" onclick="" class="btn  btn-lg city-button">
                                            <input type="button" id="reflash" value="重整驗證碼" onclick="reloadValidCode()" class="btn btn-lg city-button">
                                        </div>
                                    </div>
                                </form>
                                <span id="hint"></span>
                            </div>
                            <div class="txt">
                                <span>
                                歡迎使用縣市管理系統 <br>
                                請先登入後依序填寫表單，如沒有帳號請點選註冊！
                
                            </span>
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
        include 'model/footer.php';
    ?>
    <!--頁尾區塊結束-->
</body>

</html>