<nav class="navbar navbar-expand-sm navbar-light" style="background-color:#fff">
    <div class="container">

        <a href="" class="navbar navbar-brand  align-top"><img src="{{asset('images/logo2.jpg')}}" alt="" width="70"
                                                               height="70">
        </a>
        <h2>USAKIN</h2>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarID"
                aria-controls="navbarID" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarID">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link" href="{{route('accueil.student')}}">HOME</a></li>
                <li class="nav-item"><a class="nav-link" href="{{URL('/profil')}}">PROFIL</a></li>
                <li class="nav-item"><a class="nav-link" href="{{URL('/profil')}}">HELP</a></li>
                <li class="nav-item"><a class="nav-link" href="{{URL('/profil')}}">APROPOS</a></li>
            </ul>
        </div>
    </div>
</nav>
