<?php
    session_start();

    if(!isset($_SESSION['logado'])){
        header('Location: ../login.php');
    }
?>
<?php

    require_once '../config/conexao.php';


    if(!isset($_GET['acao'])) $acao="listar";
    else $acao = $_GET['acao'];

    /**
    * Ação de listar
    */
    if($acao=="listar"){
       $sql   = "SELECT p.id, p.nome, p.raca, p.idade, d.nome as paciente_dono
                FROM paciente_pet p
                INNER JOIN paciente_dono d ON d.id=p.id_paciente_dono";
       $query = $con->query($sql);
       $registros = $query->fetchAll();

       // print_r($registros); exit;
       require_once '../template/cabecalho.php';
       require_once 'lista_paciente_pet.php';
       require_once '../template/rodape.php';
    }
    /**
    * Ação Novo
    **/
    else if($acao == "novo"){

      $lista_paciente_dono = getDonos();
      require_once '../template/cabecalho.php';
      require_once 'form_paciente_pet.php';
      require_once '../template/rodape.php';
    }
    /**
    * Ação Gravar
    **/
    else if($acao == "gravar"){
        $registro = $_POST;


        $sql = "INSERT INTO paciente_pet(nome, raca, idade, id_paciente_dono)
                  VALUES(:nome, :raca, :idade, :id_paciente_dono)";
        $query = $con->prepare($sql);
        $result = $query->execute($registro);
        if($result){
            header('Location: ./paciente_pet.php');
        }else{
            echo "Erro ao tentar inserir o registro, msg: " . print_r($query->errorInfo());
        }
    }
    /**
    * Ação Excluir
    **/
    else if($acao == "excluir"){
        $id    = $_GET['id'];
        $sql   = "DELETE FROM paciente_pet WHERE id = :id";
        $query = $con->prepare($sql);

        $query->bindParam(':id', $id);

        $result = $query->execute();
        if($result){
            header('Location: ./paciente_pet.php');
        }else{
            echo "Erro ao tentar remover o resgitro de id: " . $id;
        }
    }
    /**
    * Ação Excluir
    **/
    else if($acao == "buscar"){
        $id    = $_GET['id'];
        $sql   = "SELECT * FROM paciente_pet WHERE id = :id";
        $query = $con->prepare($sql);
        $query->bindParam(':id', $id);

        $query->execute();
        $registro = $query->fetch();

        $lista_paciente_dono = getDonos();
        require_once '../template/cabecalho.php';
        require_once 'form_paciente_pet.php';
        require_once '../template/rodape.php';
    }
    /**
    * Ação Atualizar
    **/
    else if($acao == "atualizar"){
        $sql   = "UPDATE paciente_pet SET nome = :nome, raca = :raca, idade = :idade, id_paciente_dono = :id_paciente_dono
                   WHERE id = :id";
        $query = $con->prepare($sql);

        $query->bindParam(':id', $_GET['id']);
        $query->bindParam(':nome', $_POST['nome']);
        $query->bindParam(':raca', $_POST['raca']);
        $query->bindParam(':idade', $_POST['idade']);
        $query->bindParam(':id_paciente_dono', $_POST['id_paciente_dono']);
        $result = $query->execute();

        if($result){
            header('Location: ./paciente_pet.php');
        }else{
            echo "Erro ao tentar atualizar os dados" . print_r($query->errorInfo());
        }
    }

    function getDonos(){
        $sql   = "SELECT * FROM paciente_dono";
        $query = $GLOBALS['con']->query($sql);
        $lista_paciente_dono = $query->fetchAll();
        return $lista_paciente_dono;
    }
 ?>
