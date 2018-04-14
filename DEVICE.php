<?php
class DEVICE
{
    private $modelName = "DEVICE";

    function connect_db(){
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
     * 新增設備資料
     * @param sid 學校編號
     * @param year 學年度
     * @param item 運動項目
     * @param num 數量
     * @param unit 單位
     * @param price 價格
     * @param discrip 說明(Text)
     * @return id 設備資料編號(long)
     */
    public long create(long sid, int year, string item, int  num, string unit, int price, string discrip)
    {
        try
        {
            $usepdo = $conn->prepare("INSERT INTO ".$this->modelName."(sid, year, item, num, unit, price, discrip) values(:sid, :year, :item, :num, :unit, :price, :discrip);");
            $usepdo->bindParam(':sid',$sid);
            $usepdo->bindParam(':year',$year);
            $usepdo->bindParam(':item',$item);
            $usepdo->bindParam(':num',$num);
            $usepdo->bindParam(':unit',$unit);
            $usepdo->bindParam(':price',$price);
            $usepdo->bindParam(':discript',$discrip);
            $usepdo->execute();
        }
        catch(PDOException $e){
            echo "<script>alert('".$e->getMessage()."');</script>";
            header("Location:");
        }      
    }

    function getCostsTotal($conn,$DeviceList)
    {        
        // int total = 0;
        // for (int i = 0; i < DeviceList.Rows.Count; i++)
        // {
        //     total += (Convert.ToInt32(DeviceList.Rows[i]["num"]) * Convert.ToInt32(DeviceList.Rows[i]["price"]));
        // }
        // return total;
    }

    /**
     * 使用 id 取得單筆設備資料
     * @param id 設備資料編號
     * @return 
     *      success : 運動項目(DataTable)
     *      fail : null
     */
    function getDeviceByID($conn,$id)
    {
        try
        {
            $usepdo = $conn->prepare("SELECT * FROM ".$this->modelName."WHERE id=:id");
            $usepdo->bindParam(':id',$id);
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
            header("Location:");
        }      
    }

    /**
     * 取得學校單年度工作人員設備資料
     * @param sid 學校編號
     * @param year 學年度
     * @return 
     *      success : 設備資料(DataTable)
     *      fail : null
     */
    function listBySIDAndYear($conn,$sid,$year)
    {
        try
        {
            $usepdo = $conn->prepare("SELECT * FROM ".$this->modelName."WHERE sid=:sid AND year=:year AND item!=:item;");
            $usepdo->bindParam(':sid',$sid);
            $usepdo->bindParam(':year',$year);
            $usepdo->bindParam(':item',$item);
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
            header("Location:");
        }           
    }

    /**
     * 取得單年度全部學校設備資料
     * @return 
     *      success : 設備資料(DataTable)
     *      fail : null
     */
    function listByYear($conn,$year)
    {
        try
        {
            $usepdo = $conn->prepare("SELECT * FROM ".$this->modelName."WHERE year=:year");
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
            echo "<script>alert('".$e->getMessage()."');</script>";
            header("Location:");
        }        
    }

    /**
     * 取得學校全部年度設備資料
     * @return 
     *      success : 設備資料(DataTable)
     *      fail : null
     */
    function listBySID($conn,$sid)
    {
        try
        {
            $usepdo = $conn->prepare("SELECT * FROM ".$this->modelName."WHERE sid=:sid");
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
            echo "<script>alert('".$e->getMessage()."');</script>";
            header("Location:");
        }        
    }

    /**
     * 取得單年度特定縣市所有學校設備費資料
     * @param year 學年度
     * @param country 縣市
     * @return 
     *      success : 設備費資料(DataTable)
     *      fail : null
     */
    function listByCountry($conn,$year,$country)
    {
        try
        {
            $usepdo = $conn->prepare("SELECT B.* FROM SCHOOL A INNER JOIN DEVICE B ON ( A.sid = B.sid ) WHERE A.country = :country AND B.year = :year");
            $usepdo->bindParam(':year',$year);
            $usepdo->bindParam(':country',$country);
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
            header("Location:");
        }  
    }

    /**
     * 修改設備資料
     * @param id 設備資料編號
     * ### 欄位陣列 與 資料陣列 順序必須對齊 ###
     * @param fields 欄位(陣列)   e.g. : string[] fields = { "name", "country" };
     * @param values 資料(陣列)   e.g. : object[] fields = { "中原大學", "桃園市" };
     */
    function updateByID($conn,$id,$fields,$values)
    {
        // if (Array.IndexOf(fields, "sid") != -1)
        //     throw new Exception("不可變更特定欄位");
        // else if (Array.IndexOf(fields, "id") != -1)
        //     throw new Exception("不可變更特定欄位");
        // else if (Array.IndexOf(fields, "yaer") != -1)
        //     throw new Exception("不可變更特定欄位");

        // string[] conditions = { "id" };
        // object[] conditionParams = { id };
        // return db.update(this.modelName, fields, values, conditions, conditionParams);
    }

    /**
     * 刪除單筆設備資料
     * @param id 設備資料編號
     */
    function deleteByID($conn,$id)
    {
        try
        {
            $usepdo = $conn->prepare("delete FROM SCHOOL WHERE id = :id");
            $usepdo->bindParam(':id',$id);
            $usepdo->execute();
            return true;
        }
        catch(PDOException $e){
            echo "<script>alert('".$e->getMessage()."');</script>";
            header("Location:");
        }         
    }

    /**
     * 刪除設備資料
     * @param id 運動項目資料編號
     */
    function deleteByYearAndSID($conn,$year,$sid)
    {
        try
        {
            $usepdo = $conn->prepare("delete FROM SCHOOL WHERE sid = :sid AND year=:year");
            $usepdo->bindParam(':sid',$sid);
            $usepdo->bindParam(':year',$year);
            $usepdo->execute();
            return true;
        }
        catch(PDOException $e){
            echo "<script>alert('".$e->getMessage()."');</script>";
            header("Location:");
        }        
    }

}
?>