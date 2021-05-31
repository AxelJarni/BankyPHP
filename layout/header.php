<!doctype html>
<html class="no-js" lang="">

<head>
  <meta charset="utf-8">
  <title></title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <meta property="og:title" content="">
  <meta property="og:type" content="">
  <meta property="og:url" content="">
  <meta property="og:image" content="">

  <link rel="manifest" href="site.webmanifest">
  <link rel="apple-touch-icon" href="icon.png">
  <!-- Place favicon.ico in the root directory -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/main.css">

  <meta name="theme-color" content="#fafafa">
</head>

<body>
  <!-- <nav class="navbar navbar-expand-lg navbar-light bg-secondary">
    <a class="navbar-brand mx-5" href="#">Bankyy</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link text-white mx-2" href="index.php">Accueil <span class="sr-only"></span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white mx-2" href="actu.php">Actualités</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white mx-2" href="#">Statistiques</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-white mx-2" href="#" role="button" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Gestion du compte
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <a class="dropdown-item" href="#">Something else here</a>
          </div>
        </li>
      </ul>
    </div>
  </nav> -->

  <header class="jumbotron jumbotron-fluid bg-light my-0 py-4">
    <section class="container mb-2 text-center">
      <h1 class="display-4 border-bottom border-primary mt-0"><strong>Bankyy</strong></h1>
      <p class="lead pb-2">Votre banque pour accompagner tout vos projets</p>
    </section>
    <?php if(isset($_SESSION["user"])): ?>
      <a class="btn btn-dark mx-3" href="logout.php">Déconnexion</a>
    <?php endif; ?>
  </header>

  <main class="container my-5">