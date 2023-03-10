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
$nome_img = filter_input(INPUT_POST, 'arquivo', FILTER_DEFAULT);

// Separa as informações da imagem base64 pelo ";"
list($type, $imagem) = explode(';', $imagem);
list(, $imagem) = explode(',', $imagem);

// Desconverter a imagem base64
$imagem = base64_decode($imagem);

// Atribuir a extensão da imagem PNG

$imagem_nome = $nome_img . '.png';

// Realizar o upload da imagem
file_put_contents('../assets/img/temp/' . $imagem_nome, $imagem);

$base = "http://localhost/assinatura-gif/";

$caminho_imagem = $base."assets/img/temp/" . $imagem_nome;

$conteudo = [
    'nome' => $nome,
    'cargo' => $cargo,
    'email' => $email,
    'telefone' => $telefone,
    'foto' => $caminho_imagem,
];

$fundo1 = $base."assets/img/fundo/FUNDO1.png";
$img1 = new GerarImagem();
$img1->gerar($fundo1, $conteudo, 'assinatura1.png');

$fundo2 = $base."assets/img/fundo/FUNDO2.png";
$img2 = new GerarImagem();
$img2->gerar($fundo2, $conteudo, 'assinatura2.png');

$fundo3 = $base."assets/img/fundo/FUNDO3.png";
$img3 = new GerarImagem();
$img3->gerar($fundo3, $conteudo, 'assinatura3.png');

$fundo4 = $base."assets/img/fundo/FUNDO4.png";
$img4 = new GerarImagem();
$img4->gerar($fundo4, $conteudo, 'assinatura4.png');

$frames = array(
    $base."assets/img/temp/assinatura1.png", 
    $base."assets/img/temp/assinatura2.png", 
    $base."assets/img/temp/assinatura3.png", 
    $base."assets/img/temp/assinatura4.png"
);

$anim = new AnimGif();
$anim->create($frames, array(100, 100)); // first 3s, then 5s for all the others
$anim->save("../assets/img/uploads/".$nome_img.".gif");

$mascara = "../assets/img/temp/*";
array_map( "unlink", glob( $mascara) );

