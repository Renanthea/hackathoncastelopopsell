<?php
include_once('config.php');
if(isset($_GET['logout'])){
	setcookie("logado", "", time() - 3600);
	setcookie("id_usuario", "", time() - 3600);
	unset($_SESSION['logado']);
	unset($_SESSION['id_usuario']);
	unset($_SESSION['nome_usuario']);
	header('Location: login.php');
}
$erro = "";
$email = "";
if(isset($_POST['email'])){
	$email = $_POST['email'];
	if($_POST['email']!="" && $_POST['senha']!=""){


		$senha = md5($_POST['senha']);

		$manterconectado = $_POST['manterconectado'];

		$result = query("SELECT id FROM users WHERE email = '$email'");

		if (mysql_num_rows($result) > 0) {
			$id_usuario = mysql_result($result, 0);
			$result = query("SELECT name FROM users WHERE id = $id_usuario AND password = '$senha'");

			if (mysql_num_rows($result) > 0) {
				$ln = mysql_fetch_array($result);
				$_SESSION['logado'] = true;
				$_SESSION['id_usuario'] = $id_usuario;
				$_SESSION['nome_usuario'] = $ln['name'];

				if($manterconectado=="on"){
					setcookie('logado', true, time() + (86400 * 30), "/");
					setcookie('id_usuario', $id_usuario, time() + (86400 * 30), "/");
				}
				header('Location: index.php');


			} else {
				$erro = 'Senha inválida.';
			}
		} else {
			$erro = 'Email não encontrado.';
		}

	}else{
		$erro = "Preencha todos os campos obrigatórios.";
	}
}
if($erro!=""){
	$erro = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>'.$erro.'</div>';
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Login - PopSell</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<!-- Bootstrap 3.3.6 -->
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="dist/css/AdminLTE.min.css">
	<!-- iCheck -->
	<link rel="stylesheet" href="plugins/iCheck/square/blue.css">

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
	<style>
	.login-page, .register-page {
		background: #5E127C;
	}
	.login-logo {
		color: #EA860E;
	}
	</style>
</head>
<body class="hold-transition login-page">
	<div class="login-box">
		<div class="login-logo">
			Pop<b>Sell</b>
		</div>
		<!-- /.login-logo -->
		<div class="login-box-body">
			<p class="login-box-msg">Faça login para iniciar a sessão</p>

			<form method="post">
				<div class="form-group has-feedback">
					<input type="email" name="email" class="form-control" placeholder="E-mail" value="<?= $email?>">
					<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
				</div>
				<div class="form-group has-feedback">
					<input type="password" name="senha" class="form-control" placeholder="Senha">
					<span class="glyphicon glyphicon-lock form-control-feedback"></span>
				</div>
				<div class="row">
					<div class="col-xs-8">
						<div class="checkbox icheck">
							<label>
								<input type="checkbox" name="manterconectado"> Manter conectado
							</label>
						</div>
					</div>
					<!-- /.col -->
					<div class="col-xs-4">
						<input type="submit" class="btn btn-primary btn-block btn-flat" value="Entrar"/>
					</div>
					<!-- /.col -->
				</div>
			</form>
			<?= $erro ?>
		</div>
		<!-- /.login-box-body -->
	</div>
	<!-- /.login-box -->

	<!-- jQuery 2.2.3 -->
	<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
	<!-- Bootstrap 3.3.6 -->
	<script src="bootstrap/js/bootstrap.min.js"></script>
	<!-- iCheck -->
	<script src="plugins/iCheck/icheck.min.js"></script>
	<script>
	$(function () {
		$('input').iCheck({
			checkboxClass: 'icheckbox_square-blue',
			radioClass: 'iradio_square-blue',
			increaseArea: '20%' // optional
		});
	});
	</script>
</body>
</html>
