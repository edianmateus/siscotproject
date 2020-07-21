<?php
	require_once("classes/ClassConexao.php");  

	$cpf = isset($_POST['cpf']) ? $_POST['cpf'] : '';
	$password = isset($_POST['password']) ? $_POST['password'] : '';

	if (empty($cpf) || empty($password)){
		header('Location: index');
		exit;
	}

	$PDO = Conexao::getInstance();  
	$sql = "SELECT u.c_usuario, u.t_nome, u.c_empresa, u.c_tipo, p.c_perfil, u.c_grupos as groups
			FROM t_usuarios as u, t_perfil as p
				WHERE u.t_cpf = :cpf 
					AND u.t_senha = :password 
					AND u.c_ativo = 'true' 
					AND u.c_perfil = p.c_perfil;";
	$stmt = $PDO->prepare($sql);
	$stmt->bindParam(':cpf', $cpf);
	$stmt->bindParam(':password', $password);
	$stmt->execute();
	$usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);

	if (count($usuarios) <= 0){
		header('Location: index.php');
	 	exit;
	} 
	$usuarios = $usuarios[0]; 

	$sqlGrupo = "SELECT t_empresas_grupo FROM t_grupos WHERE c_grupo IN (".$usuarios['groups'].")";
	$sqlGrupoExec = $PDO->prepare($sqlGrupo);
	$sqlGrupoExec->execute();
	$grupos = $sqlGrupoExec->fetchAll(PDO::FETCH_ASSOC);
	
	foreach ($grupos as $key => $value) {
		if(!$key == count($grupos)){
			$empresasGrupos .= $value['t_empresas_grupo'].","; 
		}else{
			$empresasGrupos .= $value['t_empresas_grupo']; 
		}
	}

	$sqlMenu = "SELECT * FROM t_menus WHERE c_menu in (SELECT c_menu FROM t_perfil_menus WHERE c_perfil = '".$usuarios['c_perfil']."');";
	$sqlMenuExec = $PDO->prepare($sqlMenu);
	$sqlMenuExec->execute();
	$menus = $sqlMenuExec->fetchAll(PDO::FETCH_ASSOC);
	$menuFinal = [];
	construirMenu($menus, $menuFinal, null);

	session_start();

	$_SESSION['logged_in'] = true;
	$_SESSION['c_usuario'] = $usuarios['c_usuario'];
	$_SESSION['interno'] = $usuarios['c_tipo']; // 1 = interno
	$_SESSION['c_empresa'] = $usuarios['c_empresa'];
	$_SESSION['c_empresas_grupo'] = $empresasGrupos;
	$_SESSION['t_nome'] = $usuarios['t_nome'];
	$_SESSION['c_perfil'] = $usuarios['c_perfil'];
	$_SESSION['menus'] = $menuFinal;
	$_SESSION['c_bd'] = "4";

	$nomepc = gethostbyaddr($_SERVER['REMOTE_ADDR']);
	if($nomepc == $_SERVER["REMOTE_ADDR"]){
		$nomepc = '0';
	}
	
	$sqllog = "insert into t_log_acesso(c_usuario, t_ip, t_nomepc)values('".$usuarios['c_usuario']."', '".$_SERVER["REMOTE_ADDR"]."', '".$nomepc."')";
	$stlog = $PDO->prepare($sqllog);
	$stlog->execute();

	header('Location: sistema');
?>