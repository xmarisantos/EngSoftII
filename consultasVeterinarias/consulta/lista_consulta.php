<div class="container">
  <h2>Consultas</h2>
  <a class="btn btn-info" href="consulta.php?acao=novo">Novo</a>
  <?php if (count($registros)==0): ?>
    <p>Nenhum registro encontrado.</p>
  <?php else: ?>
    <table class="table table-hover table-stripped">
      <thead>
          <th>#</th>
          <th>Data</th>
          <th>Hora</th>
          <th>Pet</th>
          <th>Veterinário</th>
          <th>Valor Consulta</th>
          <th>Tipo Pagamento</th>
          <th>Ações</th>
      </thead>
      <tbody>
        <?php foreach ($registros as $linha): ?>
          <tr>
            <td><?= $linha['id']; ?></td>
            <td><?= $linha['data_consulta']; ?></td>
            <td><?= $linha['hora_consulta']; ?></td>
            <td><?= $linha['pet']; ?></td>
            <td><?= $linha['veterinario']; ?></td>
            <td><?= $linha['valor_consulta']; ?></td>
            <td><?= $linha['tipo_pagamento']; ?></td>
            <td>
                <a class="btn btn-warning btn-sm" href="consulta.php?acao=buscar&id=<?php echo $linha['id']; ?>">Editar</a>
                <a class="btn btn-danger btn-sm" href="consulta.php?acao=excluir&id=<?php echo $linha['id']; ?>">Excluir</a>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  <?php endif; ?>
</div>
