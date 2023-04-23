<!DOCTYPE html>
<html>

<head>
    <title>Admin Login</title>
</head>

<body>
    <h2>Admin Login</h2>
    <?php if (isset($error)) { ?>
        <p><?php echo $error; ?></p>
    <?php } ?>
    <form action="" method="post">
        <div>
            <label>Username:</label>
            <input type="text" name="username">
        </div>
        <div>
            <label>Password:</label>
            <input type="password" name="password">
        </div>
        <input type="submit" name="login" value="Login">
    </form>
</body>

</html>