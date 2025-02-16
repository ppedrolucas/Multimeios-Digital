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
    <script src="js/components/footer.js"></script>
    <link rel="stylesheet" href="styles/style.css">
    <title>Multimeios Digital | Home</title>
</head>
<body class="bg-white text-gray-900 tracking-wide">
    <?php
        include_once('config/conexao.php');
        $select = "SELECT cateLivro FROM livros";

        try{
            $resultado = $conect->prepare($select);
            $resultado->execute();
            $contar = $resultado->rowCount();
            if($contar > 0){
                while($show = $resultado->FETCH(PDO::FETCH_OBJ)){
                                
                    }
            }else{
                echo 'NÃO DEU CERTO';
            }
        }catch(PDOException $e){
            echo '<strong>ERRO DE PDO= </strong>'.$e->getMessage();
        }
    ?>
    <header class="w-full bg-white shadow-xl fixed md:relative top-0 z-40">
        <nav  class="container mx-auto lg:w-5xl p-4 h-16 flex items-center text-white">
            <ul>
                <li class="relative">
                    <div class="flex items-center gap-1 cursor-pointer" >
                        <img class="w-10 rounded-full" src="assets/avatar.jpg">
                        <p class="text-gray-900 font-medium text-sm"><?php echo $_SESSION['loginUser']?></p>
                        <img src="assets/icons/dropdown-arrow.svg" onclick="dropdown()">
                    </div>
                     <ul id="drop" class="absolute border border-gray-100 bg-white shadow-2xl  w-full p-2 mt-1.5 rounded-lg scale-0 transition">
                        <li class="text-gray-600 text-sm hover:text-green-500"><a href="?sair">Sair</a></li>
                     </ul>
                </li>
            </ul>
        </nav>
    </header>
    <section>
        <div class="container mx-auto p-4 mt-16 lg:w-5xl">
            <p class="text-sm mb-2 md:text-base font-semibold text-blue-500">E.E.E.P José Maria Falcão</p>
            <h1 class="text-3xl md:text-5xl lg:text-7xl font-bold mb-4">Olá <?php echo $_SESSION['loginUser']?></h1>
            <h2 class="text-xl mb-8 font-medium text-gray-500">Seja bem-vindo(a) a Multimeios digital!</h2>
        </div>
    </section>
    <section class="aside">
        <div class="container mx-auto p-4 lg:w-5xl">
            <div class="grid gap-4 mb-20">
                <div class="flex gap-1">
                    <img src="assets/icons/check-list.svg" alt="">
                    <p>Acesse de qualquer lugar</p>
                </div>
                <div class="flex gap-1">
                    <img src="assets/icons/check-list.svg" alt="">
                    <p>Garanta seu livro na palma da mão</p>
                </div>
                <div class="flex gap-1">
                    <img src="assets/icons/check-list.svg" alt="">
                    <p>Navegue e encontre o que deseja</p>
                </div>
                <div class="flex gap-1">
                    <img src="assets/icons/check-list.svg" alt="">
                    <p>Veja os melhores dos melhores da Multimeios</p>
                </div>
            </div>
        </div>    
    </section>
    <section>
        <h1 class="text-center text-3xl md:text-4xl lg:text-5xl font-bold mb-20 lg:mb-16 text-gray-900">Acervo de Livros</h1>
        <div class="container  p-4 mx-auto grid grid-cols-1 md:grid-cols-3 md: lg:grid-cols-4 lg:w-5xl lg:gap-4 gap-8">
            <figure class="relative rounded-lg overflow-hidden">
                <a href="book.php">
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

            <figure class="relative rounded-lg overflow-hidden">
                <a href="livros/livro6.php">
                    <img class="w-full h-48 object-cover" src="assets/img/circus.png" alt="">
                </a>
                <figcaption class="absolute bottom-0 w-full px-4 py-2 text-white font-semibold text-lg bg-linear-to-b to-gray-900 ">
                    <span>Crônica</span>
                </figcaption>
            </figure>
                <!-- 
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
    <new-footer></new-footer>

    <script src="js/script.js"></script>
</body>
</html>