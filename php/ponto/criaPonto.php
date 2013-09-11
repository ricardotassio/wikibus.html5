<?php
	//chama o arquivo de conexão com o bd
	include("../conectar.php");

	$info = $_POST['pontos'];

	$data = json_decode(stripslashes($info));

	$latitude = $data->latitude;
	$longitude = $data->longitude;
	$numero = $data->numero;
	$logradouro = $data->logradouro;
	$bairro = $data->bairro;
	$cidade = $data->cidade;
	$estado = $data->estado;
	$pais = $data->pais;	
	$cep = $data->cep;
	$referencia = $data->referencia;
	
	//consulta sql
	$query = sprintf("INSERT INTO ponto (latitude, longitude, numero, logradouro, bairro, cidade, estado, pais, cep, referencia) values (%s, %s, '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s')",
		mysql_real_escape_string($latitude),
		mysql_real_escape_string($longitude),
		mysql_real_escape_string($numero),
		mysql_real_escape_string($logradouro),
		mysql_real_escape_string($bairro),
		mysql_real_escape_string($cidade),
		mysql_real_escape_string($estado),
		mysql_real_escape_string($pais),
		mysql_real_escape_string($cep),
		mysql_real_escape_string($referencia)		
		);

	$rs = mysql_query($query);
	 
	echo json_encode(array(
		"success" => mysql_errno() == 0,
		"empresas" => array(
			"id" => mysql_insert_id(),
			"latitude" => $latitude,
			"longitude" => $longitude,
			"numero" => $numero,
			"logradouro" => $logradouro,
			"bairro" => $bairro,
			"cidade" => $cidade,
			"estado" => $estado,
			"pais" => $pais,
			"cep" => $cep,
			"referencia" => $referencia						
		)
	));
?>