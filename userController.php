<?php
require_once 'Database.php';
require_once 'User.php';

// create Database and User objects
$database = new Database();
$db = $database->connect();
$user = new User($db);

// CREATE Operation
if (isset($_POST['create'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    if ($user->create($name, $email)) {
        echo "User created successfully.";
    }
}

// READ Operation
if (isset($_GET['readAll'])) {
    $users = $user->readAll();
    echo "<pre>";
    print_r($users);
    echo "</pre>";
}

// READ BY ID
if (isset($_GET['id'])) {
    $userData = $user->readById($_GET['id']);
    echo "<pre>";
    print_r($userData);
    echo "</pre>";
}

// UPDATE Operation
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    if ($user->update($id, $name, $email)) {
        echo "User updated successfully.";
        header('location:index.php');
    }
}

// DELETE Operation
if (isset($_POST['delete'])) {
    $id = $_POST['id'];
    if ($user->delete($id)) {
        echo "User deleted successfully.";
        header('location:index.php');
    }
}
?>
