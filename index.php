<?php
ob_start(); //ARMAZENA MEUS DADOS EM CACHE
session_start(); //INICIA A SESSÃO
if(isset($_SESSION['loginUser']) && (isset($_SESSION['senhaUser']))){
    header("Location: home.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt_br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style-form.css">
    <title>Multimeios Digital | Login</title>
    <script src="https://kit.fontawesome.com/1e32b8079d.js" crossorigin="anonymous"></script>
    
</head>
<body class="banner">
    <div class="container">
      
        <div class="card">
                    <h2>Faça Login</h2>
                    
                            <form class="editar" action="" method="post" enctype="multipart/form-data">
                                
                                    <div class="label-float">
                                        <label for="">Nome Completo</label>
                                        <input name="nome" type="text"/>
                                    </div>
                                    
                                    <div class="label-float">
                                        <label for="">Matrícula</label>
                                        <input type="text" onkeypress="$(this).mask('0000000')" name="matricula"/>
                                    </div>
                                    <div class="direcionamento">
                                        <button name="btnlogin" class="btn" type="submit">Entrar</button>
                                        <a href="admin/index.php">Login Para Adm's</a>
                                    </div>
                                    
                                </form>
                                <?php
                                    include_once('config/conexao.php');
                                    if(isset($_GET['acao'])){
                                        $acao=$_GET['acao'];
                                        if($acao == 'negado'){
                                            echo 'Erro ao acessar o sistema! Efetue o login <3';
                                        }else if($acao == 'sair'){
                                            echo 'Sessão encerrada com sucesso';
                                        }
                                    }

                                    if(isset($_POST['btnlogin'])){
                                        $login=$_POST['nome'];
                                        $senha=$_POST['matricula'];
                                        $select="SELECT * FROM tbaluno WHERE nomeAluno=:nomeLogin AND matricula=:matriculaLogin";
                                        try {
                                          $resultLogin = $conect->prepare($select);
                                          $resultLogin->bindParam(':nomeLogin',$login, PDO::PARAM_STR);
                                          $resultLogin->bindParam(':matriculaLogin',$senha, PDO::PARAM_STR);
                                          $resultLogin->execute();
                              
                                          $verificar = $resultLogin->rowCount();
                                          if ($verificar>0) {
                                            $login=$_POST['nome'];
                                            $senha=$_POST['matricula'];
                                            //CRIAR SESSAO »»
                                            $_SESSION['loginUser'] = $login;
                                            $_SESSION['senhaUser'] = $senha;
                              
                                            echo 'Seja bem-vindo(a) ao centro de Multimeios Digital :)';
                                          
                                            header("Refresh: 3, home.php?acao=welcome");
                                          }else{
                                            echo "Usuário inválido";
                                          }
                                        } catch(PDOException $e){
                                          echo "<strong>ERRO DE LOGIN = </strong>".$e->getMessage();
                                        }
                                      }
                                    ?>
         </div>
    </div>
    <script src="js/jQuery-3.6.4.min.js"></script>
    <script src="js/jQuery-Mask/dist/jquery.mask.min.js"></script>
    
</body>
</html>