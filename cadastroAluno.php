<?php
include_once("dao/conexao.php");

$result_cursos ="SELECT * FROM cursos";
$resultado_cursos= mysqli_query($con, $result_cursos);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<link rel="stylesheet" type="text/css" href="css/estiloCadastrar.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<meta charset="utf-8"/>
<title> Cadastre-se </title>
<center><img src="imagens/logoUnifeb.png" heigth="200px" width="400px"></center>

</head>
<body>
	<div id = "corpo-form">

	<h1 class="text-white">Cadastro</h1> 
	<form action="envioCadastro.php" method="POST"  onsubmit="return(verifica())">
	
	<div class="form-group row">
  <label class="col-sm-2 col-form-label text-white-50">Nome</label>
    <div class="col-sm-6">
	<input type="text" class="form-control" required="required" name="nome"> 
    </div>
  </div>
  <div class="form-group row">
  <label  class="col-sm-2 col-form-label text-white-50">CPF</label>
    <div class="col-sm-6">
      <input type="text" class="form-control" required="required" name="cpf" onkeyup="mascara('###.###.###-##',this,event,true)">
    </div>
  </div>

  <div class="form-group row">
  <label  class="col-sm-2 col-form-label text-white-50">Curso</label>
    <div class="col-sm-6">
<select class="form-control" name="id_cursos" id="id_cursos">
<option value="">Escolha o Curso</option>
				<?php
					while($row_cursos = mysqli_fetch_assoc($resultado_cursos) ) {
						echo '<option value="'.$row_cursos['id'].'">'.$row_cursos['nome_curso'].'</option>';
					}
				?>
</select>
</div>
  </div>

  <div class="form-group row">
  <label  class="col-sm-2 col-form-label text-white-50">Turma</label>
  <div class="col-sm-6">
			<select class="form-control" name="id_turmas" id="id_turmas">
				<option class="carregando">Aguarde, carregando...</option>
			</select>
				</div>
				</div>

  <div class="form-group row">
  <label  class="col-sm-2 col-form-label text-white-50">Senha</label>
    <div class="col-sm-6">
      <input type="password" class="form-control" required="required" name="senha">
    </div>
  </div>
  <div class="form-group row">
  <label  class="col-sm-2 col-form-label text-white-50">Confirme a Senha</label>
    <div class="col-sm-6">
      <input type="password" class="form-control" required="required" name="senha_confirma" oninput="validaSenha(this)">
    </div>
  </div>
			<input type="submit" value="Cadastrar">
		</form>
	  </div>
		
		<script type="text/javascript" src="https://www.google.com/jsapi"></script>
		<script type="text/javascript">
		  google.load("jquery", "1.4.2");
		</script>
		
		<script type="text/javascript">
		$(function(){
			$('#id_cursos').change(function(){
				if( $(this).val() ) {
					$('#id_turmas').hide();
					$('.carregando').show();
					$.getJSON('processa_turma.php?search=',{id_cursos: $(this).val(), ajax: 'true'}, function(j){
						var options = '<option value="">Escolha a Turma</option>';	
						for (var i = 0; i < j.length; i++) {
							options += '<option value="' + j[i].id + '">' + j[i].nome_turma + '</option>';
						}	
						$('#id_turmas').html(options).show();
						$('.carregando').hide();
					});
				} else {
					$('#id_turmas').html('<option value="">– Aguarde, carregando... –</option>');
				}
			});
		});

	function validaSenha (input){ 
    if (input.value != document.getElementById('senha').value) {
    input.setCustomValidity('Repita a senha corretamente');
  } else {
    input.setCustomValidity('');
  }
} 

</script>		


	  <script src="js/mascaras.js"></script>

</body>
</html>