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
       $sql   = "SELECT s.id, s.nome, s.data_servico, s.hora_servico, s.pet, s.valor_servico, s.tipo_pagamento, f.nome as funcionario
                FROM servico s
                INNER JOIN funcionario f ON f.id=s.id_funcionario";
       $query = $con->query($sql);
       $registros = $query->fetchAll();

       // print_r($registros); exit;
       require_once '../template/cabecalho.php';
       require_once 'lista_servico.php';
       require_once '../template/rodape.php';
    }
    /**
    * Ação Novo
    **/
    else if($acao == "novo"){

      $lista_funcionario = getFuncionarios();
      require_once '../template/cabecalho.php';
      require_once 'form_servico.php';
      require_once '../template/rodape.php';
    }
    /**
    * Ação Gravar
    **/
    else if($acao == "gravar"){
        $registro = $_POST;


        $sql = "INSERT INTO servico(nome, data_servico, hora_servico, pet, id_funcionario, valor_servico, tipo_pagamento)
                  VALUES(:nome, :data_servico, :hora_servico, :pet, :id_funcionario, :valor_servico, :tipo_pagamento)";
        $query = $con->prepare($sql);
        $result = $query->execute($registro);
        if($result){
            header('Location: ./servico.php');
        }else{
            echo "Erro ao tentar inserir o registro, msg: " . print_r($query->errorInfo());
        }
    }
    /**
    * Ação Excluir
    **/
    else if($acao == "excluir"){
        $id    = $_GET['id'];
        $sql   = "DELETE FROM servico WHERE id = :id";
        $query = $con->prepare($sql);

        $query->bindParam(':id', $id);

        $result = $query->execute();
        if($result){
            header('Location: ./servico.php');
        }else{
            echo "Erro ao tentar remover o resgitro de id: " . $id;
        }
    }
    /**
    * Ação Excluir
    **/
    else if($acao == "buscar"){
        $id    = $_GET['id'];
        $sql   = "SELECT * FROM servico WHERE id = :id";
        $query = $con->prepare($sql);
        $query->bindParam(':id', $id);

        $query->execute();
        $registro = $query->fetch();

        $lista_funcionario = getFuncionarios();
        require_once '../template/cabecalho.php';
        require_once 'form_servico.php';
        require_once '../template/rodape.php';
    }
    /**
    * Ação Atualizar
    **/
    else if($acao == "atualizar"){
        $sql   = "UPDATE servico SET nome = :nome, data = :data, hora = :hora, pet = :pet, id_funcionario = :id_funcionario,
                                      valor_servico = :valor_servico, tipo_pagamento = :tipo_pagamento
                   WHERE id = :id";
        $query = $con->prepare($sql);

        $query->bindParam(':id', $_GET['id']);
        $query->bindParam(':nome', $_POST['nome']);
        $query->bindParam(':data', $_POST['data']);
        $query->bindParam(':hora', $_POST['hora']);
        $query->bindParam(':pet', $_POST['pet']);
        $query->bindParam(':id_funcionario', $_POST['id_funcionario']);
        $query->bindParam(':valor_servico', $_POST['valor_servico']);
        $query->bindParam(':tipo_pagamento', $_POST['tipo_pagamento']);
        $result = $query->execute();

        if($result){
            header('Location: ./servico.php');
        }else{
            echo "Erro ao tentar atualizar os dados" . print_r($query->errorInfo());
        }
    }

    function getFuncionarios(){
        $sql   = "SELECT * FROM funcionario";
        $query = $GLOBALS['con']->query($sql);
        $lista_funcionario = $query->fetchAll();
        return $lista_funcionario;
    }
 ?>
