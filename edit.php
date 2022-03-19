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

// Fetch the user data by ID 
if (!empty($_GET['id'])) {
    $conditons = array(
        'where' => array(
            'id' => $_GET['id']
        ),
        'return_type' => 'single'
    );
    $userData = $db->getRows('users', $conditons);
}

// Fetch the post data by ID & join category
///donot forget to  add join to category
if (!empty($_GET['P_id'])) {
    $conditons = array(
        'where' => array(
            'id' => $_GET['P_id']
        ),
        'return_type' => 'single'
    );
    $postData = $db->getRows('posters', $conditons);
}

// Redirect to list page if invalid request submitted 
if (empty($userData || $postData)) {
    header("Location: index.php");
    exit;
}

// Get submitted form data  
$sendData = array();
if (!empty($sessData['sendData'])) {
    $sendData = $sessData['sendData'];
    unset($_SESSION['sendData']);
}
?>
<!-- edit users -->
<div class="row">
    <div class="col-md-12 head">
        <h5>Edit User</h5>

        <!-- Back link -->
        <div class="float-right">
            <a href="index.php" class="btn btn-success"><i class="back"></i> Back</a>
        </div>
    </div>

    <!-- Status message -->
    <?php if (!empty($statusMsg)) { ?>
        <div class="alert alert-<?php echo $status; ?>"><?php echo $statusMsg; ?></div>
    <?php } ?>

    <div class="col-md-12">
        <form method="post" action="action.php" class="form">
            <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" name="name" value="<?php echo !empty($sendData['name']) ? $sendData['name'] : $userData['name']; ?>" required="">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" name="email" value="<?php echo !empty($sendData['email']) ? $sendData['email'] : $userData['email']; ?>" required="">
            </div>
            <div class="form-group">
                <label>Phone</label>
                <input type="text" class="form-control" name="phone" value="<?php echo !empty($sendData['phone']) ? $sendData['phone'] : $userData['phone']; ?>" required="">
            </div>
            <input type="hidden" name="id" value="<?php echo $userData['id']; ?>" />
            <input type="hidden" name="action_type" value="edit" />
            <input type="submit" class="form-control btn-primary" name="submit" value="Update User" />
        </form>
    </div>
</div>
<!-- edit posts  -->
<div class="row">
    <div class="col-md-12 head">
        <h5>Edit Post</h5>

        <!-- Back link -->
        <div class="float-right">
            <a href="index.php" class="btn btn-success"><i class="back"></i> Back</a>
        </div>
    </div>

    <!-- Status message -->
    <?php if (!empty($statusMsg)) { ?>
        <div class="alert alert-<?php echo $status; ?>"><?php echo $statusMsg; ?></div>
    <?php } ?>

    <div class="col-md-12">
        <form method="post" action="action.php" class="form">
            <!-- selection code -->
            <div class="form-group">
                <label>Department</label>
                <input type="text" class="form-control" name="name" value="<?php echo !empty($sendData['department']) ? $sendData['department'] : $postData['department']; ?>" required="">
            </div>
            <!-- selection code -->

            <div class="form-group">
                <label>Subject</label>
                <input type="subject" class="form-control" name="subject" value="<?php echo !empty($sendData['subject']) ? $sendData['subject'] : $postData['subject']; ?>" required="">
            </div>
            <div class="form-group">
                <label>Post</label>
                <input type="textarea" class="form-control" name="post" value="<?php echo !empty($sendData['post']) ? $sendData['post'] : $postData['post']; ?>" required="">
            </div>
            <input type="hidden" name="p_id" value="<?php echo $postData['p_id']; ?>" />
            <input type="hidden" name="action_type" value="edit" />
            <input type="submit" class="form-control btn-primary" name="submit" value="Update POST" />
        </form>
    </div>
</div>