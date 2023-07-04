<?php
require_once('config/config.php');
$GLOBALS['conn'] = require_once('config/connection.php');
function submit($data, $tablename, $type)
{
    foreach ($_SESSION["$tablename"] as $key => $value) {
        if (!isset($data["$key"])) {
            $data["$key"] = $value;
        }

        if ($key == 'name' || $key == 'user_name' || $key == 'status') {
            $data["$key"] = string_validation($GLOBALS['conn']->mysqli, $data["$key"], $key);
        } else if ($key == 'start_date' || $key == 'end_date') {
            date_vallidation($data["$key"]);
        } else if ($key == 'id' || $key == 'user_id' || $key == 'deleted_tasks') {
            $data["$key"] = number_validation($GLOBALS['conn']->mysqli, $data["$key"], $key);
        } else if ($key == 'password') {
            $data["$key"] = password_validation($GLOBALS['conn']->mysqli, $data["$key"]);
            $data["$key"] = md5($data["$key"]);
        }
    }
    if (!isset($_SESSION['name']) && !isset($_SESSION['user_name']) && !isset($_SESSION['password'])) {
        if ($GLOBALS['conn'] instanceof Connection) {
            if ($type == 'add') {
                if ($tablename == 'user') {
                    $GLOBALS['conn']->adduser($data);
                } else {
                    $GLOBALS['conn']->addTask($data);
                }
            } else if ($type == 'update') {
                if ($tablename == 'user') {
                    $GLOBALS['conn']->updateUser($data);
                } else {
                    $GLOBALS['conn']->updateTask($data);
                }
            }
        } else {
            $message = "Error in the connection with database, try to call the admin of the page!!";
            Message('error', $message, 'database');
        }
    } else {
        header('location' . SITEURL . 'register.php');
    }

}
?>