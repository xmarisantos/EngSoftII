<?php

session_start(); //PRIMEIRA LINHA

//Finaliza a sessão logado da Aplicação
if(!isset($_SESSION['logado'])){
    header('Location: ./login.php');
    return;
}

require_once 'config/conexao.php';
require_once 'dompdf/autoload.inc.php';

//referencia o Dompdf namespace
use Dompdf\Dompdf;

$sql = "SELECT * FROM veterinario";
$query = $con->query($sql);
$registros = $query->fetchAll();



$texto = '<style>
table {
    width: 100%;
}
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
th, td {
    padding: 5px;
  }
  th {
    text-align: left;
  }
  tr:nth-child(even) {
    background-color: #eee;
  }
  tr:nth-child(odd) {
   background-color: #fff;
  }
  th {
    background-color: black;
    color: white;
  }
</style>
<table>
<thead>
<tr>
<th>#</th>
<th>Cpf</th>
<th>Nome</th>
<th>Endereço</th>
</tr>
</thead>
<tbody>';

foreach ($registros as $linha){
            $texto .= '<tr>';
            $texto .= '<td>' . $linha['id'] . '</td><td>'
                             . $linha['cpf'] . '</td><td>'
                             . $linha['nome'] . '</td><td>'
                             . $linha['endereco'] . '</td>';
            $texto .= '</tr>';
}

$texto .= '</tbody></table>';

//instancia e usa a classe dompdf
$dompdf = new Dompdf();
$dompdf->loadHtml($texto);

//formata o documento
$dompdf->setPaper('A4', 'landscape');

//renderiza o html em pdf
$dompdf->render();

//gera o arquivo pdf no browser
$dompdf->stream("file.pdf", ["Attachment" => false]);

 ?>
