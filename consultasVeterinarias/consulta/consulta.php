
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
       $sql   = "SELECT c.id, c.data_consulta, c.hora_consulta, c.pet, c.valor_consulta, c.tipo_pagamento, v.nome as veterinario
                FROM consulta c
                INNER JOIN veterinario v ON v.id=c.id_veterinario";
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
      $lista_veterinario = getVeterinario();
      require_once '../template/cabecalho.php';
      require_once 'form_consulta.php';
      require_once '../template/rodape.php';
    }
    /**
    * Ação Gravar
    **/
    else if($acao == "gravar"){
        $registro = $_POST;

        //$registro['completa'] = (isset($registro['completa']))? 1 : 0;
        // var_dump($registro);

        $sql = "INSERT INTO consulta(data_consulta, hora_consulta, pet, id_veterinario, tipo_pagamento, valor_consulta)
                  VALUES(:data_consulta, :hora_consulta, :pet, :id_veterinario, :tipo_pagamento, :valor_consulta)";
        $query = $con->prepare($sql);
        $result = $query->execute($registro);
        if($result){
            header('Location: ./consulta.php');
        }else{
            echo "Erro ao tentar inserir o registro";
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
        $lista_veterinario = getVeterinario();
        require_once '../template/cabecalho.php';
        require_once 'form_consulta.php';
        require_once '../template/rodape.php';
    }
    /**
    * Ação Atualizar
    **/
    else if($acao == "atualizar"){
        $sql   = "UPDATE consulta SET data_consulta = :data_consulta, hora_consulta = :hora_consulta,
                    pet = :pet, id_veterinario = :id_veterinario, tipo_pagamento = :tipo_pagamento, valor_consulta = :valor_consulta
                   WHERE id = :id";
        $query = $con->prepare($sql);

        //$_POST['pagamento'] = (isset($_POST['pagamento']))? 1 : 0;

        $query->bindParam(':id', $_GET['id']);
        $query->bindParam(':data_consulta', $_POST['data_consulta']);
        $query->bindParam(':hora_consulta', $_POST['hora_consulta']);
        $query->bindParam(':pet', $_POST['pet']);
        $query->bindParam(':id_veterinario', $_POST['id_veterinario']);
        $query->bindParam(':tipo_pagamento', $_POST['tipo_pagamento']);
        $query->bindParam(':valor_consulta', $_POST['valor_consulta']);
        $result = $query->execute();

        if($result){
            header('Location: ./consulta.php');
        }else{
            echo "Erro ao tentar atualizar os dados" . print_r($query->errorInfo());
        }
    }

    //função que retorna a lista de veterinarios cadastrados no banco
    function getVeterinario(){
        $sql   = "SELECT * FROM veterinario";
        $query = $GLOBALS['con']->query($sql);
        $lista_veterinario = $query->fetchAll();
        return $lista_veterinario;
    }
 ?>
