<?php
namespace Models;

use App\Model;

class Category extends Model
{
    public function getAll()
    {
        $this->db->query('SELECT * FROM categories ORDER BY display_order ASC, name ASC');
        return $this->db->resultSet();
    }

    public function getAllActive()
    {
        $this->db->query('SELECT * FROM categories WHERE is_active = 1 ORDER BY display_order ASC, name ASC');
        return $this->db->resultSet();
    }

    public function findById($id)
    {
        $this->db->query('SELECT * FROM categories WHERE id = :id');
        $this->db->bind(':id', $id);
        return $this->db->single();
    }

    public function create($data)
    {
        $this->db->query('INSERT INTO categories (name, description, image, display_order, is_active) VALUES (:name, :description, :image, :display_order, :is_active)');
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':description', $data['description']);
        $this->db->bind(':image', $data['image'] ?? null);
        $this->db->bind(':display_order', $data['display_order'] ?? 0);
        $this->db->bind(':is_active', $data['is_active'] ?? true);
        return $this->db->execute();
    }

    public function update($id, $data)
    {
        $this->db->query('UPDATE categories SET name = :name, description = :description, image = :image, display_order = :display_order, is_active = :is_active WHERE id = :id');
        $this->db->bind(':id', $id);
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':description', $data['description']);
        $this->db->bind(':image', $data['image'] ?? null);
        $this->db->bind(':display_order', $data['display_order'] ?? 0);
        $this->db->bind(':is_active', $data['is_active'] ?? true);
        return $this->db->execute();
    }

    public function delete($id)
    {
        $this->db->query('DELETE FROM categories WHERE id = :id');
        $this->db->bind(':id', $id);
        return $this->db->execute();
    }
}
