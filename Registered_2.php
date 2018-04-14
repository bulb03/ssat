<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
   <meta http-equiv="content-type" content="text/html;charset=utf-8" />
	
	<title>申請表單系統</title>
	<link rel="stylesheet" type="text/css" href="css/style.css" media="screen" />
	<link rel="shortcut icon" href="favicon.ico" />

	<style>
		table {
		    font-family: arial, sans-serif;
		    border-collapse: collapse;
		    width: 100%;
		}

		td, th {
		    border: 1px solid #dddddd;
		    text-align: left;
		    padding: 8px;
		}

		tr:nth-child(even) {
		    background-color: #dddddd;
		}
	    .auto-style1 {
            text-align: left;
        }
	</style>

		
</head>

<body>
	<div id="wrap">
		<div id="top">
			
		</div>

		<div id="content">

			<br>
			<br>
			<h1>請填入資料</h1>
			<br>
			<form id="form1" style="" method="POST" action="Registered_2_.php">

			<table id="reg_table">
			  <tr>
			    <th>學校名稱：</th>
			    <th class="auto-style1">
			    	<select ID="sch_name" name="sch_name" required>
						<?php
							include_once 'SCHOOL.php';
							session_start();

				            $school = new SCHOOL;
				            $conn = $school->connect_db();
				            $data = $school->list($conn);

				            foreach($data as $row)
				            {
				                if($row["country"]==$_SESSION["Sch_country"] && $row["is_actived"])
				                {
				                    echo "<option value=\"".$row["name"]."\">".$row["name"]."</option>";
				                }
				            }							
						?>
					</select>
                   
				</th>
			  </tr>
			   <tr>
			    <td>Email信箱(登入帳號)：</td>
			    <td><input type ="text" id = "email" name="email" required></td>
			  
                </tr>
                <tr>
			    <td>密碼：</td>
			    <td><input type="password" id = "password" name="password" required></td>
			  </tr>
			  <tr>
			    <td>密碼確認：</td>
			    <td><input type="password" id = "re_password" name="re_password" required></td>
			  </tr>
			   <tr>
			    <td>姓名：</td>
			    <td><input type="text" id = "name" name="name" required></td>
			  </tr>
			
			  <tr>
			    <td>電話：</td>
			    <td><input type="text" id = "phone" name="phone" required>&nbsp;&nbsp;&nbsp; 分機：<input type="text" id = "phone2" name="phone2" Width="92px"></td>
			  </tr>
			 

			</table>

			<br>

			<input type="submit" id="reg1" Text="確認" OnClick="reg_Click" />

					
			</form>
				
		</div>

		<div id="left"></div>

			
		<div id="clear">
			
		</div>
	</div>
		<div id="footer">
		<p> 教育部體育署<a href="http://loadfoo.org/" rel="external"></a> <a href="http://jigsaw.w3.org/css-validator/check/referer" rel="external"></a> <a href="http://validator.w3.org/check?uri=referer" rel="external"></a></p>
		</div>

</body>
</html>
