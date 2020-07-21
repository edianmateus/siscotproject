<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Painel de Acesso - Siscot</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/x-icon" href="login/images/icons/favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="login/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="login/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="login/vendor/animate/animate.css">
	<link rel="stylesheet" type="text/css" href="login/css/util.css">
	<link rel="stylesheet" type="text/css" href="login/css/main.css">
	<link rel="stylesheet" href="/siscot/assets/fonts/Roboto-Regular.ttf">
	<style>
		body{
    		font-family: 'Roboto', sans-serif;
		}
	</style>
</head>
<body>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-t-50 p-b-90">
				<form action="login.php" method="post" class="login100-form validate-form flex-sb flex-w">
					<div class="col-xs-12 text-center login100-form-title">
						<img src="/siscot/assets/images/sistema/logo_roxo.png"
							style="width: 180px; height: 200px;" 
							alt="Siscot"/>
					</div>
					<span class="login100-form-title p-b-51">Siscot
					</span>
					<div class="wrap-input100 validate-input m-b-16" data-validate = "Informe o CPF">
						<input class="input100" type="text" name="cpf" autocomplete="user" placeholder="CPF">
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100 validate-input m-b-16" data-validate = "Informe a senha">
						<input class="input100" type="password" name="password" autocomplete="password" placeholder="Senha">
						<span class="focus-input100"></span>
					</div>
					<div class="flex-sb-m w-full p-t-3 p-b-24">
					</div>
					<div class="container-login100-form-btn m-t-17">
						<button type="submit" class="login100-form-btn">
							Login
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<script src="login/vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="login/vendor/animsition/js/animsition.min.js"></script>
	<script src="login/vendor/bootstrap/js/popper.js"></script>
	<script src="login/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="login/js/main.js"></script>
</body>
</html>