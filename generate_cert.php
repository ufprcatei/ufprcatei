<?php

	require_once('resources/functions.php');
	require_once("resources/libs/mpdf60/mpdf.php");
	require_once("cert/nomes.php");
	
	foreach ($nomes as $nm)
	{
		$nomeAluno 		= $nm;
		$nomeEvento 	= "Palestra \"Produtividade Pessoal Enxuta\"";
		$localEvento 	= "Setor de Educação Profissional e Tecnológica da UFPR";
		$dtEvento 		= "05/04/2016";
		$chEvento 		= "2 horas";
		$nomeResp 		= "Razer Anthom Nizer Rojas Montaño";
		$funcResp 		= "Coordenador do Curso de Tecnologia em Análise e Desenvolvimento de Sistemas";		
		
		$modelo = false;
		if($modelo)
		{
			$nomeAluno 		= "NOME DO ALUNO";
			$nomeEvento 	= "NOME DO EVENTO";
			$localEvento 	= "LOCAL DO EVENTO";
			$dtEvento 		= "DATA DO EVENTO";
			$chEvento 		= "QUANTIDADE DE HORAS";
			$nomeResp 		= "NOME DO RESPONSÁVEL";
			$funcResp 		= "FUNÇÃO DO RESPONSÁVEL";
		}
		
		$cert_props = array
		(
			1 => array('text' => $nomeAluno, 'class' => 'span-upper span-bold'),
			2 => array('text' => $nomeEvento, 'class' => 'span-upper span-bold'),
			3 => array('text' => $localEvento, 'class' => 'span-upper span-bold'),
			4 => array('text' => $dtEvento, 'class' => 'span-upper span-bold'),
			5 => array('text' => $chEvento, 'class' => 'span-upper span-bold')
		);
		$cert = replaceStringTags(10001, $cert_props);
		
		$html = '
		<!DOCTYPE html>
		<html lang="pt-br">
		<head>
			<meta charset="utf-8">
			<link href="resources/css/bootstrap.min.css" rel="stylesheet">
			<link href="resources/css/font-awesome.min.css" rel="stylesheet">
			<link href="resources/css/prettyPhoto.css" rel="stylesheet">
			<link href="resources/css/animate.css" rel="stylesheet">
			<link href="resources/css/cert.css" rel="stylesheet" >
			<style>@page {
			 margin: 0px;
			}</style>
			<!--[if lt IE 9]>
			<script src="resources/js/html5shiv.js"></script>
			<script src="resources/js/respond.min.js"></script>
			<![endif]-->       	
		</head>
		<body>
			<div id="cert"  class="cert center">
					<div class="row">
						<div style="padding: 0px 100px">
							<p class="gap"></p>
							<p class="title">Certificado</p>
							<p class="gap"></p>
							<p class="body text-justify">
								'.$cert.'
							</p>		
							<p class="gap"></p>		
							<h4 class ="signature"> <span class="span-bold">'.$nomeResp.'</span><br>
							<small><span>'.$funcResp.'</span></small></h4> 
						</div>
					</div>
					<div style="padding: 0px 100px 50px 100px;">	
							<table cellspacing="0" cellpadding="0" frameborder="0" style="margin: 0 auto;">
								<tr>
									<td rowspan="2">
										<img class="img-logo img-logo-lg" src="resources/images/logos/ufpr_preto.png" alt=""/>
									</td>
									<td>
										<img class="img-logo img-logo-sm" src="resources/images/logos/logo_catei_preto.png" alt=""/>
									</td>
								</tr>
								<tr>
									<td>
										<img class="img-logo img-logo-sm" src="resources/images/logos/logo_amplitude_preto.png" alt=""/ >
									</td>
								</tr>
							</table>
					</div>
			</div>	
		</body>
		</html>';
		
		$mpdf = new mPDF($mode='utf-8',$format='A4-L'); 
		$mpdf->SetDisplayMode('fullpage');
		$mpdf->SetTitle('Certificado');
		$mpdf->WriteHTML($html);
		
		$ndir =  preg_replace('/[^a-z0-9 ]/i', '', $nomeEvento);
		$dir = "cert/".$ndir."/";
		
		if (!is_dir($dir))
			mkdir($dir);
		
		$mpdf->Output($dir."/Certificado - ".$nomeAluno.".pdf", "F");
	}
	exit;
?>