<?php
    
    class USER_AREA_COUNSELING_CENTER_MEMBER
    {
        private $modelName = "USER_AREA_COUNSELING_CENTER_MEMBER";

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
         * 新增成員資料
         */
        function create($conn,$name, $tel, $phone, $email, $type, $uaccid)
        {
			try
			{
				$usepdo = $conn->prepare("INSERT INTO ".$this->modelName."(name, tel, phone, email, type, uaccid) VALUES (:name, :tel, :phone, :email, :type, :uaccid);");
				$usepdo->bindParam(':name',$name);
				$usepdo->bindParam(':tel',$tel);
				$usepdo->bindParam(':phone',$phone);
				$usepdo->bindParam(':email',$email);
				$usepdo->bindParam(':type',$type);
				$usepdo->bindParam(':uaccid',$uaccid);
				$usepdo->execute();
			}
			catch(PDOException $e)
            {
				echo "<script>alert('".$e->getMessage()."'); location.href=''</script>";
		    }	       	
        }

        /**
         * 使用 id 取得單筆成員資料
         */
        function getByID($conn, $id)
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
         * 取得學校單年度成員資料
         */
        function listByUaccid($conn,$uaccid)
        {
			try
			{
				$usepdo = $conn->prepare("SELECT * FROM ".$this->modelName." WHERE uaccid=:ua;");
				$usepdo->bindParam(':ua',$uaccid);
				$usepdo->execute();

				//取得傳回值

				$sql = $usepdo->fetchAll();	

				if($sql)
				{
					return $sql;
				}
			}
			catch(PDOException $e){
				echo "<script>alert('".$e->getMessage()."'); location.href=''</script>";
			} 				        	
        }


        /**
         * 修改成員資料
         * @param id 成員資料編號
         * ### 欄位陣列 與 資料陣列 順序必須對齊 ###
         * @param fields 欄位(陣列)   e.g. : string[] fields = { "name", "country" };
         * @param values 資料(陣列)   e.g. : object[] fields = { "中原大學", "桃園市" };
         */
        function updateByID($conn, $id, $fields, $name, $tel, $phone, $email)
        {
        	foreach ($fields as $a)
        	{
        		if($a=="id" or $a=="uaccid")
        		{
        			echo "不可變更特定欄位";
        			header("Location:coach_basicdata.php");
        		}
        		else
        		{
        			continue;
        		}
        	}
			try
			{
				$usepdo = $conn->prepare("UPDATE ".$this->modelName." SET ".$fields[0]."=:name,".$fields[1]."=:tel,".$fields[2]."=:phone,".$fields[3]."=:email WHERE id=:id;");
				$usepdo->bindParam(':name',$name);
				$usepdo->bindParam(':tel',$tel);
				$usepdo->bindParam(':phone',$phone);
				$usepdo->bindParam(':email',$email);
				$usepdo->bindParam(':id',$id);
				$usepdo->execute();
			}
			catch(PDOException $e){
                echo "<script>alert('".$e->getMessage()."'); location.href=''</script>";
			}
        }

        /**
         * 刪除單筆成員資料
         * @param id 成員資料編號
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
        
    }

?>