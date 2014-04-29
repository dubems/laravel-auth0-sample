<html>
    <body>
        <div class="menu">
            <a href ="/">Go Home</a>
        </div>
        @if (Auth::check())
        Hello {{ Auth::user()->name }}, <a href="/logout">Logout</a>
        @else
        <button id="login-button">Login</button>
        @endif
        <h1>Laravel Auth0 Quickstart</h1>

        @yield('content')

        @if (!Auth::check())

        {{ HTML::script('https://cdn.auth0.com/w2/auth0-widget-3.0.min.js') }}
        <script type="text/javascript">
            var widget = new Auth0Widget({
                domain:         '{{ Config::get("auth0::config.domain")}}',
                clientID:       '{{ Config::get("auth0::config.client_id")}}',
                callbackURL:    '{{ Config::get("auth0::config.redirect_uri")}}'
            });

            var $loginButton = document.getElementById("login-button");
            $loginButton.addEventListener("click", function() {
                widget.signin();
            });
        </script>
        @endif
    </body>
</html>

