 <?php 
	//chama o arquivo de conexão com o bd
	include("../conectar.php");

	$info = $_POST['engarrafamentos'];

	$data = json_decode(stripslashes($info));

	$sequencia = $data->sequencia;
	 
	//consulta sql
	$query = sprintf("DELETE FROM engarrafamentos WHERE sequencia=%d",
		mysql_real_escape_string($sequencia));

	$rs = mysql_query($query);
	 
	echo json_encode(array(
		"success" => mysql_errno() == 0
	));
?>