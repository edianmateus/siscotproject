<?php 
	require_once("../../classes/ClassConexao.php");  
	require_once("../../classes/ClassCrud.php");  
	
	//METODO PARA INSERIR NOVA ENTIDADE...
	if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['codigo']) && $_POST['codigo'] == 0){
		$pdo = Conexao::getInstance();  
		$crud = Crud::getInstance($pdo, 't_empresas');  
		$sql = array(
			't_fantasia' => $_POST['t_fantasia'], 
			't_razao'=> $_POST['t_razao'],
			't_cpfcnpj'=> $_POST['t_cpfcnpj'],
			't_responsavel'=> $_POST['t_responsavel'],
			't_email'=> $_POST['t_email'],
			't_fone'=> $_POST['t_fone'],
			't_endereco'=> $_POST['t_endereco'],
			't_numero'=> $_POST['t_numero'],
			't_bairro'=> $_POST['t_bairro'],
			'c_cidade'=> $_POST['c_cidade'],
			'c_uf'=> $_POST['c_uf'],
			't_obs'=> $_POST['t_obs'],
			'c_ativo'=> isset($_POST['c_ativo']) ? $_POST['c_ativo'] : 'false',
			'c_usuariocad'=> $_SESSION['c_usuario']
		);  
		$retorno  = $crud->insert($sql);
		$crud->trataMensagemRetornoInsert($retorno);
	}

	
	//METODO PARA ATUALIZAR UMA ENTIDADE...
	if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['codigo']) && $_POST['codigo'] != 0){
		$pdo = Conexao::getInstance();  
		$crud = Crud::getInstance($pdo, 't_empresas');  
		$sql = array(
			't_fantasia' => $_POST['t_fantasia'], 
			't_razao'=> $_POST['t_razao'],
			't_cpfcnpj'=> $_POST['t_cpfcnpj'],
			't_responsavel'=> $_POST['t_responsavel'],
			't_email'=> $_POST['t_email'],
			't_fone'=> $_POST['t_fone'],
			't_endereco'=> $_POST['t_endereco'],
			't_numero'=> $_POST['t_numero'],
			't_bairro'=> $_POST['t_bairro'],
			'c_cidade'=> $_POST['c_cidade'],
			'c_uf'=> $_POST['c_uf'],
			't_obs'=> $_POST['t_obs'],
			'c_ativo'=> isset($_POST['c_ativo']) ? $_POST['c_ativo'] : 'false',
			'c_usuarioup'=> $_SESSION['c_usuario']
		);  
		$paramUpdate = array('c_empresa=' => $_POST['codigo']);  
		$retorno   = $crud->update($sql, $paramUpdate);  
		$crud->trataMensagemRetornoUpdate($retorno);
	}

	//METODO PARA BUSCAR A LISTA PRINCIPAL...
	if($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['buscarLista'])){
		$pdo = Conexao::getInstance();  
		$crud = Crud::getInstance($pdo, 't_empresas');  
		
		$retorno = array();

		$sql = "SELECT * FROM  t_empresas as t1 WHERE t1.c_empresa <> 0 ";
		
		if(!$_SESSION['interno']){
			$sql .= " AND t1.c_empresa in ('".$_SESSION['c_empresa']."')";
			if(isset($_SESSION['c_empresas_grupo'])){
				$sql .= " AND t1.c_empresa in ('".$_SESSION['c_empresas_grupo']."')";
			}
		}

		$sql.= " ORDER BY t1.t_fantasia asc";   
		$dados  = $crud->getSQLGeneric($sql, [], TRUE); 
		foreach ($dados as $key => $value) {
			$retorno[] = $value;
		}
		echo json_encode($retorno);
	}
	//METODO PARA BUSCAR UMA ENTIDADE, USADO AO EDITAR...
	if($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['codigo'])){
		$pdo = Conexao::getInstance();  
		$crud = Crud::getInstance($pdo, 't_empresas');  

		$retorno = array();

		$sqlEntidade = "SELECT * FROM  t_empresas as t1  WHERE t1.c_empresa = ? ";  

		if(!$_SESSION['interno']){
			$sqlEntidade .= " AND t1.c_empresa in ('".$_SESSION['c_empresa']."')";
			if(isset($_SESSION['c_empresas_grupo'])){
				$sqlEntidade .= " AND t1.c_empresa in ('".$_SESSION['c_empresas_grupo']."')";
			}
		}

		$paramEntidade = array($_GET["codigo"]);  
		$dadosEntidade  = $crud->getSQLGeneric($sqlEntidade, $paramEntidade, TRUE); 

		foreach ($dadosEntidade as $key => $value) {
			$retorno[] = $value;
		}
		echo json_encode($retorno);
	}
?>