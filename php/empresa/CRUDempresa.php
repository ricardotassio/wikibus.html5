<?php
//chama o arquivo de conexão com o bd
include("../conectar.php");

function atualizaEmpresa(){
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
	
}

function criaEmpresa(){
	$info = $_POST['empresas'];
	
	$data = json_decode(stripslashes($info));
	
	$nome = utf8_encode($data->nome);
	
	//consulta sql
	$query = sprintf("INSERT INTO Empresa (nome) values ('%s')",
			mysql_real_escape_string($nome));
	
	$rs = mysql_query($query);
	
	echo json_encode(array(
			"success" => mysql_errno() == 0,
			"empresas" => array(
					"id" => mysql_insert_id(),
					"nome" => $nome
			)
	));
}

function deletaEmpresa(){
	$info = $_POST['empresas'];
	
	$data = json_decode(stripslashes($info));
	
	$id = $data->id;
	
	//consulta sql
	$query = sprintf("DELETE FROM Empresa WHERE id=%d",
			mysql_real_escape_string($id));
	
	$rs = mysql_query($query);
	
	echo json_encode(array(
			"success" => mysql_errno() == 0
	));
}

function listaEmpresas(){
	$condicao = isset($_GET['nome']) ? sprintf(" AND nome='%s' ", $_GET['nome']) : '';
	
	//consulta sql
	$query = mysql_query("SELECT * FROM empresa WHERE (1=1) " . $condicao) or die(mysql_error());
	
	//faz um looping e cria um array com os campos da consulta
	$rows = array('empresas' => array());
	while($dados = mysql_fetch_assoc($query)) {
		$rows['empresas'][] = $dados;
	}
	
	//encoda para formato JSON
	echo json_encode($rows);
}

?>