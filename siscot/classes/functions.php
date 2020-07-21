<?php
	function make_hash($str){
		return sha1(md5($str));
	}
	function isLoggedIn(){
		if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] != true){
			return false;
		}
		return true;
	}
	function construirMenu(array $menus, array &$menuFinal, $menuSuperiorId, $nivel = 0){
		foreach ($menus as $menu) {
			if ($menu['c_pai'] == $menuSuperiorId) {
				$menuFinal[] = $menu;
			}
		}
		$nivel++;
		for ($i = 0; $i < count($menuFinal); $i++) {
			$menuFinal[$i]['sub_menus'] = [];
			$menuFinal[$i]['nivel'] = $nivel;
			construirMenu($menus, $menuFinal[$i]['sub_menus'], $menuFinal[$i]['c_menu'], $nivel);
		}
	}
	
?>