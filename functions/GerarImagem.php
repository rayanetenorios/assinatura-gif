<?php

namespace GerarImagem;

class GerarImagem {

    private $url;

    public function __construct()
	{
        $this->url;
    }

    public function gerar($url, $conteudo) 
    {
        header("Content-type: image/png");

        $i = imagecreatefromjpeg($url);

        $preto = imagecolorallocate($i, 0,0,0); # Cor preta
        $texto = $conteudo['nome']; # Texto a ser escrito
        $fonte = "trebuc.ttf"; # Fonte que será utilizada

        // Escreve na imagem
        imagettftext($i, 32, 0, 160,360,$preto,$fonte,$texto);

        // Gera a imagem na tela
        return imagejpeg($i);
    }
}