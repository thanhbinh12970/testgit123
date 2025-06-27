<?php
namespace App\Models;

use mysqli;

class Client
{
    private $connection;

    public function __construct(mysqli $connection)
    {
        $this->connection = $connection;
    }

    // Thêm khách hàng mới
    public function addClient($name, $email, $phone, $address)
    {
        $stmt = $this->connection->prepare("INSERT INTO clients (name, email, phone, address) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $name, $email, $phone, $address);

        return $stmt->execute();
    }

    // Lấy thông tin khách hàng theo ID
    public function getClientById($id)
    {
        $stmt = $this->connection->prepare("SELECT * FROM clients WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    // Cập nhật thông tin khách hàng
    public function updateClient($id, $name, $email, $phone, $address)
    {
        $stmt = $this->connection->prepare("UPDATE clients SET name=?, email=?, phone=?, address=? WHERE id=?");
        $stmt->bind_param("ssssi", $name, $email, $phone, $address, $id);

        return $stmt->execute();
    }

    // Xóa khách hàng
    public function deleteClient($id)
    {
        $stmt = $this->connection->prepare("DELETE FROM clients WHERE id = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}
?>
