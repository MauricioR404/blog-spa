<ul class="sidebar-menu" data-widget="tree">
    <li class="header">MAIN NAVIGATION</li>
    <li class="{{ setActiveRoute('dashboard') }}">
        <a href="{{ route('dashboard') }}"><i class="fa fa-home"></i> 
            <span>Inicio</span>
        </a>
    </li>
    <li class="treeview {{ setActiveRoute('admin.posts.index') }}">
        <a href="#">
            <i class="fa fa-dashboard"></i> <span>Blog</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li class="{{ setActiveRoute('admin.posts.index') }}">
                <a href="{{ route('admin.posts.index') }}"><i class="fa fa-circle-o"></i>Ver todos los post
                </a>
            </li>

            @can('create', new App\Post)
                @if (request()->is('admin/posts/*'))
                    <li {{ request()->is('admin/posts/create') ? 'class=active' : '' }}>
                        <a href="{{ route('admin.posts.index', '#create') }}">
                            <i class="fa fa-circle-o"></i> Crear post
                        </a>
                    </li>
                @else
                    <li {{ request()->is('admin/posts/create') ? 'class=active' : '' }}>
                        <a href="#" data-toggle="modal" data-target="#exampleModal">
                            <i class="fa fa-circle-o"></i> Crear post
                        </a>
                    </li>
                @endif
            @endcan
            
        </ul>
    </li>

    @can('view', new App\User)
        <li class="treeview {{ setActiveRoute(['admin.users.index', 'admin.users.create']) }}">
            <a href="#">
                <i class="fa fa-users"></i> <span>Usuarios</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li class="{{ setActiveRoute('admin.users.index') }}">
                    <a href="{{ route('admin.users.index') }}"><i class="fa fa-circle-o"></i>Ver todos los usuarios
                    </a>
                </li>
                <li class="{{ setActiveRoute('admin.users.create') }}">
                    <a href="{{ route('admin.users.create') }}">
                        <i class="fa fa-circle-o"></i> Crear usuarios
                    </a>
                </li>
                
            </ul>
        </li>

    @else
        <li class="{{ setActiveRoute('admin.users.edit') }}">
            <a href="{{ route('admin.users.edit', auth()->user()) }}">
                <i class="fa fa-user"></i><span>Mi cuenta</span>
            </a>
        </li>
    @endcan

    <li class="treeview {{ setActiveRoute('admin.messages.index') }}">
        @can('view', new App\Message)
            <li class="{{ setActiveRoute('admin.messages.index') }}">
                <a href="{{ route('admin.messages.index') }}">
                    <i class="fa fa-envelope"></i><span>Mensajes</span>
                </a>
            </li>
        @endcan
    </li>

    <li class="treeview {{ setActiveRoute(['admin.roles.index', 'admin.roles.create']) }}">
        @can('view', new \Spatie\Permission\Models\Role)
            <li class="{{ setActiveRoute('admin.roles.index') }}">
                <a href="{{ route('admin.roles.index') }}">
                    <i class="fa fa-pencil"></i><span>Roles</span>
                </a>
            </li>
        @endcan
    </li>
     <li class="treeview {{ setActiveRoute(['admin.permissions.index', 'admin.permissions.create']) }}">
        @can('view', new \Spatie\Permission\Models\Role)
            <li class="{{ setActiveRoute('admin.permissions.index') }}">
                <a href="{{ route('admin.permissions.index') }}">
                    <i class="fa fa-pencil"></i><span>Permisos</span>
                </a>
            </li>
        @endcan
    </li>
    
    {{-- <li class="header">LABELS</li>
    <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
    <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>
    <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li> --}}
</ul>