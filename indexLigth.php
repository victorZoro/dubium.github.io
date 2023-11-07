    <?php
    include "post.php";
    //Aumanter (A+) e diminuir(A-);

    // Verificar se o usuário enviou uma solicitação para aumentar ou diminuir o tamanho da fonte
    if (isset($_GET['aumentar'])) {
        $tamanhoFonte = isset($_COOKIE['tamanho_fonte']) ? $_COOKIE['tamanho_fonte'] + 2 : 18;
        setcookie('tamanho_fonte', $tamanhoFonte, time() + (86400 * 30), '/'); // Cookie válido por 30 dias
    } elseif (isset($_GET['diminuir'])) {
        $tamanhoFonte = isset($_COOKIE['tamanho_fonte']) ? $_COOKIE['tamanho_fonte'] - 2 : 18;
        setcookie('tamanho_fonte', $tamanhoFonte, time() + (86400 * 30), '/'); // Cookie válido por 30 dias
    } else {
        $tamanhoFonte = isset($_COOKIE['tamanho_fonte']) ? $_COOKIE['tamanho_fonte'] : 18;
    }
    //Post da Duvida usando o metodo POST;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $mensagem = "sua duvida foi postada com sucesso ";
        //echo "<script>alert('$mensagem');</script>";

    //$post = post();
    }


    echo '<!DOCTYPE html>
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
        <link rel="stylesheet" href="CSS/index.css">
        <link rel="stylesheet" href="CSS/sidebar.css">
        
        <script defer src="JS/script.js"></script>
        <style>
            body {
                font-size: ' . $tamanhoFonte . 'px;
            }
        </style>

    </head>
    <body class="">
        <nav class="sidebar">
            <header class="not-selectable">
                <a href="indexLigth.php" class="logo-box">
                    <img class="logo" src="ASSETS/logo/logo_light.svg" alt="dubium">
                    <span class="logo-text text">dubium</span>
                </a>

                <i class="material-symbols-outlined toggle-btn btn-sm">chevron_right</i>
            </header>

            <div class="menu-bar">
                <div class="menu">
                    <ul class="menu-links">
                        <li class="nav-link">
                            <a href="indexLigth.php">
                                <i class="material-symbols-outlined icon">cottage</i>
                                <span class="text nav-text">Página Inicial</span>
                            </a>
                        </li>

                        <li class="nav-link focus-to-send">
                            <a href="#">
                                <i class="material-symbols-outlined icon">send</i>
                                <span class="text nav-text">Publicar</span>
                            </a>
                        </li>

                        <li class="nav-link">
                            <a href="#">
                                <i class="material-symbols-outlined icon">computer</i>
                                <span class="text nav-text">Informática</span>
                            </a>
                        </li>

                        <li class="nav-link">
                            <a href="#">
                                <i class="material-symbols-outlined icon">electric_bolt</i>
                                <span class="text nav-text">Eletroeletrônica</span>
                            </a>
                        </li>

                        <li class="nav-link">
                            <a href="#">
                                <i class="material-symbols-outlined icon">globe_uk</i>
                                <span class="text nav-text">Controle Ambiental</span>
                            </a>
                        </li>

                        <li class="nav-link">
                            <a href="#">
                                <i class="material-symbols-outlined icon">science</i>
                                <span class="text nav-text">Engenharia Química</span>
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="bottom">
                    <!-- <div class="user">
                        <img src="ASSETS/user_profile_picture.png" alt="User Image" class="usr-profile-picture not-selectable">
                        <div class="user-info">
                            <span class="username text">Aluno</span>
                            <span class="on-off text not-selectable">online</span>
                        </div>
                    </div> -->
                    <ul class="menu-links">
                        <li class="nav-link">
                            <a href="login_screen.php">
                                <i class="material-symbols-outlined icon login-btn">login</i>
                                <span class="text nav-text login-btn">Entrar</span>
                            </a>
                        </li>

                        <li class="nav-link">
                            <a href="https://iu.cefetmg.br/cadastro/passo1?">
                                <i class="material-symbols-outlined icon">person_add</i>
                                <span class="text nav-text">Cadastrar</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <section class="screen">
            <div class="midscreen">
                <div class="top-bar">
                    <div class="buttons-bar">
                        <div class="left-buttons not-selectable">
                            <i class="material-symbols-outlined btn-sm">help</i>
                            <a href="indexDark.php" style="text-decoration: none;"><i class="material-symbols-outlined btn-sm light-dark-btn light-mode">light_mode</i></a>
                        </div>
                    <form method="post" action="Pesquisa.php">
                        <div class="mid-buttons">
                            <div class="search-bar">
                                <i class="material-symbols-outlined search-btn btn-sm not-selectable">search</i>
                                <input type="text" name ="pesquisa" class="search-tool borderless" placeholder="Como usar o SIGAA?">
                            </div>

                            <div class="buttons not-selectable">
                                <a href="?aumentar" style="text-decoration: none;"><i class="material-symbols-outlined btn-sm">text_increase</i></a>
                                <a href="?diminuir" style="text-decoration: none;"><i class="material-symbols-outlined btn-sm">text_decrease</i></a>
                            </div>
                    </form>
                        </div>

                        <div class="right-buttons not-selectable">
                            <i class="material-symbols-outlined btn-sm">notifications</i>
                            <i class="material-symbols-outlined btn-sm">bookmark</i>
                            <i class="material-symbols-outlined btn-sm">settings</i>
                        </div>
                    </div>
                </div>

                <form action="inserirDuvidaNoBd.php" method="POST">
                    <div class="action-post">
                        <div class="text-field">
                            <div class="field-wrapper">
                                <img src="ASSETS/user_profile_picture.png" alt="User Image" class="usr-profile-picture">
                                <input type="text" name="duvida" placeholder="Qual a sua dúvida hoje?"
                                    class="borderless send-input">
                            </div>
                        </div>
                        <div class="actions not-selectable">
                            <div class="attach-files">
                                <i class="material-symbols-outlined btn-sm">image</i>
                                <i class="material-symbols-outlined btn-sm">gif_box</i>
                                <i class="material-symbols-outlined btn-sm">sentiment_satisfied</i>
                            </div>
                            <!-- Vou mexer aqui com o botão publicar-->
                            <button  class="send-btn btn">
                                <i class="material-symbols-outlined">send</i>
                                <span>Publicar</span>
                                <button type="submit" style="display: none;"></button>
                            </button>
                            <!----------------->
                        </div>
                    </div>
                </form>

                <div class="post-area">
                    <div class="post">
                        <div class="top-section">

                            <div class="user-info">
                                <img src="ASSETS/user_profile_picture.png" alt="User Image" class="usr-profile-picture">
                                <div class="user-text-info">
                                    <div class="user-forum-section">
                                        <span class="username">Aluno</span>
                                        <div class="forum-posted">
                                            <i class="material-symbols-outlined course-icon">computer</i>
                                            <span class="course"></span>
                                        </div>
                                    </div>
                                    <div class="post-info-section">Postado em '.   data(1) .' às '. hora(1).'</div>
                                </div>
                            </div>

                            <i class="material-symbols-outlined btn-sm">flag</i>

                        </div>

                        <div class="content">
                            <div class="text-area">'.post(1).
                            '</div>
                            <img src="ASSETS/sample_image.jpg" alt="Post Image" class="img-area">
                        </div>
                        <div class="actions">
                            <div class="left">
                                <i class="material-symbols-outlined btn-sm">sentiment_satisfied</i>
                                <i class="material-symbols-outlined btn-sm">sentiment_sad</i>
                                <i class="material-symbols-outlined btn-sm">comment</i>
                            </div>
                            <div class="right">
                                <i class="material-symbols-outlined btn-sm">bookmark</i>
                                <i class="material-symbols-outlined btn-sm">share</i>
                            </div>
                        </div>
                    </div>

                    <div class="post">
                        <div class="top-section">

                            <div class="user-info">
                                <img src="ASSETS/user_profile_picture.png" alt="User Image" class="usr-profile-picture">
                                <div class="user-text-info">
                                    <div class="user-forum-section">
                                        <span class="username">Aluno</span>
                                        <div class="forum-posted">
                                            <i class="material-symbols-outlined course-icon">globe_uk</i>
                                            <span class="course">Controle Ambiental</span>
                                        </div>
                                    </div>
                                    <div class="post-info-section">Postado em '.  data(2).' às '.  hora(2).'</div>
                                </div>
                            </div>

                            <i class="material-symbols-outlined btn-sm">flag</i>

                        </div>

                        <div class="content">
                            <div class="text-area">'
                            . post(2) .
                            '</div>

                            <!-- <img src="" alt="Post Image" class="img-area"> -->

                        </div>
                        <div class="actions">
                            <div class="left">
                                <i class="material-symbols-outlined btn-sm">sentiment_satisfied</i>
                                <i class="material-symbols-outlined btn-sm">sentiment_sad</i>
                                <i class="material-symbols-outlined btn-sm">comment</i>
                            </div>
                            <div class="right">
                                <i class="material-symbols-outlined btn-sm">bookmark</i>
                                <i class="material-symbols-outlined btn-sm">share</i>
                            </div>
                        </div>
                    </div>
                        
                    <div class="post">
                        <div class="top-section">

                            <div class="user-info">
                                <img src="ASSETS/user_profile_picture.png" alt="User Image" class="usr-profile-picture">
                                <div class="user-text-info">
                                    <div class="user-forum-section">
                                        <span class="username">Aluno</span>
                                        <div class="forum-posted">
                                            <i class="material-symbols-outlined course-icon">language</i>
                                            <span class="course">Geral</span>
                                        </div>
                                    </div>
                                    <div class="post-info-section">Postado em '.  data(3). ' às '.  hora(3).'</div>
                                </div>
                            </div>

                            <i class="material-symbols-outlined btn-sm">flag</i>

                        </div>

                        <div class="content">
                            <div class="text-area">'
                                .post(3) .
                            '</div>

                            <!-- <img src="" alt="Post Image" class="img-area"> -->
                        </div>
                        <div class="actions">
                            <div class="left">
                                <i class="material-symbols-outlined btn-sm">sentiment_satisfied</i>
                                <i class="material-symbols-outlined btn-sm">sentiment_sad</i>
                                <i class="material-symbols-outlined btn-sm">comment</i>
                            </div>
                            <div class="right">
                                <i class="material-symbols-outlined btn-sm">bookmark</i>
                                <i class="material-symbols-outlined btn-sm">share</i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </body>

    </html>';
    ?>