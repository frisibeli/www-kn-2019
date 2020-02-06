<h2>Login</h2>

<form method="post">
    <? foreach ($params as $key => $value) {
        echo $params."<br>";
    } ?>
    <input type="text" name="username" />
    <input type="password" name="password" />
    <button>Login</button>
</form>

<a href="/user/register">Register</a>