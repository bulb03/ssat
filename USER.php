<?php
    include_once dirname(__FILE__).'/Utils.php';

    class USER
    {
        private $modelName = "USER";

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
         * 登入
         * @param email 電子信箱
         * @param password 密碼
         * @return 
         *      success : 使用者資料(DataTable)
         *      fail : null
         */
        function schoolLogin($conn, $year, $email, $password)
        {
            try
            {
                $usepdo = $conn->prepare("SELECT * FROM ".$this->modelName." WHERE email = :email AND type = '學校負責人';");
                $usepdo->bindParam(':email',$email);
                $usepdo->execute();
                $sql = $usepdo->fetchAll();
                if($sql){
                    foreach ($sql as $row) {
                        if($row["password"]==md5($password.$row["salt"]))
                        {
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
                echo "<script>alert('".$e->getMessage()."');</script>";
            } 
        }

        /**
         * 縣市登入
         * @param email 電子信箱
         * @param password 密碼
         * @return 
         *      success : 使用者資料(DataTable)
         *      fail : null
         */
        function countryLogin($conn, $email, $password)
        {
            try
            {
                $usepdo = $conn->prepare("SELECT * FROM ".$this->modelName." WHERE email = :email AND type = 縣市帳號;");
                $usepdo->bindParam(':email',$email);
                $usepdo->execute();
                $sql = $usepdo->fetchAll();
                if($sql){
                    foreach ($sql as $row) {
                        if($row["password"]==md5($password.$row["salt"]))
                        {
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
         * @return uid (long)
         */
        function create($conn, $year, $type, $sid, $email, $password, $name, $phone)
        {
            $utils = new Utils;
            $salt = $utils->randomString(20);
            $verification_code = $utils->randomString(20);
            $password = md5($password.$salt);

            try
            {
                $usepdo = $conn->prepare("INSERT INTO ".$this->modelName."
                (type, email, password, salt, name, phone, verification_code, sid) VALUES (:type, :email, :password, :salt, :name, :phone, :verification_code, :sid);");
                $usepdo->bindParam(':name',$name);
                $usepdo->bindParam(':sid',$sid);
                $usepdo->bindParam(':type',$type);
                $usepdo->bindParam(':password',$password);
                $usepdo->bindParam(':salt',$salt);
                $usepdo->bindParam(':email',$email);
                $usepdo->bindParam(':phone',$phone);
                $usepdo->bindParam(':verification_code',$verification_code);
                $usepdo->execute();
            }
            catch(PDOException $e)
            {
                echo $e->getMessage()."<br>";
            }

            //this.registerSchoolUser(year, Convert.ToInt32(uid), sid);

            //return uid;
        }

        /**
         * 註冊某年度學校負責人(將 User & School 做綁定關聯)
         * @return relationId (long)
         */
        function registerSchoolUser($conn, $year, $uid, $sid)
        {
            try
            {
                $usepdo = $conn->prepare("INSERT INTO ".$this->modelName."
                (year, uid, sid) VALUES (:year, :uid, :sid);");
                $usepdo->bindParam(':sid',$sid);
                $usepdo->bindParam(':uid',$uid);
                $usepdo->bindParam(':year',$year);
                $usepdo->execute();
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
        function getUserByUID($conn,$uid)
        {
            try
            {
                $usepdo = $conn->prepare("SELECT * FROM ".$this->modelName." WHERE uid = :uid;");
                $usepdo->bindParam(':uid',$uid);
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
        function getUserByEmail($conn, $email)
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
        * 取得學校帳號資料
        * @param sid 學校編號
        * @return 
        *      success : 學校帳號資料(DataTable)
        *      fail : null
        */
        function getUserBySID($conn, $sid)
        {
            try
            {
                $usepdo = $conn->prepare("SELECT * FROM ".$this->modelName." WHERE sid=:sid;");
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
         * 取得全部使用者資料
         * @return 
         *      success : 使用者資料(DataTable)
         *      fail : null
         */
        function list_()
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
        * 取得學校帳號資料
        * @param sid 學校編號
        * @return 
        *      success : 學校帳號資料(DataTable)
        *      fail : null
        */
        function listBySID($conn,$sid)
        {
            try
            {
                $usepdo = $conn->prepare("SELECT * FROM ".$this->modelName."where sid=:sid;");
                $usepdo->bindParam(':sid',$sid);
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
         * 取得驗證碼
         */
        function getVerificationCode($conn,$uid)
        {
            try
            {
                $usepdo = $conn->prepare("SELECT verification_code FROM ".$this->modelName." WHERE uid = :uid");
                $usepdo->bindParam(":uid",$uid);
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
        function checkVerificationCode($conn,$uid, $verificationCode)
        {
            try
            {
                $usepdo = $conn->prepare("SELECT verification_code FROM ".$this->modelName." WHERE id = :id");
                $usepdo->bindParam(":uid",$uid);
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
        function changePassword($conn,$uid,$password)
        {
            $sql = $this->getUserByUID($id);

            if($sql){
                try{
                    $new_pwd = md5($pwd.$sql[0]["salt"]);
                    $usepdo = $conn->prepare("UPDATE ".$this->modelName." SET password=:pwd WHERE uid=:uid;");
                    $usepdo->bindParam(':uid',$uid);
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
        function updateByUID($conn,$uid,$email,$name,$phone_temp,$is_actived)
        {
            try
            {
                $usepdo = $conn->prepare("UPDATE ".$this->modelName." SET email = :email,name = :name, phone = :phone, is_actived = :is_actived WHERE uid = :uid;");
                $usepdo->bindParam(":email",$email);
                $usepdo->bindParam(":name",$name);
                $usepdo->bindParam(":phone",$phone_temp);
                $usepdo->bindParam(":is_actived",$is_actived);
                $usepdo->bindParam(":uid",$uid);
                $usepdo->execute();
                return true;
            }
            catch(PDOException $e)
            {
                return false;
            }
        }

        /**
         * 刪除使用者資料
         * @param uid 使用者編號
         */
        function deleteByUID($conn, $uid)
        {
            try
            {
                $usepdo = $conn->prepare("DELETE FROM ".$this->modelName." WHERE uid = :uid;");
                $usepdo->bindParam(":uid",$uid);
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