<nav class="mt-2">

    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">



            <li class="nav-item me">
                <a href="#" class="nav-link active">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        Tableau de bord
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-school"></i>
                    <p>
                        GESTION
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                   
                    <li class="nav-item">
                        <a href="{{route('gestion_faculte.admin')}}" class="nav-link">
                            <i class="fa fa-graduation-cap nav-icon"></i>
                            <p>Faculte</p>
                        </a>
                    </li>

                </ul>
            </li>

            <li class="nav-item">
                <a href="" class="nav-link">
                    <i class="nav-icon fas fa-users"></i>
                    <p>
                        Etudiant
                        <i class="right fas fa-angle-left"></i>
                        <span class="right badge badge-danger">New</span>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('users.allEtdiant')}}" class="nav-link ">
                            <i class="fa fa-user-check nav-icon"></i>
                            <p>Etudiant</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('users.etudiant')}}" class="nav-link">
                            <i class="fas fa-user-plus nav-icon"></i>
                            <p>Nouveau Etudiant</p>
                        </a>
                    </li>

                </ul>
            </li>
            <li class="nav-header">TRAVAILS</li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-calendar"></i>
                    <p>
                       Evenement
                       
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-user"></i>
                    <p>
                        Management
                        <i class="right fas fa-angle-left"></i>

                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('users.admin')}}" class="nav-link ">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Users</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Etudiant Inscris</p>
                        </a>
                    </li>

                </ul>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-school"></i>
                    <p>
                        Resources Humains
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                   
                    <li class="nav-item">
                        <a href="{{route('gestion_faculte.admin')}}" class="nav-link">
                            <i class="fa fa-graduation-cap nav-icon"></i>
                            <p>Faculte</p>
                        </a>
                    </li>

                </ul>
            </li>
            <li class="nav-header">Settings</li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-school"></i>
                    <p>
                       DATABASE BACKUP
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                   
                    <li class="nav-item">
                        <a href="{{route('gestion_faculte.admin')}}" class="nav-link">
                            <i class="fa fa-graduation-cap nav-icon"></i>
                            <p>Faculte</p>
                        </a>
                    </li>

                </ul>
            </li>

            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-settings"></i>
                    <p>
                    SETTINGS
                        <span class="right badge badge-danger">New</span>
                    </p>
                </a>
            </li>
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-settings"></i>
                <p>
                   User
                    <span class="right badge badge-danger">New</span>
                </p>
            </a>
        </li>
    </ul>
</nav>
