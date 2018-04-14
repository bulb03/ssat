<?php
    class MESSAGE
    {
        private $modelName = "messagefile";

        function connect_db(){
            $servername = "localhost";
            $dbname = "guardian";
            $account = "root";
            $password = "1234"; 
            try{
                //資料庫連線
                $conn = new PDO("mysql:host=$servername;dbname=$dbname",$account,$password);
                $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                return $conn;
            }
            catch(PDOException $e)
            {
                echo $e->getMessage()."<br>";
            }           
        }        

        function GetIndexMessage($conn)
        {
           // try
           //  {
           //      $usepdo = $conn->prepare("select SN,Title,ModificatedDate FROM MessageData WHERE Status = 1 ORDER BY IsTop DESC,ModificatedDate DESC LIMIT 0,5;");
           //      $usepdo->execute();
           //      $sql = $usepdo->fetchAll();

           //      if($sql){
           //          return $sql;
           //      }
           //  }
           //  catch(PDOException $e){
           //      echo "<script>alert('".$e->getMessage()."')</script>";
           //      header("Location:.php");
           //  }
           //  var messageData = dbUtils.Query(query);

           //  var messageList = new List<MESSAGE_DATA>();

           //  foreach (var dataRow in messageData.AsEnumerable())
           //  {
           //      var message = new MESSAGE_DATA()
           //      {
           //          Id = dataRow.Field<int>("SN"),
           //          Title = dataRow.Field<string>(@"Title"),
           //          ModificatedDate = dataRow.Field<DateTime>(@"ModificatedDate")
           //      };

           //      messageList.Add(message);
           //  }

           //  return messageList;
        }

        /// <summary>
        /// 新增區域輔導中心訊息
        /// </summary>
        /// <returns>區域輔導中心訊息ID</returns>
        function addRegionalMessage($conn,$Title,$Content,$CreatedUser,$ModificatedUser,$uaccid)
        {
            try{
                $now_time = date("Y-m-d H:i:s");
                $usepdo = $conn->prepare("INSERT INTO MessageData (Title, Content, IsTop, CreatedUser, ModificatedUser, Status, uaccid, ModificatedDate) VALUES(:Title, :Content, 1, :CreatedUser, :ModificatedUser, 0, :uaccid, :now_time);");
                $usepdo->bindParam(':Title',$Title);
                $usepdo->bindParam(':Content',$Content);
                $usepdo->bindParam(':CreatedUser',$CreatedUser);
                $usepdo->bindParam(':ModificatedUser',$ModificatedUser);
                $usepdo->bindParam(':uaccid',$uaccid);
                $usepdo->bindParam(':now_time',$now_time);
                $usepdo->execute();
                echo "<script>alert('新增完成'); location.href:'news_coach.php'</script>";
            }
            catch(PDOException $e)
            {
                echo "<script>alert('".$e->getMessage()."'); location.href='news_coach.php'</script>";
            }
        }

        /// <summary>
        /// 新增附件檔案
        /// </summary>
        /// <returns>FileSN</returns>
        function addMessageFile($conn, $DisplayName, $Location, $BelongMessage, $CreatedUser)
        {
            try
            {
                $usepdo = $conn->prepare("INSERT INTO ".$this->modelName." (DisplayName, Location, BelongMessage, CreatedUser) VALUES(:DisplayName, :Location, :BelongMessage, :CreatedUser);");
                $usepdo->bindParam(':DisplayName',$DisplayName);
                $usepdo->bindParam(':Location',$Location);
                $usepdo->bindParam(':BelongMessage',$BelongMessage);
                $usepdo->bindParam(':CreatedUser',$CreatedUser);
                $usepdo->execute();
                return true;
            }
            catch(PDOException $e){
                echo "<script>console.log('".$e->getMessage()."')  location.href='coach_meetinglist.php'</script>";
            }
        }

        /// <summary>
        /// 取得區域輔導中心訊息列表
        /// </summary>
        /// <returns>區域輔導中心訊息列表</returns>
        function GetRegionalMessage($conn,$uaccid)
        {
            try{
                $usepdo = $conn->prepare("select SN,Title,Content, ModificatedDate, FileSN FROM MessageData A LEFT JOIN messagefile B ON (A.SN = B.BelongMessage) WHERE uaccid = :uaccid ORDER BY IsTop DESC,ModificatedDate DESC;");
                $usepdo->bindParam(':uaccid',$uaccid);
                $usepdo->execute();
                $sql = $usepdo->fetchAll(); 
                if($sql){
                    return $sql;
                }
            }
            catch(PDOException $e)
            {
                echo "<script>alert('".$e->getMessage()."') location.href='news_coach.php'</script>";
            }
        }

        /// <summary>
        /// 取得指定SN訊息
        /// </summary>
        /// <returns>訊息</returns>
        function GetMessageByMsgId($conn,$msgId)
        {
            try{
                $usepdo = $conn->prepare("select SN,Title,Content, ModificatedDate, FileSN FROM MessageData A LEFT JOIN messagefile B ON (A.SN = B.BelongMessage) WHERE SN = :msgId");
                $usepdo->bindParam(':msgId',$msgId);
                $usepdo->execute();                
                $sql = $usepdo->fetchAll(); 

                if($sql){
                    return $sql;
                }
            }
            catch(PDOException $e)
            {
                echo "<script>alert('".$e->getMessage()."')  location.href='news_coach.php'</script>";
            }
        }

        /// <summary>
        /// 取得附件檔案資訊
        /// </summary>
        /// <returns>附件檔案資訊</returns>
        function GetFileInfo($conn,$msgId,$fileId)
        {
            try{
                $usepdo = $conn->prepare("select DisplayName, Location FROM messagefile WHERE BelongMessage = :BelongMessage AND FileSN = :FileSN;");
                $usepdo->bindParam(':BelongMessage',$msgId);
                $usepdo->bindParam(':FileSN',$fileId);
                $usepdo->execute();                
                $sql = $usepdo->fetchAll(); 
                if($sql){
                    return $sql;
                }
            }
            catch(PDOException $e)
            {
                echo "<script>alert('".$e->getMessage()."')  location.href='news_coach.php'</script>";
            }            
        }
    }
?>