<?php
	//chama o arquivo de conexão com o bd
	include("../conectar.php");

	$info = $_POST['empresas'];

	$data = json_decode(stripslashes($info));

	$nome = utf8_encode($data->nome);
	 
	//consulta sql
	$query = sprintf("INSERT INTO Empresa (nome) values ('%s')",
		mysql_real_escape_string($nome));

	$rs = mysql_query($query);
	 
	echo json_encode(array(
		"success" => mysql_errno() == 0,
		"empresas" => array(
			"id" => mysql_insert_id(),
			"nome" => $nome
		)
	));
?>