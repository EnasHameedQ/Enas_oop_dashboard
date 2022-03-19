<?php
// Start session 
session_start();

// Get data from session 
$sessData = !empty($_SESSION['sessData']) ? $_SESSION['sessData'] : '';

// Get status from session 
if (!empty($sessData['status']['msg'])) {
    $statusMsg = $sessData['status']['msg'];
    $status = $sessData['status']['type'];
    unset($_SESSION['sessData']['status']);
}

// Include and initialize DB class 
require_once 'DB.class.php';
$db = new DB();

// Fetch the users data 
$users = $db->getRows('users', array('order_by' => 'id DESC'));
                // Fetch the users data 
$posts = $db->getRows('posters', array('order_by' => 'P_id DESC'));

// Retrieve status message from session 
if (!empty($_SESSION['statusMsg'])) {
    echo '<p>' . $_SESSION['statusMsg'] . '</p>';
    unset($_SESSION['statusMsg']);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <div class="row">
        <div class="col-md-12 head">
            <h5>Users</h5>
            <!-- Add link -->
            <div class="float-right">
                <a href="add.php" class="btn btn-success"><i class="plus"></i> New User</a>
            </div>
        </div>

        <!-- Status message -->
        <?php if (!empty($statusMsg)) { ?>
            <div class="alert alert-<?php echo $status; ?>"><?php echo $statusMsg; ?></div>
        <?php } ?>

        <!-- List the users -->
        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Created</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($users)) {
                    $i = 0;
                    foreach ($users as $row) {
                        $i++; ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo $row['phone']; ?></td>
                            <td><?php echo $row['created']; ?></td>
                            <td>
                                <a href="edit.php?id=<?php echo $row['id']; ?>" class="btn btn-warning">edit</a>
                                <a href="action.php?action_type=delete&id=<?php echo $row['id']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure to delete data?');">delete</a>
                            </td>
                        </tr>
                    <?php }
                } else { ?>
                    <tr>
                        <td colspan="5">No user(s) found...</td>
                    </tr>
                <?php }  ?>
            </tbody>
        </table>
    </div>

    <!-- add posts section -->
    <div class="row">
        <div class="col-md-12 head">
            <h5>Posts</h5>
            <!-- Add link -->
            <div class="float-right">
                <a href="add.php" class="btn btn-success"><i class="plus"></i> New Post</a>
            </div>
        </div>

        <!-- Status message -->
        <?php if (!empty($statusMsg)) { ?>
            <div class="alert alert-<?php echo $status; ?>"><?php echo $statusMsg; ?></div>
        <?php } ?>

        <!-- List the posts -->
        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>#</th>
                    <th>Department</th>
                    <th>Subject</th>
                    <th>Post</th>
                    <th>Created</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($posts)) {
                    $i = 0;
                    foreach ($posts as $row) {
                        $i++; ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $row['department']; ?></td>
                            <td><?php echo $row['subject']; ?></td>
                            <td><?php echo $row['Post']; ?></td>
                            <td><?php echo $row['created']; ?></td>
                            <td>
                                <a href="edit.php?p_id=<?php echo $row['p_id']; ?>" class="btn btn-warning">edit</a>
                                <a href="action.php?action_type=delete&p_id=<?php echo $row['p_id']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure to delete data?');">delete</a>
                            </td>
                        </tr>
                    <?php }
                } else { ?>
                    <tr>
                        <td colspan="5">No post(s) found...</td>
                    </tr>
                <?php }  ?>
            </tbody>
        </table>
    </div>