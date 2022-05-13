<?php 
//Classe utilizada para podermos encontrar o filme através de uma função JS, ela nos retorna até o momento o nome do filme apenas, e há uma variação, se o usuário já marcou o filme como assistido ou não, o previsto para essa funcionalidade seria retornar todas as info do filme, principalmente o poster, então seria necessário implementar melhorias.
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