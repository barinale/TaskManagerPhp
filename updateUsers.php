<?php
    include_once('./Controller/UserController.php');
    if($_SERVER['REQUEST_METHOD']=='POST' && $_REQUEST['name'] && $_REQUEST['email']){
        $result = UserController::updateUser($_REQUEST['name'],$_REQUEST['email'],$_REQUEST['id']);
        header('Location: ./dashboard.php?message=updateUser');
    }
    if(isset($_GET["id"])){
        $Controller = new UserController();
        $user = $Controller->gertUser($_GET['id']);
    }else{
        echo "nothing happing";
    }
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Update</title>
    </head>
    <body>

    <?php if(isset($user) && !($_SERVER['REQUEST_METHOD']=='POST')):?>
        <form action="" method="POST">
                <input value="<?php echo $_GET['id']?>" type="text" name="id" hidden/>
                <label for='name'>Name</label>
                <input name="name" value="<?php echo $user['name']; ?>" type="text" />
                <label for="email">Email</label>
                <input name="email" value="<?php echo $user['email']; ?>" type="email" />
            <button type="submit">Update</button>
        </form>
    <?php else: ?>

     <?php endif; ?>   
    </body>
    </html>
