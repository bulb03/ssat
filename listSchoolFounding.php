<?php
    include_once 'SCHOOL.php';
    include_once 'region_center/Utils.php';
    session_start();
    try
    {
        $schoolModel = new SCHOOL;
        $utils = new Utils;
        $year = empty($_GET["year"]) ? $utils->currentSchoolYear() : $_GET["year"];
        $country = $_SESSION["country_name"];
        $conn = $schoolModel->connect_db();
        $schoolList = $schoolModel->listFundingByCountry($conn,$country, $year, $_GET["isNew"]);
    }
    catch (PDOException $e)
    {
        
    }

    function show_data($schoolList){
        if($schoolList){
            foreach($schoolList as $row){
                echo "<tr>";
                echo "<td>".$row[""]."</td>";
                echo "<td>".$row[""]."</td>";
                echo "<td>".$row[""]."</td>";
                echo "<td>".$row[""]."</td>";
                echo "<td>".$row[""]."</td>";
                echo "<td>".$row[""]."</td>";
                echo "<td>".$row[""]."</td>";
                echo "<td>".$row[""]."</td>";
                echo "</tr>";
            }
        }
    }
?>