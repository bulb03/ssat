<?php
    session_start();
    if ($_SESSION["Is_regional"] != true)
    {
        echo "<script>alert('請先登入!');</script>";
        header("Location:RegionalLogin.php");
    }
?>
<div class="reg-wrap">
    <header>
        <h2>輔導學校清單</h2>
    </header>
</div>
<section class="coach-wrap">
	<div class="reg-wrap">
        
        <table class="region-table">
        <colgroup>
            <col class="newstitleB01">
            <col class="newstitleB02">
            <col class="newstitleB03">
            <col class="newstitleB04">
            <col class="newstitleB05">
            <col class="newstitleB06">

        </colgroup>
        <thead>
            <tr>
                <th class="td-center">學校名稱</th>
                <th>防護員</th>
                <th>組長</th>
                <th>電話</th>
                <th>email</th>
                <th>設備一覽表</th>      
            </tr>
        </thead>
        <tbody id="schools">
        <?php
        include 'SCHOOL_INFO.php';
        include 'Utils.php';
        
        $schoolInfoModel = new SCHOOL_INFO;
        $util = new Utils;

        $conn=$schoolInfoModel->connect_db();
        $data = $schoolInfoModel->listByAccidANDYear($conn,$_SESSION["regional_id"], $util->currentSchoolYear());

        foreach($data as $row)
        {
            echo "<tr>";
            echo "<td class='td-center'>".$row['school']."</td>";
            echo "<td>".$row['trainer']."</td>";
            echo "<td>".$row['name']."</td>";
            echo "<td>".$row['phone']."</td>";
            echo "<td><a href = 'mailto:".$row['email']."'>".$row['email']."</a></td>";
            echo "<td><a href = 'coach_equipment.php?sid=".$row['sid']."'><input type='submit' name='submit' value='設備一覽表' class='btnTxt01'></a></td>";
            echo "</tr>";
        }        
        ?>
        </tbody>
    </table>
    </div>

    
</section>
