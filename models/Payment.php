<?php
namespace Models;

use App\Model;

class Payment extends Model
{
    public function create($data)
    {
        $this->db->query('INSERT INTO payments (order_id, booking_id, amount, payment_method, transaction_id, status) VALUES (:order_id, :booking_id, :amount, :payment_method, :transaction_id, :status)');
        $this->db->bind(':order_id', $data['order_id'] ?? null);
        $this->db->bind(':booking_id', $data['booking_id'] ?? null);
        $this->db->bind(':amount', $data['amount']);
        $this->db->bind(':payment_method', $data['payment_method']);
        $this->db->bind(':transaction_id', $data['transaction_id']);
        $this->db->bind(':status', $data['status']);
        return $this->db->execute();
    }

    public function getAll()
    {
        $this->db->query('SELECT * FROM payments ORDER BY created_at DESC');
        return $this->db->resultSet();
    }
}
