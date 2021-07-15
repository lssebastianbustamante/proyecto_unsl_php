<?php require_once('db_task.php') ?>

<?php require_once('includes/header.php') ?>
<?php require_once('includes/navbar.php') ?>    

<div class="container p-4">
  <div class="row">
  <div class="col-md-4">
        <?php if(isset($_SESSION['message'])) {?> 
            
            <div class="alert alert-<?= $_SESSION['message_type'] ?> alert-dismissible fade show" role="alert">
                <?= $_SESSION['message'] ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            
            
        <?php session_unset(); } ?>
        
        <div class="card card-body">
            <form action="save_task.php" method="POST" class="d-grid">
                <div class="form-group p-4">
                    <input type="text" name="title" class="form-control" placeholder="Title">
                </div>
                <div class="form-group p-4">
                    <textarea name="description" rows="2" class="form-control" placeholder="Descritpion"></textarea>
                </div>
                <input type="submit" class="btn btn-success p-4" name="save_task" value="Save Task">
            </form>
        </div>
    </div>
    <div class="col-md-8">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Descritpion</th>
                    <th>Created At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                
                    $query = 'SELECT * FROM task';
                    $result_tasks = mysqli_query($conn, $query);

                    while($row = mysqli_fetch_array($result_tasks)) { ?>

                        <tr>
                            <td><?php echo $row['title'] ?></td>
                            <td><?php echo $row['description'] ?></td>
                            <td><?php echo $row['created_at'] ?></td>
                            <td>
                                <a href="edit_task.php?id=<?php echo $row['id'] ?>" class="btn btn-warning">Edit</a>
                                
                                <a href="delete_task.php?id=<?php echo $row['id'] ?>" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>

                   <?php } ?>
            </tbody>
        </table>
    </div>
  </div>
</div>

<?php require_once('includes/footer.php') ?>

    