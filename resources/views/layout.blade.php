<html>
<body>
<h1>Laravel Auth0 Quickstart</h1>

@yield('content')

@if (Auth::check())
    <a href="/logout">Logout</a><br />
    <img src="{{ Auth::user()->picture }}">
@else
    <button id="login-button">Login</button>
    <script src="http://cdn.auth0.com/js/lock-8.2.2.min.js"></script>
    <script type="text/javascript">
        var lock = new Auth0Lock('{{ env("AUTH0_CLIENT_ID") }}', '{{ env("AUTH0_DOMAIN") }}');

        var $loginButton = document.getElementById("login-button");
        $loginButton.addEventListener("click", function () {
            lock.show({
                callbackURL: '{{ env ("AUTH0_CALLBACK_URL" )}}',
                response_type: 'code'
            });
        });
    </script>
@endif

</body>
</html>

