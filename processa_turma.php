<?php include_once("dao/conexao.php");

	$id_cursos = $_REQUEST['id_cursos'];
	
	$result_turmas = "SELECT * FROM turmas WHERE id_curso=$id_cursos";
	$resultado_turmas = mysqli_query($con, $result_turmas);
	
	while ($row_turma = mysqli_fetch_assoc($resultado_turmas) ) {
		$turma[] = array(
			'id'	=> $row_turma['id'],
			'nome_turma' => $row_turma['nome_turma'],
		);
	}
	
	echo(json_encode($turma));