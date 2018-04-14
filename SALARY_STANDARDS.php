<?php
    class SALARY_STANDARDS
    {
        private $modelName = "SALARY_STANDARDS";
        private MySQL_Utils db;

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

        public SALARY_STANDARDS(){
            this.db = new DataProvider.MySQL_Utils(ConfigurationManager.ConnectionStrings["localhost"].ToString());
        }

        /**
         * 使用 年資 & 學歷 取得薪資標準表資料
         * @param year 年資
         * @param grade 學歷
         * @return 
         *      success : 薪資標準表資料(DataTable)
         *      fail : null
         */
        function getByYearAndGrade($conn, $year, $grade)
        {
            try
            {
                $usepdo = $conn->prepare("SELECT * FROM ".$this->modelName." WHERE year=:year AND grade = :grade;");
                $usepdo->bindParam(':year',$year);
                $usepdo->bindParam(':grade',$grade);
                $usepdo->execute();

                //取得傳回值

                $sql = $usepdo->fetchAll(); 

                if($sql)
                {
                    return $sql;
                }
                else
                {
                    throw new Exception("database error");                                   
                }
            }
            catch(PDOException $e){
                echo "<script>alert('".$e->getMessage()."')</script>";
                header("Location:campus_add.php");
            }            
        }

        /**
         * 取得全部薪資標準表資料
         * @return 
         *      success : 薪資標準表資料(DataTable)
         *      fail : null
         */
        public DataTable list()
        {
            return db.Query($"SELECT * FROM {this.modelName}");
        }

        
    }
?>