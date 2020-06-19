<div class="container">
  <h2>Veterinários</h2>

  <a class="btn btn-info" href="veterinario.php?acao=novo">Novo</a>
  <br>
  <br>
  <?php if (count($registros)==0): ?>
    <p>Nenhum registro encontrado.</p>
  <?php else: ?>
    <table class="table table-hover table-stripped  table-sm">
      <thead>
          <th>#</th>
          <th>CPF</th>
          <th>Nome</th>
          <th>Endereço</th>
          <th>Número</th>
          <th>Telefone</th>
          <th>Cargo</th>
          <th>Plantão</th>
          <th>Ações</th>
      </thead>
      <tbody>
        <?php foreach ($registros as $linha): ?>
          <tr>
            <td><?= $linha['id']; ?></td>
            <td><?= $linha['cpf']; ?></td>
            <td><?= $linha['nome']; ?></td>
            <td><?= $linha['endereco']; ?></td>
            <td><?= $linha['numero']; ?></td>
            <td><?= $linha['telefone']; ?></td>
            <td><?= $linha['cargo']; ?></td>
            <td><?php if($linha['disponivel_plantao']==1) echo "Disponivel";
                      else echo "Indisponivel"; ?></td>
            <td>
                <a class="btn btn-warning btn-sm" href="veterinario.php?acao=buscar&id=<?php echo $linha['id']; ?>">Editar</a>
                <a class="btn btn-danger btn-sm" href="veterinario.php?acao=excluir&id=<?php echo $linha['id']; ?>">Excluir</a>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  <?php endif; ?>
</div>
