<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo App</title>
    <link rel="stylesheet" href="/css/mainpage.css">
</head>
<body>
    <!-- Header Section -->
    <div class="header1">
        <img src="/images/PTA_logo.jpeg" alt="logo">
    </div>
    <div>
        <h1>
            Welcome 
            <?php $n=''; 
            foreach($dis as $d)
            {
                $n=$d['Email'];
            } 
            echo $n; ?>
        </h1>
    <!-- Creating a table to display the added and updated tasks -->
                <table>
                    <th>Task</th>
                    <th>Delete</th>
                    <th>Update</th>
                    <?php foreach($dis as $d){ ?>
                    <tr>
                        <td><?php echo $d['Task'] ?></td>
                        <td>
                            <form method="post" action="/Delete/create">
                                <div>
                                    <input type="hidden" name="Task_no" value="<?php echo $d['Task_no'] ?>">
                                    <input type="submit" name="deleteTask" value="Delete">
                                </div>
                            </form>
                        </td>
                        <td>
                            <form method="post" action="/Update/index">
                                <div>
                                    <input type="hidden" name="Task_no" value="<?php echo $d['Task_no'] ?>">
                                    <input type="hidden" name="Task" value="<?php echo $d['Task'] ?>">
                                    <input type="submit" name="updateTask" value="Update">
                                </div>
                            </form>
                        </td>
                    </tr>
                
                    <?php }
                    ?>
                </table>
        <form method="post" action="/Add/index">
            <div>
                <input type="submit" name="addTask" value="Add Task">
            </div>
        </form>


        <form method="post" action="/Home/index">
            <div>
                <input type="submit" value="Log Out">
            </div>
        </form>
    </div>
</body>
</html>