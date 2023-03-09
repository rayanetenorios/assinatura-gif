<?php

use GerarImagem\GerarImagem;
use GifCreator\AnimGif;

require_once('../functions/AnimGif.php'); 
require('../functions/GerarImagem.php'); 

// Receber a imagem
$imagem = filter_input(INPUT_POST, 'imagem', FILTER_DEFAULT);

// Receber a dados
$nome = filter_input(INPUT_POST, 'nome', FILTER_DEFAULT);
$cargo = filter_input(INPUT_POST, 'cargo', FILTER_DEFAULT);
$telefone = filter_input(INPUT_POST, 'telefone', FILTER_DEFAULT);
$email = filter_input(INPUT_POST, 'email', FILTER_DEFAULT);

// Separa as informações da imagem base64 pelo ";"
list($type, $imagem) = explode(';', $imagem);
list(, $imagem) = explode(',', $imagem);

// Desconverter a imagem base64
$imagem = base64_decode($imagem);

// Atribuir a extensão da imagem PNG
$imagem_nome = time() . '.png';

// Realizar o upload da imagem
file_put_contents('../assets/img/uploads/' . $imagem_nome, $imagem);

$base = "http://localhost/assinatura-gif/";

$caminho_imagem = $base."assets/img/uploads/" . $imagem_nome;

$conteudo = [
    'nome' => $nome,
    'cargo' => $cargo,
    'email' => $email,
    'telefone' => $telefone,
];

$fundo1 = $base."assets/img/fundo/FUNDO1.png";
$img1 = new GerarImagem();
$img1->gerar($fundo1, $conteudo);

$fundo2 = $base."assets/img/fundo/FUNDO2.png";
$fundo3 = $base."assets/img/fundo/FUNDO3.png";
$fundo4 = $base."assets/img/fundo/FUNDO4.png";

$frames = array(
    $fundo1, $fundo2, $fundo3, $fundo4
);

$anim = new AnimGif();
$anim->create($frames, array(200, 200)); // first 3s, then 5s for all the others
$anim->save("../assets/img/uploads/assinatura.gif");

$gif = $base . "assets/img/uploads/assinatura.gif";

return $gif;

