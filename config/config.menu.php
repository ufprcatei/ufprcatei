<?php
	$menu = array();
	
	#Home:
	$menu[] = array('label' => $str[10002], 'url'=> 'index.php#anchor_main-slider');
	
	#Sobre:
	$menu[] = array('label' => $str[10003], 'url'=> 'index.php#anchor_services');
	
	#Gestão
	$menu[] = array('label' => $str[10023], 'url'=> 'index.php#anchor_management');
	
	#Membros
	$menu[] = array('label' => $str[10004], 'url'=> 'index.php#anchor_members');
	
	#Fale Conosco
	$menu[] = array('label' => $str[10005], 'url'=> 'index.php#anchor_contact-page');
	
	$_CONFIG['menu'] = $menu;
?>