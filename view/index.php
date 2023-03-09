<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <!-- Croppie CSS-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.min.css" 
        integrity="sha512-zxBiDORGDEAYDdKLuYU9X/JaJo/DPzE42UubfBw9yg8Qvb2YRRIQ8v4KsGHOx2H1/+sdSXyXxLXv5r7tHc9ygg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <link rel="stylesheet" href="../assets/css/style.css" type="text/css">

    <title>Gerador de Assinatura de Email</title>
</head>
<body>

    <header>
        <div class="container p-2">
            <h1>Gerador de Assinatura</h1>
        </div>
    </header>

    <main class="conteudo container">
        <div class="formulario container p-2">
            <h4>Insira os dados abaixo para gerar a assinatura</h4>
            <form action="" method="post" name="form1" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="nome">Nome</label>
                    <input type="text" class="form-control" id="nome" placeholder="Nome"
                        value="<?php if(isset($_POST['nome'])) {echo $_POST['nome']; } ?>">
                </div>
                <div class="form-group">
                    <label for="cargo">Cargo</label>
                    <input type="text" class="form-control" id="cargo" placeholder="Cargo"
                        value="<?php if(isset($_POST['cargo'])) {echo $_POST['cargo']; } ?>">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" placeholder="nome@inteligenciaedu.com.br"
                        value="<?php if(isset($_POST['email'])) {echo $_POST['email']; } ?>">
                </div>
                <div class="form-group">
                    <label for="telefone">WhatsApp</label>
                    <input type="tel" class="form-control" id="telefone" placeholder="(62) 99999-9999"
                        value="<?php if(isset($_POST['telefone'])) {echo $_POST['telefone']; } ?>">
                </div>
                <div class="form-group">
                    <label for="imagem">Foto</label>
                    <input type="file" class="form-control" id="imagem" name="imagem"
                        value="<?php if(isset($_POST['imagem'])) {echo $_POST['imagem']; } ?>">
                </div>
            </form>
            <button type="buttom" id="gerar_assinatura" class="btn btn-primary">Gerar assinatura</button>
        </div>

        <div class="exibicao container p-2">
            <!-- <h3>Salve o Gif abaixo no navegador</h3> -->
            <div id="preview"></div>
            
            <?php
                if (isset($gif)) {
                    echo $gif;
                }
            ?>
    
        </div>

    </main>

    <footer>
        <div class="container p-2">
            <span>Desenvolvido por Grifo Propaganda, 2023. Todos os direitos reservados.</span>
        </div>
    </footer>
    
    <!-- Jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    
    <!-- Croppie JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.min.js" 
    integrity="sha512-Gs+PsXsGkmr+15rqObPJbenQ2wB3qYvTHuJO6YJzPe/dTLvhy0fmae2BcnaozxDo5iaF8emzmCZWbQ1XXiX2Ig==" 
    crossorigin="anonymous" referrerpolicy="no-referrer">
    </script>
    
    <script src="../assets/js/script.js"></script>

</body>
</html>