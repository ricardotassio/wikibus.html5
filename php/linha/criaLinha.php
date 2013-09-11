<?php
	//chama o arquivo de conexão com o bd
	include("../conectar.php");

	$info = $_POST['linhas'];

	$data = json_decode(stripslashes($info));

	$numero = $data->numero;
	$origem = $data->origem;
	$destino = $data->destino;
	$via = $data->via;
	 
	//consulta sql
	$query = sprintf("INSERT INTO linha (numero, origem, destino, via) VALUES ('%s', '%s', '%s', '%s')",
		mysql_real_escape_string($numero),
		mysql_real_escape_string($origem),
		mysql_real_escape_string($destino),
		mysql_real_escape_string($via));

	$rs = mysql_query($query);
	echo $rs . "<br><br>";
	echo json_encode(array(
		"success" => mysql_errno() == 0,
		"linhas" => array(
			"id" => mysql_insert_id(),
			"numero" => $numero,
			"origem" => $origem,
			"destino" => $destino,
			"via" => $via
		)
	));
?>