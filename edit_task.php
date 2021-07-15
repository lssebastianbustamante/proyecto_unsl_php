<?php
require_once('db_task.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM task WHERE id = $id";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $title = $row['title'];
        $description = $row['description'];
    }
}

if(isset($_POST['update'])) {
    $id = $_GET['id'];
    $title = $_POST['title'];
    $description = $_POST['description'];

    $query = "UPDATE task set title = '$title', description = '$description' WHERE id = $id";
    mysqli_query($conn, $query);

    $_SESSION['message'] = 'Edit';
    $_SESSION['message_type'] = 'warning';

    header('Location: index.php');
}

?>

<?php require_once('includes/header.php') ?>

<div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card">
                <div class="card-body">
                    <form action="edit_task.php?id=<?php echo $_GET['id']; ?>" method="POST" class="d-grid">
                        <div class="form-group p-4">
                            <input type="text" name="title" value="<?php echo $title; ?>" class="form-control" placeholder="Edit">
                        </div>
                        <div class="form-group p-4">
                            <textarea name="description" rows="2" placeholder="edit" class="form-control"><?php echo $description ?></textarea>
                        </div>
                        <button class="btn btn-success" name="update">
                            Edit
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once('includes/footer.php') ?>