<?php

namespace GerarImagem;

class GerarImagem {

    /**
	* @var string: The generated (binary) image
	*/
    private $img;

    public function __construct()
	{
        $this->reset();
    }

    public function gerar($url, $conteudo, $titulo) 
    {
        header("Content-type: image/png");

        $i = imagecreatefrompng($url);

        $branco = imagecolorallocate($i, 255,255,255); # Cor preta
        $verde = imagecolorallocate($i, 92,154,108); # Cor preta

        $fonte_semibold = "../assets/fonts/Poppins-SemiBold.ttf"; # Fonte que será utilizada
        $fonte_thin = "../assets/fonts/Poppins-Light.ttf"; # Fonte que será utilizada

        // Escreve na imagem
        imagettftext($i, 35, 0, 670, 105, $verde, $fonte_semibold, $conteudo['nome']);
        imagettftext($i, 22, 0, 670, 150, $verde, $fonte_thin, $conteudo['cargo']);
        imagettftext($i, 18, 0, 738, 235, $branco, $fonte_semibold, $conteudo['telefone']);
        imagettftext($i, 18, 0, 738, 280, $branco, $fonte_semibold, $conteudo['email']);
        imagettftext($i, 18, 0, 738, 326, $branco, $fonte_semibold, 'inteligenciaedu.com.br');

        $foto = $conteudo['foto'];
        $img_foto = imagecreatefrompng($foto);

        $width = imagesx($i);
        $height = imagesy($i);
        $fwidth = imagesx($img_foto);
        $fheight = imagesy($img_foto);

        $result = imagecreatetruecolor($width, $height);
        
        imagecopyresampled($result, $i, 0, 0, 0, 0, $width, $height, $width, $height);
        imagecopyresampled($result, $img_foto, 388, 50, 0, 0, $fwidth, $fheight, $fwidth, $fheight);

        $this->img = imagepng($result, "../assets/img/fundo/temp/".$titulo);

        return $this;
    }

    public function salvar($filename) 
    {
        return file_put_contents($filename, $this->img);
    }

    /**
	 * Clean-up the current object (also used by the ctor.)
	 */
	public function reset()
	{
		$this->img = 'image/png'; // the GIF header
	}
}