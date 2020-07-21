<?php 
	require_once("../../classes/ClassConexao.php");  
	require_once("../../classes/ClassCrud.php");  
	
	//METODO PARA INSERIR NOVA ENTIDADE...
	if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['codigo']) && $_POST['codigo'] == 0){
		$pdo = Conexao::getInstance();  
		$crud = Crud::getInstance($pdo, 't_perfil');  

		$sql = array(
			't_perfil' => $_POST['t_perfil'], 
			'c_empresa'=> $_SESSION['c_empresa'],
			'c_usuariocad'=> $_SESSION['c_usuario']
		);  
		$retorno  = $crud->insert($sql);
		if($retorno){
			$codigo = $pdo->lastInsertId();
			$crud->setTableName('t_perfil_menus');
			foreach ($_POST as $nome => $valor) {
				if(is_numeric($nome) && $valor == true){
					$sql = array(
						'c_menu' => $nome, 
						'c_perfil' => $codigo, 
					);  
					$retorno = $crud->insert($sql);
				}
			}
			$crud->trataMensagemRetornoInsert($retorno);
		}else{
			$crud->trataMensagemRetornoInsert($retorno);
		}
	}

	//METODO PARA ATUALIZAR UMA ENTIDADE...
	if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['codigo']) && $_POST['codigo'] != 0){
		$pdo = Conexao::getInstance();  
		$crud = Crud::getInstance($pdo, 't_perfil');  

		$sql = array(
			't_perfil' => $_POST['t_perfil'], 
			'c_empresa'=> $_SESSION['c_empresa'],
			'c_usuarioup'=> $_SESSION['c_usuario']
		);  
		$paramUpdate = array('c_perfil=' => $_POST['codigo']);  
		$retorno   = $crud->update($sql, $paramUpdate);  

		if($retorno){
			$crud->setTableName('t_perfil_menus');
			$condicao = array('c_perfil=' => $_POST['codigo']);  
			$retorno  = $crud->delete($condicao);  
			foreach ($_POST as $nome => $valor) {
				if(is_numeric($nome) && $valor == true){
					$sql = array(
						'c_menu' => $nome, 
						'c_perfil' => $_POST['codigo'], 
					);  
					$retorno = $crud->insert($sql);
				}
			}
			$crud->trataMensagemRetornoUpdate($retorno);
		}else{
			$crud->trataMensagemRetornoUpdate($retorno);
		}
	}

	//METODO PARA BUSCAR A LISTA PRINCIPAL...
	if($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['buscarLista'])){
		$pdo = Conexao::getInstance();  
		$crud = Crud::getInstance($pdo, 't_perfil');  
		
		$sql = "SELECT t1.*, t2.t_fantasia, t3.t_nome
					FROM  t_perfil as t1 
						JOIN t_empresas AS t2 ON t1.c_empresa = t2.c_empresa 
						JOIN t_usuarios AS t3 ON t1.c_usuariocad = t3.c_usuario 
						WHERE t1.c_perfil <> 0 ";
		
		if(!$_SESSION['interno']){
			$sql .= " AND t1.c_empresa in (".rtrim($_SESSION['c_empresa'], ",").")";
			if(isset($_SESSION['c_empresas_grupo'])){
				$sql .= " AND t1.c_empresa in (".rtrim($_SESSION['c_empresas_grupo'], ",").")";
			}
		}

		$sql.= " ORDER BY t1.data_cad desc";   
		$dados  = $crud->getSQLGeneric($sql, [], TRUE); 
		foreach ($dados as $key => $value) {
			$retorno[] = $value;
		}
		echo json_encode($retorno);
	}
	//METODO PARA BUSCAR UMA ENTIDADE, USADO AO EDITAR...
	if($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['codigo'])){
		$pdo = Conexao::getInstance();  
		$crud = Crud::getInstance($pdo, 't_perfil');  

		$retorno = array();

		$sqlEntidade = "SELECT t1.* FROM  t_perfil as t1 WHERE t1.c_perfil = ? ";  

		$sqlMenus = "SELECT t2.c_menu 
						FROM  t_perfil as t1 
						JOIN t_perfil_menus AS t2 ON t1.c_perfil = t2.c_perfil 
						WHERE t1.c_perfil = ? ";
		
		if(!$_SESSION['interno']){
			$sqlEntidade .= " AND t1.c_empresa in (".rtrim($_SESSION['c_empresa'], ",").")";
			if(isset($_SESSION['c_empresas_grupo'])){
				$sqlEntidade .= " AND t1.c_empresa in (".rtrim($_SESSION['c_empresas_grupo'], ",").")";
			}
		}

		$dadosEntidade  = $crud->getSQLGeneric($sqlEntidade, array($_GET["codigo"]), TRUE); 
		$dadosMenus  = $crud->getSQLGeneric($sqlMenus, array($_GET["codigo"]), TRUE); 

		foreach ($dadosEntidade as $key => $value) {
			$retorno[] = $value;
		}
		foreach ($dadosMenus as $key => $value) {
			array_push($retorno, array("c_menu_".$value->c_menu => 'true'));
		}
		echo json_encode($retorno);
	}
?>