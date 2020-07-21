<?php 
	require_once("../../classes/ClassConexao.php");  
	require_once("../../classes/ClassCrud.php");  

	//METODO PARA BUSCAR A LISTA PRINCIPAL...
	if($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['buscarEstados'])){
		$pdo = Conexao::getInstance();  
		$crud = Crud::getInstance($pdo, 't_cidades');  
		
		$retorno = array();

		$sql = "SELECT distinct(c_uf), t_cidades.t_uf FROM t_cidades ORDER BY t_cidades.t_uf ";

		$dados  = $crud->getSQLGeneric($sql, [], TRUE); 
		foreach ($dados as $key => $value) {
			$retorno[] = $value;
		}
		echo json_encode($retorno);
    }
    
    	//METODO PARA BUSCAR A LISTA PRINCIPAL...
	if($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['buscarListaPorEstado'])){
		$pdo = Conexao::getInstance();  
		$crud = Crud::getInstance($pdo, 't_cidades');  
		
		$retorno = array();

		$sql = "SELECT distinct(c_cidade), t_cidades.t_cidade 
                    FROM t_cidades 
                        WHERE t_cidades.c_uf = ".$_GET['buscarListaPorEstado']." 
                            ORDER BY t_cidades.t_cidade ";

		$dados  = $crud->getSQLGeneric($sql, [], TRUE); 
		foreach ($dados as $key => $value) {
			$retorno[] = $value;
		}
		echo json_encode($retorno);
	}

?>