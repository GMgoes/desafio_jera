<?php 

$filme_buscado = "007";
$url = "https://api.themoviedb.org/3/search/movie?api_key=ad6b74208be55f7885c94593518b9477&query={$filme_buscado}&language=pt-BR&page=3";

$json = file_get_contents($url);

$objeto = json_decode($json);
$total_paginas = $objeto->total_pages;

for($x=1; $x <= $total_paginas; $x++){
$url_pagina_atual = "https://api.themoviedb.org/3/search/movie?api_key=ad6b74208be55f7885c94593518b9477&query={$filme_buscado}&language=pt-BR&page={$x}";
$json_pagina_atual = file_get_contents($url_pagina_atual);
$objeto_atual = json_decode($json_pagina_atual);
foreach($objeto_atual->results as $resultado){
echo $resultado->title;
echo "<br/>";
}

}
//<?php foreach ($vetorTodosregistro as $umRegistro){
//<tr>
//<td style="text-align:left;"><?php echo $umRegistro["nome"];</td>
//<td style="text-align:left;"><?php echo $umRegistro["descricao"];</td>
//<td style="text-align:center;"><?php echo date('Y', strtotime($umRegistro["data_lancamento"])); //</td>
//</tr>
///json_encode($json);

//foreach($objeto->results as $resultado){
//	echo $resultado->title;
//	echo "<br/>";
//}
//echo "<pre>";
//print_r($objeto);
//print_r($objeto->results[1]->title);
//echo "<pre>";
?>