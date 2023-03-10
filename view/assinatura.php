<?php
    include_once('./layout/AppTop.php');

    $arquivo = $_GET['a'];
    $link = "../assets/img/uploads/".$arquivo.".gif";

?>

<main class="conteudo container p-2">
    <div class="assinatura container p-2">
        <span>Clique com o botão direito na imagem e clique em <strong>'Salvar imagem como...'</strong></span>
        <img class="assinatura_img mt-3" src="<?php echo $link; ?>"/>
        <div>
            <a class="btn btn-success " href="../index.html">Criar uma nova assinatura</a>
        </div>
    </div>
</main>

<?php
    include_once('./layout/AppBottom.php');
?>