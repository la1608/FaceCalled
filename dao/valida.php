<?php
		include "conexao.php";

		session_start();
	$usuario = $_POST['usuario'];
	$senha = $_POST['senha'];

		$sql = "SELECT * FROM alunos WHERE nome_aluno = '$usuario' or cpf_aluno ='$usuario' ";
		
		$res = $con->query($sql);
		$linha = $res->fetch_assoc();
	
	$id = $linha['id'];
	$nome = $linha['nome_aluno'];
	$senha_db = $linha['senha'];
	$cpf = $linha['cpf_aluno'];

	
	if (($usuario == $nome || $usuario == $cpf ) && password_verify($senha,$senha_db))

	{
	
		session_start();
		$_SESSION['id'] = $id;
		$_SESSION['nome_aluno'] = $nome;
	
		header('location: ../inicio.php'); 
	}

	else

	{
		
		header('location: ../login.php');
	}
	

	}

?>