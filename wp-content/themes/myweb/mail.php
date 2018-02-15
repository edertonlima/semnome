<?php

	$nome = $_GET['nome'];
	$telefone = $_GET['telefone'];
	$email = $_GET['email'];
	$mensagem = $_GET['mensagem'];

	$nome_site = $_GET['nome_site'];
	$para = $_GET['para'];

	$email_servidor = 'contato@missaoamericalatina.com.br';
	$titulo = 'Nova Igreja Parceira';


	$headers = "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
	$headers .= "From: $nome_site <$para>\n";
	$headers .= "Return-Path: $nome_site <$para>\n";
	$headers .= "Reply-To: $nome <$email>\n";

	$conteudo = '
	<h2>Um novo pedido de cadastro para ser uma IGREJA PARCEIRA foi enviada através do site.</h2>';

	$conteudo .= '<p>';
	$conteudo .= '<strong>Nome:</strong> '.$nome;
	$conteudo .= '<br><strong>Telefone:</strong> '.$telefone;
	$conteudo .= '<br><strong>E-mail:</strong> '.$email;
	$conteudo .= '</p>';
	if(mail($para, $titulo, $conteudo, $headers, "-f$email_servidor")){
		//mail('edertton@gmail.com', $titulo, $conteudo, $headers, "-f$email_servidor");
		//mail('pablo@di20.com.br', $titulo, $conteudo, $headers, "-f$email_servidor");
		echo(json_encode('ok'));
	}else{
		echo(json_encode("Desculpe, não foi possível enviar seu formulário. <br>Por favor, tente novamente mais tarde."));
	}
?>