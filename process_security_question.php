<?
include 'db_connect.php';
include 'security.php';

sec_session_start();
// Our custom secure way of starting a php session.
$userid = $_SESSION['user_id'];
$randValue = rand(0,2);	

switch ($randValue) {
	case 0:
			if ($stmt = $mysqli -> prepare("SELECT security_questions.question, members.s_answer1 FROM members JOIN security_questions WHERE members.id = '$userid' and security_questions.id = members.s_question1")) {
		$stmt -> execute();
		$stmt -> store_result();
		$stmt -> bind_result($s_question, $memberAnswer);
		$stmt -> fetch();
		if($stmt->num_rows == 1){
			$_SESSION['question'] = $s_question;
			$_SESSION['answer'] = $memberAnswer;
		}
		$stmt -> close();

	}
		break;
		
	case 1:
			if ($stmt = $mysqli -> prepare("SELECT security_questions.question, members.s_answer2 FROM members JOIN security_questions WHERE members.id = '$userid' and security_questions.id = members.s_question2")) {
		$stmt -> execute();
		$stmt -> store_result();
		$stmt -> bind_result($s_question, $memberAnswer);
		$stmt -> fetch();
		if($stmt->num_rows == 1){
			$_SESSION['question'] = $s_question;
			$_SESSION['answer'] = $memberAnswer;
		}
		$stmt -> close();

	}
		break;
	
	case 2:
			if ($stmt = $mysqli -> prepare("SELECT security_questions.question, members.s_answer3 FROM members JOIN security_questions WHERE members.id = '$userid' and security_questions.id = members.s_question3")) {
		$stmt -> execute();
		$stmt -> store_result();
		$stmt -> bind_result($s_question, $memberAnswer);
		$stmt -> fetch();
		if($stmt->num_rows == 1){
			$_SESSION['question'] = $s_question;
			$_SESSION['answer'] = $memberAnswer;
		}
		$stmt -> close();

	}
		break;
	
	default:
		
		break;
}

?>