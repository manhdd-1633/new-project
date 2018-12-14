<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element"> <span>
                    {!! Html::image(config('site.default-logo'), 'default-logo.png' ) !!}
                   {{--  <img alt="image" class="img-circle" src="img/profile_small.jpg" /> --}}
                    </span>
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <span class="clear">
                            <span class="block m-t-xs"> 
                                {!! Html::image(Auth::user()->AvatarUser, null,['class' => 'img-circle avatar-list']) !!}
                                <strong class="font-bold">{{ Auth::user()->name }}</strong>
                            </span> 
                            <span class="text-muted text-xs block">Art Director <b class="caret"></b></span> 
                        </span> 
                    </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li><a href="{{ route('user.edit', ['id' => Auth::user()->id ]) }}">Profile</a></li>
                        <li class="divider"></li>
                        <li><a href="{{ route('logOut') }}">Logout</a></li>
                    </ul>
                </div>
                <div class="logo-element">
                    IN+
                </div>
            </li>
            <li class="active">
                <a href="{{ route('dashboard') }}"><i class="fa fa-diamond"></i> 
                    <span class="nav-label">Dashboards</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-user-circle-o" aria-hidden="true"></i>
                    <span class="nav-label">Users</span>
                    <span class="fa arrow"></span>
                </a>
                <ul class="nav nav-second-level collapse">
                    <li><a href="{{ route('user.index') }}">User -  List</a></li>
                </ul>
            </li>
        </ul>
    </div>
</nav>