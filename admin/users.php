<!DOCTYPE html>
<html lang="pt_br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabela de usuários</title>
    <link rel="stylesheet" href="../bootstrap5/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/tables.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/1e32b8079d.js" crossorigin="anonymous"></script>
   
</head>
<body>
    <div>
        <div class="pave">
            <div class="kablooe">
                <a href="admin.php" title="voltar"><i class="fa-solid fa-chevron-left"></i></a>
            </div>

            <strong>Usuários cadastrados</strong>
            
        </div>
    </div>
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
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Cadastrar
          </button>

          <!-- Modal -->
          <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">Cadastre um novo Usuário</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form action="" method="post">
                    <div class="txt_field">
                      <input type="text" name="nome" required>
                      <span></span>
                      <label for="">Nome</label>
                    </div>
                    <div class="txt_field">
                      <input type="text" name="matricula" required>
                      <span></span>
                      <label for="">Matrícula</label>
                    </div>
                    <div class="txt_field">
                      <input type="text" id="meu-campo-de-entrada" name="turma" required>
                      <span></span>
                      <label>Turma</label>
                    </div>
                    <button name="btnCContato" class="btn btn-primary" type="submit">Cadastrar</button>
                  </form>
                  
                </div>
                  <?php
                        include_once('../config/conexao.php');
                        if(isset($_POST['btnCContato'])){
                          $nome=$_POST['nome'];
                          $matricula=$_POST['matricula'];
                          $turma=$_POST['turma'];

                              $cadastro="INSERT INTO tbaluno(nomeAluno,matricula,turmaAluno) VALUES(:nome,:matricula,:turma)";                   
                              try{
                                $result=$conect-> prepare ($cadastro);
                                $result->bindParam(':nome',$nome,PDO::PARAM_STR);
                                $result->bindParam(':matricula',$matricula,PDO::PARAM_STR);
                                $result->bindParam(':turma',$turma,PDO::PARAM_STR);
                                $result->execute();
          
                                $contar=$result->rowCount();
                              if($contar > 0){
                                    echo '<div class="container">
                                              <div class="alert alert-success alert-dismissible">
                                              
                                              <h5><i class="icon fas fa-check"></i> OK!</h5>
                                              usuário cadastrado com sucesso !!!
                                            </div>
                                          </div>';
                                  }else{
                                    echo '<div class="container">
                                              <div class="alert alert-danger alert-dismissible">
                                              
                                              <h5><i class="icon fas fa-check"></i> Ops!</h5>
                                              usuário não cadastrado !!!
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
      
        <table class=" table table-striped">
            <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Nome</th>
                  <th scope="col">Matrícula</th>
                  <th scope="col">Turma</th>
                  <th scope="col">Ação</th>

                </tr>
              </thead>
              <tbody>
              <?php
                      $select = "SELECT * FROM tbaluno ORDER BY idAluno";
                      try{
                        $resultado = $conect->prepare($select);
                        $resultado->execute();
                        $contar = $resultado->rowCount();
                        if($contar > 0){
                          while($show = $resultado->FETCH(PDO::FETCH_OBJ)){   
                    ?>
                <tr>
                  <th scope="row"><?php echo $show->idAluno;?></th>
                  <td><?php echo $show->nomeAluno;?></td>
                  <td><?php echo $show->matricula;?></td>
                  <td><?php echo $show->turmaAluno;?></td>
                 
                  
                  <td><a href="update_perfil.php?id=<?php echo $show->idAluno;?>" class="btn btn-success"><img src="../img/svg/editar.png" alt="" srcset="" width="20px"></a>
                  <a href="del.php?idDel=<?php echo $show->idAluno;?>" class="btn btn-danger"><img src="../img/svg/remover.png" alt="" srcset="" width="20px"></a></td>
                </tr>
                <?php
                      }
                    }else{
                      echo '<div class="container">
                                <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <h5><i class="icon fas fa-check"></i> Ops!</h5>
                                Não há contatos cadastrados !!!
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
    <script src="../js/jQuery-3.6.4.min.js"></script>
    <script src="../js/mask.js"></script>
    <script src="../bootstrap5/js/bootstrap.bundle.js"></script>
    <script src="../bootstrap5/js/bootstrap.js"></script>
    <script src="../bootstrap5/js/bootstrap.min.js"></script>
    <script src="../bootstrap5/js/popper.min.js"></script>
</body>
</html>