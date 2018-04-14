<?php
    include_once dirname(__file__).'/Utils.php';

    class USER_AREA_COUNSELING_CENTER
    {
        private $modelName = "user_area_counseling_center";

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
         * 區域輔導中心登入
         * @param email 電子信箱
         * @param password 密碼
         * @return 
         *      success : 使用者資料(DataTable)
         *      fail : null
         */
        function login($conn,$email,$password)
        {
            try
            {
                $usepdo = $conn->prepare("SELECT * FROM ".$this->modelName." WHERE account = :account;");
                $usepdo->bindParam(':account',$email);
                $usepdo->execute();
                $sql = $usepdo->fetchAll();
                if($sql){
                    foreach ($sql as $row) {
                        if($row["password"]==md5($password.$row["salt"]))
                        {
                            $_SESSION["regional_id"] = $row["id"];
                            $_SESSION["regional_account"] = $row["account"];
                            $_SESSION["regional_name"] = $row["name"];
                            $_SESSION["regional_email"] = $row["email"];
                            $_SESSION["is_actived"] = $row["is_actived"];
                            $_SESSION["Is_regional"] = true; 
                            return $sql;
                        }               
                    }             
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
         * 新增使用者
         * @return id (long)
         */
        function create($conn, $name, $account, $password, $salt, $email, $phone, $user_name, $verification_code)
        {
            $util = new Utils;
            $salt = $util->randomString(20);
            $verification_code = $utils->randomString(20);
            $before_crypto = $password.$salt;
            $password = md5($before_crypto);

            try
            {
                $usepdo = $conn->prepare("INSERT INTO ".$this->modelName."
                (name, account, password, salt, email, phone, user_name, verification_code) VALUES (:name, :account, :password, :salt, :email, :phone, :user_name, :verification_code);");
                $usepdo->bindParam(':name',$name);
                $usepdo->bindParam(':account',$account);
                $usepdo->bindParam(':password',$password);
                $usepdo->bindParam(':salt',$salt);
                $usepdo->bindParam(':email',$email);
                $usepdo->bindParam(':phone',$phone);
                $usepdo->bindParam(':user_name',$user_name);
                $usepdo->bindParam(':verification_code',$verification_code);
                $usepdo->execute();
                return $id; //$id不知道那來的
            }
            catch(PDOException $e)
            {
                echo $e->getMessage()."<br>";
            }             
        }

        /**
         * 使用 id 取得單一使用者資料
         * @param id 使用者編號
         * @return 
         *      success : 使用者資料(DataTable)
         *      fail : null
         */
        function getUserByUID($conn,$id)
        {
            try
            {
                $usepdo = $conn->prepare("SELECT * FROM ".$this->modelName." WHERE id = :id;");
                $usepdo->bindParam(':id',$id);
                $usepdo->execute();
                $sql = $usepdo->fetchAll(); 
                if($sql){
                    return $sql;
                }
            }
            catch(PDOException $e)
            {
                echo $e->getMessage()."<br>";
            }             
        }

        /**
         * 使用 uid 取得單一使用者資料
         * @param uid 使用者編號
         * @return 
         *      success : 使用者資料(DataTable)
         *      fail : null
         */
        function getUserByEmail($conn,$email)
        {
            try
            {
                $usepdo = $conn->prepare("SELECT * FROM ".$this->modelName." WHERE email = :email;");
                $usepdo->bindParam(':email',$email);
                $usepdo->execute();
                $sql = $usepdo->fetchAll(); 
                if($sql){
                    return $sql;
                }
            }
            catch(PDOException $e)
            {
                echo $e->getMessage()."<br>";
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
                $usepdo = $conn->prepare("SELECT * FROM ".$this->modelName.";");
                $usepdo->execute();
                $sql = $usepdo->fetchAll(); 
                if($sql){
                    return $sql;
                }
            }
            catch(PDOException $e)
            {
                echo $e->getMessage()."<br>";
            }             
        }


        /**
        * 取得帳號資料
        * @param email 學校編號
        * @return 
        *      success : 學校帳號資料(DataTable)
        *      fail : null
        */
        function listByEmail($conn,$email)
        {
            try
            {
                $usepdo = $conn->prepare("SELECT * FROM ".$this->modelName."where email=:email;");
                $usepdo->bindParam(':email',$email);
                $usepdo->execute();
                $sql = $usepdo->fetchAll(); 
                if($sql){
                    return $sql;
                }
            }
            catch(PDOException $e)
            {
                echo $e->getMessage()."<br>";
            }               
        }

        /**
        * 取得帳號資料
        * @param email 學校編號
        * @return 
        *      success : 學校帳號資料(DataTable)
        *      fail : null
        */
        function listSchoolByID($conn,$id)
        {
            try
            {
                $usepdo = $conn->prepare("SELECT A.sid,A.name as school_name,B.name, B.phone, B.email FROM school A LEFT JOIN user B ON ( A.sid = B.sid ) WHERE accid = :accid;");
                $usepdo->bindParam(":accid",$id);
                $usepdo->execute();
                $sql = $usepdo->fetchAll(); 
                if($sql){
                    return $sql;
                }
            }
            catch(PDOException $e)
            {
                echo $e->getMessage()."<br>";
            }              
        }

        /**
         * 取得驗證碼
         */
        function getVerificationCode($conn,$id)
        {
            try
            {
                $usepdo = $conn->prepare("SELECT verification_code FROM ".$this->modelName." WHERE id = :id");
                $usepdo->bindParam(":id",$id);
                $usepdo->execute();
                $sql = $usepdo->fetchAll(); 
                if($sql){
                    return $sql;
                }
            }
            catch(PDOException $e)
            {
                echo $e->getMessage()."<br>";
            }             
        }

        /**
         * 驗證碼檢查 (暫時用最簡單的方法，之後有時間再改加密)
         */
        function checkVerificationCode($conn,$id, $verificationCode)
        {
            try
            {
                $usepdo = $conn->prepare("SELECT verification_code FROM ".$this->modelName." WHERE id = :id");
                $usepdo->bindParam(":id",$id);
                $usepdo->execute();
                $code = $usepdo->fetchAll(); 
                if($code){
                    if ($verificationCode == $code)
                    {
                        $fields = "is_actived";
                        $values = true;
                        $this->updateByUID($id, $fields, $values);
                        return true;
                    }
                    else
                        return false;
                }
            }
            catch(PDOException $e)
            {
                echo $e->getMessage()."<br>";
            }                
        }

        /**
         * 重新設定新的驗證碼
         */
        function changeVerificationCode($conn,$email)
        {
            $util = new Utils;
            $verification_code = $util->randomString(20);
            try
            {
                $usepdo = $conn->prepare("UPDATE ".$this->modelName." SET verification_code = :v_c WHERE email = :email;");
                $usepdo->bindParam(":v_c",$verification_code);
                $usepdo->bindParam(":email",$email);
                $usepdo->execute();
                return $verification_code;
            }
            catch(PDOException $e)
            {
                echo "<script>alert('無法重設驗證碼，請檢查email是否正確'); location.href=''</script>";
            }            
        }

        /**
         * 更改密碼
         */
        function changePassword($conn,$id,$password)
        {
            $sql = $this->getUserByUID($id);

            if($sql){
                try{
                    $new_pwd = md5($pwd.$sql[0]["salt"]);
                    $usepdo = $conn->prepare("UPDATE ".$this->modelName." SET password=:pwd WHERE uaccid=:ua;");
                    $usepdo->bindParam(':ua',$uaccid);
                    $usepdo->bindParam(':pwd',$new_pwd);
                    $usepdo->execute();
                    return true;
                }
                catch(PDOException $e)
                {
                    return false;
                    echo $e->getMessage()."<br>";
                }
            }
            else{
                return false;
            }
        }

        /**
         * 修改使用者資料
         * @param uid 使用者編號
         * ### 欄位陣列 與 資料陣列 順序必須對齊 ###
         * @param fields 欄位(陣列)   e.g. : string[] fields = { "name", "phone" };
         * @param values 資料(陣列)   e.g. : object[] fields = { "使用者", "0988888888" };
         */
        function updateByUID($conn,$id, $fields, $values)
        {
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
         * 刪除使用者資料
         * @param uid 使用者編號
         */
        function deleteByUID($conn,$id)
        {
            try
            {
                $usepdo = $conn->prepare("DELETE FROM ".$this->modelName." WHERE ID = :id;");
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

    }
?>