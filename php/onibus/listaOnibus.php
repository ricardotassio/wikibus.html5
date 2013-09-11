<?php
	//chama o arquivo de conexão com o bd
	include("../conectar.php");
	 
	$condicao = isset($_GET['numero']) ? sprintf(" AND numero='%s' ", $_GET['numero']) : '';  
	
	//consulta sql
	$query = mysql_query("SELECT * FROM onibus WHERE (1=1) " . $condicao) or die(mysql_error());
	
	//faz um looping e cria um array com os campos da consulta
	$rows = array('onibus' => array());
	while($dados = mysql_fetch_assoc($query)) {
	    $rows['onibus'][] = $dados;
	}

	//encoda para formato JSON
	echo json_encode($rows);
?>