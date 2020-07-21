<div id="sidebar" class="sidebar responsive ace-save-state">
	<script type="text/javascript">
		try{ace.settings.loadState('sidebar')}catch(e){}
	</script>
	<ul class="nav nav-list">
		<?php 
			foreach ($_SESSION['menus'] as $menu) {
				echo "<li class=''>
						<a href='".$menu['t_url']."' class='dropdown-toggle'>
							<i class='menu-icon ".$menu['t_icone']."'></i>
							<span class='menu-text'>
								".$menu['t_menu']."
							</span>
							<b class='arrow fa fa-angle-down'></b>
						</a>
						<b class='arrow'></b>
					<ul class='submenu'>";
				foreach ($menu['sub_menus'] as $sub) {
					echo  "<li class=''>
								<a href='".$sub['t_url']."'>
									<i class='menu-icon fa fa-caret-right'></i>
									".$sub['t_menu']."
								</a>
								<b class='arrow'></b>
							</li>";
				}
				echo "</ul></li>";
			}
		?>
	</ul>
	<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
		<i id="sidebar-toggle-icon" 
			title="Recolher/Expandir Menu" 
			class="ace-icon fa fa-angle-double-left ace-save-state" 
			data-icon1="ace-icon fa fa-angle-double-left" 
			data-icon2="ace-icon fa fa-angle-double-right"></i>
	</div>
</div>