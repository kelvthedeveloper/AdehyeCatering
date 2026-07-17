<?php
namespace Models;

use App\Model;

class User extends Model
{
    public function register($data)
    {
        $this->db->query('INSERT INTO users (name, email, password, phone, address) VALUES (:name, :email, :password, :phone, :address)');
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':password', password_hash($data['password'], PASSWORD_DEFAULT));
        $this->db->bind(':phone', $data['phone']);
        $this->db->bind(':address', $data['address']);
        
        return $this->db->execute();
    }

    public function login($email, $password)
    {
        $this->db->query('SELECT * FROM users WHERE email = :email');
        $this->db->bind(':email', $email);
        $user = $this->db->single();
        
        if ($user && password_verify($password, $user->password)) {
            return $user;
        }
        return false;
    }

    public function findByEmail($email)
    {
        $this->db->query('SELECT * FROM users WHERE email = :email');
        $this->db->bind(':email', $email);
        return $this->db->single();
    }

    public function findById($id)
    {
        $this->db->query('SELECT * FROM users WHERE id = :id');
        $this->db->bind(':id', $id);
        return $this->db->single();
    }

    public function getAll()
    {
        $this->db->query('SELECT * FROM users ORDER BY created_at DESC');
        return $this->db->resultSet();
    }

    public function update($id, $data)
    {
        $this->db->query('UPDATE users SET name = :name, email = :email, phone = :phone, address = :address WHERE id = :id');
        $this->db->bind(':id', $id);
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':phone', $data['phone']);
        $this->db->bind(':address', $data['address']);
        return $this->db->execute();
    }

    public function delete($id)
    {
        $this->db->query('DELETE FROM users WHERE id = :id');
        $this->db->bind(':id', $id);
        return $this->db->execute();
    }

    public function updatePassword($id, $newPassword)
    {
        $this->db->query('UPDATE users SET password = :password WHERE id = :id');
        $this->db->bind(':id', $id);
        $this->db->bind(':password', password_hash($newPassword, PASSWORD_DEFAULT));
        return $this->db->execute();
    }
}
