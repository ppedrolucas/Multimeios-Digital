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
            <h2 class="text-2xl font-bold text-center mb-4">Entrar</h2>
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="w-full mb-6">
                        <label for="name" class="text-sm/6 font-medium text-gray-900">Usuário</label>
                        <input id="name" name="nome" type="text" class="w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-green-500 sm:text-sm/6" required/>
                    </div>
                    <div class="w-full mb-6">
                        <label for="matricula" class="text-sm/6 font-medium text-gray-900">Senha</label>
                        <input id="matricula" type="password" onkeypress="$(this).mask('0000000')" name="matricula" class="w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-green-500 sm:text-sm/6" required/>
                    </div>
                    <div class="w-full mb-6">
                        <button name="btnlogin" class="transition w-full rounded-md px-3 py-1.5 bg-green-500 hover:bg-green-400 text-white font-medium text-sm/6" type="submit">Entrar</button>
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
                                            echo "<div class='w-full h-16 flex items-center px-4 bg-blue-400 rounded-lg'>
                                                        <p class='font-medium text-sm text-white'>Sessão encerrada com sucesso</p>
                                                    </div>";
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
                              
                                            echo "<div class='w-full h-16 flex items-center px-4 bg-green-400 rounded-lg'>
                                                        <p class='font-medium text-sm text-white'>Seja bem-vindo(a) à Multimeios Digital :)</p>
                                                    </div>";
                                          
                                            header("Refresh: 3, home.php?acao=welcome");
                                          }else{
                                              echo "<div class='w-full h-16 flex items-center px-4 bg-red-400 rounded-lg'>
                                                        <p class='font-medium text-sm text-white'>Usuário inválido</p>
                                                    </div>";
                                           
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