<?php
ob_start(); //ARMAZENA MEUS DADOS EM CACHE
session_start(); //INICIA A SESSÃO
if(!isset($_SESSION['loginUser']) && (!isset($_SESSION['senhaUser']))){
    header("Location: book.php?acao=negado");
    exit;
}
include_once('../sair.php')
?>
<!DOCTYPE html>
<html lang="pt_br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <script src="https://kit.fontawesome.com/1e32b8079d.js" crossorigin="anonymous"></script>
    <script src="../js/components/footer.js"></script>
    <link rel="stylesheet" href="../styles/style.css">
    <title>Multimeios Digital | Biologia</title>
</head>
<body onload="appear()" class="bg-white">
    <?php
        include_once('../config/conexao.php');
        $select = "SELECT * FROM livros WHERE cateLivro = 'BIOLOGIA'";
    ?>
    <header class="w-full bg-white shadow-xl fixed md:relative top-0 z-40">
        <nav  class="container mx-auto lg:w-5xl p-4 h-16 flex items-center text-white">
            <ul>
                <li class="relative">
                    <div class="flex items-center gap-1 cursor-pointer" >
                        <img class="w-10 rounded-full" src="../assets/avatar.jpg">
                        <p class="text-gray-900 font-medium text-sm"><?php echo $_SESSION['loginUser']?></p>
                        <img src="../assets/icons/dropdown-arrow.svg" onclick="dropdown()">
                    </div>
                     <ul id="drop" class="absolute border border-gray-100 bg-white shadow-2xl  w-full p-2 mt-1.5 rounded-lg scale-0 transition">
                        <li class="text-gray-600 text-sm hover:text-green-500"><a href="?sair">Sair</a></li>
                     </ul>
                </li>
            </ul>
        </nav>
    </header>
    <section class="bg-white mt-32 md:mt-16">
    <?php      
           
           try{
               $resultado = $conect->prepare($select);
               $resultado->execute();
               $contar = $resultado->rowCount();
               if($contar > 0){
                   while($show = $resultado->FETCH(PDO::FETCH_OBJ)){   
                       ?>
           <div class="container p-4 mx-auto lg:w-5xl">
               <div class="flex gap-2 items-center border border-gray-200 shadow-2xl rounded-lg p-4">
                    <img class="h-50 rounded-lg" src="../assets/cape.png" alt="Título do livro: <?php echo $show->nomeLivro;?>" title="<?php echo $show->nomeLivro;?>">
                    <div class="truncate">
                        <h4 class="text-base font-semibold"><?php echo $show->nomeLivro;?></h4>
                        <h5>De: <?php echo $show->autorLivro;?></h5>
                        <h5>vol.: <?php echo $show->volLivro;?></h5>
                        <h5>local: <?php echo $show->localLivro;?></h5>
                        <h5>editora: <?php echo $show->editLivro;?></h5>
                        <h5>ano de publicação: <?php echo $show->anoLivro;?></h5>
                        <button name="btnAlocar" type="submit" class="transition rounded-md px-3 py-1.5 bg-green-500 hover:bg-green-400 text-white font-medium text-sm/6"><a title="Alocar" href="../request_form.php?idLivro=<?php echo $show->idLivro;?>">Alocar</a></button>
                    </div>
               </div>
            </div>
            <?php
                    }
                }else{
                    echo '
                        <div class="container p-4">
                            <div class="">
                                <h2>Ops!</h2>
                                <p>Não há livros cadastrados !!!</p>
                            </div>
                        </div>';
                }
                }catch(PDOException $e){
                echo '<strong>ERRO DE PDO= </strong>'.$e->getMessage();
                }
                ?>
    </section>
    <new-footer></new-footer>
    <script src="js/script.js"></script>
</body>
</html>