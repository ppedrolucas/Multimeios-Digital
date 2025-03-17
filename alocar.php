
<!DOCTYPE html>
<html lang="pt_br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <script src="https://kit.fontawesome.com/1e32b8079d.js" crossorigin="anonymous"></script>
    <title>Aloque seu livro</title>
</head>
<body class="bg-white">
    <div class="container">
        <h2>Preencha com seu dados para confirmar<br> que deseja alocar este livro</h2>
        <div class="card">
            <form class="editar" action="" method="post" enctype="multipart/form-data">
                                
                                    <div class="label-float">
                                        <label for="">Nome Completo</label>
                                        <input name="nome" type="text"/>
                                    </div>
                                    
                                    <div class="label-float">
                                        <label for="">Matrícula</label>
                                        <input name="matricula" type="text"/>
                                    </div class="botao">
                                    <button name="btnlogin" class="btn" type="submit">Alocar</button>
                                </form>
                                <?php
                                    include_once('../config/conexao.php');
                                    if(isset($_POST['btnlogin'])){
                                        $data= date('Y-m-d');
                                        $nome=$_POST['nome'];
                                        $senha=$_POST['matricula'];
                                        $idLi=$_GET['idLivro'];
                                        $select="INSERT INTO alocados(data,nomeUser,matricula,livro) VALUES(:data,:nome,:matricula,:idLivro)";
                                        
                                        try {
                                          $rodo = $conect->prepare($select);
                                          $rodo->bindParam(':data',$data, PDO::PARAM_STR);
                                          $rodo->bindParam(':nome',$nome, PDO::PARAM_STR);
                                          $rodo->bindParam(':matricula',$senha, PDO::PARAM_STR);
                                          $rodo->bindParam(':idLivro',$idLi, PDO::PARAM_STR);
                                          $rodo->execute();

                                          $contar=$rodo->rowCount();
                                          if($contar > 0){
                                                echo ' <h5>OK!</h5>
                                                          livro alocado com sucesso !!!';
                                              }else{
                                                echo '<h5>Ops!</h5>
                                                        não foi possível alocar este livro !!!';
                                              }
                                            $contar = $rodo->rowCount();
                                            if($contar>0){
                                                header("Refresh: 2, ../home.php");
                                            }else{
                                                header("Refresh: 2, ../home.php");
                                            }
                                          }catch (PDOException $e){
                                            echo"<strong> ERRO DE CADASTRO PDO = </strong>". $e->getMessage();
                                          }
                                    }
                                    ?>
         </div>
    </div>
                <script>
                // Verifica se a resposta do servidor contém a string "Registro bem sucedido"
                if (document.body.innerHTML.indexOf("<h5>OK!</h5> livro alocado com sucesso !!!") !== -1) {
                    // Se a string foi encontrada, oculta a div
                    document.getElementById("idLivro").style.display = "none";
                }
                </script>
</body>
</html>