
<!DOCTYPE html>
<html lang="pt_br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style-form.css">
    <title>Cadastro para administrador</title>
    <script src="https://kit.fontawesome.com/1e32b8079d.js" crossorigin="anonymous"></script>
</head>
<body class="banner">
        <a class="voltar" title="voltar" href="index.php"><i class="fa-solid fa-chevron-left"></i>Voltar</a>
    <div class="container">
        <div class="card">
                    <h2>Cadastre-se para ser Administrador</h2>
                    
                            <form class="editar" action="" method="post" enctype="multipart/form-data">
                                    <div class="label-float">
                                        <label for="">Nome Completo</label>
                                        <input name="nome" type="text"/>
                                    </div>
                                    <div class="label-float">
                                        <label for="">Telefone</label>
                                        <input name="tel" type="phone"/>
                                    </div>
                                    <div class="label-float">
                                        <label for="">E-mail</label>
                                        <input name="email" type="email"/>
                                    </div>
                                    <div class="label-float">
                                        <label for="">senha</label>
                                        <input name="senha" type="password"/>
                                    </div>
                                    <button name="btnCContato" class="btn" type="submit">Cadastrar</button>
                                </form>
                                <?php
                                    include_once('../config/conexao.php');
                                    if(isset($_POST['btnCContato'])){
                                        $nome=$_POST['nome'];
                                        $email=$_POST['email'];
                                        $tel=$_POST['tel'];
                                        $senha=$_POST['senha'];
                                        $cadastro="INSERT INTO tbadm(nomeAdm,emailAdm,telAdm,senhaAdm) VALUES(:nome,:email,:tel,:senha)";                   
                                        try {
                                          $result = $conect->prepare($cadastro);
                                          $result->bindParam(':nome',$nome, PDO::PARAM_STR);
                                          $result->bindParam(':email',$email, PDO::PARAM_STR);
                                          $result->bindParam(':tel',$tel, PDO::PARAM_STR);
                                          $result->bindParam(':senha',$senha, PDO::PARAM_STR);
                                          $result->execute();
                            
                                          $contar=$result->rowCount();
                                          if($contar > 0){
                                                echo ' <h5>OK!</h5>
                                                          contato cadastrado com sucesso !!!';
                                              }else{
                                                echo '<h5>Ops!</h5>
                                                        contato não cadastrado !!!';
                                              }
                                          }catch (PDOException $e){
                                            echo"<strong> ERRO DE CADASTRO PDO = </strong>". $e->getMessage();
                                          }
                                    }
                                    ?>                 
         </div>
    </div>

</body>
</html>