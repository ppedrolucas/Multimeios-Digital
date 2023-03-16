<?php
ob_start(); //ARMAZENA MEUS DADOS EM CACHE
session_start(); //INICIA A SESSÃO
if(!isset($_SESSION['loginUser']) && (!isset($_SESSION['senhaUser']))){
    header("Location: home.php?acao=negado");
    exit;
}
include_once('sair.php')
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Multimeios Digital | Home</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/1e32b8079d.js" crossorigin="anonymous"></script>
    
    <style>
        *{ 
    margin: 0;
    padding: 0;
    font-family: 'Josefin Sans', sans-serif;
    box-sizing: border-box;
}
/*MENU*/
header{
    background: #23232e;
    width: 100%;
    height: 100px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    position: fixed;
    padding: 0 25px;
}
h1{
    font-size: 30px;
}
header h1, i{
    color: #fff;
}
nav, ul{
    list-style: none;
}
header nav,ul{
    display: flex;
}
nav li a{
    color: #fff;
    text-decoration: none;
    font-size: 20px;
}
nav li a:hover{
    color: #16FF00;
}
/*BANNER*/
section.banner{
    background: url(img/testeLivros.png);
    height: 100%;
    background-repeat: no-repeat;
    background-size: cover;
    background-attachment: fixed;
    color: #fff;
    text-align: center;
    padding: 150px 0;
}

/*SOBRE*/
.sobre{
    padding: 120px 100px;
    
}
.sobre h1{
    font-size: 50px;
    text-align: center;
    padding-bottom: 40px;
    color: #23232e;
}
.sobre p{
    font-size: 20px;
}

/*CATÁLOGO*/
.catalogo{
    padding: 120px 100px;
}
.catalogo h1{
    font-size: 50px;
    text-align: center;
    padding-bottom: 40px;
    color: #23232e;
}
div.colunas{
    display: flex;
    justify-content: space-between;
    margin: 50px 6px;
    text-align: center;
}
div.colunas img{
    border-radius: 8px;
}
div.colunas a{
    text-decoration: none;
    color: #16FF00;
}
div.colunas a:hover{
    color: #367E18;
}
div.colunas2{
    display: flex;
    justify-content: space-between;
    margin: 50px 6px;
    text-align: center;
}
div.colunas2 img{
    border-radius: 8px;
}
div.colunas2 a{
    text-decoration: none;
}


/*RODAPE*/
footer div.insta{
    background: #23232e;
    color: #fff;
    width: 100%;
    height: 100px;
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
      
}
div.insta h4{
    font-size: 20px;
    padding-bottom: 10px;
}
div.insta a{
    color: #fff;
    font-size: 40px;
}
div.insta a:hover{
    color:rgb(30, 255, 0) ;
}

@media (max-width: 700px){
    header{
        flex-direction: column;
    }
    header h1{
        padding-bottom: 15px;
    }
}
    </style>
</head>
<body>
    
    <header>

        <h1 class="cartaoPostal">Seja bem-vindo(a) ao centro de Multimeios digital!</h1>
        
        <nav>
            <ul>
                <li><a href="?sair">Sair</a></li>
            </ul>
        </nav>
    </header>
    <section class="banner">
    <div class="box">
               
               <img style="width: 190px; border-radius: 100%; margin-bottom: 80px" src="img/l0g02.png" alt="..." />
               <!-- Masthead Heading-->
               <h1>Multimeios</h1>
               <p>E.E.E.P José Maria Falcão</p>
           </div>
    </section>
    <section class="sobre">
        <h1 id="sobre">Sobre Nós</h1>
        
        <p>Nosso objetivo é promover projetos voltados para desenvolver o gosto, o interesse e a aprendizagem da leitura e da escrita.</p>
        <p>A Multimeios digital foi criada com o intúito de organizar e facilitar o processo de empréstimo do livro, podendo escolher com antecedência a obra literária de forma remota.</p>
        
    </section>
    <section class="catalogo">
        <h1 id="categorias">Categorias</h1>
        <div class="colunas">
        <a href="livros/livro1.php"><article>
                            <img src="img/portfolio/divesos.png" alt="" width="250px">
                            <h3>Assuntos Diversos</h3>
                        </article>
                </a>
                <a href="livros/livro2.php"><article>
                            <img src="img/portfolio/biografia.png" alt="" width="250px">
                            <h3>Biografia</h3>
                        </article>
                </a>
            <a href="livros/livro3.php"><article>
                            <img src="img/portfolio/cienciasSociais.png" alt="" width="250px">
                            <h3>Ciências Humanas e Sociais</h3>
                        </article>
                </a>
            <a href="livros/livro4.php"><article>
                            <img src="img/portfolio/cienciasDaNatureza.png" alt="" width="250px">
                            <h3>Ciências da Natureza</h3>
                        </article>
                </a>
            
        </div>
        <div class="colunas">
        <a href="livros/livro5.php"><article>
                            <img src="img/portfolio/colecao.png" alt="" width="250px">
                            <h3>Redação</h3>
                        </article>
                </a>
                <a href="livros/livro6.php"><article>
                            <img src="img/portfolio/circus.png" alt="" width="250px">
                            <h3>Crônica</h3>
                        </article>
                </a>
            <a href="livros/livro7.php"><article>
                            <img src="img/portfolio/cultura.png" alt="" width="250px">
                            <h3>Cultura</h3>
                        </article>
                </a>
            <a href="livros/livro8.php"><article>
                            <img src="img/portfolio/dicionario.png" alt="" width="250px">
                            <h3>Dicionários</h3>
                        </article>
                </a>
            
        </div>
        <div class="colunas">
        <a href="livros/livro9.php"><article>
                            <img src="img/portfolio/eixotecnico.png" alt="" width="250px">
                            <h3>Eixo Técnico</h3>
                        </article>
                </a>
                <a href="livros/livro10.php"><article>
                            <img src="img/portfolio/espiritualidade.png" alt="" width="250px">
                            <h3>Artes</h3>
                        </article>
                </a>
            <a href="livros/livro11.php"><article>
                            <img src="img/portfolio/exatas.png" alt="" width="250px">
                            <h3>Matemática</h3>
                        </article>
                </a>
            <a href="livros/livro12.php"><article>
                            <img src="img/portfolio/ficcaoCientifica.png" alt="" width="250px">
                            <h3>Ficção Científica</h3>
                        </article>
                </a>
            
        </div>
        <div class="colunas">
        <a href="livros/livro13.php"><article>
                            <img src="img/portfolio/formacaoProfessores.png" alt="" width="250px">
                            <h3>Formação de Professores</h3>
                        </article>
                </a>
                <a href="livros/livro14.php"><article>
                            <img src="img/portfolio/infantoJuvenil.png" alt="" width="250px">
                            <h3>Infanto Juvenil</h3>
                        </article>
                </a>
            <a href="livros/livro15.php"><article>
                            <img src="img/portfolio/linguagensCodigos.png" alt="" width="250px">
                            <h3>Linguagens e Códigos</h3>
                        </article>
                </a>
            <a href="livros/livro16.php"><article>
                            <img src="img/portfolio/rom.png" alt="" width="250px">
                            <h3>Romances</h3>
                        </article>
                </a>
            
        </div>
    </section>
    <footer>
        <div class="insta">
            <!--<h4>Estamos no instagram!</h4>
            <a href="https://instagram.com/multimeios_jmf?igshid=YmMyMTA2M2Y=" target="_blank"><i class="fa-brands fa-instagram"></i></a>-->
            <p>Todos os direitos reservados</p>
        </div>
    </footer>
</body>
</html>