<?php
require_once 'dbConfig.php';
require_once 'models.php';


if (isset($_POST['insertNewStudentBtn'])) {
	$firstName = trim($_POST['firstName']);
	$lastName = trim($_POST['lastName']);
	$gender = trim($_POST['gender']);
	$age = trim($_POST['age']);
	$course = trim($_POST['course']);
	$position = trim($_POST['position']);
	$ethnicity = trim($_POST['ethnicity']);

	if (!empty($firstName) && !empty($lastName) && !empty($gender) && !empty($age) && !empty($course)  && !empty($course)  && !empty($position) && !empty($ethnicity)) {
			$query = insertIntoStudentRecords($pdo, $firstName, $lastName, 
			$gender, $age, $course, $position, $ethnicity);

		if ($query) {
			header("Location: ../index.php");
		}

		else {
			echo "Insertion failed";
		}
	}

	else {
		echo "Make sure that no fields are empty";
	}
	
}


if (isset($_POST['editStudentBtn'])) {
	$student_id = $_GET['student_id'];
	$firstName = trim($_POST['firstName']);
	$lastName = trim($_POST['lastName']);
	$gender = trim($_POST['gender']);
	$age = trim($_POST['age']);
	$course = trim($_POST['course']);
	$position = trim($_POST['position']);
	$ethnicity = trim($_POST['ethnicity']);

	if (!empty($student_id) && !empty($firstName) && !empty($lastName) && !empty($gender) && !empty($age) && !empty($course) && !empty($position) && !empty($ethnicity)) {

		$query = updateAStudent($pdo, $student_id, $firstName, $lastName, $gender, $age, $course, $position, $ethnicity);

		if ($query) {
			header("Location: ../index.php");
		}
		else {
			echo "Update failed";
		}

	}

	else {
		echo "Make sure that no fields are empty";
	}

}





if (isset($_POST['deleteStudentBtn'])) {

	$query = deleteAStudent($pdo, $_GET['student_id']);

	if ($query) {
		header("Location: ../index.php");
	}
	else {
		echo "Deletion failed";
	}
}


?>