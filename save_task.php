<?php

require_once('db_task.php');

if (isset($_POST['save_task'])){
    $title = $_POST['title'];
    $description = $_POST['description'];

    $query = "INSERT INTO task(title, description) VALUE ('$title', '$description')";
    $result = mysqli_query($conn, $query);
    if (!$result) {
        die('Query Failed');
    }

    $_SESSION['message'] = 'Task Saved';
    $_SESSION['message_type'] = 'success';

    header('Location: index.php');
}

?>