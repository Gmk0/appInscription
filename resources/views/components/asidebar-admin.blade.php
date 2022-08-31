<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <a href="{{route('Admin.dashboard')}}" class="brand-link text-bold text-decoration-none ">
        <img src="{{asset('images/logo2.jpg')}}" alt="Usakin" class="img-thumbnail" width="60px" style="opacity: .8">
        <span class="brand-text font-weight-light">USAKIN</span>
    </a>

    <div class="sidebar">

        <div class="user-panel mt-3 pb-3 mb-3 d-flex">

            <div class="info">

                <nav class="nav justify-content-center">
                    <a class="nav-link active" href="#">{{AUTH::user()->name}} - {{AUTH::user()->lastname}} <br>
                        {{AUTH::user()->role}}
                    </a>


                </nav>

            </div>
        </div>

        <div class="form-inline">

        </div>

        <x-nav-Aside />

    </div>

</aside>