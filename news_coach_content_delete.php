<?php
    $msgId = $_GET['msgId'];
    $servername = "localhost";
    $dbname = "guardian";
    $account = "root";
    $password = "1234";

    try
    {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname",$account,$password);
        $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);        
        $usepdo = $conn->prepare("DELETE FROM MessageData WHERE SN = :msgId;");
        $usepdo->bindParam(":msgId",$msgId);
        $usepdo->execute();
        echo "<script>alert('刪除成功'); location.href='news_coach.php'</script>";
    }
    catch(PDOException $e)
    {
        echo "<script>alert('".$e->getMessage()."');</script>";
    }             
?>