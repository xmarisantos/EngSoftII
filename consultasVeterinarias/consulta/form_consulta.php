<?php
    if(isset($registro)) $acao = "consulta.php?acao=atualizar&id=".$registro['id'];
    else $acao = "consulta.php?acao=gravar";
 ?>
<div class="container">
  <form class="" action="<?php echo $acao; ?>" method="post">
    <div class="from-group">
      <label for="data_consulta">Data</label>
      <input id="data_consulta" class="form-control" type="date" name="data_consulta"
        value="<?php if(isset($registro)) echo $registro['data_consulta']; ?>" required>
    </div>

    <div class="from-group">
      <label for="hora_consulta">Hora</label>
      <input id="hora_consulta" class="form-control" type="time" name="hora_consulta"
        value="<?php if(isset($registro)) echo $registro['hora_consulta']; ?>" required>
    </div>

    <div class="from-group">
      <label for="pet">Pet</label>
      <input id="pet" class="form-control" type="text" name="pet"
        value="<?php if(isset($registro)) echo $registro['pet']; ?>" required>
    </div>

    <div class="from-group">
      <label for="id_veterinario">Veterinário</label>
      <select class="form-control" name="id_veterinario" required>
        <option value="">Escolha um item na lista</option>
        <?php foreach ($lista_veterinario as $item): ?>
          <option value="<?php echo $item['id']; ?>"
            <?php if(isset($registro) && $registro['id_veterinario']==$item['id']) echo "selected";?>>
            <?php echo $item['nome']; ?>
          </option>
        <?php endforeach; ?>
      </select>
    </div>

      <div class="from-group">
        <label for="valor_consulta">Valor da consulta</label>
        <input id="valor_consulta" class="form-control" type="text" name="valor_consulta"
          value="<?php if(isset($registro)) echo $registro['valor_consulta']; ?>" required>
      </div>

      <div class="from-group">
        <label for="tipo_pagamento">Tipo Pagamento</label>
        <input id="tipo_pagamento" class="form-control" type="text" name="tipo_pagamento"
          value="<?php if(isset($registro)) echo $registro['tipo_pagamento']; ?>" required>
      </div>
      <br>
      <button class="btn btn-info" type="submit">Enviar</button>
      </form>
      </div>
