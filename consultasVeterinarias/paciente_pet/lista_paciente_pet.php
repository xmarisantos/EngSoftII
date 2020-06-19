<div class="container">
  <h2>Pacientes Pet</h2>
  <a class="btn btn-info" href="paciente_pet.php?acao=novo">Novo</a>
  <?php if (count($registros)==0): ?>
    <p>Nenhum registro encontrado.</p>
  <?php else: ?>
    <table class="table table-hover table-stripped">
      <thead>
          <th>#</th>
          <th>Nome</th>
          <th>Raça</th>
          <th>Idade</th>
          <th>Dono</th>
          <th>Ações</th>
      </thead>
      <tbody>
        <?php foreach ($registros as $linha): ?>
          <tr>
            <td><?= $linha['id']; ?></td>
            <td><?= $linha['nome']; ?></td>
            <td><?= $linha['raca']; ?></td>
            <td><?= $linha['idade']; ?></td>
            <td><?= $linha['paciente_dono']; ?></td>
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
