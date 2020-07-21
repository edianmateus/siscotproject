<?php 
	require_once("../../classes/ClassConexao.php");  
	require_once("../../classes/ClassCrud.php");  
	
	//METODO PARA INSERIR NOVA ENTIDADE...
	if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['codigo']) && $_POST['codigo'] == 0){
		$pdo = Conexao::getInstance();  
		$crud = Crud::getInstance($pdo, 't_usuarios');  
		$sql = array(
			't_nome' => $_POST['t_nome'], 
			't_cpf'=> $_POST['t_cpf'],
			't_senha'=> $_POST['t_senha'],
			't_email'=> $_POST['t_email'],
			't_fone'=> $_POST['t_fone'],
			'c_empresa'=> $_POST['c_empresa'],
			'c_grupos'=> $_POST['c_grupos'],
			'c_perfil'=> $_POST['c_perfil'],
			'c_ativo'=> isset($_POST['c_ativo']) ? $_POST['c_ativo'] : 'false',
			'c_usuariocad'=> $_SESSION['c_usuario']
		);  
		$retorno  = $crud->insert($sql);
		$crud->trataMensagemRetornoInsert($retorno);
	}

	//METODO PARA ATUALIZAR UMA ENTIDADE...
	if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['codigo']) && $_POST['codigo'] != 0){
		$pdo = Conexao::getInstance();  
		$crud = Crud::getInstance($pdo, 't_usuarios');  
		
		$sql = array(
			't_nome' => $_POST['t_nome'], 
			't_cpf'=> $_POST['t_cpf'],
			't_senha'=> $_POST['t_senha'],
			't_email'=> $_POST['t_email'],
			't_fone'=> $_POST['t_fone'],
			'c_empresa'=> $_POST['c_empresa'],
			'c_grupos'=> $_POST['c_grupos'],
			'c_perfil'=> $_POST['c_perfil'],
			'c_ativo'=> isset($_POST['c_ativo']) ? $_POST['c_ativo'] : 'false',
			'c_usuarioup'=> $_SESSION['c_usuario']
		); 
		$paramUpdate = array('c_usuario=' => $_POST['codigo']);  
		$retorno   = $crud->update($sql, $paramUpdate);  
		$crud->trataMensagemRetornoUpdate($retorno);
	}

	//METODO PARA BUSCAR A LISTA PRINCIPAL...
	if($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['buscarLista'])){
		$pdo = Conexao::getInstance();  
		$crud = Crud::getInstance($pdo, 't_usuarios');  
		
		$retorno = array();

		$sql = "SELECT t1.*, t2.t_perfil
					FROM  t_usuarios as t1 
						JOIN t_perfil AS t2 ON t1.c_perfil = t2.c_perfil 
					WHERE t1.c_usuario <> 0 ";  
		
		if(!$_SESSION['interno']){
			$sql .= " AND t1.c_empresa in (".rtrim($_SESSION['c_empresa'], ",").")";
			if(isset($_SESSION['c_empresas_grupo'])){
				$sql .= " AND t1.c_empresa in (".rtrim($_SESSION['c_empresas_grupo'], ",").")";
			}
		}

		$dados  = $crud->getSQLGeneric($sql, [], TRUE); 
		foreach ($dados as $key => $value) {
			$retorno[] = $value;
		}
		echo json_encode($retorno);
	}
	//METODO PARA BUSCAR UMA ENTIDADE, USADO AO EDITAR...
	if($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['codigo'])){
		$pdo = Conexao::getInstance();  
		$crud = Crud::getInstance($pdo, 't_usuarios');  

		$retorno = array();

		$sql = "SELECT t1.* FROM  t_usuarios as t1 WHERE t1.c_usuario = ? ";  
		
		if(!$_SESSION['interno']){
			$sql .= " AND t1.c_empresa in (".rtrim($_SESSION['c_empresa'], ",").")";
			if(isset($_SESSION['c_empresas_grupo'])){
				$sql .= " AND t1.c_empresa in (".rtrim($_SESSION['c_empresas_grupo'], ",").")";
			}
		}

		$dadosEntidade  = $crud->getSQLGeneric($sql, array($_GET["codigo"]), TRUE); 

		foreach ($dadosEntidade as $key => $value) {
			$retorno[] = $value;
		}
		echo json_encode($retorno);
	}
?>