<div class="container">
  <h2>Serviços</h2>
  <a class="btn btn-info" href="servico.php?acao=novo">Novo</a>
  <?php if (count($registros)==0): ?>
    <p>Nenhum registro encontrado.</p>
  <?php else: ?>
    <table class="table table-hover table-stripped">
      <thead>
          <th>#</th>
          <th>Nome</th>
          <th>Data</th>
          <th>Hora</th>
          <th>Pet</th>
          <th>Funcionário</th>
          <th>Valor</th>
          <th>Tipo</th>
          <th>Ações</th>
      </thead>
      <tbody>
        <?php foreach ($registros as $linha): ?>
          <tr>
            <td><?= $linha['id']; ?></td>
            <td><?= $linha['nome']; ?></td>
            <td><?= $linha['data_servico']; ?></td>
            <td><?= $linha['hora_servico']; ?></td>
            <td><?= $linha['pet']; ?></td>
            <td><?= $linha['funcionario']; ?></td>
            <td><?= $linha['valor_servico']; ?></td>
            <td><?= $linha['tipo_pagamento']; ?></td>
            <td>
                <a class="btn btn-warning btn-sm" href="paciente_pet.php?acao=buscar&id=<?php echo $linha['id']; ?>">Editar</a>
                <a class="btn btn-danger btn-sm" href="paciente_pet.php?acao=excluir&id=<?php echo $linha['id']; ?>">Excluir</a>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  <?php endif; ?>
</div>
