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

// Get submitted form data  
$sendData = array();
if (!empty($sessData['sendData'])) {
    $sendData = $sessData['sendData'];
    unset($_SESSION['sendData']);
}
?>
<!-- add user -->
<div class="row">
    <div class="col-md-12 head">
        <h5>Add User</h5>

        <!-- Back link -->
        <div class="float-right">
            <a href="dashboard.php" class="btn btn-success"><i class="back"></i> Back</a>
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
                <input type="text" class="form-control" name="name" value="<?php echo !empty($sendData['name']) ? $sendData['name'] : ''; ?>" required="">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" name="email" value="<?php echo !empty($sendData['email']) ? $sendData['email'] : ''; ?>" required="">
            </div>
            <div class="form-group">
                <label>Phone</label>
                <input type="text" class="form-control" name="phone" value="<?php echo !empty($sendData['phone']) ? $sendData['phone'] : ''; ?>" required="">
            </div>
            <input type="hidden" name="action_type" value="add" />
            <input type="submit" class="form-control btn-primary" name="submit" value="Add User" />
        </form>
    </div>
</div>

<!-- add post -->

<div class="row">
    <div class="col-md-12 head">
        <h5>Add Post</h5>



        <!-- Status message -->
        <?php if (!empty($statusMsg)) { ?>
            <div class="alert alert-<?php echo $status; ?>"><?php echo $statusMsg; ?></div>
        <?php } ?>

        <div class="col-md-12">
            <form method="post" action="action.php" class="form">
                <div class="form-group">
                    <!-- selection code -->
                    <label>Department</label>
                    <select type="" class="form-control" name="name" value="<?php echo !empty($sendData['department']) ? $sendData['department'] : ''; ?>" required="">
                        <option></option>
                    </select>
                        <!-- selection code -->
                </div>
                <br>
                <div class="form-group">
                    <label>subject</label>
                    <input type="text" class="form-control" name="subject" value="<?php echo !empty($sendData['subject']) ? $sendData['subject'] : ''; ?>" required="">
                </div>
                <br>
                <div class="form-group">
                    <label>Post</label>
                    <input type="text" class="form-control" name="post" value="<?php echo !empty($sendData['post']) ? $sendData['post'] : ''; ?>" required="">
                </div>
                <input type="hidden" name="action_type" value="add" />
                <input type="submit" class="form-control btn-primary" name="submit" value="Add User" />
            </form>
        </div>
    </div>