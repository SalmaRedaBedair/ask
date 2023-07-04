<?php
session_start();
include_once('partials/menu.php');
$conn = require_once('config/connection.php');
// echo $_SESSION['id'];
// die();
?>

<body>
    <!-- menu section starts -->
    <div class="menu text-center">
        <div class="wrapper">
            <a href="userpage.php?id=<?=$_SESSION['id']?>" class="home-icon">
                <i class="fas fa-user"></i>
            </a>
        </div>
    </div>
    <!-- menu section ends -->

    <div class="main-contet">
        <div class="wrapper">

            <h1>Dashboard</h1>
            <br>
            <br>
            <?php
            $data = $conn->getData('user', 'id');
            foreach ($data as $key => $value) {
                $name = $value['name'];
                $deleted_tasks = $value['deleted_tasks'];
                $id=$value['id'];
                $numberOfTasks=$conn->numberOfTasks("user_id=$id");
                $addedTasks=$numberOfTasks;
                $doneTasks=$conn->numberOfTasks("user_id=$id AND status='done'");
                $notdone=$numberOfTasks-$doneTasks;
                ?>
                <div>
                    <h2 class="text-center link"><?=$name?></h2>
                    <div class="col-4 text-center">
                        <h2><?=$addedTasks?></h2>
                        <br />
                        Added Tasks
                    </div>
                    <div class="col-4 text-center">
                        <h2><?=$deleted_tasks?></h2>
                        <br />
                        Deleted Tasks
                    </div>
                    <div class="col-4 text-center">
                        <h2><?=$doneTasks?></h2>
                        <br />
                        Done Tasks
                    </div>
                    <div class="col-4 text-center">
                        <h2><?=$notdone?></h2>
                        <br />
                        Not done yet
                    </div>
                    <div class="clearfix"></div>
                </div>
                <?php
            }
            ?>


        </div>
    </div>

    <?php
    include_once('partials/footer.php');
    ?>