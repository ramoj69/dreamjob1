<!-- Functions for interacting with the database -->

<?php 

require_once 'dbConfig.php';

function insertIntoStudentRecords($pdo,$first_name, $last_name, $gender, $age, $course, $position, $ethnicity) {

	$sql = "INSERT INTO employee_records (first_name,last_name,gender,age,course,position,ethnicity) VALUES (?,?,?,?,?,?,?)";

	$stmt = $pdo->prepare($sql);

	$executeQuery = $stmt->execute([$first_name, $last_name, $gender, $age, $course, $position, $ethnicity]);

	if ($executeQuery) {
		return true;	
	}
}

function seeAllStudentRecords($pdo) {
	$sql = "SELECT * FROM employee_records";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute();
	if ($executeQuery) {
		return $stmt->fetchAll();
	}
}

function getStudentByID($pdo, $student_id) {
	$sql = "SELECT * FROM employee_records WHERE student_id = ?";
	$stmt = $pdo->prepare($sql);
	if ($stmt->execute([$student_id])) {
		return $stmt->fetch();
	}
}

function updateAStudent($pdo, $student_id, $first_name, $last_name, 
	$gender, $age, $course, $position, $ethnicity) {

	$sql = "UPDATE employee_records 
				SET first_name = ?, 
					last_name = ?, 
					gender = ?, 
					age = ?, 
					course = ?, 
					position = ?, 
					ethnicity = ? 
			WHERE student_id = ?";
	$stmt = $pdo->prepare($sql);
	
	$executeQuery = $stmt->execute([$first_name, $last_name, $gender, 
		$age, $course, $position, $ethnicity, $student_id]);

	if ($executeQuery) {
		return true;
	}
}



function deleteAStudent($pdo, $student_id) {

	$sql = "DELETE FROM employee_records WHERE student_id = ?";
	$stmt = $pdo->prepare($sql);

	$executeQuery = $stmt->execute([$student_id]);

	if ($executeQuery) {
		return true;
	}

}




?>