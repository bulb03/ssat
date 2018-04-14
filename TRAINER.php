<?php
    class TRAINER
    {
        private $modelName = "TRAINER";

        function connect_db()
        {
            $servername = "localhost";
            $dbname = "guardian";
            $account = "root";
            $password = "1234"; 
            try{
                //資料庫連線
                session_start();
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
         * 新增防護員資料
         * @param certificateNo 證書編號
         * @param name 姓名
         * @param grade 學歷
         * @return id 工作人員資料編號(long)
         */
        function create($conn, $certificateNo, $name, $grade)
        {
            $title = substr($certificateNo, 0, 2)=="物字" ? "PT" : "AT";

            try{
                //輸入mysql指令，使用prepare

                $usepdo = $conn->prepare("INSERT INTO ".$this->modelName."(certificate_no, name, grade, title) VALUES(:certificate_no, ;name, :grade, :title)");
                $usepdo->bindParam(':certificate_no',$certificate_no);
                $usepdo->bindParam(':name',$name);
                $usepdo->bindParam(':grade',$grade);
                $usepdo->bindParam(':title',$title);

                $usepdo->execute();
            }
            catch(PDOException $e)
            {
                echo $e->getMessage()."<br>";
                header("Location:campus_add.php");
            } 
        }

        /**
        * 使用 學校編號 & 學年度 取得防護員資料
        * @param sid 學校編號
        * @param year 學年度
        * @return 
        *      success : 工作人員資料(DataTable)
        *      fail : null
        */
        function getTrainerBySIDAndYear($conn,$sid,$year)
        {
           try{
                $usepdo = $conn->prepare("SELECT b.* FROM TRAINER_SALARY a INNER JOIN TRAINER b ON ( a.tid = b.tid ) WHERE a.sid = :sid AND a.year = :year");
                $usepdo->execute();
                $sql = $usepdo->fetchAll();
                if($sql){
                    return $sql;
                }
            }
            catch(PDOException $e)
            {
                echo "<script>alert('database error');</script>";
                header("Location:.php");
            }     
        }

        /**
         * 使用 tid 取得防護員資料
         * @param tid 防護員編號(不是證書號)
         * @return 
         *      success : 工作人員資料(DataTable)
         *      fail : null
         */
        function getTrainerByTID($conn, $tid)
        {
            try
            {
                $usepdo = $conn->prepare("SELECT * FROM ".$this->modelName." WHERE tid=:tid;");
                $usepdo->bindParam(':tid',$tid);
                $usepdo->execute();

                //取得傳回值

                $sql = $usepdo->fetchAll(); 

                if($sql)
                {
                    return $sql;
                }
            }
            catch(PDOException $e){
                echo "<script>alert('".$e->getMessage()."');</script>";
                header("Location:campus_add.php");
            }            
        }

        /**
         * 使用 證書號 取得防護員資料
         * @param certificateNo 證書號
         * @return 
         *      success : 工作人員資料(DataTable)
         *      fail : null
         */
        function getTrainerByCertificateNo($conn, $certificateNo)
        {
            try
            {
                $usepdo = $conn->prepare("SELECT * FROM ".$this->modelName." WHERE certificate_no=:certificate_no;");
                $usepdo->bindParam(':certificate_no',$certificateNo);
                $usepdo->execute();

                //取得傳回值

                $sql = $usepdo->fetchAll(); 

                if($sql)
                {
                    return $sql;
                }
            }
            catch(PDOException $e){
                echo "<script>alert('".$e->getMessage()."');</script>";
                header("Location:campus_add.php");
            }              
        }

        /**
         * 取得全部防護員資料
         * @return 
         *      success : 防護員資料(DataTable)
         *      fail : null
         */
        function list_($conn)
        {
           try{
                $usepdo = $conn->prepare("SELECT * FROM ".$this->modelName);
                $usepdo->execute();
                $sql = $usepdo->fetchAll();
                if($sql){
                    return $sql;
                }
            }
            catch(PDOException $e)
            {
                echo "<script>alert('database error');</script>";
                header("Location:.php");
            }            
        }

        /**
         * 修改防護員資料
         * @param tid 防護員編號(不是證書號)
         * ### 欄位陣列 與 資料陣列 順序必須對齊 ###
         * @param fields 欄位(陣列)   e.g. : string[] fields = { "name", "country" };
         * @param values 資料(陣列)   e.g. : object[] fields = { "中原大學", "桃園市" };
         */
        function updateByTID($conn, $tid, $fields, $name, $grade)
        {
            for ($i=0; $i < count($fields)-1; $i++) { 
                if($fields[$i]=="tid")
                {
                    echo "<script>alert('不可變更特定欄位')</script>";
                    header("Location:campus_add.php");
                }
            }
           try{
                $usepdo = $conn->prepare("UPDATE ".$this->modelName." SET name=:name, grade=:grade WHERE tid=:tid;");
                $usepdo->bindParam(':name',$name);
                $usepdo->bindParam(':grade',$grade);
                $usepdo->bindParam(':tid',$tid);
                $usepdo->execute();

            }
            catch(PDOException $e)
            {
                echo "<script>alert('database error');</script>";
                header("Location:campus_add.php");
            }            
        }

        /**
         * 修改防護員資料 by 證書號
         * @param certificateNo 防護員證書號
         * ### 欄位陣列 與 資料陣列 順序必須對齊 ###
         * @param fields 欄位(陣列)   e.g. : string[] fields = { "name", "country" };
         * @param values 資料(陣列)   e.g. : object[] fields = { "中原大學", "桃園市" };
         */
        function updateByCertificateNo($conn,$certificateNo,$fields, $values)
        {
            // if (Array.IndexOf(fields, "tid") != -1)
            //     throw new Exception("不可變更特定欄位");

            // string[] conditions = { "certificate_no" };
            // object[] conditionParams = { certificateNo };
            // return db.update(this.modelName, fields, values, conditions, conditionParams);
        }

        /**
         * 刪除單筆防護員資料
         * @param id 防護員資料編號
         */
        function deleteByID($conn,$tid)
        {
           try{
                $usepdo = $conn->prepare("delete from ".$this->modelName."  WHERE tid=:tid;");
                $usepdo->bindParam(':tid',$tid);
                $usepdo->execute();

            }
            catch(PDOException $e)
            {
                echo "<script>alert('database error');</script>";
                header("Location:.php");
            }
        }

    }
?>