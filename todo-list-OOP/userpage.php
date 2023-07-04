<?php
session_start();
include_once('partials/menu.php');
$conn = require_once('config/connection.php');
$id=$_SESSION['id'];
$data=$conn->getById('user',$id);
$rows = $conn->getData('task', 'start_date', "user_id=$id");
// print_r($rows);
// die();
?>

<body>
    <!-- menu section starts -->
    <div class="menu text-center">
        <div class="wrapper">
            <a href="index.php" class="home-icon">
                <i class="fas fa-home"></i>
            </a>
        </div>
    </div>
    <!-- menu section ends -->

    <!-- show data by the start time of each -->

    <div class="main-content">
        <div class="wrapper">
            <h1>Welcome <?=$data['name']?> ❤️</h1>
            <br>
            <br>
            <a href="add_task.php?user_id=<?=$id?>" class="btn btn-primary">Add Task</a>
            <br>
            <br>
            <h2><u>My tasks:</u></h2>
            <br>
            <?php
            // done | not started | in progress | time_out
            foreach ($rows as $row) {
                ?>
                <div class="task">
                    <table>
                        <tr>
                            <td>
                                <input type="checkbox" id="<?= $row['name'] ?>" <?php
                                if ($row['status'] == 'done')
                                    echo 'checked' ?>>
                                </td>
                                <td>
                                    <label for="<?= $row['name'] ?>" class="<?php if ($row['status'] == 'done')
                                        echo 'deleted-text';
                                    else if ($row['status'] == 'not started')
                                        echo 'not-started';
                                    else if ($row['status'] == 'time out')
                                        echo 'time-out';
                                    ?>"> <?= $row['name'] ?></label>
                            </td>
                            <td><a href="delete.php?user_id=<?=$row['user_id']?>&id=<?=$row['id']?>" class="btn btn-danger">Delete</a>
                                <a href="update.php?user_id=<?=$row['user_id']?>&id=<?=$row['id']?>" class="btn btn-primary">Update</a>
                            </td>
                        </tr>
                    </table>




                    <br>
                </div>
                <?php
            }
            ?>
        </div>
    </div>

    <?php
    include_once('partials/footer.php');
    ?>