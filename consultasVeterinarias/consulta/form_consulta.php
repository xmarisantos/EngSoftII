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
      <label for="paciente_pet">Pet</label>
      <input id="paciente_pet" class="form-control" type="text" name="paciente_pet"
        value="<?php if(isset($registro)) echo $registro['paciente_pet']; ?>" required>
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


    <div class="form-check">
      <br>
      <label for="pagamento">Pagamento</label>
      <br>
      <input id="pagamento" class="form-check-input" type="checkbox" name="pagamento"
        <?php if(isset($registro) && $registro['pagamento']==1) echo "checked"; ?>>
      <label class="form-check-label" for="pagamento">  Cartão </label>
    </div>
    <br>
    <button class="btn btn-info" type="submit">Enviar</button>
  </form>
</div>
