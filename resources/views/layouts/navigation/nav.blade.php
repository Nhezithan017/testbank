<nav class="navbar navbar-expand-lg navbar-dark bg-primary sticky-top">
    <a class="navbar-brand" href="/">iQueTestBank</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto">
        @auth
        <li class="nav-link">{{ Auth::user()->name }}</li>
          @if(auth()->user()->end_user == 'admin' || auth()->user()->end_user == 'dean')
          <li class="nav-item">
              <a class="nav-link" href="{{ route('user') }}">
              User
              </a>
            </li>
            @endif
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                {{-- <a class="nav-link" href="{{ route('test') }}"> --}}
                  Download
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    @if(auth()->user()->end_user == 'admin' || auth()->user()->end_user == 'dean')
                    <a class="dropdown-item" href="{{ route('test') }}">User Questionaire</a>
                  @else
                <a class="dropdown-item" href="{{ route('faculty.test') }}">My Questionaire</a>
                    @endif
                </div>
              </li>
         
         
         <li class="nav-item">
          <a class="nav-link" href="{{ route('show.department') }}">Deparment</a>
        </li>
        @endauth
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
           Menu {{-- {{ Auth::user()->name }} --}}
          </a>
         
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            @guest
            <a class="dropdown-item" href="{{ route('login') }}">Login</a>
            @endguest
            @auth
            <form method="POST" action="{{ route('logout') }}">
               {{ csrf_field() }}
               <input type="submit" class="dropdown-item" name="logout" value="Logout">
            </form>
           
            @endauth
          </div>
        </li>
  
      </ul>
    </div>
  </nav>
