<html>
<body>
<h1>Laravel Auth0 Quickstart</h1>

@yield('content')

@if (Auth::check())
    <a href="/logout">Logout</a><br />
    <img src="{{ Auth::user()->picture }}">
@else
    <button id="login-button">Login</button>
    <script src="http://cdn.auth0.com/js/lock/10.0.0-rc.2/lock.min.js"></script>
    <script type="text/javascript">
        var lock = new Auth0Lock('{{ env("AUTH0_CLIENT_ID") }}', '{{ env("AUTH0_DOMAIN") }}', {
            auth: {
                redirectUrl: '{{ env ("AUTH0_CALLBACK_URL" )}}',
                response_type: 'code'
            }
        });

        var $loginButton = document.getElementById("login-button");
        $loginButton.addEventListener("click", function () {
            lock.show();
        });
    </script>
@endif

</body>
</html>

