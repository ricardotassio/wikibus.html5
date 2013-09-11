<?php
	//chama o arquivo de conexão com o bd
	include("../conectar.php");

	$info = $_POST['onibus'];

	$data = json_decode(stripslashes($info));

	$numero = $data->numero;
	$id_empresa = $data->id_empresa;
	$adaptado = $data->adaptado;
	 
	//consulta sql
	$query = sprintf("INSERT INTO onibus (numero, id_empresa, adaptado) VALUES ('%s', %d, '%s')",
		mysql_real_escape_string($numero),
		mysql_real_escape_string($id_empresa),
		mysql_real_escape_string($adaptado));

	$rs = mysql_query($query);
	echo $rs . "<br><br>";
	echo json_encode(array(
		"success" => mysql_errno() == 0,
		"onibus" => array(
			"id" => mysql_insert_id(),
			"numero" => $numero,
			"id_empresa" => $id_empresa,
			"adaptado" => $adaptado
		)
	));
?>