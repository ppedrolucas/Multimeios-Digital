<!DOCTYPE html>
<html lang="pt_br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Multimeios Digital | REDAÇÃO</title>
    <script src="https://kit.fontawesome.com/1e32b8079d.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../MyCss/style.css">
</head>
<body>
    
    <header>
        <div class="titulo">
        <h1>Redação</h1>
        </div>
    </header>
    <section class="banner">
    <?php
           
           include_once('../config/conexao.php');
           $select = "SELECT * FROM livros WHERE cateLivro = 'Redação/Gramática/ Análises textuais/  Redação no Enem'";
           try{
               $resultado = $conect->prepare($select);
               $resultado->execute();
               $contar = $resultado->rowCount();
               if($contar > 0){
                   while($show = $resultado->FETCH(PDO::FETCH_OBJ)){   
                       ?>
           <div class="coluna">
               <article>
                    <img src="../img/Mobile.png" alt="" width="80px">
                    <div>
                        <h3><?php echo $show->nomeLivro;?></h3>
                        <h5>De: <?php echo $show->autorLivro;?></h5>
                        <h5>vol.: <?php echo $show->volLivro;?></h5>
                        <h5>local: <?php echo $show->localLivro;?></h5>
                        <h5>editora: <?php echo $show->editLivro;?></h5>
                        <h5>ano de publicação: <?php echo $show->anoLivro;?></h5>
                        <button name="btnAlocar" type="submit"><a href="../admin/alocar.php?idLivro=<?php echo $show->idLivro;?>">Alocar</a></button>
                    </div>
               </article>
            </div>
            <?php
                    }
                }else{
                    echo '<div class="container">
                            
                    
                            <h5>Ops!</h5>
                            Não há livros cadastrados !!!
                            </div>
                        </div>';
                }
                }catch(PDOException $e){
                echo '<strong>ERRO DE PDO= </strong>'.$e->getMessage();
                }
                ?>
    </section>   
</body>
</html>