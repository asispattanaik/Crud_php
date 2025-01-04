<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
header("Access-Control-Allow-Headers: Content-Type, Authorization");

require_once '../config/Database.php';
require_once '../models/User.php';

// Initialize database and user model
$database = new Database();
$db = $database->connect();
$user = new User($db);

// Get the HTTP method
$method = $_SERVER['REQUEST_METHOD'];
$data = json_decode(file_get_contents("php://input"), true);

switch ($method) {
    case 'POST':
        // Create a new user
        $name = $data['name'] ?? null;
        $email = $data['email'] ?? null;

        if ($name && $email) {
            if ($user->create($name, $email)) {
                echo json_encode(["message" => "User created successfully."]);
            } else {
                echo json_encode(["message" => "Failed to create user."]);
            }
        } else {
            echo json_encode(["message" => "Invalid input."]);
        }
        break;

    case 'GET':
        // Read user(s)
        if (isset($_GET['id'])) {
            $result = $user->readById($_GET['id']);
        } else {
            $result = $user->readAll();
        }

        echo json_encode($result);
        break;

    case 'PUT':
        // Update a user
        $id = $data['id'] ?? null;
        $name = $data['name'] ?? null;
        $email = $data['email'] ?? null;

        if ($id && $name && $email) {
            if ($user->update($id, $name, $email)) {
                echo json_encode(["message" => "User updated successfully."]);
            } else {
                echo json_encode(["message" => "Failed to update user."]);
            }
        } else {
            echo json_encode(["message" => "Invalid input."]);
        }
        break;

    case 'DELETE':
        // Delete a user
        $id = $data['id'] ?? null;

        if ($id) {
            if ($user->delete($id)) {
                echo json_encode(["message" => "User deleted successfully."]);
            } else {
                echo json_encode(["message" => "Failed to delete user."]);
            }
        } else {
            echo json_encode(["message" => "Invalid input."]);
        }
        break;

    default:
        echo json_encode(["message" => "Method not supported."]);
        break;
}
?>
