<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8"/>
<title> Login </title>
<link rel="stylesheet" type="text/css" href="css/estiloLogin.css">
</head>
<body>
<center><img src="imagens/logoUnifeb.png" alt=""></center>
	<div id = "corpo-form">
	<h1>Entrar</h1> 
	<form action="dao/valida.php" method="POST">

		<input type="text" name="usuario" placeholder="E-mail"> 
		<input type="password" name="senha" placeholder="Senha">

		<input type="submit" name="enviar" value="Acessar">
		<a href="cadastroAluno.php"><center><strong>Cadastre-se</strong></center></a>
		

</form>
	  </div>

</body>
</html>