<?php

include 'Utils.php';
include 'SCHOOL_INFO.php';

$Util = new Utils;
$schooInfo = new SCHOOL_INFO;

try
{
    if ($_SESSION["sid"] == null)
    {
        echo "<script>alert('請先登入!')</script>";
        header("Location:Default.aspx.php");
    }

    $year = $Util->currentSchoolYear());
    $sid = $_SESSION["sid"];

    $schoolInfoModel = new SCHOOL_INFO;
    $conn = $schoolInfoModel->connect_db();
    $schoolInfo = $schoolInfoModel->getSchoolInfoBySIDAndYear($conn, $sid, $year);

    //以下還沒做

    //設定要下載的檔案路徑 及 儲存的檔名
    //string path = "C:\\trainer\\uploadFiles\\" + Helper.Utils.currentSchoolYear().ToString() + Session["sid"] + ".pdf";
    string floder = "C:\\trainer\\uploadFiles\\";
    string filePath = $"{floder}{Helper.Utils.currentSchoolYear().ToString()}{Session["sid"]}.pdf";
    string FileName = HttpUtility.UrlEncode("經費審查結果.pdf", Encoding.GetEncoding("utf-8"));
    //宣告並建立WebClient物件
    WebClient wc = new WebClient();
    //載入要下載的檔案
    byte[] b = wc.DownloadData(filePath);
    //清除Response內的HTML
    Response.Clear();
    //設定標頭檔資訊 attachment 是本文章的關鍵字
    Response.AddHeader("Content-Disposition", "attachment;filename=" + FileName);
    //開始輸出讀取到的檔案
    Response.BinaryWrite(b);
    //一定要加入這一行，否則會持續把Web內的HTML文字也輸出。
    Response.End();
}
catch (Exception ex)
{
    Response.Write("<script>alert('暫無審查結果');</script>");
}
?>