<?php
    session_start();
    function a()
    {
        $number=0;
        $checkCode="11111";

        // for ($i = 0; $i < 5; $i++)
        // {
        //     $number = rand(0,9);

        //     $checkCode .= (string)$number;
        // }

        $_SESSION['CheckCode'] = $checkCode;
    }

    function b()
    {
        $color_array = array(rand(0,255),rand(0,255),rand(0,255),rand(0,255),rand(0,255),rand(0,255));

        Header("Content-type: image/PNG");  //宣告輸出為PNG影像
        $CaptchaWidth = 72;                 //驗證碼影像寬度
        $CaptchaHeight = 30;                //驗證碼影像高度
         
        //建立影像
        $Captcha = ImageCreate($CaptchaWidth, $CaptchaHeight);
        //設定背景顏色
        $BackgroundColor = ImageColorAllocate($Captcha, $color_array[0],$color_array[1],$color_array[2]);
        //設定文字顏色
        $FontColor = ImageColorAllocate($Captcha, $color_array[3],$color_array[4],$color_array[5]);
        //影像填滿背景顏色
        ImageFill($Captcha, 0, 0, $BackgroundColor);
        //影像畫上驗證碼
        ImageString($Captcha, 20, 0, 0, $_SESSION['CheckCode'], $FontColor);
        //隨機畫上200個點，做為雜訊用
        for($i = 0; $i < 200; $i++) {
            Imagesetpixel($Captcha, rand() % $CaptchaWidth , rand() % $CaptchaHeight , $FontColor);
        }
        //輸出驗證碼影像
        ImagePNG($Captcha);
        ImageDestroy($Captcha);        
    }
    a();
    //echo "<script>console.log(".$_SESSION['CheckCode'].")</script>";
    b();
?>