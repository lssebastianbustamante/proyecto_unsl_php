<?php
require_once('db_task.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $title = $_GET['title'];
    $query = "DELETE FROM task WHERE id = $id"; //Realiza la consulta por ID
    $result = mysqli_query($conn, $query); // Envia la consulta a la base de datos
    if (!$result) {
        die('Query Failed');
    }
    $row = mysqli_fetch_array($result);
    $title = $row['title'];

    $_SESSION['message'] = 'Delete';
    $_SESSION['message_type'] = 'danger';

    header('Location: index.php');
}

?>