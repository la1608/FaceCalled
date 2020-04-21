<?php

include_once "dao/conexao.php";

$nome = $_POST["nome"];
$cpf = $_POST["cpf"];
$senha = $_POST["senha"];
$id_cursos = $_POST["id_cursos"];
$id_turmas = $_POST["id_turmas"];


$senhaSegura = password_hash($senha, PASSWORD_DEFAULT);

$sql = $con->query("SELECT * FROM alunos WHERE cpf_aluno='$cpf'");

if(mysqli_num_rows($sql) > 0){
	echo "<script>alert('Aluno já cadastrado!');window.location='cadastroAluno.php'</script>";
exit();
} else {
 !$con->query("INSERT INTO alunos (nome_aluno,cpf_aluno,senha,id_curso,id_turma) 
 VALUES ('$nome','$cpf','$senhaSegura',$id_cursos,$id_turmas)");
 echo "<script>alert('Cadastro realizado com sucesso!');window.location='cadastroAluno.php'</script>";
}
$con->close();

?>
