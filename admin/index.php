<?php
ob_start(); //ARMAZENA MEUS DADOS EM CACHE
session_start(); //INICIA A SESSÃO
if(isset($_SESSION['loginUser']) && (isset($_SESSION['senhaUser']))){
    header("Location: admin.php");
    exit;
}

?>
<!DOCTYPE html>
<html lang="pt_br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style-form.css">
    <title>Multimeios Digital | Login do Administrador</title>
    <script src="https://kit.fontawesome.com/1e32b8079d.js" crossorigin="anonymous"></script>
    
</head>
<body class="banner">    
    <div class="container">
        <div class="card">
                    <h2>Faça Login</h2>
                    
                            <form class="editar" action="" method="post" enctype="multipart/form-data">
                                
                                    <div class="label-float">
                                        <label for="">Username</label>
                                        <input name="nome" type="text"/>
                                    </div>
                                    
                                    <div class="label-float">
                                        <label for="">Senha</label>
                                        <input type="password" onkeypress="$(this).mask('000000')" name="senha"/>
                                    </div>
                                    <button name="btnlogin" class="btn" type="submit">Entrar</button>
                                    <a href="cad_adm.php">Torne-se Adm</a>
                                </form>
                                <?php
                                    include_once('../config/conexao.php');
                                    if(isset($_POST['btnlogin'])){
                                        $login=$_POST['nome'];
                                        $senha=$_POST['senha'];
                                        $select="SELECT * FROM tbadm WHERE nomeAdm=:nomeLogin AND senhaAdm=:senhaLogin";
                                        try {
                                          $resultLogin = $conect->prepare($select);
                                          $resultLogin->bindParam(':nomeLogin',$login, PDO::PARAM_STR);
                                          $resultLogin->bindParam(':senhaLogin',$senha, PDO::PARAM_STR);
                                          $resultLogin->execute();
                              
                                          $verificar = $resultLogin->rowCount();
                                          if ($verificar>0) {
                                            $login=$_POST['nome'];
                                            $senha=$_POST['senha'];
                                            //CRIAR SESSAO »»
                                            $_SESSION['loginUser'] = $login;
                                            $_SESSION['senhaUser'] = $senha;
                              
                                            echo 'Bem-vindo(a) ao centro Multimeios Digital :)';
                                          
                                            header("Refresh: 3, admin.php?");
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
    <script src="../js/jQuery-3.6.4.min.js"></script>
    <script src="../js/jQuery-Mask/dist/jquery.mask.min.js"></script>
</body>
</html>