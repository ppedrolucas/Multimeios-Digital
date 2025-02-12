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
    <header class="w-full bg-gray-800">
        <nav  class="container  mx-auto lg:w-5xl p-4 h-16 flex justify-end items-center text-white">
            <ul>
                <li class="hover:text-green-500"><a href="?sair">Sair</a> </li>
            </ul>
        </nav>
    </header>
    <section>
        <div class="container mx-auto p-4 mt-16 mb-20 lg:w-5xl">
            <p class="text-sm mb-2 font-semibold text-blue-700">E.E.E.P José Maria Falcão</p>
            <h1 class="text-3xl font-bold mb-2 text-gray-900">Olá <?php echo $_SESSION['loginUser']?></h1>
            <h2 class="text-xl mb-4 font-medium text-gray-500">Seja bem-vindo(a) a Multimeios digital!</h2>
        </div>
    </section>
    <!--<section class="sobre">
        <h1 id="sobre">Sobre Nós</h1>
        
        <p>Nosso objetivo é promover projetos voltados para desenvolver o gosto, o interesse e a aprendizagem da leitura e da escrita.</p>
        <p>A Multimeios digital foi criada com o intúito de organizar e facilitar o processo de empréstimo do livro, podendo escolher com antecedência a obra literária de forma remota.</p>
        
    </section>-->
    <section>
        <h1 class="text-center text-3xl font-bold mb-20 text-gray-900">Acervo de Livros</h1>
        <div class="container  p-4 mx-auto grid grid-cols-1 md:grid-cols-3 md: lg:grid-cols-4 lg:w-5xl lg:gap-4 gap-8">
            <figure class="relative rounded-lg overflow-hidden">
                <a href="livros/livro1.php">
                    <img class="w-full h-48 object-cover" src="assets/img/divesos.png" alt="">
                </a>
                <figcaption class="absolute bottom-0 w-full px-4 py-2 text-white font-semibold text-lg bg-linear-to-b to-gray-900 ">
                    <span>Assuntos diversos</span>
                </figcaption>
            </figure>
                
            <figure class="relative rounded-lg overflow-hidden">
                <a href="livros/livro2.php">
                    <img class="w-full h-48 object-cover" src="assets/img/biografia.png" alt="">
                </a>
                <figcaption class="absolute bottom-0 w-full px-4 py-2 text-white font-semibold text-lg bg-linear-to-b to-gray-900 ">
                    <span>Biografia</span>
                </figcaption>
            </figure>

            <figure class="relative rounded-lg overflow-hidden">
                <a href="livros/livro3.php">
                    <img class="w-full h-48 object-cover" src="assets/img/cienciasSociais.png" alt="">
                </a>
                <figcaption class="absolute bottom-0 w-full px-4 py-2 text-white font-semibold text-lg bg-linear-to-b to-gray-900 ">
                    <span>Ciências Humanas e Sociais</span>
                </figcaption>
            </figure>
            
            <figure class="relative rounded-lg overflow-hidden">
                <a href="livros/livro4.php">
                    <img class="w-full h-48 object-cover" src="assets/img/cienciasDaNatureza.png" alt="">
                </a>
                <figcaption class="absolute bottom-0 w-full px-4 py-2 text-white font-semibold text-lg bg-linear-to-b to-gray-900 ">
                    <span>Ciências da Natureza</span>
                </figcaption>
            </figure>

            <figure class="relative rounded-lg overflow-hidden">
                <a href="livros/livro5.php">
                    <img class="w-full h-48 object-cover" src="assets/img/colecao.png" alt="">
                </a>
                <figcaption class="absolute bottom-0 w-full px-4 py-2 text-white font-semibold text-lg bg-linear-to-b to-gray-900 ">
                    <span>Redação</span>
                </figcaption>
            </figure>
                <!-- <a href="livros/livro6.php"><article>
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
                </a> -->
            
        </div>
    </section>
    <footer class="w-full h-32 flex items-center">
        <div class="container p-4 mx-auto border-t lg:w-5xl">
            <!--<h4>Estamos no instagram!</h4>
            <a href="https://instagram.com/multimeios_jmf?igshid=YmMyMTA2M2Y=" target="_blank"><i class="fa-brands fa-instagram"></i></a>-->
            <p>&copy; Todos os direitos reservados</p>
        </div>
    </footer>
</body>
</html>