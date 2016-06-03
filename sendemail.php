<?php
	require_once("resources/functions.php");
	error_reporting(E_ERROR | E_CORE_ERROR | E_COMPILE_ERROR);
	header('Content-type: application/json');

    $name 		= formatField($_REQUEST['name']); 
    $email 		= formatField($_REQUEST['email']); 
    $subject 	= formatField($_REQUEST['subject']); 
    $message 	= formatField($_REQUEST['message']); 

    $email_from = $email;
    $email_to = 'contato@ufprcatei.com.br';

    $body = 'Nome: ' . $name . "\n\n" . 'Email: ' . $email . "\n\n" . 'Assunto: ' . $subject . "\n\n" . 'Mensagem: ' . $message;
	
	$success = mail($email_to, '[TADS-UFPRCATEI] '.$subject, $body, 'From: <'.$email_from.'>');
	
	$status = array(
		'type'=> $success ? 'success' : 'error',
		'message'=>   $success ? $str[10006] : $str[10040]
	);
    echo json_encode($status);
    die;
?>