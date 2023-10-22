<?php
include 'funcao_teste_tamanhoCpf.php';
include 'funcao_letras_cpf.php';
include 'funcao_testa_tam_senha.php';
include 'funcao_testa_credenciais.php';

//verifica se o formulario foi enviado;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $cpf = $_POST["cpf"];
    $senha = $_POST["senha"];

    //VERIFICAR SE O CPF ESTA VAZIO
    if (empty($cpf)) {
        $errocpf = "por favor, digite seu cpf";
    } else if (ctype_digit($cpf) == true) {
        if (testeTamCpf($cpf))
            $errocpf = "Digite um CPF valido";
    } else if (testarSeTemLetras($cpf)) {
        //teste se tem letra no cpf;
        $errocpf = "o CPF possue letras, por favor digite uma CPF valido";
    }
}

//testar para saber se a senha é valida;
//VERIFICAR SE SENHA ESTA VAZIO
if (empty($senha)) {
    $erroSenha = "Por favor, digite sua senha";
} else if (testeTamSenha($senha)) {
    $erroSenha = "Senha de tamanho invalido, digite uma senha valida";
}

//verificação de credencas no banco de dados
if(validaCredenciais() == false){
    $erro = "usuario invalido!";
}
//Nenhum erro foi encontrado;
if (empty($errocpf) && empty($erroSenha) && validaCredenciais() == true ) {
    header("location:indexLigth.php");
    exit;
}



?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dubium</title>

    <!-- Material Symbols - Google -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

    <!-- CSS & JS -->
    <link rel="stylesheet" href="CSS/login_screen.css">
    <link rel="stylesheet" href="CSS/dark_mode/login_style_dark.css">
    <script defer src="JS/script.js"></script>
</head>

<body class="dark">
    <div class="login-screen">
        <form method="POST" action="">
            <div class="login-box">
                <div class="logo-box">
                    <img class="logo-image" src="ASSETS/logo/logo_light.svg" alt="dubium">
                    <span class="logo-text">dubium</span>
                </div>

                <span class="login-title-text">Login</span>

                <div class="fields-box">

                    <div>
                        <span class="text">CPF:</span>
                        <div class="field">
                            <input type="text" name="cpf" class="cpf-field borderless" placeholder="Digite seu CPF...">
                        </div>
                        <?php
                        if (isset($errocpf)) { ?>
                            <span class="erro-msg">
                                <?php echo $errocpf; ?>
                            </span>
                        <?php } ?>
                    </div>

                    <div>
                        <span class="text">Senha:</span>
                        <div class="field">
                            <input type="password" name="senha" class="pass-field borderless"
                                placeholder="Digite sua senha...">
                        </div>
                        <?php
                        if (isset($erroSenha)) { ?>
                            <span class="erro-msg">
                                <?php echo $erroSenha; ?>
                            </span>
                        <?php } ?>
                    </div>
                    <?php
                        if(validaCredenciais() == false){?>
                            <span class="erro-msg">
                            <?php echo $erro; ?>
                        </span>
                    <?php } ?>  
                </div>


                <div class="actions">
                    <button class="login-btn borderless">
                        <i class="material-symbols-outlined text login-icon">login</i>
                        <span class="text login-text">Entrar</span>
                    </button>
                    <span class="text">Não tem um cadastro? <a href="https://iu.cefetmg.br/cadastro/passo1?"
                            class="signup-text">Cadastre-se.</a></span>
                </div>
        </form>
    </div>
    </div>

</body>

</html>