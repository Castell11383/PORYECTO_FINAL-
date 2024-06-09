<nav class="navbar fixed-top navbar-expand-lg bg-secondary bg-gradient rounded">
  <div class="container-fluid">
    <a class="navbar-brand" href="../../vistas/templates/inicio.php"><img src="../../src/images/sofware.png" width="40" height="40"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarScroll">
      <ul class="navbar-nav me-auto my-2 my-lg-0" style="--bs-scroll-height: 100px;">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../../vistas/templates/inicio.php"><i class="bi bi-house-fill me-2 "></i>Inicio</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-black" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <i class="bi bi-people-fill"></i></i> Programadores
          </a>
          <ul class="dropdown-menu bg-secondary bg-gradient text-black">
            <li><a class="dropdown-item" href="../../vistas/programador/registrar.php"><i class="bi bi-person-fill-add"></i> Crear Programadores</a></li>
            <li><a class="dropdown-item" href="../../vistas/programador/buscar.php"><i class="bi bi-binoculars-fill"></i> Buscar Programadores</a></li>
            <li><a class="dropdown-item" href="../../controladores/programador/buscar.php"><i class="bi bi-people-fill"></i> Programadores</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-black" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <i class="bi bi-google-play"></i> Aplicaciones
          </a>
          <ul class="dropdown-menu bg-secondary bg-gradient text-black">
            <li><a class="dropdown-item" href="../../vistas/aplicacion/registar.php"><i class="bi bi-device-ssd-fill"></i> Crear Aplicacion</a></li>
            <li><a class="dropdown-item" href="#"><i class="bi bi-binoculars-fill"></i> Ver Aplicaciones</a></li>
          </ul>
        </li>
    </div>
  </div>
</nav>