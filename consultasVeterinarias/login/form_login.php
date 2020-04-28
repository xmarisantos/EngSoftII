<?php
    if(isset($registro)) $acao = "login.php?acao=entrar&id=".$registro['id'];
    else $acao = "login.php?acao=entrar";
 ?>

 <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
   <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">.</a>

   <ul class="navbar-nav px-3">
     <li class="nav-item text-nowrap">
       <a class="nav-link" href="#">.</a>
     </li>
   </ul>
 </nav>



    <div class="container">
      <h1 class="h3 mb-3 font-weight-normal">Login</h1>
      <form class="" action="<?php echo $acao; ?>" method="post">
        <div class="from-group">
          <label for="usuario">Usuário</label>
          <input id="usuario" class="form-control" type="text" name="usuario"
            value="<?php if(isset($registro)) echo $registro['usuario']; ?>" required>
        </div>

        <div class="from-group">
          <label for="senha">Senha</label>
          <input id="senha" class="form-control" type="password" name="senha"
            value="<?php if(isset($registro)) echo $registro['senha']; ?>" required>
        </div>

        <br>
        <button class="btn btn-info" type="submit">Entrar</button>
