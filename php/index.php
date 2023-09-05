<?php
	include('conexao.php');
	
	if(isset($_POST['email']) || isset($_POST['senha'])){
		if(strlen($_POST['email']) == 0){
			echo "Informe seu e-mail";
		} else if(strlen($_POST['senha']) == 0){
			echo "Informe sua senha";
		} else {
			$email = $mysqli->real_escape_string($_POST['email']);
			$senha = $mysqli->real_escape_string($_POST['senha']);
			
			$sql_code = "Select * From usuarios Where email = '$email' And senha = '$senha'";
			$sql_query = $mysqli->query($sql_code) or die("Falha na consulta de usuários: " . $mysqli->error);
			
			$quantidade = $sql_query->num_rows;
			
			if($quantidade == 1){
				$usuario = $sql_query->fetch_assoc();
				
				if(!isset($_SESSION)){
					session_start();
				}
				
				$_SESSION['user'] = $usuario['id'];
				$_SESSION['name'] = $usuario['nome'];
				
				header("Location: painel.php")
					
			} else {
				echo "Falha ao logar! E-mail ou senha incorretos";
			}
		}
	}
?>
<DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE-edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login</title>
</head>
<body>
	<h1>Acesse sua conta</h1>
	<form action="" method="POST">
		<p>
			<label>E-mail</label>
			<input type="text" name="email">
		</p>
		<p>
			<label>Senha</label>
			<input type="password" name="senha">
		</p>
		<p>
			<button type="submit">Entrar</button>
		</p>
	</form>
</body>
</html>