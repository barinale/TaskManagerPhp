<?php
    session_start();
    if(!isset($_SESSION['name'])){
        header("Location: ./index.php");
        exit();
    }
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboad</title>
</head>
<body>
    <?php if(isset($_GET['message'])): ?>
        <h1><?php echo $_GET['message'] ?></h1>
     <?php endif; ?>   
    <div>
            <div>
                <h1>Users</h1>
                <table border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
            <?php 
            include_once('./Controller/UserController.php');
            $userCon = new UserController();
            $result = $userCon->getUsers();
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>".$row["id"]."</td>
                        <td>".$row["name"]."</td>
                        <td>".$row["email"]."</td>
                        <td><a href='./UserHand.php?id=".$row["id"]."&action=update'>Update</a></td>
                </tr>";
            }
            ?>
                <!-- <tr>
                    <td>1</td>
                    <td>John Doe</td>
                    <td>Administrator</td>
                </tr>
                -->
                <!-- Add more rows as needed -->
                </tbody>
            </table>
            </div>

            <div>
                <h1>Task</h1>
                <table b order="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>task</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include_once('./Controller/TaskController.php');
            $task = new TaskController();
            $res = $task->getTask();
            while($row = $res->fetch_assoc()) {
                echo "<tr>
                        <td id='id'>".$row["id"]."</td>
                        <td id='inputTask'>".$row["taskName"]."</td>
                        <td><button class='ButtonTask'>Update</button></td>
                </tr>";
            }
                ?>
            </tbody>
            </div>

    </div>
    <br/>
    <form action="./UserHand.php" method="POST">
    
        <label for="id">id</label>
        <label for="name">Name</label>    
        <input type="text" name="name"/>
        <label for="email">Email</label>
        <input tpye="email" name="email"/>
        <input name="method" value="AddUser" hidden="true"/>
        <button>Add New Users</button>
    </form>
    </br>
    <form action="./TaskHand.php" method="POST">
    
        <label for="name">Task</label>    
        <input type="text" name="name"/>
        <input name="method" value="AddTask" hidden="true"/>
        <button>Add New Task</button>
</form>
    </br>

    <form method="POST" action="logout.php">
        <button type="submit">Log Out</button>
    </form>
    <script src="UpdateTask.js"></script>

</body>
</html>