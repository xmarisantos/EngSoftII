<?php define('BASE_URL', 'http://localhost:8080/gerenciadorConsultas'); ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title>Clínica Veterinária </title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/album/">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="<?= BASE_URL; ?>/template/album.css" rel="stylesheet">
  </head>

  <body>

    <header>
      <div class="collapse bg-dark" id="navbarHeader">
        <div class="container">
          <div class="row">
            <div class="col-sm-8 col-md-7 py-4">
              <h4 class="text-white">Sobre</h4>
              <p class="text-muted">
                Aplicação para auxiliar na tarefa de gerenciar consultas veterinárias, bem como seus pacientes e médicos veterinários.
              </p>
            </div>
            <div class="col-sm-4 offset-md-1 py-4">
              <h4 class="text-white">Menu</h4>
              <ul class="list-unstyled">
                <li><a href="<?= BASE_URL; ?>/consulta/consulta.php" class="text-white">Consultas</a></li>
                <li><a href="<?= BASE_URL; ?>/paciente_pet/paciente_pet.php" class="text-white">Pacientes Pet</a></li>
                <li><a href="<?= BASE_URL; ?>/paciente_dono/paciente_dono.php" class="text-white">Pacientes Donos</a></li>
                <li><a href="<?= BASE_URL; ?>/veterinario/veterinario.php" class="text-white">Veterinários</a></li>
                <br>
                <br>
                <li><a href="<?= BASE_URL; ?>" class="text-white">Sair</a></li>
              </ul>
            </div>
          </div>
        </div>
</div>


    </header>

    <main role="main">
