<?php
    include_once dirname(__file__).'/Utils.php';

    class USER_COUNTRY
    {
        private $modelName = "USER_COUNTRY";        

        function connect_db(){
            $servername = "localhost";
            $dbname = "guardian";
            $account = "root";
            $password = "1234"; 
            try{
                //��Ʈw�s�u
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
         * �����n�J
         * @param email �q�l�H�c
         * @param password �K�X
         * @return 
         *      success : �ϥΪ̸��(DataTable)
         *      fail : null
         */
        function countryLogin($conn,$email,$password)
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
                else{
                    return null;
                }
            }
            catch(PDOException $e)
            {
                echo $e->getMessage()."<br>";
            }
        }

        /**
         * �s�W�ϥΪ�
         * @return id (long)
         */
        function create($conn,$name, $account, $password, $email, $phone, $user_name)
        {
            $type = "";
            foreach($mem_type as $row)
            {
                $type.=$row.",";
            }
            try
            {
                $usepdo = $conn->prepare("INSERT INTO ".$this->modelName." (name, account, password, salt, email, phone, user_name, verification_code) VALUES(:name, :account, :password, :salt, :email, :phone, :user_name, :verification_code);");
                $usepdo->bindParam(':account',$account);
                $usepdo->bindParam(':password',$password);
                $usepdo->bindParam(':name',$name);
                $usepdo->bindParam(':salt',$salt);
                $usepdo->bindParam(':email',$email);
                $usepdo->bindParam(':phone',$phone);
                $usepdo->bindParam(':user_name',$user_name);
                $usepdo->bindParam(':verification_code',$verification_code);
                $usepdo->execute();
                return true;
            }
            catch(PDOException $e){
                echo "<script>console.log('".$e->getMessage()."') location.href=''</script>";
            }            
            // string salt = Helper.Utils.randomString(20);
            // string verification_code = Helper.Utils.randomString(20);
            // password = Helper.Crypto.md5(password+salt);
            
            // return id;
        }

        /**
         * �ϥ� id ���o��@�ϥΪ̸��
         * @param id �ϥΪ̽s��
         * @return 
         *      success : �ϥΪ̸��(DataTable)
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
         * �ϥ� uid ���o��@�ϥΪ̸��
         * @param uid �ϥΪ̽s��
         * @return 
         *      success : �ϥΪ̸��(DataTable)
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
         * ���o�����ϥΪ̸��
         * @return 
         *      success : �ϥΪ̸��(DataTable)
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
        * ���o�b�����
        * @param email �Ǯսs��
        * @return 
        *      success : �Ǯձb�����(DataTable)
        *      fail : null
        */
        function listByEmail($conn,$email)
        {
            try
            {
                $usepdo = $conn->prepare("SELECT * FROM ".$this->modelName."where email=:email;");
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
         * ���o���ҽX
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
         * ���ҽX�ˬd (�Ȯɥγ�²�檺��k�A���ᦳ�ɶ��A��[�K)
         */
        function checkVerificationCode($conn,$id,$verificationCode)
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
         * ���s�]�w�s�����ҽX
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
                echo "<script>alert('�L�k���]���ҽX�A���ˬdemail�O�_���T'); location.href=''</script>";
            } 
        }

        /**
         * ���K�X
         */
        function changePassword($conn,$id,$password)
        {
            $info = $this->getUserByUID($id);

            try{
                $new_pwd = md5($pwd.$row["salt"]);
                $usepdo = $conn->prepare("UPDATE ".$this->modelName." SET password=:pwd WHERE id=:id;");
                $usepdo->bindParam(':id',$id);
                $usepdo->bindParam(':pwd',$password);
                $usepdo->execute();
                return true;
            }
            catch(PDOException $e)
            {
                return false;
                echo $e->getMessage()."<br>";
            }           
        }

        /**
         * �ק�ϥΪ̸��
         * @param uid �ϥΪ̽s��
         * ### ���}�C �P ��ư}�C ���ǥ������ ###
         * @param fields ���(�}�C)   e.g. : string[] fields = { "name", "phone" };
         * @param values ���(�}�C)   e.g. : object[] fields = { "�ϥΪ�", "0988888888" };
         */
        function updateByUID($conn,$id, $fields, $values)
        {
            // if (Array.IndexOf(fields, "id") != -1)
            //     throw new Exception("���i�ܧ�S�w���");
            // else if (Array.IndexOf(fields, "password") != -1)
            //     throw new Exception("���i�ܧ�S�w���");
            // else if (Array.IndexOf(fields, "salt") != -1)
            //     throw new Exception("���i�ܧ�S�w���");

            // string[] conditions = { "id" };
            // object[] conditionParams = { id };
            // return db.update(this.modelName, fields, values, conditions, conditionParams);
        }

        /**
         * �R���ϥΪ̸��
         * @param uid �ϥΪ̽s��
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