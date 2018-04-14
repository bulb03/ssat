<?php
	include_once 'EDUCATIONAL_LECTURE.php';
	$id = $_GET['edulectureID'];

	$EDUCATIONAL_LECTURE = new EDUCATIONAL_LECTURE;
	try{
		$conn = $EDUCATIONAL_LECTURE->connect_db();
		$EDUCATIONAL_LECTURE->deleteByID($conn,$id);
		echo "<script>alert('刪除成功'); location.href='coach_edulecturelist.php'</script>";
	}
	catch(Exception $e){
		echo "<script>alert('刪除失敗'); location.href='coach_edulecturelist.php'</script>";
	}
?>