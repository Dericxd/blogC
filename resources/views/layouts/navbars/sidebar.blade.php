<div class="sidebar" data-color="orange" data-background-color="black"
     data-image="{{ asset('material') }}/img/sidebar-1.jpg">
    <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
    <div class="logo">
        <a href="{{ route('home') }}" class="simple-text logo-mini">
            CT
        </a>
        <a href="{{ route('home') }}" class="simple-text logo-normal">
            Blogger
        </a>
    </div>
    <div class="sidebar-wrapper ps-container ps-theme-default ps-active-y"
         data-ps-id="542b618d-7360-9463-92e2-45799a500852">
        <!--    Usuario loged   -->
        <div class="user">
            <div class="photo">
                <img src="http://i.pravatar.cc/200">
            </div>
            <div class="user-info">
                <a data-toggle="collapse" href="#collapseExample" class="username">
          <span>
            {{ auth()->user()->name }}
            <b class="caret"></b>
          </span>
                </a>
                <div class="collapse" id="collapseExample">
                    <ul class="nav">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('profile.edit',auth()->user()->id) }}">
                                <span class="sidebar-mini"> EP </span>
                                <span class="sidebar-normal"> Edit Profile </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!--    Usuario loged   -->
        <!--    Usuario loged   -->
        <!--    Usuario loged   -->

        <ul class="nav">
            <!--    Home    -->
            <li class="nav-item{{ $activePage == 'dashboard' ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('home') }}">
                    <i class="material-icons">dashboard</i>
                    <p>{{ __('Dashboard') }}</p>
                </a>
            </li>
            <!--    Home    -->

            <!--    usuarios    -->
            <li class="nav-item {{ ($activePage == 'profile' || $activePage == 'user-management') ? ' active' : '' }}">
                <a class="nav-link" data-toggle="collapse" href="#userDrop" aria-expanded="false">
                    <i><img style="width:25px" src="{{ asset('material') }}/img/laravel.svg"></i>
                    <p>
                        {{ __('Gestión usuarios ') }}
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse " id="userDrop">
                    <ul class="nav">
                        <li class="nav-item{{ $activePage == 'profile' ? ' active' : '' }}">
                            <a class="nav-link" href="{{ route('profile.edit') }}">
                                <span class="sidebar-mini"> PU </span>
                                <span class="sidebar-normal">{{ __('User profile') }} </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <!--    usuarios    -->

            <!--    categories   -->
            <li class="nav-item {{ ($activePage == 'create-category' || $activePage == 'category-management') ? ' active' : '' }}">
                <a class="nav-link" data-toggle="collapse" href="#catDrop" aria-expanded="false">
                    <i class="material-icons">AC</i>
                    <p>
                        {{ __('Gestion Category') }}
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse " id="catDrop">
                    <ul class="nav">
                        <li class="nav-item{{ $activePage == 'create-category' ? ' active' : '' }}">
                            <a class="nav-link" href="{{ route('categories.create') }}">
                                <span class="sidebar-mini"> CC </span>
                                <span class="sidebar-normal">{{ __('Crear categoria') }} </span>
                            </a>
                        </li>
                        <li class="nav-item{{ $activePage == 'category-management' ? ' active' : '' }}">
                            <a class="nav-link" href="{{ route('categories.index') }}">
                                <span class="sidebar-mini"> GC </span>
                                <span class="sidebar-normal"> {{ __('Gestión categorias') }} </span>
                            </a>
                        </li>
                    </ul>
                </div>

            </li>
            <!--    categories   -->

            <!--    Tags -->
            <li class="nav-item {{ ($activePage == 'create-tag' || $activePage == 'tag-management') ? ' active' : '' }}">
                <a class="nav-link" data-toggle="collapse" href="#tagDrop" aria-expanded="false">
                    <i class="material-icons">AT</i>
                    <p>
                        {{ __('Gestion Tag') }}
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse " id="tagDrop">
                    <ul class="nav">
                        <li class="nav-item{{ $activePage == 'create-tag' ? ' active' : '' }}">
                            <a class="nav-link" href="{{ route('tags.create') }}">
                                <span class="sidebar-mini"> RD </span>
                                <span class="sidebar-normal">{{ __('Registrar Tag') }} </span>
                            </a>
                        </li>
                        <li class="nav-item{{ $activePage == 'tag-management' ? ' active' : '' }}">
                            <a class="nav-link" href="{{ route('tags.index') }}">
                                <span class="sidebar-mini"> GD </span>
                                <span class="sidebar-normal"> {{ __('Gestión Tag') }} </span>
                            </a>
                        </li>
                    </ul>
                </div>

            </li>
            <!--    Tags -->

            <!--    Post    -->
            <li class="nav-item {{ ($activePage == 'create-post' || $activePage == 'post-management') ? ' active' : '' }}">
                <a class="nav-link" data-toggle="collapse" href="#postDrop" aria-expanded="false">
                    <i class="material-icons">AP</i>
                    <p>
                        {{ __('Gestion Post') }}
                        <b class="caret"></b>
                    </p>
                </a>

                <div class="collapse " id="postDrop">
                    <ul class="nav">
                        <li class="nav-item{{ $activePage == 'create-post' ? ' active' : '' }}">
                            <a class="nav-link" href="{{ route('posts.create') }}">
                                <span class="sidebar-mini"> CP </span>
                                <span class="sidebar-normal">{{ __('Crear Post.') }} </span>
                            </a>
                        </li>
                        <li class="nav-item{{ $activePage == 'post-management' ? ' active' : '' }}">
                            <a class="nav-link" href="{{ route('posts.index') }}">
                                <span class="sidebar-mini"> GP </span>
                                <span class="sidebar-normal"> {{ __('Admin Post.') }} </span>
                            </a>
                        </li>
                    </ul>
                </div>

            </li>

        </ul>
        <div class="ps-scrollbar-x-rail" style="left: 0px; bottom: 0px;">
            <div class="ps-scrollbar-x" tabindex="0" style="left: 0px; width: 0px;"></div>
        </div>
        <div class="ps-scrollbar-y-rail" style="top: 0px; height: 656px; right: 0px;">
            <div class="ps-scrollbar-y" tabindex="0" style="top: 0px; height: 455px;"></div>
        </div>
    </div>
    <div class="sidebar-background"
         style="background-image: url(https://material-dashboard-pro-laravel.creative-tim.com/material/img/sidebar-1.jpg) ">
    </div>
</div>
