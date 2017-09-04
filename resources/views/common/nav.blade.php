
<div class="container-fluid">
	<div class="navbar-header">
        <!-- Collapsed Hamburger -->
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-main-collapse">
            <span class="sr-only">Toggle Navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>

        <!-- Branding Image -->
        <a class="navbar-brand" href="{{ url('/') }}">
            Research Funding Portal
        </a>
    </div>
    <div class="collapse navbar-collapse" id="app-navbar-main-collapse">
    <!-- Left Side Of Navbar -->
    @if (Auth::check())
        <ul class="nav navbar-nav">
            <li class="dropdown">
                <a href="{{ url('/') }}" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Home<span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="{{ url('/grant/applications') }}">Grant Applications</a></li>
                    <li><a href="{{ url('/grant/search') }}">Grant Search</a></li>
                    <li><a href="{{ url('/grant/reports') }}">Grant Reports</a></li>
                </ul>
            </li>
            @if (Auth::user( )->isAdmin( ) ) }}
                <li class="dropdown">
                    <a href="{{ url('/maintenance') }}" class="dropwdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Maintenance<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ url('/appsettings' )}}">Application Settings</a></li>
                        <li><a href="{{ url('/rmsdata') }}">RMS Data</a></li>
                        <li><a href="{{ url('/agencies')}}">Agencies</a></li>
                        <li><a href="{{ url('/schemes')}}">Scheme</a></li>
                    </ul>
                </li>
            @endif
        </ul>
        <form id="search" action="{{ url('/search') }}" class="navbar-form navbar-left">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Search">
            </div>
            <button type="submit" class="btn btn-default">Submit</button>
        </form>
    @endif
                <!-- Right Side Of Navbar -->
    <ul class="nav navbar-nav navbar-right">
            <!-- Authentication Links -->
        @if (Auth::guest())
                <li><a href="{{ url('/login') }}">Login</a></li>
                <li><a href="{{ url('/register') }}">Register</a></li>
        @else
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="{{ url('/user/profile') }}"><i class="fa fa-btn fa-id-badge"></i>Profile</a></li>
                    <li><a href="{{ url('/user/settings') }}"><i class="fa fa-btn fa-gear"></i>Settings</a></li>
                    <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
			    </ul>
		    </li>
        @endif
    </ul>
    </div>
</div>
