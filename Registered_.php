<?php
	session_start();
	$sch_country = $_POST['sch_country'];
	if ($sch_country=="請選擇")
	{
		echo "<script>alert('請選擇學校縣市！'); location.href='Registered.php'</script>";
	}
	else
	{
		$_SESSION["Sch_country"] = $sch_country;

		echo "<script>location.href='Registered_2.php'</script>";
	}
?>