<?php
    class SCHOOL
    {
        private $modelName = "SCHOOL";

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
         * 新增學校
         * @param code 學校代碼
         * @param name 學校名稱
         * @param country 所屬縣市
         * @param address 地址
         * @param phone 電話
         * @param level 學校層級
         * @return sid (long)
         */

        function create($conn,$code,$name,$country,$address,$phone,$level)
        {
            try
            {
                $usepdo = $conn->prepare("INSERT INTO ".$this->modelName." (code, name, country, address, phone, level) VALUES(:code, :name, :country, :address, :phone, :level);");
                $usepdo->bindParam(':code',$code);
                $usepdo->bindParam(':country',$country);
                $usepdo->bindParam(':name',$name);
                $usepdo->bindParam(':address',$address);
                $usepdo->bindParam(':phone',$phone);
                $usepdo->bindParam(':level',$level);
                $usepdo->execute();
                return true;
            }
            catch(PDOException $e){
                echo "<script>console.log('".$e->getMessage()."'); location.href=''</script>";
            }
        }


        /**
         * 使用 name 取得單一學校資料
         * @param name 學校編號
         * @return 
         *      success : 學校資料(DataTable)
         *      fail : null
         */
        function getSchoolByName($conn,$name)
        {
            try
            {
                $usepdo = $conn->prepare("SELECT * FROM ".$this->modelName." WHERE name=:name;");
                $usepdo->bindParam(':name',$name);
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
         * 使用 sid 取得單一學校資料
         * @param sid 學校編號
         * @return 
         *      success : 學校資料(DataTable)
         *      fail : null
         */
        function getSchoolBySID($conn,$sid)
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
         * 使用 code (學校代碼)取得單一學校資料
         * @param code 學校代碼
         * @return 
         *      success : 學校資料(DataTable)
         *      fail : null
         */
        function getSchoolByCode($conn,$code)
        {
            try
            {
                $usepdo = $conn->prepare("SELECT * FROM ".$this->modelName." WHERE code=:code;");
                $usepdo->bindParam(':code',$code);
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
         * 使用 sid 取得學校所屬縣市資料
         * @param sid 學校編號
         * @return 
         *      success : 縣市名稱
         *      fail : null
         */
        function getCountryBySID($conn,$sid)
        {
            try
            {
                $usepdo = $conn->prepare("SELECT country FROM ".$this->modelName." WHERE sid=:sid;");
                $usepdo->bindParam(':sid',$sid);
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
         * 使用 code (學校代碼)取得學校所屬縣市資料
         * @param code 學校代碼
         * @return 
         *      success : 縣市名稱
         *      fail : null
         */
        function getCountryByCode($conn,$code)
        {
            try
            {
                $usepdo = $conn->prepare("SELECT country FROM ".$this->modelName." WHERE code=:code;");
                $usepdo->bindParam(':code',$code);
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
         * 取得年度已申請學校數量
         * @return 
         *      success : 已申請學校數量
         *      fail : null
         */
        function getApplyNumByYear($conn,$year)
        {
            try
            {
                $usepdo = $conn->prepare("SELECT count(sid) as num FROM country_school_funding WHERE year = :year AND (StaffCosts+AgencyCost+DeviceCost) > 0;");
                $usepdo->bindParam(':year',$year);
                $usepdo->execute();
                $sql = $usepdo->fetchAll();

                if($sql){
                    return $sql[0]["num"];
                }
            }
            catch(PDOException $e){
                echo "<script>alert('".$e->getMessage()."')</script>";
                header("Location:.php");
            }
        }

        /**
         * 取得全部學校資料
         * @return 
         *      success : 學校資料(DataTable)
         *      fail : null
         */
        function list_($conn)
        {           
            try
            {
                $usepdo = $conn->prepare("SELECT * FROM ".$this->modelName.";");
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
         * 取得全部學校資料 By 所屬縣市
         * @return 
         *      success : 學校資料(DataTable)
         *      fail : null
         */
        function listByCountry($conn,$country)
        {
            try
            {
                $usepdo = $conn->prepare("SELECT * FROM ".$this->modelName." WHERE country=:country;");
                $usepdo->bindParam(':country',$country);
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
         * 取得全部學校資料 By 所屬縣市
         * @return 
         *      success : 學校資料(DataTable)
         *      fail : null
         */
        function listActivedSchoolByCountry($conn,$country)
        {
            try
            {
                $usepdo = $conn->prepare("SELECT * FROM ".$this->modelName." WHERE country=:country AND is_actived = 1;");
                $usepdo->bindParam(':country',$country);
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
         * 取得全部學校資料 By 所屬縣市
         * @return 
         *      success : 學校資料(DataTable)
         *      fail : null
         */
        function listPartnerSchoolBySID($conn,$mainSID,$year)
        {
            try
            {
                $usepdo = $conn->prepare("SELECT b.* FROM SCHOOL_INFO a INNER JOIN ".$this->modelName."b ON( a.sid = b.sid ) WHERE a.main_sid = :main_sid AND a.year = :year;");
                $usepdo->bindParam(':year',$year);
                $usepdo->bindParam('main_sid',$mainSID);
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
         * 取得全部學校經費資料 By 所屬縣市
         * @param country 所屬縣市
         * @param year 學年度
         * @param type 學校類型
                0 : 全部學校
                1 : 膺續學校
                2 : 新申請學校
         * @return 
         *      success : 學校資料(DataTable)
         *      fail : null
         */
        function listFundingByCountry($conn,$country,$year,$isNew)
        {
            $selectByType = "";   // 查詢學校類型 若為空字串則查詢全部學校
            switch ($isNew)
            {
                // 膺續學校
                case "0":
                    $selectByType = " AND  isNew = 0 ";
                    break;
                // 新申請學校
                case "1":
                    $selectByType = " AND  isNew = 1 ";
                    break;
            }
            try
            {
                $usepdo = $conn->prepare("SELECT B.uid, B.name as user_name, A.* FROM guardian.country_school_funding A LEFT JOIN user B ON (A.sid = B.sid) where country = :country  AND ( year = :year OR !empty(:year) ) ".$selectByType.";");
                $usepdo->bindParam(':year',$year);
                $usepdo->bindParam('country',$country);
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
         * 修改學校資料
         * @param sid 使用者編號
         * ### 欄位陣列 與 資料陣列 順序必須對齊 ###
         * @param fields 欄位(陣列)   e.g. : string[] fields = { "name", "country" };
         * @param values 資料(陣列)   e.g. : object[] fields = { "中原大學", "桃園市" };
         */
        function updateBySID($conn,$sid)
        {
            // $string = "";
            // foreach($mem_type as $row)
            // {
            //     $string .= $row.",";
            // }
            // $num = (int)$mem_num;
            // try
            // {
            //     $usepdo = $conn->prepare("UPDATE ".$this->modelName." SET date = :date,type = :type, location = :location, num = :num WHERE id = :id;");
            //     $usepdo->bindParam(":date",$time_);
            //     $usepdo->bindParam(":type",$string);
            //     $usepdo->bindParam(":location",$location);
            //     $usepdo->bindParam(":num",$num);
            //     $usepdo->bindParam(":id",$id);
            //     $usepdo->execute();
            //     return true;
            // }
            // catch(PDOException $e)
            // {
            //     return false;
            // }
        }

        /**
         * 刪除學校資料
         * @param sid 學校編號
         */
        function deleteBySID($conn,$sid)
        {            
            try
            {
                $usepdo = $conn->prepare("DELETE FROM ".$this->modelName." WHERE sid = :sid;");
                $usepdo->bindParam(":sid",$sid);
                $usepdo->execute();
                return true;
            }
            catch(PDOException $e)
            {
                echo $e->getMessage()."<br>";
                return false;
            }
        }

    }
?>