<?php
    class EDUCATIONAL_LECTURE
    {
        private $modelName = "EDUCATIONAL_LECTURE";

        function connect_db()
        {
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

        /**
         * 新增教育講座資料
         * @param uaccid 區域輔導中心編號
         * @param year 學年度
         * @param topic 主題
         * @param date 日期
         * @param location 地點
         * @param attendee_file 參與者名單(名單檔案上傳路徑)
         */
        function create($conn,$uaccid,$year,$topic,$name,$date_,$type,$location,$num,$isUpload)
        {
            try
            {
                $usepdo = $conn->prepare("INSERT INTO ".$this->modelName."(uaccid, year, name, topic, date, type, location, num, isUpload) VALUES (:uaccid, :year, :name, :topic, :date_, :type, :location, :num, :isUpload);");
                $usepdo->bindParam(':uaccid',$uaccid);
                $usepdo->bindParam(':year',$year);
                $usepdo->bindParam(':name',$name);
                $usepdo->bindParam(':topic',$topic);
                $usepdo->bindParam(':date_',$date_);
                $usepdo->bindParam(':type',$type);
                $usepdo->bindParam(':location',$location);
                $usepdo->bindParam(':num',$num);
                $usepdo->bindParam(':isUpload',$isUpload);
                $usepdo->execute();
            }
            catch(PDOException $e){
                echo $e->getMessage()."<br>";
            }            
        }

        /**
         * 使用 id 取得單筆教育講座資料
         * @param id 教育講座資料編號
         * @return 
         *      success : 教育講座資料(DataTable)
         *      fail : null
         */
        function getByID($conn,$id)
        {
            try
            {
                $usepdo = $conn->prepare("SELECT * FROM ".$this->modelName." WHERE id = :id;");
                $usepdo->bindParam(':id',$id);
                $usepdo->execute();

                $sql = $usepdo->fetchAll();

                if($sql)
                {
                    return $sql;
                }
            }
            catch(PDOException $e){
                echo $e->getMessage()."<br>";
                header("Location:.php");
            }             
        }

        /**
         * 取得學校單年度教育講座資料
         * @param sid 學校編號
         * @param year 學年度
         * @return 
         *      success : 教育講座資料(DataTable)
         *      fail : null
         */
        function listByUACCIDAndYear($conn,$uaccid,$year)
        {
            try
            {
                $usepdo = $conn->prepare("SELECT * FROM EDUCATIONAL_LECTURE WHERE uaccid='".$uaccid."' AND year='".$year."';");
                $usepdo->execute();

                //取得傳回值

                $sql = $usepdo->fetchAll(); 

                if($sql)
                {
                    return $sql;
                }
            }
            catch(PDOException $e){
                echo "<script>alert('".$e->getMessage()."'); location.href='coach_service.php'</script>";
            }
        }


        /**
         * 取得全部區域輔導中心單年度教育講座資料
         * @return 
         *      success : 教育講座資料(DataTable)
         *      fail : null
         */
        function listByYear($conn,$year)
        {
            try
            {
                $usepdo = $conn->prepare("SELECT * FROM ".$this->modelName." WHERE year = :year;");
                $usepdo->bindParam(':year',$year);
                $usepdo->execute();

                $sql = $usepdo->fetchAll();

                if($sql)
                {
                    foreach ($sql as $row) {
                        return $sql;
                    }
                }
            }
            catch(PDOException $e){
                echo $e->getMessage()."<br>";
                header("Location:.php");
            }
        }

        /**
         * 修改教育講座資料
         * @param id 教育講座資料編號
         * ### 欄位陣列 與 資料陣列 順序必須對齊 ###
         * @param fields 欄位(陣列)   e.g. : string[] fields = { "name", "country" };
         * @param values 資料(陣列)   e.g. : object[] fields = { "中原大學", "桃園市" };
         */
        function updateByID($conn,$edulectureID,$topic,$name,$date,$location,$num,$type)
        {
            $type_ = "";
            foreach ($type as $row) {
                $type_ .= $row.",";
            }
            echo "<script>console.log('".$type_."');</script>";
            try
            {
                $usepdo = $conn->prepare("update ".$this->modelName." set name=:name,topic=:topic,date=:date,location=:location,num=:num,type=:type where id=:id;");
                $usepdo->bindParam(':name',$name);
                $usepdo->bindParam(':topic',$topic);
                $usepdo->bindParam(':date',$date);
                $usepdo->bindParam(':location',$location);
                $usepdo->bindParam(':num',$num);
                $usepdo->bindParam(':type',$type_);
                $usepdo->bindParam(':id',$edulectureid);
                $usepdo->execute();
                return true;
            }
            catch(PDOException $e){
                echo "<script>alert('".$e->getMessage()."'); location.href='coach_edulecturelist.php'</script>";
            }             
        }

        /**
         * 刪除單筆教育講座資料
         * @param id 教育講座資料編號
         */
        function deleteByID($conn,$id)
        {
            try
            {
                $usepdo = $conn->prepare("DELETE FROM ".$this->modelName." WHERE id = :id;");
                $usepdo->bindParam(':id',$id);
                $usepdo->execute();
            }
            catch(PDOException $e)
            {
                echo "<script>alert('".$e->getMessage()."'); location.href=''</script>";
            }
        }

        /**
         * 刪除區域輔導中心全年度教育講座資料
         * @param uaccid 區域輔導中心編號
         */
        function deleteByYearAndUACCID($conn,$year,$uaccid)
        {
            try
            {
                $usepdo = $conn->prepare("DELETE FROM ".$this->modelName."WHERE uaccid = :uaccid and year=:year;");
                $usepdo->bindParam(':uaccid',$uaccid);
                $usepdo->bindParam(':year',$year);
                $usepdo->execute();
            }
            catch(PDOException $e)
            {
                echo "<script>alert('".$e->getMessage()."'); location.href=''</script>";
            }
        }

    }
?>