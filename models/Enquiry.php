<?php
namespace Models;

use App\Model;

class Enquiry extends Model
{
    public function create($data)
    {
        $this->db->query('INSERT INTO enquiries (name, email, subject, message) VALUES (:name, :email, :subject, :message)');
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':subject', $data['subject']);
        $this->db->bind(':message', $data['message']);
        return $this->db->execute();
    }

    public function getAll()
    {
        $this->db->query('SELECT * FROM enquiries ORDER BY created_at DESC');
        return $this->db->resultSet();
    }

    public function resolve($id)
    {
        $this->db->query('UPDATE enquiries SET is_resolved = 1 WHERE id = :id');
        $this->db->bind(':id', $id);
        return $this->db->execute();
    }
}
