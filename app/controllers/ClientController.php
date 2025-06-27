<?php
namespace App\Controllers;

use App\Models\Client;

class ClientController
{
    private $clientModel;

    public function __construct(Client $clientModel)
    {
        $this->clientModel = $clientModel;
    }

    // Thêm khách hàng mới
    public function createClient($name, $email, $phone, $address)
    {
        if (empty($name) || empty($email) || empty($phone) || empty($address)) {
            return "Tất cả các trường đều bắt buộc.";
        }

        if (!preg_match("/^[0-9]{10}$/", $phone)) {
            return "Số điện thoại không hợp lệ.";
        }

        if ($this->clientModel->addClient($name, $email, $phone, $address)) {
            return "Khách hàng đã được thêm thành công";
        } else {
            return "Lỗi truy vấn.";
        }
    }

    // Cập nhật khách hàng
    public function updateClient($id, $name, $email, $phone, $address)
    {
        if (empty($name) || empty($email) || empty($phone) || empty($address)) {
            return "Tất cả các trường đều bắt buộc.";
        }

        if (!preg_match("/^[0-9]{10}$/", $phone)) {
            return "Số điện thoại không hợp lệ.";
        }

        if ($this->clientModel->updateClient($id, $name, $email, $phone, $address)) {
            return "Khách hàng đã được cập nhật thành công.";
        } else {
            return "Lỗi truy vấn.";
        }
    }

    // Xóa khách hàng
    public function deleteClient($id)
    {
        if ($this->clientModel->deleteClient($id)) {
            return "Khách hàng đã được xóa thành công.";
        } else {
            return "Lỗi khi xóa khách hàng.";
        }
    }

    // Lấy thông tin khách hàng theo ID
    public function getClientById($id)
    {
        return $this->clientModel->getClientById($id);
    }
}
?>
