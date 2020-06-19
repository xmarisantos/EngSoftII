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
       $sql   = "SELECT * FROM paciente_dono";
       $query = $con->query($sql);
       $registros = $query->fetchAll();

       // print_r($registros); exit;
       require_once '../template/cabecalho.php';
       require_once 'lista_paciente_dono.php';
       require_once '../template/rodape.php';
    }
    /**
    * Ação Novo
    **/
    else if($acao == "novo"){

      require_once '../template/cabecalho.php';
      require_once 'form_paciente_dono.php';
      require_once '../template/rodape.php';
    }
    /**
    * Ação Gravar
    **/
    else if($acao == "gravar"){
        $registro = $_POST;


        $sql = "INSERT INTO paciente_dono(cpf, nome, endereco, numero, telefone)
                  VALUES(:cpf, :nome, :endereco, :numero, :telefone)";
        $query = $con->prepare($sql);
        $result = $query->execute($registro);
        if($result){
            header('Location: ./paciente_dono.php');
        }else{
            echo "Erro ao tentar inserir o registro, msg: " . print_r($query->errorInfo());
        }
    }
    /**
    * Ação Excluir
    **/
    else if($acao == "excluir"){
        $id    = $_GET['id'];
        $sql   = "DELETE FROM paciente_dono WHERE id = :id";
        $query = $con->prepare($sql);

        $query->bindParam(':id', $id);

        $result = $query->execute();
        if($result){
            header('Location: ./paciente_dono.php');
        }else{
            echo "Erro ao tentar remover o resgitro de id: " . $id;
        }
    }
    /**
    * Ação Excluir
    **/
    else if($acao == "buscar"){
        $id    = $_GET['id'];
        $sql   = "SELECT * FROM paciente_dono WHERE id = :id";
        $query = $con->prepare($sql);
        $query->bindParam(':id', $id);

        $query->execute();
        $registro = $query->fetch();


        require_once '../template/cabecalho.php';
        require_once 'form_paciente_dono.php';
        require_once '../template/rodape.php';
    }
    /**
    * Ação Atualizar
    **/
    else if($acao == "atualizar"){
        $sql   = "UPDATE paciente_dono SET cpf = :cpf, nome = :nome, endereco = :endereco,
                    numero = :numero, telefone = :telefone
                   WHERE id = :id";
        $query = $con->prepare($sql);



        $query->bindParam(':id', $_GET['id']);
        $query->bindParam(':cpf', $_POST['cpf']);
        $query->bindParam(':nome', $_POST['nome']);
        $query->bindParam(':endereco', $_POST['endereco']);
        $query->bindParam(':numero', $_POST['numero']);
        $query->bindParam(':telefone', $_POST['telefone']);
        $result = $query->execute();

        if($result){
            header('Location: ./paciente_dono.php');
        }else{
            echo "Erro ao tentar atualizar os dados" . print_r($query->errorInfo());
        }
    }

    //função que retorna a lista de pacientes cadastrados no banco
    // function getPacientesDonos(){
      //  $sql   = "SELECT * FROM paciente_dono";
        //$query = $GLOBALS['con']->query($sql);
        //$lista_paciente_dono = $query->fetchAll();
        //return $lista_paciente_dono;
    //}
 ?>
