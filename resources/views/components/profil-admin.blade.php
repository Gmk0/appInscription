<aside class="control-sidebar control-sidebar-dark ml-5">

    <div class="bg-dark">
        <div class="card-body box-profile">
            <div class="text-center">
                <img class="profile-user-img img-fluid img-circle" src="" alt="">
            </div>

            <h3 class="profile-username text-center"> {{ Auth::user()->name }}</h3>

            <p class="text-muted text-center">
                {{ Auth::user()->role }}
            </p>

            <ul class="list-group bg-dark mb-3">
                <li class="list-group-item">
                    <a class="d-flex align-items-center"> <i class="fa fa-lock pr-2"></i> Mot de passe</a>
                </li>
                <li class="list-group-item">
                    <a class="d-flex align-items-center"><i class="fa fa-user pr-2"></i>Mon Profile</a>
                </li>

            </ul>

            <a class="btn btn-primary btn-block" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Logout</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
        <!-- /.card-body -->
    </div>
</aside>
