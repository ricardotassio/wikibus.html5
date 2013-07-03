<?php
	//chama o arquivo de conexão com o bd
	include("../conectar.php");
	 
	$condicao = isset($_GET['nome']) ? sprintf(" AND nome='%s' ", $_GET['nome']) : ''; 
	
	//consulta sql
	$query = mysql_query("SELECT * FROM ponto WHERE (1=1) " . $condicao) or die(mysql_error());
	 
	//faz um looping e cria um array com os campos da consulta
	$rows = array('pontos' => array());
	while($dados = mysql_fetch_assoc($query)) {
	    $rows['pontos'][] = $dados;
	}

	//encoda para formato JSON
	echo json_encode($rows);
?>