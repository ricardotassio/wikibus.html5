<?php 
	//chama o arquivo de conexão com o bd
	include("../conectar.php");

	$info = $_POST['engarrafamentos'];

	$data = json_decode(stripslashes($info));
//var_dump($data);
	//$numero = $data->numero;
	$id_ponto = $data->id_ponto;
	$motivo = $data->motivo_engarrafamento;
	 
	//consulta sql
	$query = sprintf("INSERT INTO engarrafamento (id_engarrafamento, motivo_engarrafamento,id_ponto,hora) VALUES ('%s', '%s', '%s',now())",
						mysql_real_escape_string(0),
						mysql_real_escape_string($motivo),
						mysql_real_escape_string($id_ponto)
					);
	$rs = mysql_query($query);

	/*
	echo $rs . "<br><br>";
	echo json_encode(array(
		"success" => mysql_errno() == 0,
		"engarrafamentos" => array(
			"sequencia" => mysql_insert_id(),
			"numero" => $numero,
			"id_ponto" => $id_ponto,
			"motivo" => $motivo
		)
	));*/
?>