<?php
    class CONFERENCE
    {
        private $modelName = "CONFERENCE";

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
         * 新增會議召開資料
         * @param uaccid 區域輔導中心編號
         * @param year 學年度
         * @param name 會議名稱
         * @param date 日期
         * @param location 地點
         * @param attendee_file 參與者名單(名單檔案上傳路徑)
         */
        function create($conn,$uaccid,$year,$name,$mem_type,$date_,$location,$num,$isUpload)
        {
            $type = "";
            foreach($mem_type as $row)
            {
                $type.=$row.",";
            }
            try
            {
                $usepdo = $conn->prepare("INSERT INTO ".$this->modelName." (uaccid, year, name, type, date, location, num,isUpload) VALUES(:uaccid, :year, :name, :type, :date, :location, :num, :isUpload);");
                $usepdo->bindParam(':uaccid',$uaccid);
                $usepdo->bindParam(':year',$year);
                $usepdo->bindParam(':name',$name);
                $usepdo->bindParam(':type',$type);
                $usepdo->bindParam(':date',$date_);
                $usepdo->bindParam(':location',$location);
                $usepdo->bindParam(':num',$num);
                $usepdo->bindParam(':isUpload',$isUpload);
                $usepdo->execute();
                return true;
            }
            catch(PDOException $e){
                echo "<script>console.log('".$e->getMessage()."')</script>";
                header("Location:coach_meetinglist.php");
            }              
        }

        /**
         * 使用 id 取得單筆會議召開資料
         * @param id 會議召開資料編號
         * @return 
         *      success : 會議召開資料(DataTable)
         *      fail : null
         */
        function getByID($conn,$id)
        {
            try
            {
                $usepdo = $conn->prepare("SELECT * FROM ".$this->modelName." WHERE id=:id;");
                $usepdo->bindParam(':id',$id);
                $usepdo->execute();
                $sql = $usepdo->fetchAll();

                if($sql){
                    return $sql;
                }
            }
            catch(PDOException $e){
                echo "<script>alert('".$e->getMessage()."')</script>";
                header("Location:.php");
            }                 
        }

        /**
         * 取得學校單年度會議召開資料
         * @param sid 學校編號
         * @param year 學年度
         * @return 
         *      success : 會議召開資料(DataTable)
         *      fail : null
         */
        function listByUACCIDAndYear($conn,$uaccid,$year)
        {
            try
            {
                $usepdo = $conn->prepare("SELECT * FROM ".$this->modelName." WHERE uaccid=:ua AND year = :year;");
                $usepdo->bindParam(':ua',$uaccid);
                $usepdo->bindParam(':year',$year);
                $usepdo->execute();

                //取得傳回值

                $sql = $usepdo->fetchAll(); 

                if($sql)
                {
                    return $sql;
                }
            }
            catch(PDOException $e){
                echo $e->getMessage()."<br>";
                //header("Location:coach_service.php");
            }               
        }


        /**
         * 取得全部區域輔導中心單年度會議召開資料
         * @return 
         *      success : 會議召開資料(DataTable)
         *      fail : null
         */
        function listByYear($conn,$year)
        {
            try
            {
                $usepdo = $conn->prepare("SELECT * FROM ".$this->modelName." WHERE year=:year;");
                $usepdo->bindParam(':year',$year);
                $usepdo->execute();
            }
            catch(PDOException $e){
                echo "<script>alert('".$e->getMessage()."')</script>";
                header("Location:.php");
            }               
        }

        /**
         * 修改會議召開資料
         * @param id 會議召開資料編號
         * ### 欄位陣列 與 資料陣列 順序必須對齊 ###
         * @param fields 欄位(陣列)   e.g. : string[] fields = { "name", "country" };
         * @param values 資料(陣列)   e.g. : object[] fields = { "中原大學", "桃園市" };
         */
        function updateByID($conn,$id,$mem_type,$time_,$location,$mem_num)
        {
            $string = "";
            foreach($mem_type as $row)
            {
                $string .= $row.",";
            }
            $num = (int)$mem_num;
            try
            {
                $usepdo = $conn->prepare("UPDATE ".$this->modelName." SET date = :date,type = :type, location = :location, num = :num WHERE id = :id;");
                $usepdo->bindParam(":date",$time_);
                $usepdo->bindParam(":type",$string);
                $usepdo->bindParam(":location",$location);
                $usepdo->bindParam(":num",$num);
                $usepdo->bindParam(":id",$id);
                $usepdo->execute();
                return true;
            }
            catch(PDOException $e)
            {
                return false;
            } 
        }

        /**
         * 刪除單筆會議召開資料
         * @param id 會議召開資料編號
         */
        function deleteByID($conn,$id)
        {
            try
            {
                $usepdo = $conn->prepare("DELETE FROM ".$this->modelName." WHERE ID = :id;");
                $usepdo->bindParam(":id",$id);
                $usepdo->execute();
                return true;
            }
            catch(PDOException $e)
            {
                echo $e->getMessage()."<br>";
                return false;
            }             
        }

        /**
         * 刪除區域輔導中心全年度會議召開資料
         * @param uaccid 區域輔導中心編號
         */
        function deleteByYearAndUACCID($conn,$year, $uaccid)
        {
            try
            {
                $usepdo = $conn->prepare("DELETE FROM ".$this->modelName." WHERE year = :year and uaccid = :uaccid;");
                $usepdo->bindParam(":year",$year);
                $usepdo->bindParam(":uaccid",$uaccid);
                $usepdo->execute();
                if($code){
                    return true;
                }
            }
            catch(PDOException $e)
            {
                echo $e->getMessage()."<br>";
            }             
        }
    }
?>