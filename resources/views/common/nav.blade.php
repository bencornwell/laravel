
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
            {{ config('appsettings.Application Site Name') }}
        </a>
    </div>
    <div class="collapse navbar-collapse" id="app-navbar-main-collapse">
    <!-- Left Side Of Navbar -->
    @if (Auth::check())
        <ul class="nav navbar-nav">
            <li class="dropdown">
                <a href="{{ url('/') }}" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ Lang::get('messages.ui.home') }}<span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="{{ url('/grant/applications') }}">{{ Lang::get( 'messages.ui.grant_applications' ) }}</a></li>
                    <li><a href="{{ url('/grant/search') }}">{{ Lang::get( 'messages.ui.grant_search' ) }}</a></li>
                    <li><a href="{{ url('/grant/reports') }}">{{ Lang::get( 'messages.ui.grant_reports' ) }}</a></li>
                </ul>
            </li>
            @if (Auth::user( )->isAdmin( ) )
                <li class="dropdown">
                    <a href="{{ url('/maintenance') }}" class="dropwdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ Lang::get( 'messages.ui.maintenance' ) }}<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ url('/appsettings' )}}">{{ Lang::get('messages.ui.application_settings') }}</a></li>
                        <li><a href="{{ url('/rmsdata') }}">{{ Lang::get('messages.ui.rms_data') }}</a></li>
                        <li><a href="{{ url('/agencies')}}">{{ Lang::get( 'messages.ui.agencies' ) }}</a></li>
                        <li><a href="{{ url('/schemes')}}">{{ Lang::get( 'messages.ui.schemes' ) }}</a></li>
                    </ul>
                </li>
            @endif
        </ul>
        <form id="search" action="{{ url('/search') }}" class="navbar-form navbar-left">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="{{ Lang::get('messages.ui.search' ) }}">
            </div>
            <button type="submit" class="btn btn-default">{{ Lang::get('messages.ui.go') }}</button>
        </form>
    @endif
                <!-- Right Side Of Navbar -->
    <ul class="nav navbar-nav navbar-right">
            <!-- Authentication Links -->
        @if (Auth::guest())
                <li><a href="{{ url('/login') }}">{{ Lang::get('messages.ui.login' ) }}</a></li>
                <li><a href="{{ url('/register') }}">{{ Lang::get('messages.ui.register' ) }} </a></li>
        @else
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="{{ url('/user/profile') }}"><i class="fa fa-btn fa-id-badge"></i>{{ Lang::get('messages.ui.profile' ) }}</a></li>
                    <li><a href="{{ url('/user/settings') }}"><i class="fa fa-btn fa-gear"></i>{{ Lang::get('messages.ui.settings' ) }}</a></li>
                    <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>{{ Lang::get('messages.ui.logout' ) }}</a></li>
			    </ul>
		    </li>
        @endif
    </ul>
    </div>
</div>
