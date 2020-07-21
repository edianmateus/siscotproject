<?php 
	require_once("../../classes/ClassConexao.php");  
	require_once("../../classes/ClassCrud.php");  
	
	//METODO PARA INSERIR NOVA ENTIDADE...
	if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['codigo']) && $_POST['codigo'] == 0){
		$pdo = Conexao::getInstance();  
		$crud = Crud::getInstance($pdo, 't_grupos');  
		$sql = array(
			't_grupo' => $_POST['t_grupo'], 
			't_empresas_grupo' => implode( ", ", $_POST['t_empresas_grupo']), 
			'c_empresa'=> $_SESSION['c_empresa'],
			'c_usuariocad'=> $_SESSION['c_usuario']
		);  
		$retorno  = $crud->insert($sql);
		$crud->trataMensagemRetornoInsert($retorno);
	}

	
	//METODO PARA ATUALIZAR UMA ENTIDADE...
	if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['codigo']) && $_POST['codigo'] != 0){
		$pdo = Conexao::getInstance();  
		$crud = Crud::getInstance($pdo, 't_grupos');  
		$sql = array(
			't_grupo' => $_POST['t_grupo'], 
			't_empresas_grupo' => implode( ", ", $_POST['t_empresas_grupo']), 
			'c_empresa'=> $_SESSION['c_empresa'],
			'c_usuariocad'=> $_SESSION['c_usuario']
		);  
		$paramUpdate = array('c_grupo=' => $_POST['codigo']);  
		$retorno   = $crud->update($sql, $paramUpdate);  
		$crud->trataMensagemRetornoUpdate($retorno);
	}

	//METODO PARA BUSCAR A LISTA PRINCIPAL...
	if($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['buscarLista'])){
		$pdo = Conexao::getInstance();  
		$crud = Crud::getInstance($pdo, 't_grupos');  
		
		$retorno = array();

		$sql = "SELECT * FROM  t_grupos as t1 WHERE t1.c_grupo <> 0 ";
		
		if(!$_SESSION['interno']){
			$sql .= " AND t1.c_empresa in (".rtrim($_SESSION['c_empresa'], ",").")";
			if(isset($_SESSION['c_empresas_grupo'])){
				$sql .= " AND t1.c_empresa in (".rtrim($_SESSION['c_empresas_grupo'], ",").")";
			}
		}

		$sql.= " ORDER BY t1.t_grupo asc";  

		$dados  = $crud->getSQLGeneric($sql, [], TRUE); 
		foreach ($dados as $key => $value) {
			$retorno[] = $value;
		}
		echo json_encode($retorno);
	}
	//METODO PARA BUSCAR UMA ENTIDADE, USADO AO EDITAR...
	if($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['codigo'])){
		$pdo = Conexao::getInstance();  
		$crud = Crud::getInstance($pdo, 't_grupos');  

		$retorno = array();

		$sql = "SELECT 
							t1.c_grupo,
							t1.t_empresas_grupo as 't_empresas_grupo[]', 
							t1.t_grupo,
							t1.c_empresa 
								FROM  t_grupos as t1  WHERE t1.c_grupo = ? ";  
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