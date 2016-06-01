<?php
	/*
		Consulta de ícones em: http://fontawesome.io/icons/.
	*/
	$_services = array();
	
	#Apoio estudantil:
	$services[] = array('label' => $str[10009], 'icon' => 'graduation-cap', 'content'=> $str[10019]);

	#Colegiado:
	$services[] = array('label' => $str[10010], 'icon' => 'university', 'content'=> $str[10018]);
	
	#Estágios:
	$services[] = array('label' => $str[10011], 'icon' => 'suitcase', 'content'=> $str[10015]);
	
	#Eventos:
	$services[] = array('label' => $str[10012], 'icon' => 'calendar', 'content'=> $str[10016]);
	
	#Artigos do curso:
	$services[] = array('label' => $str[10013], 'icon' => 'shopping-bag	', 'content'=> $str[10020]);
	
	#Espaço físico:
	$services[] = array('label' => $str[10014], 'icon' => 'home', 'content'=> $str[10017]);
	
	$_CONFIG['services'] = $services;
?>