<?php
namespace Models;

use App\Model;

class Order extends Model
{
    public function create($data)
    {
        $this->db->query('INSERT INTO orders (user_id, total_amount, status, delivery_address, delivery_date) VALUES (:user_id, :total_amount, :status, :delivery_address, :delivery_date)');
        $this->db->bind(':user_id', $data['user_id']);
        $this->db->bind(':total_amount', $data['total_amount']);
        $this->db->bind(':status', 'pending');
        $this->db->bind(':delivery_address', $data['delivery_address']);
        $this->db->bind(':delivery_date', $data['delivery_date']);
        
        if ($this->db->execute()) {
            return $this->db->lastInsertId();
        }
        return false;
    }

    public function addItem($orderId, $foodId, $quantity, $price)
    {
        $this->db->query('INSERT INTO order_items (order_id, food_id, quantity, price) VALUES (:order_id, :food_id, :quantity, :price)');
        $this->db->bind(':order_id', $orderId);
        $this->db->bind(':food_id', $foodId);
        $this->db->bind(':quantity', $quantity);
        $this->db->bind(':price', $price);
        return $this->db->execute();
    }

    public function getByUserId($userId)
    {
        $this->db->query('SELECT * FROM orders WHERE user_id = :user_id ORDER BY created_at DESC');
        $this->db->bind(':user_id', $userId);
        return $this->db->resultSet();
    }

    public function getAll()
    {
        $this->db->query('SELECT o.*, u.name as user_name FROM orders o JOIN users u ON o.user_id = u.id ORDER BY o.created_at DESC');
        return $this->db->resultSet();
    }

    public function findById($id)
    {
        $this->db->query('SELECT o.*, u.name as user_name, u.email, u.phone FROM orders o JOIN users u ON o.user_id = u.id WHERE o.id = :id');
        $this->db->bind(':id', $id);
        return $this->db->single();
    }

    public function getOrderItems($orderId)
    {
        $this->db->query('SELECT oi.*, f.name FROM order_items oi JOIN foods f ON oi.food_id = f.id WHERE oi.order_id = :order_id');
        $this->db->bind(':order_id', $orderId);
        return $this->db->resultSet();
    }

    public function updateStatus($id, $status)
    {
        $this->db->query('UPDATE orders SET status = :status WHERE id = :id');
        $this->db->bind(':id', $id);
        $this->db->bind(':status', $status);
        return $this->db->execute();
    }

    public function getTotalOrders()
    {
        $this->db->query('SELECT COUNT(*) as total FROM orders');
        return $this->db->single()->total;
    }

    public function getTotalRevenue()
    {
        $this->db->query('SELECT SUM(total_amount) as total FROM orders WHERE status = "completed"');
        return $this->db->single()->total ?: 0;
    }
}
