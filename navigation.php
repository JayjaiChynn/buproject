<nav class="navbar navbar-expand-lg  navbar-dark bg-dark text-light">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">IMDB</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    </div>
    <div class="collapse navbar-collapse d-flex justify-content-around">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../buproject/movies.php">Movies</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="../buproject/insert-movie.php">Insert New Movies</a>
        </li>
      </ul>
      <form class="d-flex gap-3" method="POST" action="../buproject/search.php">
        <input name="input" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="search">Search</button>
      </form>
    </div>
    <div class="navbar-nav mr-auto mt-2 mt-lg-0">
      <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
        <li class="nav-item active">
          <a class="nav-link" href="../buproject/register.php">Sign-up</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="log-in.php">Login</a>
        </li>
      </ul>
    </div>
  </div>
</nav>