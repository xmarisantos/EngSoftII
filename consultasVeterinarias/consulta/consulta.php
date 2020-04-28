<?php

    require_once '../config/conexao.php';


    if(!isset($_GET['acao'])) $acao="listar";
    else $acao = $_GET['acao'];

    /**
    * Ação de listar
    */
    if($acao=="listar"){
       $sql   = "SELECT c.id, c.data_consulta, c.hora_consulta, c.pagamento, p.nome as paciente_pet, v.nome as veterinario
                    FROM consulta c
                    INNER JOIN paciente_pet p ON p.id=c.id_paciente_pet INNER JOIN veterinario v ON v.id=c.id_veterinario";
       $query = $con->query($sql);
       $registros = $query->fetchAll();

       // print_r($registros); exit;
       require_once '../template/cabecalho.php';
       require_once 'lista_consulta.php';
       require_once '../template/rodape.php';
    }
    /**
    * Ação Novo
    **/
    else if($acao == "novo"){
      $lista_paciente_pet = getPacientesPet();

      // print_r($lista_genero); exit;
      require_once '../template/cabecalho.php';
      require_once 'form_consulta.php';
      require_once '../template/rodape.php';
    }
    /**
    * Ação Gravar
    **/
    else if($acao == "gravar"){
        $registro = $_POST;

        $registro['completa'] = (isset($registro['completa']))? 1 : 0;
        // var_dump($registro);

        $sql = "INSERT INTO consulta(data_consulta, hora_consulta, id_paciente_pet, id_veterinario, pagamento)
                  VALUES(:data_consulta, :hora_consulta, :id_paciente_pet, :id_veterinario, :pagamento)";
        $query = $con->prepare($sql);
        $result = $query->execute($registro);
        if($result){
            header('Location: ./consulta.php');
        }else{
            echo "Erro ao tentar inserir o registro, msg: " . print_r($query->errorInfo());
        }
    }
    /**
    * Ação Excluir
    **/
    else if($acao == "excluir"){
        $id    = $_GET['id'];
        $sql   = "DELETE FROM consulta WHERE id = :id";
        $query = $con->prepare($sql);

        $query->bindParam(':id', $id);

        $result = $query->execute();
        if($result){
            header('Location: ./consulta.php');
        }else{
            echo "Erro ao tentar remover o resgitro de id: " . $id;
        }
    }
    /**
    * Ação Excluir
    **/
    else if($acao == "buscar"){
        $id    = $_GET['id'];
        $sql   = "SELECT * FROM consulta WHERE id = :id";
        $query = $con->prepare($sql);
        $query->bindParam(':id', $id);

        $query->execute();
        $registro = $query->fetch();

        // var_dump($registro); exit;
        $lista_paciente_pet = getPacientesPet();
        require_once '../template/cabecalho.php';
        require_once 'form_consulta.php';
        require_once '../template/rodape.php';
    }
    /**
    * Ação Atualizar
    **/
    else if($acao == "atualizar"){
        $sql   = "UPDATE consulta SET data_consulta = :data_consulta, hora_consulta = :hora_consulta,
                    id_paciente_pet = :id_paciente_pet, id_veterinario = :id_veterinario, pagamento = :pagamento
                   WHERE id = :id";
        $query = $con->prepare($sql);

        $_POST['pagamento'] = (isset($_POST['pagamento']))? 1 : 0;

        $query->bindParam(':id', $_GET['id']);
        $query->bindParam(':data_consulta', $_POST['data_consulta']);
        $query->bindParam(':hora_consulta', $_POST['hora_consulta']);
        $query->bindParam(':id_paciente_pet', $_POST['id_paciente_pet']);
        $query->bindParam(':id_veterinario', $_POST['id_veterinario']);
        $query->bindParam(':pagamento', $_POST['pagamento']);
        $result = $query->execute();

        if($result){
            header('Location: ./consulta.php');
        }else{
            echo "Erro ao tentar atualizar os dados" . print_r($query->errorInfo());
        }
    }

    //função que retorna a lista de pacientes cadastrados no banco
    function getPacientesPet(){
        $sql   = "SELECT * FROM paciente_pet";
        $query = $GLOBALS['con']->query($sql);
        $lista_paciente_pet = $query->fetchAll();
        return $lista_paciente_pet;
    }
 ?>
