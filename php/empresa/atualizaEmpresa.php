 <?php
	//chama o arquivo de conexão com o bd
	include("../conectar.php");

	$info = $_POST['empresas'];

	$data = json_decode(stripslashes($info));

	$nome = $data->nome;
	$id = $data->id;
	 
	//consulta sql
	$query = sprintf("UPDATE Empresa SET nome = '%s' WHERE id=%d",
		mysql_real_escape_string($nome),
		mysql_real_escape_string($id));

	$rs = mysql_query($query);
	 
	echo json_encode(array(
		"success" => mysql_errno() == 0
	));
?>