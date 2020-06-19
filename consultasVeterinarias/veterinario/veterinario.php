

<?php

session_start();

if(!isset($_SESSION['logado'])){
    header('Location: ../login.php');
}

    require_once '../config/conexao.php';


    if(!isset($_GET['acao'])) $acao="listar";
    else $acao = $_GET['acao'];

    /**
    * Ação de listar
    */
    if($acao=="listar"){
       $sql   = "SELECT * FROM veterinario";
       $query = $con->query($sql);
       $registros = $query->fetchAll();

       // print_r($registros); exit;
       require_once '../template/cabecalho.php';
       require_once 'lista_veterinario.php';
       require_once '../template/rodape.php';
    }
    /**
    * Ação Novo
    **/
    else if($acao == "novo"){

      require_once '../template/cabecalho.php';
      require_once 'form_veterinario.php';
      require_once '../template/rodape.php';
    }
    /**
    * Ação Gravar
    **/
    else if($acao == "gravar"){
        $registro = $_POST;

        $registro['disponivel_plantao'] = (isset($registro['disponivel_plantao']))? 1 : 0;

        $sql = "INSERT INTO veterinario(cpf, nome, endereco, numero, telefone, cargo, disponivel_plantao)
                  VALUES(:cpf, :nome, :endereco, :numero, :telefone, :cargo, :disponivel_plantao)";
        $query = $con->prepare($sql);
        $result = $query->execute($registro);
        if($result){
            header('Location: ./veterinario.php');
        }else{
            echo "Erro ao tentar inserir o registro, msg: " . print_r($query->errorInfo());
        }
    }
    /**
    * Ação Excluir
    **/
    else if($acao == "excluir"){
        $id    = $_GET['id'];
        $sql   = "DELETE FROM veterinario WHERE id = :id";
        $query = $con->prepare($sql);

        $query->bindParam(':id', $id);

        $result = $query->execute();
        if($result){
            header('Location: ./veterinario.php');
        }else{
            echo "Erro ao tentar remover o resgitro de id: " . $id;
        }
    }

    else if($acao == "buscar"){
        $id    = $_GET['id'];
        $sql   = "SELECT * FROM veterinario WHERE id = :id";
        $query = $con->prepare($sql);
        $query->bindParam(':id', $id);

        $query->execute();
        $registro = $query->fetch();


        require_once '../template/cabecalho.php';
        require_once 'form_veterinario.php';
        require_once '../template/rodape.php';
    }
    /**
    * Ação Atualizar
    **/
    else if($acao == "atualizar"){
        $sql   = "UPDATE veterinario SET cpf = :cpf, nome = :nome, endereco = :endereco,
                    numero = :numero, telefone = :telefone, cargo = :cargo, disponivel_plantao = :disponivel_plantao
                   WHERE id = :id";
        $query = $con->prepare($sql);

        $_POST['disponivel_plantao'] = (isset($_POST['disponivel_plantao']))? 1 : 0;

        $query->bindParam(':id', $_GET['id']);
        $query->bindParam(':cpf', $_POST['cpf']);
        $query->bindParam(':nome', $_POST['nome']);
        $query->bindParam(':endereco', $_POST['endereco']);
        $query->bindParam(':numero', $_POST['numero']);
        $query->bindParam(':telefone', $_POST['telefone']);
        $query->bindParam(':cargo', $_POST['cargo']);
        $query->bindParam(':disponivel_plantao', $_POST['disponivel_plantao']);
        $result = $query->execute();

        if($result){
            header('Location: ./veterinario.php');
        }else{
            echo "Erro ao tentar atualizar os dados" . print_r($query->errorInfo());
        }
    }
 ?>
