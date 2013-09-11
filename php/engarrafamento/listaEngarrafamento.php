<?php   
	//chama o arquivo de conexão com o bd
	include("../conectar.php");
	 
	$condicao = isset($_GET['numero']) ? sprintf(" AND numero='%s' ", $_GET['numero']) : '';
	$condicao1 = isset($_GET['id_ponto']) ? sprintf(" AND id_ponto='%s' ", $_GET['id_ponto']) : '';
	
	
	
	
	//consulta sql
	#$query = mysql_query("SELECT * FROM engarrafamentos WHERE (1=1) " . $condicao . $condicao1) or die(mysql_error());
	
	
	
	$CondIntinerario = isset($_GET['id_ponto']) ? sprintf("AND I.id_ponto='%s' ", $_GET['id_ponto']) : '';
	#$CondHora = sprintf("AND   E.hora > '%s' ", TIMEDIFF(current_time(),'00:30:00')): ''; 
	#$CondData = sprintf("AND DATE_FORMAT(E.hora,'%Y-%m-%d') = '%s' {$condHora}", current_date()): '';
	
	$query = mysql_query("SELECT
							  P.bairro as atual,
							  P.id_ponto as Cod, 
							  E.motivo_engarrafamento,
	  
							  -- --- Consulta Que pega o Cod do Ponto posterior ------
							  (SELECT 
									Px.id_ponto
							   FROM  
									ponto as Px LEFT JOIN	
									itinerario as Ix ON (Px.id_ponto = Ix.id_ponto) LEFT JOIN
									ponto as P2x ON (P2x.id_ponto = Ix.id_ponto_anterior) LEFT JOIN
									engarrafamento as Ex ON (Ex.id_ponto = Px.id_ponto)
							   WHERE
									Ix.id_ponto_anterior = P.id_ponto
							   ) as PosteriorCod,
	   
							   -- --- Consulta Que pega o Bairro do Ponto posterior ------
							   (SELECT 
									Px2.bairro
								FROM  
									ponto as Px2 LEFT JOIN
									itinerario as Ix2 ON (Px2.id_ponto = Ix2.id_ponto) LEFT JOIN
									ponto as P2x2 ON (P2x2.id_ponto = Ix2.id_ponto_anterior) LEFT JOIN 
									engarrafamento as Ex2 ON (Ex2.id_ponto = Px2.id_ponto)
								WHERE
									Ix2.id_ponto_anterior = P.id_ponto
							   ) as pontoPosterior,
							   P2.bairro as Posterior,
							   I.id_ponto_anterior as CodAnterior
						FROM
							  ponto as P LEFT JOIN	
							  itinerario as I ON (P.id_ponto = I.id_ponto) LEFT JOIN
							  ponto as P2 ON (P2.id_ponto = I.id_ponto_anterior) LEFT JOIN
							  engarrafamento as E ON (E.id_ponto = P.id_ponto) 
						WHERE
							  1 = 1
							{$condicao2}");
	
	//faz um looping e cria um array com os campos da consulta
	$rows = array('engarrafamentos' => array());
	while($dados = mysql_fetch_assoc($query)) {
	    $rows['engarrafamentos'][] = $dados;
	}

	//encoda para formato JSON
	echo json_encode($rows);
?>