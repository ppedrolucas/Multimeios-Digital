
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
<body class="bg-white h-dvh flex items-center justify-center">
    <div class="container w-80 px-4 flex flex-col gap-4">
        <h2 class="uppercase font-bold">Confirme os dados para realizar o emprestimo</h2>
        <div>
            <form class="flex flex-col gap-4" action="" method="post" enctype="multipart/form-data">
                <div class="label-float">
                    <label for="">Nome Completo</label>
                    <input class="mt-2 w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-green-500 sm:text-sm/6" name="nome" type="text"/>
                </div>
                <div class="label-float">
                    <label for="">Matrícula</label>
                    <input class="mt-2 w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-green-500 sm:text-sm/6" name="matricula" type="text"/>
                </div class="botao">
                <button name="btnlogin" class="w-full bg-green-500 text-white rounded-lg py-2" type="submit">Alocar</button>
            </form>
            <?php
            include_once('config/conexao.php');
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
                        echo "<div class='w-full mt-4 h-16 flex items-center px-4 bg-green-400 rounded-lg'>
                                <p class='font-medium text-sm text-white'>Emprestimo realizado com sucesso</p>
                                </div>";
                      }else{
                        echo "<div class='w-full mt-4 h-16 flex items-center px-4 bg-green-400 rounded-lg'>
                                <p class='font-medium text-sm text-white'>Ops, não foi possível solicitar o livro</p>
                                </div>";
                      }
                    $contar = $rodo->rowCount();
                    if($contar>0){
                        header("Refresh: 2, home.php");
                    }else{
                        header("Refresh: 2, home.php");
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