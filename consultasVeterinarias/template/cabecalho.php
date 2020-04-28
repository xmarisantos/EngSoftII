<?php define('BASE_URL', 'http://localhost:8080/consultasVeterinarias'); ?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title>Clinica Veterinária</title>

    <link href="<?= BASE_URL; ?>/template/album.css" rel="stylesheet">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


    <!-- Custom styles for this template -->
    <link href="dashboard.css" rel="stylesheet">
  </head>

  <body>
      <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
        <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="<?= BASE_URL; ?>">Clínica Veterinária</a>

        <ul class="navbar-nav px-3">
          <li class="nav-item text-nowrap">
            <a class="nav-link" href="<?= BASE_URL; ?>">Sign out</a>
          </li>
        </ul>
      </nav>


          <div class="container-fluid">
            <div class="row">
              <nav class="col-md-2 d-none d-md-block bg-light sidebar">
                <div class="sidebar-sticky">
                  <ul class="nav flex-column">
                    <li class="nav-item">
                      <a class="nav-link active" href="<?= BASE_URL; ?>/consulta/consulta.php">
                        <span data-feather="home"></span>
                        Consultas <span class="sr-only">(current)</span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="<?= BASE_URL; ?>/veterinario/veterinario.php">
                        <span data-feather="file"></span>
                        Veterinários
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="<?= BASE_URL; ?>/paciente_pet/paciente_pet.php">
                        <span data-feather="users"></span>
                        Pacientes Pet
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="<?= BASE_URL; ?>/paciente_dono/paciente_dono.php">
                        <span data-feather="users"></span>
                        Pacientes Donos
                      </a>
                    </li>

                  </ul>

                  <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                    <span>Faturamento</span>
                    <a class="d-flex align-items-center text-muted" href="#">
                      <span data-feather="plus-circle"></span>
                    </a>
                  </h6>
                  <ul class="nav flex-column mb-2">
                    <li class="nav-item">
                      <a class="nav-link" href="#">
                        <span data-feather="file-text"></span>
                        Anual
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#">
                        <span data-feather="file-text"></span>
                        Mensal
                      </a>
                    </li>
                  </ul>
                  </div>
                  </nav>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">


    <main role="main">
