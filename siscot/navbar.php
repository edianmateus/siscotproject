<div id="navbar" style="z-index: 500;" class="navbar navbar-default ace-save-state navbar-fixed-top">
	<div class="navbar-container ace-save-state" id="navbar-container">
		<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
			<span class="sr-only">Mostrar Menus</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
		<div class="navbar-header pull-left">
			<a href="/siscot/sistema" class="navbar-brand">
				<img src="/siscot/assets/images/sistema/logo_branco.png"
					style="width: 22px; height: 25px; display: inline-flex;" 
					alt="Siscot"/>
				<small>
					<?php echo $titulo_site; ?>
				</small>
			</a>
		</div>
		<div class="navbar-buttons navbar-header pull-right" role="navigation">
			<ul class="nav ace-nav">
				<li class="light-blue dropdown-modal">
					<a data-toggle="dropdown" href="#" class="dropdown-toggle">
						<span class="user-info center" style="margin: 7px;">
							<?php echo $_SESSION['t_nome']; ?>
						</span>
						<i class="ace-icon fa fa-caret-down"></i>
					</a>
					<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close pd-top-0">
						<li>
							<a href="/siscot/logout.php">
								<i class="ace-icon fa fa-power-off"></i>
								Sair
							</a>
						</li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
</div>
			