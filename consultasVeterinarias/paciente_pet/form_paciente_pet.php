<?php
    if(isset($registro)) $acao = "paciente_pet.php?acao=atualizar&id=".$registro['id'];
    else $acao = "paciente_pet.php?acao=gravar";
 ?>
<div class="container">
  <form class="" action="<?php echo $acao; ?>" method="post">
    <div class="from-group">
      <label for="nome">Nome</label>
      <input id="nome" class="form-control" type="text" name="nome"
        value="<?php if(isset($registro)) echo $registro['nome']; ?>" required>
    </div>

    <div class="from-group">
      <label for="raca">Raça</label>
      <input id="raca" class="form-control" type="text" name="raca"
        value="<?php if(isset($registro)) echo $registro['raca']; ?>" required>
    </div>
    <div class="from-group">
      <label for="idade">Idade</label>
      <input id="idade" class="form-control" type="number" name="idade"
        value="<?php if(isset($registro)) echo $registro['idade']; ?>" required>
    </div>

    <div class="from-group">
      <label for="id_paciente_dono">Dono do Pet</label>
      <select class="form-control" name="id_paciente_dono" required>
        <option value="">Escolha um item na lista</option>
        <?php foreach ($lista_paciente_dono as $item): ?>
          <option value="<?php echo $item['id']; ?>"
            <?php if(isset($registro) && $registro['id_paciente_dono']==$item['id']) echo "selected";?>>
            <?php echo $item['nome']; ?>
          </option>
        <?php endforeach; ?>
      </select>
    </div>

    <br>
    <button class="btn btn-info" type="submit">Enviar</button>
  </form>
</div>
