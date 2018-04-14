<?php

    class VISIT
    {
        private $modelName = "VISIT";

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
         * 新增訪視指導資料
         * @param uaccid 區域輔導中心編號
         * @param year 學年度
         * @param sid 訪視學校 id
         * @param date 日期
         * @param purpose 訪視目的
         */
        function create($conn,$uaccid, $year, $date_, $memberType, $schoolName, $purpose, $num)
        {
            try
            {
                $usepdo = $conn->prepare("INSERT INTO ".$this->modelName." (uaccid, year, date, memberType, schoolName, purpose, num) VALUES(:uaccid, :year, :date_, :memberType, :schoolName, :purpose, :num);");
                $usepdo->bindParam(':uaccid',$uaccid);
                $usepdo->bindParam(':year',$year);
                $usepdo->bindParam(':date_',$date_);
                $usepdo->bindParam(':memberType',$memberType);
                $usepdo->bindParam(':schoolName',$schoolName);
                $usepdo->bindParam(':purpose',$purpose);
                $usepdo->bindParam(':num',$num);
                $usepdo->execute();
                return true;
            }
            catch(PDOException $e){
                echo "<script>alert('".$e->getMessage()."'); location.href='coach_visit_rec_add.php'</script>";
            }            
        }

        /**
         * 使用 id 取得單筆訪視指導資料
         * @param id 訪視指導資料編號
         * @return 
         *      success : 訪視指導資料(DataTable)
         *      fail : null
         */
        function getByID($conn,$id)
        {
            try
            {
                $usepdo = $conn->prepare("SELECT * FROM ".$this->modelName." WHERE id=:id;");
                $usepdo->bindParam(':id',$id);
                $usepdo->execute();

                //取得傳回值

                $sql = $usepdo->fetchAll(); 

                if($sql)
                {
                    return $sql;
                }
                else
                {
                    echo "<script>alert('查無資料')</script>";
                }
            }
            catch(PDOException $e){
                echo "<script>alert('".$e->getMessage()."'); location.href='coach_visit_rec_revise.php'</script>";
            }
        }

        /**
         * 取得學校單年度訪視指導資料
         * @param sid 學校編號
         * @param year 學年度
         * @return 
         *      success : 訪視指導資料(DataTable)
         *      fail : null
         */
        function listByUACCIDAndYear($conn, $uaccid, $year)
        {
            try
            {
                $usepdo = $conn->prepare("SELECT * FROM ".$this->modelName." WHERE uaccid = :uaccid AND year = :year;");
                $usepdo->bindParam(':uaccid',$uaccid);
                $usepdo->bindParam(':year',$year);
                $usepdo->execute();
                
                $sql = $usepdo->fetchAll();

                return $sql;      
            }
            catch(Exception $e)
            {
                echo "<script>alert('".$e->getMessage()."'); location.href='coach_visit_rec_add.php'</script>";
            }            
        }


        /**
         * 取得全部區域輔導中心單年度訪視指導資料
         * @return 
         *      success : 訪視指導資料(DataTable)
         *      fail : null
         */
        function listByYear($conn,$year)
        {
            try
            {
                $usepdo = $conn->prepare("SELCT * FROM ".$this->modelName." WHERE YEAR = :year;");
                $usepdo->bindParam(':year',$year);
                $usepdo->execute();
                $sql = $usepdo->fetchAll();
                if($sql){
                    return $sql;
                }
                else
                {
                    return null;
                }   
            }
            catch(PDOException $e)
            {
                echo $e->getMessage()."<br>";
            }            
        }

        /**
         * 修改訪視指導資料
         * @param id 訪視指導資料編號
         * ### 欄位陣列 與 資料陣列 順序必須對齊 ###
         * @param fields 欄位(陣列)   e.g. : string[] fields = { "name", "country" };
         * @param values 資料(陣列)   e.g. : object[] fields = { "中原大學", "桃園市" };
         */
        function updateByID($conn, $id, $schoolName, $purpose, $memberType, $date_, $num)
        {
            try
            {
                $usepdo = $conn->prepare("UPDATE ".$this->modelName." SET schoolName=:name,purpose=:purpose,memberType=:memberType,date=:date,num=:num WHERE id=:id;");
                $usepdo->bindParam(':id',$id);
                $usepdo->bindParam(':name',$schoolName);
                $usepdo->bindParam(':purpose',$purpose);
                $usepdo->bindParam(':memberType',$memberType);
                $usepdo->bindParam(':date',$date_);
                $usepdo->bindParam(':num',$num);
                $usepdo->execute();
                return true;         
            }
            catch(Exception $e)
            {
                echo "<script>alert('".$e->getMessage()."');</script>";
                return false;
            }
        }

        /**
         * 刪除單筆訪視指導資料
         * @param id 訪視指導資料編號
         */
        function deleteByID($conn,$id)
        {
            try
            {
                $usepdo = $conn->prepare("DELETE FROM ".$this->modelName." WHERE id = :id;");
                $usepdo->bindParam(":id",$id);
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

        /**
         * 刪除區域輔導中心全年度訪視指導資料
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