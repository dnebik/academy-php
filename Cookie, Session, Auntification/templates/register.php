<?php
session_start();
if (isset($_SESSION["login"]))
{
    die();
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
</head>

<body>
<div style="background: #1b6d85; padding: 5px 20px; width: min-content; transform: translate(-50%, -50%); position: absolute; top: 50%; left: 50%; border-radius: 8px">
    <form action="../register.php" method="post" style="color: ghostwhite">
        <p>Login:<input style="padding: 2px 1px 2px 5px " type="text" name="login" placeholder="login" alt="Login"
                        required></p>
        <p>Email: <input style="padding: 2px 1px 2px 5px " type="email" name="email" placeholder="email"
                         alt="Email" required></p>
        <p>Password: <input style="padding: 2px 1px 2px 5px " type="password" name="password" placeholder="password"
                            alt="Password" required></p>
        <p><input type="submit" value="Register"></p>
    </form>
</div>
</body>

</html>