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
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <script src="https://kit.fontawesome.com/1e32b8079d.js" crossorigin="anonymous"></script>
    <title>Multimeios Digital | Home</title>
</head>
<body>
    
    <header class="w-full bg-gray-100">
        <nav  class="container max-w-5xl p-4 mx-auto flex justify-between items-center">
            <h1 class="cartaoPostal">Olá <?php echo $_SESSION['loginUser']?>, seja bem-vindo a Multimeios digital!</h1>
            <ul>
                <li><a href="?sair">Sair</a></li>
            </ul>
        </nav>
    </header>
    <section class="banner">
    <div class="box">
               
               <img style="width: 190px; border-radius: 100%; margin-bottom: 80px" src="img/l0g02.png" alt="..." />
               <!-- Masthead Heading-->
               <h1>Multimeios Digital</h1>
               <p>E.E.E.P José Maria Falcão</p>
           </div>
    </section>
    <!--<section class="sobre">
        <h1 id="sobre">Sobre Nós</h1>
        
        <p>Nosso objetivo é promover projetos voltados para desenvolver o gosto, o interesse e a aprendizagem da leitura e da escrita.</p>
        <p>A Multimeios digital foi criada com o intúito de organizar e facilitar o processo de empréstimo do livro, podendo escolher com antecedência a obra literária de forma remota.</p>
        
    </section>-->
    <section class="catalogo">
        <h1 id="categorias">Acervo de Livros</h1>
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