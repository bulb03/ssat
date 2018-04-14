<?php
    class EXPIRE
    {
        private $modelName = "EXPIRE";


        function getExpireByYear(){
            $servername = "localhost";
            $dbname = "guardian";
            $account = "root";
            $password = "1234"; 
            try{
                //資料庫連線
                
                $conn = new PDO("mysql:host=$servername;dbname=$dbname",$account,$password);
                $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                $usepdo = $conn->prepare("SELECT * FROM ".$this->modelName." WHERE year = :year;");
                $usepdo->bindParam(':year',$year);
                $usepdo->execute();

                //取得傳回值

                $sql = $usepdo->fetchAll(); 

                if($sql)
                {
                    return $sql;
                }
            }
            catch(PDOException $e)
            {
                echo $e->getMessage()."<br>";
            } 
        }
    }
?>