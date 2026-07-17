<?php
namespace Models;

use App\Model;

class Booking extends Model
{
    public function create($data)
    {
        $this->db->query('INSERT INTO bookings (user_id, event_type, event_date, guest_count, venue, special_requests, status) VALUES (:user_id, :event_type, :event_date, :guest_count, :venue, :special_requests, :status)');
        $this->db->bind(':user_id', $data['user_id']);
        $this->db->bind(':event_type', $data['event_type']);
        $this->db->bind(':event_date', $data['event_date']);
        $this->db->bind(':guest_count', $data['guest_count']);
        $this->db->bind(':venue', $data['venue']);
        $this->db->bind(':special_requests', $data['special_requests']);
        $this->db->bind(':status', 'pending');
        return $this->db->execute();
    }

    public function getByUserId($userId)
    {
        $this->db->query('SELECT * FROM bookings WHERE user_id = :user_id ORDER BY created_at DESC');
        $this->db->bind(':user_id', $userId);
        return $this->db->resultSet();
    }

    public function getAll()
    {
        $this->db->query('SELECT b.*, u.name as user_name FROM bookings b JOIN users u ON b.user_id = u.id ORDER BY b.created_at DESC');
        return $this->db->resultSet();
    }

    public function findById($id)
    {
        $this->db->query('SELECT b.*, u.name as user_name, u.email, u.phone FROM bookings b JOIN users u ON b.user_id = u.id WHERE b.id = :id');
        $this->db->bind(':id', $id);
        return $this->db->single();
    }

    public function updateStatus($id, $status)
    {
        $this->db->query('UPDATE bookings SET status = :status WHERE id = :id');
        $this->db->bind(':id', $id);
        $this->db->bind(':status', $status);
        return $this->db->execute();
    }

    public function getTotalBookings()
    {
        $this->db->query('SELECT COUNT(*) as total FROM bookings');
        return $this->db->single()->total;
    }
}
