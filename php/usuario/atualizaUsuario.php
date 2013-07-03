 <?php
	//chama o arquivo de conexão com o bd
	include("../conectar.php");

	$info = $_POST['usuario'];

	$data = json_decode(stripslashes($info));

	$senha = $data->senha;
	$id = $data->id;
	 
	//consulta sql
	$query = sprintf("UPDATE usuario SET senha = '%s' WHERE id=%d",
		mysql_real_escape_string($senha),
		mysql_real_escape_string($id));

	$rs = mysql_query($query);
	 
	echo json_encode(array(
		"success" => mysql_errno() == 0
	));
?>