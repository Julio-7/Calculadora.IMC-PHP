<?php
// recuperar as variaveis
$nome   = $_POST['nome'];
$peso   = $_POST['peso'];
$altura = $_POST['altura'];
$data   = date('d/m/Y H:i:s');

// calculo
$imc = round(($peso / ($altura * $altura)), 2);

// montar a linha ser gravada - NOME;PESO;ALTURA;IMC;DATA
$linha = $nome . ';' . $peso . ';' . $altura . ';' . $imc . ';' . $data . PHP_EOL;

// grava no arquivo
file_put_contents('IMC.csv', $linha, FILE_APPEND);

// debug
// echo '<pre>';
// print_r([
//   'Nome'   => $nome,
//   'Peso'   => $peso,
//   'Altura' => $altura,
//   'Imc'    => $imc,
//   'Data' => $data
// ]);
// echo '</pre>';

// encaminha o usuário para página de sucesso
// header('Location: /sucesso.html');

// le o arquivo sucesso.html
$paginaSucesso = file_get_contents('sucesso.html');

// atualizar os valores da pagina de sucesso
$paginaSucessoAtualizada = str_replace('{nome}', $nome, $paginaSucesso);
$paginaSucessoAtualizada = str_replace('{peso}', $peso, $paginaSucessoAtualizada);
$paginaSucessoAtualizada = str_replace('{altura}', $altura, $paginaSucessoAtualizada);
$paginaSucessoAtualizada = str_replace('{imc}', $imc, $paginaSucessoAtualizada);
$paginaSucessoAtualizada = str_replace('{data}', $data, $paginaSucessoAtualizada);

echo $paginaSucessoAtualizada;