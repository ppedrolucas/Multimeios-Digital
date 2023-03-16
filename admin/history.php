<!DOCTYPE html>
<html lang="pt_br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Histórico de alocagens</title>
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

            <strong>Histórico de Alocagens</strong>
            
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
      
          
        <table class=" table table-striped">
            <thead>
                <tr>
                  
                  <th scope="col">Data</th>
                  <th scope="col">User</th>
                  <th scope="col">ID do Livro</th>
                  
                </tr>
              </thead>
              <tbody>
              <?php
                    include_once('../config/conexao.php');
                      $select = "SELECT * FROM alocados ORDER BY idUser DESC" ;
                      try{
                        $resultado = $conect->prepare($select);
                        $resultado->execute();
                        $contar = $resultado->rowCount();
                        if($contar > 0){
                          while($show = $resultado->FETCH(PDO::FETCH_OBJ)){   
                    ?>
                <tr>
                  
                  <td><?php echo $show->data;?></td>
                  <td><?php echo $show->nomeUser;?></td>
                  <td><?php echo $show->livro;?></td>
                  
                </tr>
                <?php
                      }
                    }else{
                      echo '<div class="container">
                                <div class="alert alert-danger alert-dismissible">
                                
                                <h5><i class="icon fas fa-check"></i> Ops!</h5>
                                Não há livros alocados no momento !!!
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
        <!--<div class="zegotinha">
          <p>Todos os direitos reservados</p>
        </div>-->
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