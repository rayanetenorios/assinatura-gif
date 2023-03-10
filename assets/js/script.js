// Carregar o espaço para o preview da imagem
var redimensionar = $('#preview').croppie({
    // Ativar a leitura de orientação para renderizar corretamente a imagem
    enableExif: true,

    // Ativar orientação personalizada
    enableOrientation: true,

    // O recipiente interno do coppie. A parte visível da imagem
    viewport: {
        width: 172,
        height: 210,
        type: 'square'
    },

    // O recipiente externo do cortador
    boundary: {
        width: 400,
        height: 400
    }

});

// Executar a instrução quando o usuário selecionar uma imagem
$('#imagem').on('change', function () {

    // FileReader para ler de forma assincrona o conteúdo dos arquivos
    var reader = new FileReader();

    // onload - Execute após ler o conteúdo
    reader.onload = function (e) {
        redimensionar.croppie('bind', {
            // Recuperar a imagem base64
            url: e.target.result
        });
    }

    // O método readAsDataURL é usado para ler o conteúdo do tipo Blob ou File
    reader.readAsDataURL(this.files[0]);
});

// Executar a instrução quando o usuário clicar no botão enviar
$('#gerar_assinatura').on('click', function () {
    redimensionar.croppie('result', {
        type: 'canvas', // Tipo de arquivos permitidos - base64, html, blob
        size: 'viewport' // O tamanho da imagem cortada
    }).then(function (img){
        var nome = document.getElementById("nome").value;
        var cargo = document.getElementById("cargo").value;
        var email = document.getElementById("email").value;
        var telefone = document.getElementById("telefone").value;

        // Enviar os dados para um arquivo PHP
        $.ajax({
            url: "../functions/upload.php", // Enviar os dados para o arquivo upload.php
            type: "POST", // Método utilizado para enviar os dados
            data: { // Dados que deve ser enviado
                "imagem": img,
                "nome": nome,
                "cargo": cargo,
                "email": email,
                "telefone": telefone
            },
            success: function(){
                alert('Assinatura criada com sucesso!')
                window.location.href = "http://localhost/assinatura-gif/view/assinatura.php";
            }
        });
    });
});