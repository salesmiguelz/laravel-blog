<nav class="navbar navbar-expand-lg navbar-custom">
    <div class="container-fluid">
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav mx-auto">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/posts">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Contact</a>
          </li>

          @if(Auth::check())
          <li class="nav-item">
            <a class="nav-link" href="/posts/{{Auth::user()->id}}">My Posts</a>
          </li>

          @endif


          @if(!Auth::check())
              <li class="nav-item">
                <a class="nav-link" href="/login">Login</a>
              </li>
          @endif
         
        </ul>
      </div>

      
      @if(Auth::check())
        <form method="POST" action="{{ route('logout') }}">
          @csrf
            <button class="btn btn-light">Logout</button>
        </form>
      @endif
    </div>

  </nav>