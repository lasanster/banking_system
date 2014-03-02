<?
include 'db_connect.php';
include 'security.php';

sec_session_start(); // Our custom secure way of starting a php session. 

$correctAnswer = $_SESSION['answer'];

if(isset($_POST['answer']) && !empty($_POST["answer"]))
{
	$givenAnswer = $_POST['answer'];
	
	if( $correctAnswer == $givenAnswer)
	{
		header('Location: change_profile.php');
		exit();
	}
	
	else 
	{
		header('Location: security_questions.php?error=1');
		exit();
	}
}

?>