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
    <!-- <link rel="stylesheet" href="css/style-form.css"> -->
    <title>Multimeios Digital | Login</title>
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <script src="https://kit.fontawesome.com/1e32b8079d.js" crossorigin="anonymous"></script>
    
</head>
<body>
    <div class="h-screen bg-white">
      <div class="container h-full p-4 mx-auto flex flex-col items-center justify-center">
        <div class="bg-white rounded-lg p-4 w-80 flex flex-col">
            <h2 class="text-2xl font-bold text-center mb-4">Sign In</h2>
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="w-full mb-4">
                        <label for="name" class="text-sm/6 font-medium text-gray-900">Usuário</label>
                        <input id="name" name="nome" type="text" class="w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-green-500 sm:text-sm/6" required/>
                    </div>
                    <div class="w-full mb-4">
                        <label for="matricula" class="text-sm/6 font-medium text-gray-900">Senha</label>
                        <input id="matricula" type="password" onkeypress="$(this).mask('0000000')" name="matricula" class="w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-green-500 sm:text-sm/6" required/>
                    </div>
                    <div class="w-full mb-4">
                        <button name="btnlogin" class="w-full rounded-md px-3 py-1.5 bg-green-500 text-white font-medium text-sm/6" type="submit">Entrar</button>
                        <!-- <a href="admin/index.php">Login Para Adm's</a> -->
                    </div>
                </form>
                                
                                    
                                    
                                <?php
                                    include_once('config/conexao.php');
                                    if(isset($_GET['acao'])){
                                        $acao=$_GET['acao'];
                                        if($acao == 'negado'){
                                            echo 'Erro ao acessar o sistema! Efetue o login <3';
                                        }else if($acao == 'sair'){
                                            echo '<p class="font-medium text-xs text-sky-500">Sessão encerrada com sucesso</p>';
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
                              
                                            echo "<p class='font-medium text-xs text-sky-500'>Seja bem-vindo(a) ao centro de Multimeios Digital :)</p>";
                                          
                                            header("Refresh: 3, home.php?acao=welcome");
                                          }else{
                                              echo "<p class='font-medium text-xs text-red-500'>Usuário inválido</p>";
                                           
                                          }
                                        } catch(PDOException $e){
                                          echo "<strong>ERRO DE LOGIN = </strong>".$e->getMessage();
                                        }
                                      }
                                    ?>
         </div>
         </div>
        </div>
    <script src="js/jQuery-3.6.4.min.js"></script>
    <script src="js/jQuery-Mask/dist/jquery.mask.min.js"></script>
    
</body>
</html>