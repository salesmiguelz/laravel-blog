<nav class="navbar navbar-expand-lg navbar-custom">
    <div class="container-fluid">
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav mx-auto">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Contact</a>
          </li>

          @if(!Auth::check())
              <li class="nav-item">
                <a class="nav-link" href="/login">Login</a>
              </li>
          @endif
         
        </ul>
      </div>
    </div>

    <div class="nav-logout">
        <p class="nav-logout-username">Hello, {{Auth::user()->name}}</p>
        <a href="/logout" class="nav-logout-button">Logout <i class="bi bi-arrow-bar-right"></i></a>
    </div>
  </nav>