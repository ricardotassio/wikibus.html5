<?php
	//chama o arquivo de conexão com o bd
	include("../conectar.php");
	
	$condicao = isset($_GET['id_ponto']) ? sprintf(" AND id_ponto='%s' ", $_GET['id_ponto']) : '';  
	$condicao .= isset($_GET['id_linha']) ? sprintf(" AND i.id_linha='%s' ", $_GET['id_linha']) : '';  
	$condicao .= isset($_GET['numero']) ? sprintf(" AND l.numero='%s' ", $_GET['numero']) : ''; 

	if(isset($_GET['atualiza'])){
		$sql = sprintf("UPDATE itinerario SET id_ponto_anterior = '%s', sequencia = '%s' WHERE id_linha = '%s' AND id_ponto = '%s' ", $_GET['id_ponto_anterior'], $_GET['sequencia'], $_GET['id_linha'], $_GET['id_ponto']);
	}else{
		$sql = "SELECT i.id_linha, i.id_ponto, i.id_ponto_anterior, l.numero, i.sequencia, i.data_atualizacao, l.origem, l.destino, l.via FROM itinerario i INNER JOIN linha l ON l.id_linha = i.id_linha WHERE (1=1) " . $condicao . " order by l.numero, i.data_atualizacao ";
	}
	
	$query = mysql_query($sql) or die(mysql_error());
	
	//faz um looping e cria um array com os campos da consulta
	$rows = array('itinerarios' => array());
	
	if(isset($_GET['atualiza'])){
	
		echo json_encode(array(
			"success" => mysql_errno() == 0
		));	
		
	}else{
	
		while($dados = mysql_fetch_assoc($query)) {
			$rows['itinerarios'][] = $dados;
		}
		
		//encoda para formato JSON
		echo json_encode($rows);	
		
	}
?>