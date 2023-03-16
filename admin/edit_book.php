
<!DOCTYPE html>
<html lang="pt_br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style-form.css">
    <title>Editar | livro</title>
    <script src="https://kit.fontawesome.com/1e32b8079d.js" crossorigin="anonymous"></script>
</head>
<body class="banner">   
    <div class="container">
    <?php
        include_once('../config/conexao.php');
        if(!isset($_GET['id'])){
            header("Location: admin.php");
            exit;
        }
        $id = filter_input(INPUT_GET,'id',FILTER_DEFAULT);

        $select = "SELECT * FROM livros WHERE idLivro=:id";
        try{
            $resultado = $conect->prepare($select);
            $resultado->bindParam(':id',$id, PDO::PARAM_INT);
            $resultado->execute();

            $cont = $resultado->rowCount();
            if($cont > 0){
                while($show = $resultado->FETCH(PDO::FETCH_OBJ)){
                    $id = $show->idLivro;
                    $nome = $show->nomeLivro;
                    $autor = $show->autorLivro;
                    $volume = $show->volLivro;
                    $local = $show->localLivro;
                    $editora = $show->editLivro;
                    $ano = $show->anoLivro;
                    $categoria = $show->cateLivro;
                }
            }else{
                echo '<h5>Ops!</h5>
                não foi possível editar as informações deste livro !!!';
            }
        }catch (PDOException $e){
            echo"<strong> ERRO DE SELECT NO PDO = </strong>". $e->getMessage();
          }
        ?>
        <div class="card">
                    <h2>Edite as informações do seu livro</h2>
                    
                            <form class="editar" action="" method="post" enctype="multipart/form-data">
                                
                                    <div class="label-float">
                                        <label for="">Título do Livro</label>
                                        <input name="nome" type="text" value="<?php echo $nome;?>"/>
                                    </div>
                                    <div class="label-float">
                                        <label for="">Autor do livro</label>
                                        <input name="autor" type="text" value="<?php echo $autor;?>"/>
                                    </div>
                                    <div class="label-float">
                                        <label for="">Volume do Livro</label>
                                        <input name="volume" type="text" value="<?php echo $volume;?>"/>
                                    </div>
                                    <div class="label-float">
                                        <label for="">Local do Livro</label>
                                        <input name="local" type="text" value="<?php echo $local;?>"/>
                                    </div>
                                    <div class="label-float">
                                        <label for="">Editora</label>
                                        <input name="editora" type="text" value="<?php echo $editora;?>"/>
                                    </div>
                                    <div class="label-float">
                                        <label for="">Ano de publicação</label>
                                        <input name="ano" type="text" value="<?php echo $ano;?>"/>
                                    </div class="botao">
                                    <div>
                                        <label for="name">Categoria</label>
                                    <select name="categoria" class="label-float" value="<?php echo $categoria;?>">
                                            <option>ASSUNTOS DIVERSOS</option>
                                            <option>BIOGRAFIA</option>
                                            <option>CIÊNCIAS HUMANAS E SOCIAIS</option>
                                            <option>CIÊNCIAS DA NATUREZA</option>
                                            <option>COLEÇÃO</option>
                                            <option>CRÔNICA</option>
                                            <option>CULTURA</option>
                                            <option>DICIONÁRIO</option>
                                            <option>EIXO TÉCNICO</option>
                                            <option>ESPIRITUALIDADE</option>
                                            <option>EXATAS</option>
                                            <option>FICÇÃO CIÊNTIFICA</option>
                                            <option>FORMAÇÃO DE PROFESSORES</option>
                                            <option>INFANTO JUVENIL</option>
                                            <option>LINGUAGENS E CÓDIGOS</option>
                                            <option>ROMANCES</option>
                                    </select>
                                    </div>
                                    <button name="btnUp" class="btn" type="submit">Alocar</button>
                                </form>
                                <?php
                                    include_once('../config/conexao.php');
                                    if(isset($_POST['btnUp'])){
                                        $nome=$_POST['nome'];
                                        $autor=$_POST['autor'];
                                        $volume=$_POST['volume'];
                                        $local=$_POST['local'];
                                        $editora=$_POST['editora'];
                                        $ano=$_POST['ano'];
                                        $categoria=$_POST['categoria'];
                                        $editar="UPDATE livros SET nomeLivro=:nome,autorLivro=:autor,volLivro=:volume,localLivro=:local,editLivro=:editora,anoLivro=:ano,cateLivro=:categoria WHERE idLivro=:id";                   
                                        try {
                                          $result = $conect->prepare($editar);
                                          $result->bindParam(':id',$id, PDO::PARAM_INT);
                                          $result->bindParam(':nome',$nome, PDO::PARAM_STR);
                                          $result->bindParam(':autor',$autor, PDO::PARAM_STR);
                                          $result->bindParam(':volume',$volume, PDO::PARAM_STR);
                                          $result->bindParam(':local',$local, PDO::PARAM_STR);
                                          $result->bindParam(':editora',$editora, PDO::PARAM_STR);
                                          $result->bindParam(':ano',$ano, PDO::PARAM_STR);
                                          $result->bindParam(':categoria',$categoria, PDO::PARAM_STR);
                                          $result->execute();
                            
                                          $contar=$result->rowCount();
                                          if($contar > 0){
                                            
                                                echo ' <h5>OK!</h5>
                                                          livro editado com sucesso !!!';
                                                          
                                                          
                                              }else{
                                            
                                                echo '<h5>Ops!</h5>
                                                        livro não editado !!!';
                                                        
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