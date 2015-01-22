<!--suppress HtmlUnknownTarget -->
<nav class="navbar navbar-default navbar-fixed-top navbar-inverse">
    <div class="container">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">Larabook</a>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>
                <li><a href="#">Link</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                @if($currentUser)
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle nav-gravatar" data-toggle="dropdown" role="button"
                           aria-expanded="false">
                            <img src="{{$currentUser->present()->gravatar('30')}}"
                                 alt="{{$currentUser->username}}?s=30" class="img-rounded"/>
                            {{$currentUser->username}} <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="#">Action</a></li>
                            <li><a href="#">Another action</a></li>
                            <li><a href="#">Something else here</a></li>
                            <li class="divider"></li>
                            <li>{{Html::linkRoute('logout_path', 'Log Out')}}</li>
                        </ul>
                    </li>
                @else
                    <li>{{link_to_route('register_path', 'Register')}}</li>
                    <li>{{link_to_route('login_path', 'Log in')}}</li>
                @endif
            </ul>
        </div>
    </div>
</nav>