<?php

    require_once '../config/conexao.php';


    if(!isset($_GET['acao'])) $acao="entrar";
    else $acao = $_GET['acao'];

    /**
    * Ação de listar
    */
    if($acao=="entrar"){


       // print_r($registros); exit;
      require_once '../template/cabecalho_login.php';
       require_once 'form_login.php';

    }
    /**
    * Ação Novo
    **/

    
 ?>
