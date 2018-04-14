<?php
    //這行要放外面
    include_once dirname(__FILE__).'/Utils.php';

    class TRAINER_SALARY_REAL
    {
        private $modelName = "TRAINER_SALARY_REAL";


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
         * 新增防護員年度薪資資料
         * @param sid 學校編號
         * @param tid 防護員編號
         * @param year 學年度
         * @param grade 學歷
         * @param salary 薪資
         * @param labor 公提勞保費
         * @param injury 公提職災費
         * @param employment_insurance 普通事故9.5%及就業保險費1%
         * @param NHI 公提健保費
         * @param retirement 公提勞退金
         * @param bonus 年終獎金
         * @param insurance 補充保費
         * @return id 防護員年度薪資資料編號(long)
         */
        function create($conn, $sid,$tid,$year,$grade,$salary,$labor,$injury,$employment_insurance,$NHI,$retirement,$nominator_bonus,$nominator_insurance,$month,$bonusMonth)
        {
            date_default_timezone_set('Asia/Taipei');
            $date_Year = date("Y");
            $date_Month = date("m");
            $date_Day = date("d");
            $timestamp = strtotime($date_Year.$date_Month.$date_Day);

            try{
                //輸入mysql指令，使用prepare

                $usepdo = $conn->prepare("INSERT INTO ".$this->modelName."(sid, tid, year, grade, salary, labor, injury, employment_insurance, NHI, retirement, bonus, insurance, month, bonus_month,createAt) VALUES(:sid, :tid, :year, :grade, :salary, :labor, :injury, :employment_insurance, :NHI, :retirement, :bonus, :insurance, :month, :bonus_month,:createAt)");
                $usepdo->bindParam(':sid',$sid);
                $usepdo->bindParam(':tid',$tid);
                $usepdo->bindParam(':year',$year);
                $usepdo->bindParam(':grade',$grade);
                $usepdo->bindParam(':salary',$salary);
                $usepdo->bindParam(':labor',$labor);
                $usepdo->bindParam(':injury',$injury);
                $usepdo->bindParam(':employment_insurance',employment_insurance);
                $usepdo->bindParam(':NHI',$NHI);
                $usepdo->bindParam(':retirement',$retirement);
                $usepdo->bindParam(':bonus',$bonus);
                $usepdo->bindParam(':insurance',$insurance);
                $usepdo->bindParam(':month',$month);
                $usepdo->bindParam(':bonus_month',$bonus_month);
                $usepdo->bindParam(':createAt',$timestamp);
                $usepdo->execute();
            }
            catch(PDOException $e)
            {
                echo $e->getMessage()."<br>";
                header("Location:campus_add.php");
            }            
        }

        function getCostsTotal($conn,$salaryList)
        {
            $total = 0;
            for ($i = 0; $i < count($salaryList); $i++)
            {
                $bonus = $salaryList[$i]["bonus"] * $salaryList[$i]["bonus_month"] / 12;
                $insurance = $salaryList[$i]["insurance"] * $salaryList[$i]["bonus_month"] / 12;

                $total += (
                    (int)$salaryList[$i]["salary"] * (int)$salaryList[$i]["month"]+ 
                    (int)$salaryList[$i]["labor"] * (int)$salaryList[$i]["month"] +
                    (int)$salaryList[$i]["injury"] * (int)$salaryList[$i]["month"] +
                    (int)$salaryList[$i]["NHI"] * (int)$salaryList[$i]["month"] +
                    (int)$salaryList[$i]["retirement"] * (int)$salaryList[$i]["month"] +
                    (int)$bonus[0]["f0"] +
                    (int)$insurance[0]["f0"]
                );
            }
            return $total;
        }

        function getCostsTotal_($conn,$salaryRow)
        {
            $bonus = (int)$salaryRow[0]["bonus"] * (int)$salaryRow[0]["bonus_month"] / 12;
            $insurance = (int)$salaryRow[0]["insurance"] * (int)$salaryRow[0]["bonus_month"] / 12;

            $total = (
                (int)($salaryRow[0]["salary"]) * (int)($salaryRow[0]["month"]) +
                (int)($salaryRow[0]["labor"]) * (int)($salaryRow[0]["month"]) +
                (int)($salaryRow[0]["injury"]) * (int)($salaryRow[0]["month"]) +
                (int)($salaryRow["NHI"]) * (int)($salaryRow["month"]) +
                (int)($salaryRow["retirement"]) * (int)($salaryRow["month"]) +
                (int)($bonus("f0"))  +
                (int)($insurance.ToString("f0"))
            );

            return total;
        }

        /**
        * 使用 證書號 取得防護員年資
        * @param sid 學校編號
        * @param year 學年度
        * @return 
        *      success : 工作人員資料(DataTable)
        *      fail : null
        */
        function getYearByCertificateNo($conn,$certificateNo)
        {
            $salaryInfo = $this->listByCertificateNo($conn,$certificateNo);

            $year = 0;
            $month = 0;
            for ($i = 0; $i < count($salaryInfo[0]); $i++)
            {
                if ($salaryInfo[$i]["year"] != null && (int)$salaryInfo[$i]["year"] != 0 && (int)$salaryInfo[$i]["year"] != (int)$utils->currentSchoolYear())
                    $month += $salaryInfo[$i]["month"];
            }
            return ($month % 12 >= 10) ? ($month/12 + 1) : $month/12;
        }

        /**
        * 使用 證書號 取得防護員年資
        * @param sid 學校編號
        * @param year 學年度
        * @return 
        *      success : 工作人員資料(DataTable)
        *      fail : null
        */
        function getYearByTid($conn,$tid)
        {
            $utils = new Utils;

            $salaryInfo = $this->listByTID($conn,$tid);

            $year = 0;
            $month = 0;
            for ($i = 0; $i < count($salaryInfo[0]); $i++)
            {
                // if ($salaryInfo[$i]["year"] != null && (int)$salaryInfo[$i]["year"] != 0 && (int)$salaryInfo[$i]["year"] != (int)$utils->currentSchoolYear())
                //     $month += (int)$salaryInfo[$i]["month"];
            }
            return ($month % 12 >= 10) ? ($month / 12 + 1) : $month / 12;
        }

        /**
        * 使用 學校編號 & 學年度 取得防護員薪資資料
        * @param sid 學校編號
        * @param year 學年度
        * @return 
        *      success : 工作人員資料(DataTable)
        *      fail : null
        */
        function getTrainerSalaryBySIDAndYear($conn, $sid, $year)
        {
            try
            {
                $usepdo = $conn->prepare("SELECT * FROM ".$this->modelName." WHERE sid=:sid AND year = :year;");
                $usepdo->bindParam(':sid',$sid);
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
                echo "<script>alert('".$e->getMessage()."')</script>";
                header("Location:campus_add.php");
            }
        }

        /**
        * 使用 學校編號 & 學年度 取得防護員薪資差額表
        * @param sid 學校編號
        * @param year 學年度
        * @return 
        *      success : 工作人員資料(DataTable)
        *      fail : null
        */
        function getTrainerSalaryDiffBySIDAndYear($conn,$sid,$year)
        {
            try
            {
                $usepdo = $conn->prepare("SELECT sid,year,tid,real_tid,grade,real_grade,salary,real_salary,(salary - if (isnull(real_salary), 0, real_salary)) as diff_salary,labor,real_labor,(labor - if (isnull(real_labor), 0, real_labor)) as diff_labor,injury,real_injury,(injury - if (isnull(real_injury), 0, real_injury)) as diff_injury,employment_insurance,real_employment_insurance,(employment_insurance - if (isnull(real_employment_insurance), 0, real_employment_insurance)) as diff_employment_insurance,NHI,real_NHI,(NHI - if (isnull(real_NHI), 0, real_NHI)) as diff_NHI,retirement,real_retirement,(retirement - if (isnull(real_retirement), 0, real_retirement)) as diff_retirement,bonus,real_bonus,(bonus - if (isnull(real_bonus), 0, real_bonus)) as diff_bonus,insurance,real_insurance,(insurance - if (isnull(real_insurance), 0, real_insurance)) as diff_insurance,month,real_month,real_bonus_month FROM trainer_salary_difference WHERE sid = :sid AND year = :year;");
                $usepdo->bindParam(':sid',$sid);
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
                echo "<script>alert('".$e->getMessage()."')</script>";
                header("Location:.php");
            }            

        }

        /**
         * 使用 tid 取得防護員薪資資料
         * @param tid 防護員編號(不是證書號)
         * @return 
         *      success : 工作人員資料(DataTable)
         *      fail : null
         */
        function getTrainerSalaryByTID($conn,$tid)
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
                echo "<script>alert('".$e->getMessage()."')</script>";
                header("Location:.php");
            }            
        }

        /**
         * 使用 證書號 取得單年度防護員薪資資料
         * @param certificateNo 證書號
         * @param year 學年度
         * @return 
         *      success : 工作人員資料(DataTable)
         *      fail : null
         */
        function getTrainerSalaryByCertificateNo($conn,$certificateNo,$year)
        {
            try
            {
                $usepdo = $conn->prepare("SELECT a.certificate_no, a.name, a.grade, b.* FROM TRAINER a INNER JOIN TRAINER_SALARY_REAL b ON(a.tid = b.tid) WHERE a.certificate_no = :certificate_no AND b.year = :year;");
                $usepdo->bindParam(':certificate_no',$certificate_no);
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
                echo "<script>alert('".$e->getMessage()."')</script>";
                header("Location:.php");
            }            
        }

        /**
         * 取得全部防護員薪資資料
         * @return 
         *      success : 防護員資料(DataTable)
         *      fail : null
         */
        function list_($conn)
        {
            try
            {
                $usepdo = $conn->prepare("SELECT * FROM ".$this->modelName);
                $usepdo->execute();

                //取得傳回值

                $sql = $usepdo->fetchAll(); 

                if($sql)
                {
                    return $sql;
                }
            }
            catch(PDOException $e){
                echo "<script>alert('".$e->getMessage()."')</script>";
                header("Location:.php");
            }            
        }

        /**
         * 取得單年度全部防護員薪資資料
         * @return 
         *      success : 防護員資料(DataTable)
         *      fail : null
         */
        function listByYear($conn,$year)
        {
            try
            {
                $usepdo = $conn->prepare("SELECT * FROM ".$this->modelName." WHERE year = :year");
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
                echo "<script>alert('".$e->getMessage()."')</script>";
                header("Location:.php");
            }            
        }

        /**
         * 取得特定學校全部防護員薪資資料
         * @param sid 學校編號
         * @return 
         *      success : 防護員資料(DataTable)
         *      fail : null
         */
        function listBySID($conn,$sid)
        {            
            try
            {
                $usepdo = $conn->prepare("SELECT * FROM ".$this->modelName." WHERE sid = :sid");
                $usepdo->bindParam(':sid',$sid);
                $usepdo->execute();

                //取得傳回值

                $sql = $usepdo->fetchAll(); 

                if($sql)
                {
                    return $sql;
                }
            }
            catch(PDOException $e){
                echo "<script>alert('".$e->getMessage()."')</script>";
                header("Location:.php");
            }            
        }

        /**
         * 取得特定防護員歷年薪資資料
         * @param tid 防護員編號
         * @return 
         *      success : 防護員資料(DataTable)
         *      fail : null
         */
        function listByTID($conn,$tid)
        {    
            try
            {
                $usepdo = $conn->prepare("SELECT * FROM ".$this->modelName." WHERE tid = :tid");
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
                echo "<script>alert('".$e->getMessage()."')</script>";
                header("Location:.php");
            }
        }

        /**
         * 取得縣市內所有防護員薪資資料
         * @param year 學年度
         * @param country 縣市
         * @return 
         *      success : 防護員資料(DataTable)
         *      fail : null
         */
        function listByCountry($conn,$year,$country)
        {
            try
            {
                $usepdo = $conn->prepare("SELECT B.* FROM SCHOOL A INNER JOIN TRAINER_SALARY_REAL B ON ( A.sid = B.sid ) WHERE A.country = :country AND B.year = :year;");
                $usepdo->bindParam(':country',$country);
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
                echo "<script>alert('".$e->getMessage()."')</script>";
                header("Location:.php");
            }            
        }

        /**
         * 取得特定防護員歷年薪資資料 By 證書號
         * @param certificateNo 防護員證書號
         * @return 
         *      success : 防護員資料(DataTable)
         *      fail : null
         */
        function listByCertificateNo($conn,$certificateNo)
        {
            try
            {
                $usepdo = $conn->prepare("SELECT a.certificate_no, a.name, a.grade, b.* FROM TRAINER a INNER JOIN TRAINER_SALARY_REAL b ON(a.tid = b.tid) WHERE a.certificate_no = :certificate_no;");
                $usepdo->bindParam(':certificate_no',$certificate_no);
                $usepdo->execute();

                //取得傳回值

                $sql = $usepdo->fetchAll(); 

                if($sql)
                {
                    return $sql;
                }
            }
            catch(PDOException $e){
                echo "<script>alert('".$e->getMessage()."')</script>";
                header("Location:.php");
            }            
        }

        /**
         * 取得特定防護員歷年薪資資料 By 證書號 (不包含當學年度)
         * @param certificateNo 防護員證書號
         * @return 
         *      success : 防護員資料(DataTable)
         *      fail : null
         */
        function listHistoryByCertificateNo($conn,$certificateNo)
        {
            $utils = new Utils;

            $year = $utils->currentSchoolYear();
            try
            {
                $usepdo = $conn->prepare("SELECT a.certificate_no, a.name, a.grade, b.* FROM TRAINER a INNER JOIN TRAINER_SALARY_REAL b ON(a.tid = b.tid) WHERE a.certificate_no = :certificate_no AND b.year < :year;");
                $usepdo->bindParam(':certificate_no',$certificate_no);
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
                echo "<script>alert('".$e->getMessage()."')</script>";
                header("Location:.php");
            }
        }

        /**
         * 修改防護員薪資資料
         * @param id 防護員薪資資料編號
         * ### 欄位陣列 與 資料陣列 順序必須對齊 ###
         * @param fields 欄位(陣列)   e.g. : string[] fields = { "name", "country" };
         * @param values 資料(陣列)   e.g. : object[] fields = { "中原大學", "桃園市" };
         */
        function updateByID($conn, $id, $fields, $values)
        {

            for ($i=0; $i < count($fields)-1; $i++) { 
                if ($fields[$i]=="id")
                {
                    throw new Exception("不可變更特定欄位");
                }
                if ($fields[$i]=="sid")
                {
                    throw new Exception("不可變更特定欄位");
                }
                if ($fields[$i]=="year")
                {
                    throw new Exception("不可變更特定欄位");             
                }
            }
            try
            {
                $set_update_value = "";

                for ($i=0; $i < count($fields)-1; $i++) { 
                    $set_update_value += $fields[$i]."=:".$values[$i]." ";
                }

                $usepdo = $conn->prepare("UPDATE ".$this->modelName." SET ".$set_update_value."WHERE id=:id;");

                for ($i=0; $i < count($values); $i++) { 
                    $usepdo->bindParam($fields[$i],$values[$i]);
                }
                $usepdo->bindParam(':id',$id);
                $usepdo->execute();
                return true;         
            }
            catch(Exception $e)
            {
                echo "<script>alert('".$e->getMessage()."')</script>";
                header('Location:coach_visit_rec_revise.php');
            }                
        }

        /**
         * 刪除單筆防護員薪資資料
         * @param id 防護員薪資資料編號
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
         * 刪除學校年度防護員薪資資料
         */
        function deleteByYearAndSID($conn,$year,$sid)
        {
            try
            {
                $usepdo = $conn->prepare("DELETE FROM ".$this->modelName." WHERE sid = :sid AND year=:year;");
                $usepdo->bindParam(":sid",$sid);
                $usepdo->bindParam(":year",$year);
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