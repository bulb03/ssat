
<?php
    include_once 'TRAINER_SALARY_REAL.php';
    include_once 'TRAINER.php';

    //session_start();

    if(!empty($_POST["searchID"])){
        search_id($_POST["searchID"]);
    }

    function search_id($searchID){
        if ($searchID=="")
        {
            echo "<script>alert('請輸入證號!');</script>";
            header("Location:campus_add.php");
        }

        $trainerModel = new TRAINER;
        $conn = $trainerModel->connect_db();
        $trainer = $trainerModel->getTrainerByCertificateNo($conn, $searchID);
        
        if($trainer)
        {
            $trainerSalaryRealModel_ = new TRAINER_SALARY_REAL;
            $trainerSalaryInfo = $trainerSalaryRealModel_->getTrainerSalaryBySIDAndYear($conn, $_SESSION["sid"], $_SESSION["year"]);
            $trainerYears = $trainerSalaryRealModel_->getYearByTid($conn, $trainerSalaryInfo[0]["tid"]);
            set_value_and_echo($trainer,$trainerSalaryInfo,$trainerYears);
        }
        else
        {
            echo "<script>if(confirm('此防護員不存在，是否新增防護員?')){location.href='campus_addGuardian.php'};</script>";
        }
    }

    function set_value_and_echo($trainer,$trainerSalaryInfo,$trainerYears){
        foreach ($trainer as $row) {
            echo "<tr>";
            echo "<td>運動防護員證號</td>";
            echo "<td>";
            echo "<input name=\"ID\" type=\"text\" id=\"ID\" class=\"campus-input\" value=\"".$row["certificate_no"]."\" readonly>";
            echo "<input name=\"tid\" type=\"hidden\" id=\"tid\" class=\"campus-input\" value=\"".$row["tid"]."\">";
            echo "</td>";
            echo "</tr>";
            echo "<tr>";
            echo "<td>運動防護員姓名</td>";
            echo "<td><input name=\"name\" type=\"text\" id=\"name\" class=\"campus-input\" value=\"".$row["name"]."\"></td>";
            echo "</tr>";            
            echo "<tr>";
            echo "<td>運動防護員學歷</td>";
            echo "<td><select id=\"grade\" class=\"select01\" value=\"".$row["grade"]."\">";
            echo "<option value=\"學士\">學士</option>";
            echo "<option value=\"碩士\">碩士</option>";
            echo "</select></td>";
            echo "</tr>"; 
            echo "<tr>";
            echo "<td>運動防護員年資</td>";
            echo "<td>";
            echo "<input name=\"years\" type=\"text\" id=\"years\" class=\"campus-input\" value=\"".$trainerYears."\" readonly>";
            echo "</td>";
            echo "</tr>";
            echo "<tr>";
            echo "<td colspan=\"2\">";
            echo "<div class=\"campus-selectcon\">";
            echo "<div class=\"campus-selectbox\">";
            echo "<h3>起聘月份</h3>";
            echo "<select id=\"startMonth\" class=\"select01\" value=\"".(string)(12 - (int)$trainerSalaryInfo[0]["month"]+1)."\">";
            echo "<option value=\"8\">8</option>";
            echo "<option value=\"9\">9</option>";
            echo "<option value=\"10\">10</option>";
            echo "<option value=\"11\">11</option>";
            echo "<option value=\"12\">12</option>";
            echo "</select>";
            echo "</div>";
            echo "<div class=\"campus-selectbox\">";
            echo "<h3>今年前半年工作月數</h3>";
            echo "<select id=\"earlyMonthTotal\" class=\"select01\" value=\"".($trainerSalaryInfo[0]["bonus_month"] - $trainerSalaryInfo[0]["month"])."\">";
            echo "<option value=\"0\">0</option>";
            echo "<option value=\"1\">1</option>";
            echo "<option value=\"2\">2</option>";
            echo "<option value=\"3\">3</option>";
            echo "<option value=\"4\">4</option>";
            echo "<option value=\"5\">5</option>";
            echo "<option value=\"6\">6</option>";
            echo "<option value=\"7\">7</option>";
            echo "<option value=\"8\">8</option>";
            echo "<option value=\"9\">9</option>";
            echo "<option value=\"10\">10</option>";
            echo "<option value=\"11\">11</option>";
            echo "</select>";
            echo "</div>";
            echo "</div>";
            echo "</td>";
            echo "</tr>";                                    
        }
        echo "</tbody>";
        echo "</table>";
        echo "</div>";
        echo "<div class=\"offset-form\">";
        echo "<ul>";
        echo "<li><input type=\"submit\" name=\"Change\" Text=\"確認\" id=\"save\" class=\"btn btn-lg campus-btn\"/> </li>";
        echo "<li>";
        echo "</li>";
        echo "</ul>";
        echo "<div class=\"float-left form-inblock\">";
        echo "</div>";
        echo "</div>";
        echo "</form>";        
    }
?>