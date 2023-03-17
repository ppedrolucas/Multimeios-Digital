<!DOCTYPE html>
<html lang="pt_br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabela de livros</title>
    <link rel="stylesheet" href="../bootstrap5/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/tables.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/1e32b8079d.js" crossorigin="anonymous"></script>
    
</head>
<body>
    <header>
        <div class="pave">
            <div class="kablooe">
                <a href="admin.php" title="voltar"><i class="fa-solid fa-chevron-left"></i></a>
            </div>

            <strong>Livros Cadastrados</strong>
            
        </div>
    </header>
    <section class="banner">
      <div class="box">
        <img src="../img/l0g02.png" style="width: 190px; border-radius: 100%; margin-bottom: 80px" alt="" srcset="">
        <h1>Multimeio Digital</h1>
        
        <p>E.E.E.P José Maria Falcão</p>
      </div>
    </section>
    <section class="tabela">

      <!-- Button trigger modal -->
      <div class="botao">
          <button type="button" class="botao btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Adicionar
          </button>

          <!-- Modal -->
          <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">Adicione mais um livro ao acervo</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form action="" method="post" enctype="multipart/form-data">
                    <div class="txt_field">
                      <input type="text" name="nome" required>
                      <span></span>
                      <label for="">Título</label>
                    </div>
                    <div class="txt_field">
                      <input type="text" name="autor" required>
                      <span></span>
                      <label for="">Autor</label>
                    </div>
                    <div class="txt_field">
                      <input type="text" name="volume" required>
                      <span></span>
                      <label for="">Volume</label>
                    </div>
                    <div class="txt_field">
                      <input type="text" name="local" required>
                      <span></span>
                      <label for="">Local</label>
                    </div>
                    <div class="txt_field">
                      <input type="text" name="editora" required>
                      <span></span>
                      <label for="">Editora</label>
                    </div>
                    <div class="txt_field">
                      <input type="text" name="ano" required>
                      <span></span>
                      <label for="">Ano de publicação</label>
                    </div>
                    <div class="txt_field">
                      <input type="text" name="categoria" required>
                      <span></span>
                      <label for="">Categoria</label>
                    </div>
                    <button type="submit" name="btnAdd" class="btn btn-primary">Adicionar</button>
                  </form>
                  <?php
                        include_once('../config/conexao.php');
                        if(isset($_POST['btnAdd'])){
                          $nome=$_POST['nome'];
                          $autor=$_POST['autor'];
                          $volume=$_POST['volume'];
                          $local=$_POST['local'];
                          $editora=$_POST['editora'];
                          $ano=$_POST['ano'];
                          $categoria=$_POST['categoria'];
                          
                              $cadastro="INSERT INTO livros(nomeLivro,autorLivro,volLivro,localLivro,editLivro,anoLivro,cateLivro) VALUES(:nome,:autor,:volume,:local,:editora,:ano,:categoria)";                  
                               try{
                                $result=$conect-> prepare ($cadastro);
                                $result->bindParam(':nome',$nome,PDO::PARAM_STR);
                                $result->bindParam(':autor',$autor,PDO::PARAM_STR);
                                $result->bindParam(':volume',$volume,PDO::PARAM_STR);
                                $result->bindParam(':local',$local,PDO::PARAM_STR);
                                $result->bindParam(':editora',$editora,PDO::PARAM_STR);
                                $result->bindParam(':ano',$ano,PDO::PARAM_STR);
                                $result->bindParam(':categoria',$categoria,PDO::PARAM_STR);
                                $result->execute();
          
                                $contar=$result->rowCount();
                              if($contar > 0){
                                    echo '<div class="alert alert-success" role="alert">
                                            A simple success alert—check it out!
                                          </div>
                                  ';
                                  }else{
                                    echo '<div class="container">
                                              <div class="alert alert-danger alert-dismissible">
                                              <h5><i class="icon fas fa-check"></i> Ops!</h5>
                                              Livro não cadastrado !!!
                                            </div>
                                          </div>';
                                  }
                              }catch (PDOException $e){
                                echo"<strong> ERRO DE CADASTRO PDO = </strong>". $e->getMessage();
                              }
                        }
                        ?>
                </div>
                </div>
            </div>
          </div>
      </div>
        <table class=" table table-striped">
            <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Título</th>
                  <th scope="col">Autor</th>
                  <th scope="col">Volume</th>
                  <th scope="col">Local</th>
                  <th scope="col">Editora</th>
                  <th scope="col">Ano</th>
                  <th scope="col">Categorría</th>
                  <th scope="col">Ação</th>

                </tr>
              </thead>
              <tbody>
              <?php
                      $select = "SELECT * FROM livros ORDER BY idLivro DESC LIMIT 50 ";
                      try{
                        $resultado = $conect->prepare($select);
                        $resultado->execute();
                        $contar = $resultado->rowCount();
                        if($contar > 0){
                          while($show = $resultado->FETCH(PDO::FETCH_OBJ)){   
                    ?>
                <tr>
                  <th><?php echo $show->idLivro;?></th>
                  <td><?php echo $show->nomeLivro;?></td>
                  <td><?php echo $show->autorLivro;?></td>
                  <td><?php echo $show->volLivro;?></td>
                  <td><?php echo $show->localLivro;?></td>
                  <td><?php echo $show->editLivro;?></td>
                  <td><?php echo $show->anoLivro;?></td>
                  <td><?php echo $show->cateLivro;?></td>
                  
                  <td>
                    <a href="delLivro.php?idDel=<?php echo $show->idLivro;?>" class="btn btn-danger"><img src="../img/svg/remover.png" alt="" srcset="" width="20px"></a>
                    <a href="edit_book.php?id=<?php echo $show->idLivro;?>" class="btn btn-success"><img src="../img/svg/editar.png" alt="" srcset="" width="20px"></a>
                  </td>
                </tr>
                
                <?php
                      }
                    }else{
                      echo '<div class="container">
                                <div class="alert alert-danger alert-dismissible">
                                
                                <h5><i class="icon fas fa-check"></i> Ops!</h5>
                                Não há livros cadastrados !!!
                              </div>
                            </div>';
                    }
                  }catch(PDOException $e){
                    echo '<strong>ERRO DE PDO= </strong>'.$e->getMessage();
                  }
                    ?>
              </tbody>
              
          </table>
    </section>
    <footer>
        
        <?php
        
        include_once('../includes/footer.php');
        
        ?>
       </footer>  
       
    <script src="../bootstrap5/js/bootstrap.bundle.js"></script>
    <script src="../bootstrap5/js/bootstrap.js"></script>
    <script src="../bootstrap5/js/bootstrap.min.js"></script>
    <script src="../bootstrap5/js/popper.min.js"></script>
</body>
</html>