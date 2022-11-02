<nav class="navbar navbar-expand-lg  navbar-dark bg-dark">
  <a class="navbar-brand" href="#">IMDB</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../buproject/movies.php">Movies</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="../buproject/insert-movie.php">Insert New Movies</a>
      </li>



  </div>

  </ul>
  <div class="d-flex col justify-content-around">
    <form class="form-inline my-2 my-lg-0 d-flex col" method="POST" action="../buproject/search.php">
      <input name="input" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="search">Search</button>
    </form>
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="../buproject/register.php">Sign-up</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Log-in</a>
      </li>
    </ul>
  </div>
  </div>
</nav>