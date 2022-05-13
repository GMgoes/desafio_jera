<?php 
session_start();
require_once("Conexao.php");
$filme_buscado = $_POST["busca"];
$id_perfil = $_SESSION["id_perfil"];

$sql = "select * from filmes where nome LIKE '%$filme_buscado%' AND id_perfil = '$id_perfil'";
$resultadoSql = mysqli_query($conexao, $sql);
$numero_linhas = mysqli_num_rows($resultadoSql);
if($numero_linhas >0){
	while($row = mysqli_fetch_assoc($resultadoSql)){
		if($row['watched'] != "true"){
			echo '<p>'.$row['nome'].'</p><br>';
		}else{
			echo "<p class='text-success'>".$row['nome']."- Já assistido</p><br>";
		}	
	}
}else{
	echo "Não encontrado";
}
	
 ?>