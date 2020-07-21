<!doctype html>
<html lang="pt-br">
	<head>
		<?php require_once('classes/init.php'); ?>
		<?php require_once('verificaConexao.php'); ?>
		<?php require_once('headers.php'); ?>
	</head>
	<body class="skin-1" style="background-color: white !important;">
		<?php require_once('navbar.php'); ?>
		
		<div class="main-container ace-save-state" id="main-container">
			<script type="text/javascript">
				try{ace.settings.loadState('main-container')}catch(e){}
			</script>
		<?php require_once('menus.php'); ?>
				<div class="main-content">
					<div class="main-content-inner">
						<div class="page-content">
							<div class="row">
								<div class="col-xs-12 text-center">
									Bem vindo,   <?php echo $_SESSION['t_nome']; ?>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="footer">
					<div class="footer-inner">
					</div>
				</div>

				<a href="#" id="btn-scroll-up" title="Voltar ao Topo" class="btn-scroll-up btn btn-md btn-inverse">
					<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
				</a>
		</div>
		<?php require_once('footers.php'); ?>
	</body>
</html>