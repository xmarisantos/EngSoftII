<?php
    if(isset($registro)) $acao = "servico.php?acao=atualizar&id=".$registro['id'];
    else $acao = "servico.php?acao=gravar";
 ?>
<div class="container">
  <form class="" action="<?php echo $acao; ?>" method="post">
    <div class="from-group">
      <label for="nome">Nome</label>
      <input id="nome" class="form-control" type="text" name="nome"
        value="<?php if(isset($registro)) echo $registro['nome']; ?>" required>
    </div>

    <div class="from-group">
      <label for="data_servico">Data</label>
      <input id="data_servico" class="form-control" type="date" name="data_servico"
        value="<?php if(isset($registro)) echo $registro['data_servico']; ?>" required>
    </div>

    <div class="from-group">
      <label for="hora_servico">Hora</label>
      <input id="hora_servico" class="form-control" type="time" name="hora_servico"
        value="<?php if(isset($registro)) echo $registro['hora_servico']; ?>" required>
    </div>

    <div class="from-group">
      <label for="pet">Pet</label>
      <input id="pet" class="form-control" type="text" name="pet"
        value="<?php if(isset($registro)) echo $registro['pet']; ?>" required>
    </div>

    <div class="from-group">
      <label for="id_funcionario">Funcionário</label>
      <select class="form-control" name="id_funcionario" required>
        <option value="">Escolha um item na lista</option>
        <?php foreach ($lista_funcionario as $item): ?>
          <option value="<?php echo $item['id']; ?>"
            <?php if(isset($registro) && $registro['id_funcionario']==$item['id']) echo "selected";?>>
            <?php echo $item['nome']; ?>
          </option>
        <?php endforeach; ?>
      </select>
    </div>

    <div class="from-group">
      <label for="valor_servico">Valor</label>
      <input id="valor_servico" class="form-control" type="number" name="valor_servico"
        value="<?php if(isset($registro)) echo $registro['valor_servico']; ?>" required>
    </div>

    <div class="from-group">
      <label for="tipo_pagamento">Tipo</label>
      <input id="tipo_pagamento" class="form-control" type="text" name="tipo_pagamento"
        value="<?php if(isset($registro)) echo $registro['tipo_pagamento']; ?>" required>
    </div>

    <br>
    <button class="btn btn-info" type="submit">Enviar</button>
  </form>
</div>
