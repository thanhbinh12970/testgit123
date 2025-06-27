<?php
require_once '../config/Database.php';
require_once '../app/Models/Client.php';
require_once '../app/Controllers/ClientController.php';

use App\Models\Client;
use App\Controllers\ClientController;

$database = new Database();
$connection = $database->getConnection();

$clientModel = new Client($connection);
$clientController = new ClientController($clientModel);

// Xử lý các hành động
$action = $_GET['action'] ?? null;
$clientId = $_GET['id'] ?? null;
$errorMessage = '';
$successMessage = '';
$client = null;

if ($_SERVER['REQUEST_METHOD'] == 'POST' && $action == 'save') {
    // Lưu hoặc cập nhật khách hàng
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    if ($clientId) {
        $successMessage = $clientController->updateClient($clientId, $name, $email, $phone, $address);
    } else {
        $successMessage = $clientController->createClient($name, $email, $phone, $address);
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'GET' && $action == 'edit' && $clientId) {
    // Hiển thị khách hàng để chỉnh sửa
    $client = $clientController->getClientById($clientId);
}

if ($_SERVER['REQUEST_METHOD'] == 'GET' && $action == 'delete' && $clientId) {
    // Xóa khách hàng
    $successMessage = $clientController->deleteClient($clientId);
}

require '../app/Views/client_form.php';
?>
