<?php
// Start session 
session_start();

// Include and initialize DB class 
require_once 'DB.class.php';
$db = new DB();

// Database table name 
$tblName = 'users';

$sendData = $statusMsg = $valErr = '';
$status = 'danger';
$redirectURL = 'dashboard.php';

// If Add request is submitted 
if (!empty($_REQUEST['action_type']) && $_REQUEST['action_type'] == 'add') {
    $redirectURL = 'add.php';

    // Get user's input 
    $sendData = $_POST;
    $name = !empty($_POST['name']) ? trim($_POST['name']) : '';
    $email = !empty($_POST['email']) ? trim($_POST['email']) : '';
    $phone = !empty($_POST['phone']) ? trim($_POST['phone']) : '';

    // Validate form fields 
    if (empty($name)) {
        $valErr .= 'Please enter your name.<br/>';
    }
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $valErr .= 'Please enter a valid email.<br/>';
    }
    if (empty($phone)) {
        $valErr .= 'Please enter your phone no.<br/>';
    }

    // Check whether user inputs are empty 
    if (empty($valErr)) {
        // Insert data into the database 
        $userData = array(
            'name' => $name,
            'email' => $email,
            'phone' => $phone
        );
        $insert = $db->insert($tblName, $userData);

        if ($insert) {
            $status = 'success';
            $statusMsg = 'User data has been added successfully!';
            $sendData = '';

            $redirectURL = 'dashboard.php';
        } else {
            $statusMsg = 'Something went wrong, please try again after some time.';
        }
    } else {
        $statusMsg = '<p>Please fill all the mandatory fields:</p>' . trim($valErr, '<br/>');
    }

    // Store status into the SESSION 
    $sessData['sendData'] = $sendData;
    $sessData['status']['type'] = $status;
    $sessData['status']['msg'] = $statusMsg;
    $_SESSION['sessData'] = $sessData;
} elseif (!empty($_REQUEST['action_type']) && $_REQUEST['action_type'] == 'edit' && !empty($_POST['id'])) { // If Edit request is submitted 
    $redirectURL = 'edit.php?id=' . $_POST['id'];

    // Get user's input 
    $sendData = $_POST;
    $name = !empty($_POST['name']) ? trim($_POST['name']) : '';
    $email = !empty($_POST['email']) ? trim($_POST['email']) : '';
    $phone = !empty($_POST['phone']) ? trim($_POST['phone']) : '';
    // Get post's input 
    $department = !empty($_POST['department']) ? trim($_POST['department']) : '';
    $subject = !empty($_POST['subject']) ? trim($_POST['subject']) : '';
    $post = !empty($_POST['post']) ? trim($_POST['post']) : '';
// make a function  to do this in future 
//if(empty(aray($i)))foreach('please enter yout ' .$i)
    // Validate form fields 
    if (empty($name)) {
        $valErr .= 'Please enter your name.<br/>';
    }
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $valErr .= 'Please enter a valid email.<br/>';
    }
    if (empty($phone)) {
        $valErr .= 'Please enter your phone no.<br/>';
    }
    if (empty($department)) {
        $valErr .= 'Please enter your department.<br/>';
    }
    if (empty($subject) ) {
        $valErr .= 'Please enter a valid subject.<br/>';
    }
    if (empty($post)) {
        $valErr .= 'Please enter your post .<br/>';
    }

    // Check whether user inputs are empty 
    if (empty($valErr)) {
        // Update data in the database 
        $userData = array(
            'name' => $name,
            'email' => $email,
            'phone' => $phone
        );
        $conditions = array('id' => $_POST['id']);
        $update = $db->update($tblName, $userData, $conditions);

        if ($update) {
            $status = 'success';
            $statusMsg = $tblName. 'data has been updated successfully!';
            $sendData = '';

            $redirectURL = 'dashboard.php';
        } else {
            $statusMsg = 'Something went wrong, please try again after some time.';
        }
    } else {
        $statusMsg = '<p>Please fill all the mandatory fields:</p>' . trim($valErr, '<br/>');
    }

    // Store status into the SESSION 
    $sessData['sendData'] = $sendData;
    $sessData['status']['type'] = $status;
    $sessData['status']['msg'] = $statusMsg;
    $_SESSION['sessData'] = $sessData;
} elseif (!empty($_REQUEST['action_type']) && $_REQUEST['action_type'] == 'delete' && !empty($_GET['id'])) { // If Delete request is submitted 
    // Delete data from the database 
    $conditions = array('id' => $_GET['id']);
    $delete = $db->delete($tblName, $conditions);

    if ($delete) {
        $status = 'success';
        $statusMsg = $tblName. ' data has been deleted successfully!';
    } else {
        $statusMsg = 'Something went wrong, please try again after some time.';
    }

    // Store status into the SESSION 
    $sessData['status']['type'] = $status;
    $sessData['status']['msg'] = $statusMsg;
    $_SESSION['sessData'] = $sessData;
}

// Redirect to the home/add/edit page 
header("Location: $redirectURL");
exit;
