<?php
session_start();
include_once("../db/conexao.php");
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
if(!empty($id))
{
	$query = "DELETE FROM temas WHERE id='$id'";
	$result_query = mysqli_query($conn, $query);
	if(mysqli_affected_rows($conn))
	{
		$_SESSION['msg'] = "<p style='color:green;'>Você excluiu este Tema</p>";
		header("Location: gerir-eventos.php");
	}
	else
	{		
		$_SESSION['msg'] = "<p style='color:red;'>OPERAÇÃO NÃO FOI REALIZADA</p>";
		header("Location: gerir-eventos.php");
	}
}
else
{	
	$_SESSION['msg'] = "<p style='color:red;'>Primeiro Escolha um Tema</p>";
	header("Location: gerir-eventos.php");
}
?>