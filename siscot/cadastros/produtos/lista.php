<?php require_once('../cabeca.php'); ?>

<link rel="stylesheet" type="text/css" href="/siscot/assets/DataTables/datatables.min.css"/>

	<div class="col-xs-12">
		<h4 class="header blue">
			Produtos
			<a class="btn btn-xs btn-primary pull-right" id="novo" onclick="abrirmodalnovo();">
				<em class="fa fa-plus"></em>
				<span>Adicionar Novo</span>
			</a>
		</h4>
		
		<div class="clearfix">
			<div class="pull-right tableTools-container">
			</div>
		</div>
		<div class="table-header">
			Produtos disponíveis
		</div>
		<div id="lista_padrao">
			
		</div>
	</div>
	
	<?php require_once('../cabecamodal.php'); ?>
	<?php require_once('novo.php'); ?>
	<?php require_once('../rodapemodal.php'); ?>

<?php require_once('../rodape.php'); ?>
<script type="text/javascript" src="/siscot/assets/DataTables/datatables.min.js"></script>
<script type="text/javascript" src="javascript.js"></script>