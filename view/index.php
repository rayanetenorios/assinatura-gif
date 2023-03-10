<?php
    include_once('./layout/AppTop.php');
?>

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
        <div id="preview"></div>
    </div>

</main>

<?php
    include_once('./layout/AppBottom.php');
?>

