<?php
class SCHOOL_INFO
{
    private $modelName = "SCHOOL_INFO";

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
     * 判斷前一年是否有申請計畫
     * @param sid 學校編號
     * @param year 當學年度
     */
    function isNewSchool($conn,$sid,$year)
    {
        try
        {
            $usepdo = $conn->prepare("SELECT isNew FROM ".$this->modelName."WHERE sid = :sid AND year=:year;");
            $usepdo->bindParam(':sid',$sid);
            $usepdo->bindParam(':year',$year);
            $usepdo->execute();
            $sql = $usepdo->fetchAll();
            if($sql)
            {
                foreach ($sql as $row) {
                    if((int)$row[0]["isNew"]==1){
                        return true;
                    }
                    else{
                        return false;
                    }
                }
            }
            else{
                return true;
            }
        }
        catch(PDOException $e)
        {
            echo "<script>alert('".$e->getMessage()."'); location.href=''</script>";
        }        
    }

    /**
     * 新增學校年度基本資料
     * @param sid 學校編號
     * @param main_sid 所屬學校班號(主聘學校 = 0)
     * @param year 學年度
     * @param isNew 是否為新學年度
     * @param class_num 班級數量
     * @param c 班級特色(Text)
     * @param training_time 訓練時間(Text)
     * @param result 運動成績(Text)
     * @return id 學校年度基本資料編號(long)
     */
    function create($conn, $sid, $main_sid, $year, $isNew, $class_num, $trait, $training_time, $result)
    {
        try
        {
            $usepdo = $conn->prepare("INSERT INTO ".$this->modelName."(sid, main_sid, year, isNew, class_num, trait, training_time, result) VALUES (:sid, :main_sid, :year, :isNew, :class_num, :trait, :training_time, :result);");
            $usepdo->bindParam(':sid',$sid);
            $usepdo->bindParam(':main_sid',$main_sid);
            $usepdo->bindParam(':year',$year);
            $usepdo->bindParam(':isNew',$isNew);
            $usepdo->bindParam(':class_num',$class_num);
            $usepdo->bindParam(':trait',$trait);
            $usepdo->bindParam(':training_time',$training_time);
            $usepdo->bindParam(':result',$result);
            $usepdo->execute();
        }
        catch(PDOException $e)
        {
            echo "<script>alert('".$e->getMessage()."'); location.href=''</script>";
        }        
    }

    /**
     * 使用 id 取得單筆學校年度基本資料
     * @param id 學校年度基本資料編號
     * @return 
     *      success : 學校資料(DataTable)
     *      fail : null
     */
   function getSchoolInfoByID($conn,$id)
    {
        try
        {
            $usepdo = $conn->prepare("SELECT * FROM ".$this->modelName."WHERE id = :id;");
            $usepdo->bindParam(':id',$id);
            $usepdo->execute();
            $sql = $usepdo->fetchAll();
            if($sql)
            {
                return $sql;
            }
        }
        catch(PDOException $e)
        {
            echo "<script>alert('".$e->getMessage()."'); location.href=''</script>";
        }
    }

    /**
     * 使用 id 取得單筆學校年度基本資料
     * @param id 學校年度基本資料編號
     * @return 
     *      success : 學校資料(DataTable)
     *      fail : null
     */
    function getSchoolInfoBySIDAndYear($conn,$sid, $year)
    {
        try
        {
            $usepdo = $conn->prepare("SELECT * FROM ".$this->modelName."WHERE sid = :sid AND year=:year;");
            $usepdo->bindParam(':sid',$sid);
            $usepdo->bindParam(':year',$year);
            $usepdo->execute();
            $sql = $usepdo->fetchAll();
            if($sql)
            {
                return $sql;
            }
        }
        catch(PDOException $e)
        {
            echo "<script>alert('".$e->getMessage()."'); location.href=''</script>";
        }        
    }

    /**
     * 使用 id 取得單筆學校年度基本資料
     * @param id 學校年度基本資料編號
     * @return 
     *      success : 學校資料(DataTable)
     *      fail : null
     */
    function getSchoolInfoByMainSIDAndYear($conn,$sid,$year)
    {
        try
        {
            $usepdo = $conn->prepare("SELECT * FROM ".$this->modelName."WHERE main_sid = :main_sid AND year=:year;");
            $usepdo->bindParam(':main_sid',$main_sid);
            $usepdo->bindParam(':year',$year);
            $usepdo->execute();
            $sql = $usepdo->fetchAll();
            if($sql)
            {
                return $sql;
            }
        }
        catch(PDOException $e)
        {
            echo "<script>alert('".$e->getMessage()."'); location.href=''</script>";
        }         
    }



    /**
     * 取得全部學校年度基本資料
     * @return 
     *      success : 學校年度基本資料(DataTable)
     *      fail : null
     */
    function listByYear($conn,$year)
    {
        try
        {
            $usepdo = $conn->prepare("SELECT * FROM ".$this->modelName."WHERE year=:year;");
            $usepdo->bindParam(':main_sid',$main_sid);
            $usepdo->bindParam(':year',$year);
            $usepdo->execute();
            $sql = $usepdo->fetchAll();
            if($sql)
            {
                return $sql;
            }
        }
        catch(PDOException $e)
        {
            echo "<script>alert('".$e->getMessage()."'); location.href=''</script>";
        }         
    }

    /**
     * 取得區域輔導中心下全部學校年度基本資料
     * @return 
     *      success : 學校年度基本資料(DataTable)
     *      fail : null
     */
    function listByAccidANDYear($conn,$accid,$year)
    {
        try
        {
            $usepdo = $conn->prepare("SELECT A.sid,school_name as school, B.tid, IFNULL(C.name, '無') as trainer, A.name, phone, email FROM guardian.school_user_view A LEFT JOIN(SELECT sid, year, IFNULL(real_tid, tid) as tid FROM trainer_salary_difference WHERE year = :year) B ON(A.sid = B.sid AND A.year = B.year) LEFT JOIN trainer C ON(B.tid = C.tid) WHERE A.accid = :accid AND A.year = :year;");
            $usepdo->bindParam(':accid',$accid);
            $usepdo->bindParam(':year',$year);
            $usepdo->bindParam(':year',$year);
            $usepdo->execute();

            //取得傳回值

            $sql = $usepdo->fetchAll(); 

            if($sql){
                return $sql;
            }
        }
        catch(PDOException $e){
            echo "<script>alert('".$e->getMessage()."');</script>";
            //header("Location:coach_schlist.php");
        }
    }

    /**
     * 修改學校年度基本資料
     * @param id 學校年度基本資料編號
     * ### 欄位陣列 與 資料陣列 順序必須對齊 ###
     * @param fields 欄位(陣列)   e.g. : string[] fields = { "name", "country" };
     * @param values 資料(陣列)   e.g. : object[] fields = { "中原大學", "桃園市" };
     */
    function updateByID($conn,$id,$fields,$values)
    {
        // foreach ($fields as $a)
        // {
        //     if($a=="id" or $a=="uaccid")
        //     {
        //         echo "不可變更特定欄位";
        //         header("Location:coach_basicdata.php");
        //     }
        //     else
        //     {
        //         continue;
        //     }
        // }
        // try
        // {
        //     $usepdo = $conn->prepare("UPDATE ".$this->modelName." SET ".$fields[0]."=:name,".$fields[1]."=:tel,".$fields[2]."=:phone,".$fields[3]."=:email WHERE id=:id;");
        //     $usepdo->bindParam(':name',$name);
        //     $usepdo->bindParam(':tel',$tel);
        //     $usepdo->bindParam(':phone',$phone);
        //     $usepdo->bindParam(':email',$email);
        //     $usepdo->bindParam(':id',$id);
        //     $usepdo->execute();
        // }
        // catch(PDOException $e){
        //     echo "<script>alert('".$e->getMessage()."'); location.href=''</script>";
        // }        
        // if (Array.IndexOf(fields, "sid") != -1)
        //     throw new Exception("不可變更特定欄位");
        // else if (Array.IndexOf(fields, "id") != -1)
        //     throw new Exception("不可變更特定欄位");
        // else if (Array.IndexOf(fields, "main_id") != -1)
        //     throw new Exception("不可變更特定欄位");
        // else if (Array.IndexOf(fields, "yaer") != -1)
        //     throw new Exception("不可變更特定欄位");

        // string[] conditions = { "id" };
        // object[] conditionParams = { id };
        // return db.update(this.modelName, fields, values, conditions, conditionParams);
    }

    /**
     * 修改學校年度基本資料
     * @param id 學校年度基本資料編號
     * ### 欄位陣列 與 資料陣列 順序必須對齊 ###
     * @param fields 欄位(陣列)   e.g. : string[] fields = { "name", "country" };
     * @param values 資料(陣列)   e.g. : object[] fields = { "中原大學", "桃園市" };
     */
    function updateBySID($conn, $sid, $year, $fields, $values)
    {
        // if (Array.IndexOf(fields, "sid") != -1)
        //     throw new Exception("不可變更特定欄位");
        // else if (Array.IndexOf(fields, "id") != -1)
        //     throw new Exception("不可變更特定欄位");
        // else if (Array.IndexOf(fields, "main_id") != -1)
        //     throw new Exception("不可變更特定欄位");
        // else if (Array.IndexOf(fields, "yaer") != -1)
        //     throw new Exception("不可變更特定欄位");

        // string[] conditions = { "sid", "year" };
        // object[] conditionParams = { sid, year };
        // return db.update(this.modelName, fields, values, conditions, conditionParams);
    }

    /**
     * 刪除單筆學校年度基本資料
     * @param id 學校年度基本資料編號
     */
    function deleteByID($conn,$id)
    {
        try
        {
            $usepdo = $conn->prepare("DELETE FROM ".$this->modelName."WHERE id = :id;");
            $usepdo->bindParam(':id',$id);
            $usepdo->execute();
        }
        catch(PDOException $e)
        {
            echo "<script>alert('".$e->getMessage()."'); location.href=''</script>";
        }  
    }

    /**
     * 刪除單筆學校年度基本資料
     * @param id 學校年度基本資料編號
     */
    function deleteByYearAndSID($conn,$year,$sid)
    {
        try
        {
            $usepdo = $conn->prepare("DELETE FROM ".$this->modelName."WHERE sid = :sid and year=:year;");
            $usepdo->bindParam(':id',$id);
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