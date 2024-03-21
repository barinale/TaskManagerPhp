<?php
    session_start();
    if(isset($_SESSION['user_id'])){
        header("Location: ./dashboard.php");

    }

    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST" action="login.php">
        <label for="email">Email:</label>
        <input type="email" name="email" /></br>
        <label for="password">Password:</label>
        <input type="password" name="password" /></br>
        <button type="submit">Login In</button>
    </form>
    <?php if(isset($_REQUEST['error'])):?>
        <span style="background:red;">Somethin Wrokn here</span>
    <?php endif;?>

</body>
</html>
