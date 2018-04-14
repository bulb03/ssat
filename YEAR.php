<?php
    
    class YEAR
    {
        private $modelName = "YEAR";

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
         * 新增年度資料
         * @param year 當前學年度
         */
        function create($conn,$year)
        {
            try
            {
                $usepdo = $conn->prepare("INSERT INTO ".$this->modelName."
                    ('year') VALUES (:year);");
                $usepdo->bindParam(':year',$year);
                $usepdo->execute();
            }
            catch(PDOException $e)
            {
                echo $e->getMessage();
            }
        }

        /**
        * 取得當前學年度(最後新增的年度
        * @return 
        *      success : 年度(int)
        *      fail : null
        */
        function getCurrentYear($conn)
        {
            try
            {
                $usepdo = $conn->prepare("SELECT year FROM YEAR ORDER BY id DESC LIMIT 1;");
                $usepdo->execute();

                //取得傳回值

                $sql = $usepdo->fetchAll(); 

                if($sql){
                    return $sql[0][0];
                }
            }
            catch(PDOException $e){
                echo "<script>alert('".$e->getMessage()."'); location.href=''</script>";
            }
        }

        /**
         * 取得全部使用者資料
         * @return 
         *      success : 使用者資料(DataTable)
         *      fail : null
         */
        function list_($conn)
        {
            try
            {
                $usepdo = $conn->prepare("SELECT DISTINCT(year) FROM ".$this->modelName.";");
                $usepdo->execute();

                //取得傳回值

                $sql = $usepdo->fetchAll(); 

                if($sql){
                    return $sql;
                }
            }
            catch(PDOException $e){
                echo "<script>alert('".$e->getMessage()."'); location.href='School.php'</script>";
            }            
        }


    }
?>