<div class="reg-wrap">
    <header>
        <h2>設備一覽表</h2>
    </header>
</div>
<section class="coach-wrap">
	<div class="reg-wrap">
        
        <table class="region-table">
        <thead>
            <tr>
                <th class="td-center">設備名稱</th>
                <th>數量</th>
            </tr>
        </thead>
        <tbody id="devices">
            <?php
            include 'Utils.php';
            include 'DEVICE.php';

            if ($_SESSION["Is_regional"] == null)
            {
                echo "<script>alert('請先登入!'); header(Location:'RegionalLogin.php') </script>";
            }

            $sid = $_GET['sid'];

            $deviceModel = new DEVICE;
            $Utils = new Utils;

            $info = $deviceModel->listBySIDAndYear($sid, $Utils->currentSchoolYear());
            foreach ($info as $row)
            {
                echo "<tr>";
                echo "<td class='td-center'>";
                echo "<a href ='coach_schlist.php'>$row['item'] </a></td>";
                echo "<td>$row['num']</td>";
                echo "</tr>";
            }       
            ?>
        </tbody>
    </table>
    </div>
</section>