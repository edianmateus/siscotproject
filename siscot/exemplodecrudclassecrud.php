<?php require_once "Conexao.class.php";  
 require_once "Crud.class.php"; 
 
 // Consumindo métodos do CRUD genérico 
 
 // Atribui uma conexão PDO   
 $pdo = Conexao::getInstance();  
 
 // Atribui uma instância da classe Crud, passando como parâmetro a conexão PDO e o nome da tabela  
 $crud = Crud::getInstance($pdo, 'TAB_USUARIO');  
 
 // Inseri os dados do usuário
 $arrayUser = array('nome' => 'João', 'email' => 'joao@gmail.com', 'senha' => base64_encode('123456'), 'privilegio' => 'A');  
 $retorno   = $crud->insert($arrayUser);  
 
 // Editar os dados do usuario com id 1 
 $arrayUser = array('nome' => 'João da Silva', 'email' => 'joao@gmail.com.br', 'senha' => base64_encode('654321'), 'privilegio' => 'A');  
 $arrayCond = array('id=' => 1);  
 $retorno   = $crud->update($arrayUser, $arrayCond);  
 
 // Exclui o registro do usuário com id 1 
 $arrayCond = array('id=' => 1);  
 $retorno   = $crud->delete($arrayCond);  
 
 // Consulta os dados do usuário com id 1 e privilegio A 
 $sql        = "SELECT nome, email, privilegio FROM TAB_USUARIO WHERE id = ? AND privilegio = ?";  
 $arrayParam = array(1, 'A');  
 $dados      = $crud->getSQLGeneric($sql, $arrayParam, FALSE); 