<?php
namespace Models;

use App\Model;

class Food extends Model
{
    public function getAll($page = 1, $perPage = 12)
    {
        $offset = ($page - 1) * $perPage;
        $this->db->query('SELECT f.*, c.name as category_name FROM foods f LEFT JOIN categories c ON f.category_id = c.id ORDER BY f.created_at DESC LIMIT :perPage OFFSET :offset');
        $this->db->bind(':perPage', $perPage);
        $this->db->bind(':offset', $offset);
        return $this->db->resultSet();
    }

    public function getTotal()
    {
        $this->db->query('SELECT COUNT(*) as total FROM foods');
        return $this->db->single()->total;
    }

    public function findById($id)
    {
        $this->db->query('SELECT f.*, c.name as category_name FROM foods f LEFT JOIN categories c ON f.category_id = c.id WHERE f.id = :id');
        $this->db->bind(':id', $id);
        return $this->db->single();
    }

    public function getByCategory($categoryId, $page = 1, $perPage = 12)
    {
        $offset = ($page - 1) * $perPage;
        $this->db->query('SELECT f.*, c.name as category_name FROM foods f LEFT JOIN categories c ON f.category_id = c.id WHERE f.category_id = :category_id ORDER BY f.created_at DESC LIMIT :perPage OFFSET :offset');
        $this->db->bind(':category_id', $categoryId);
        $this->db->bind(':perPage', $perPage);
        $this->db->bind(':offset', $offset);
        return $this->db->resultSet();
    }

    public function search($query, $page = 1, $perPage = 12)
    {
        $offset = ($page - 1) * $perPage;
        $this->db->query('SELECT f.*, c.name as category_name FROM foods f LEFT JOIN categories c ON f.category_id = c.id WHERE f.name LIKE :query OR f.description LIKE :query ORDER BY f.created_at DESC LIMIT :perPage OFFSET :offset');
        $this->db->bind(':query', "%$query%");
        $this->db->bind(':perPage', $perPage);
        $this->db->bind(':offset', $offset);
        return $this->db->resultSet();
    }

    public function create($data)
    {
        $this->db->query('INSERT INTO foods (name, description, price, image, category_id, is_available) VALUES (:name, :description, :price, :image, :category_id, :is_available)');
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':description', $data['description']);
        $this->db->bind(':price', $data['price']);
        $this->db->bind(':image', $data['image']);
        $this->db->bind(':category_id', $data['category_id']);
        $this->db->bind(':is_available', $data['is_available']);
        return $this->db->execute();
    }

    public function update($id, $data)
    {
        $this->db->query('UPDATE foods SET name = :name, description = :description, price = :price, image = :image, category_id = :category_id, is_available = :is_available WHERE id = :id');
        $this->db->bind(':id', $id);
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':description', $data['description']);
        $this->db->bind(':price', $data['price']);
        $this->db->bind(':image', $data['image']);
        $this->db->bind(':category_id', $data['category_id']);
        $this->db->bind(':is_available', $data['is_available']);
        return $this->db->execute();
    }

    public function delete($id)
    {
        $this->db->query('DELETE FROM foods WHERE id = :id');
        $this->db->bind(':id', $id);
        return $this->db->execute();
    }
}
