<?php
    if(isset($registro)) $acao = "veterinario.php?acao=atualizar&id=".$registro['id'];
    else $acao = "veterinario.php?acao=gravar";
 ?>

 <div class="container">
   <form class="" action="<?php echo $acao; ?>" method="post">
     <div class="from-group">
       <label for="cpf">CPF</label>
       <input id="cpf" class="form-control" type="number" name="cpf"
         value="<?php if(isset($registro)) echo $registro['cpf']; ?>" required>
     </div>

     <div class="from-group">
       <label for="nome">Nome</label>
       <input id="nome" class="form-control" type="text" name="nome"
         value="<?php if(isset($registro)) echo $registro['nome']; ?>" required>
     </div>

    <div class="from-group">
      <label for="endereco">Endereço</label>
      <input id="endereco" class="form-control" type="text" name="endereco"
        value="<?php if(isset($registro)) echo $registro['endereco']; ?>" required>
    </div>

    <div class="from-group">
      <label for="numero">Número</label>
      <input id="numero" class="form-control" type="number" name="numero"
        value="<?php if(isset($registro)) echo $registro['numero']; ?>" required>
    </div>

    <div class="from-group">
      <label for="telefone">Telefone</label>
      <input id="telefone" class="form-control" type="number" name="telefone"
        value="<?php if(isset($registro)) echo $registro['telefone']; ?>" required>
    </div>

    <div class="from-group">
      <label for="cargo">Cargo</label>
      <input id="cargo" class="form-control" type="text" name="cargo"
        value="<?php if(isset($registro)) echo $registro['cargo']; ?>" required>
    </div>
    <br>
    <button class="btn btn-info" type="submit">Enviar</button>
  </form>
</div>
