<?php
namespace Models;

use App\Model;

class Cart extends Model
{
    public function getCartByUserId($userId)
    {
        $this->db->query('SELECT * FROM carts WHERE user_id = :user_id');
        $this->db->bind(':user_id', $userId);
        $cart = $this->db->single();
        
        if (!$cart) {
            $this->db->query('INSERT INTO carts (user_id) VALUES (:user_id)');
            $this->db->bind(':user_id', $userId);
            $this->db->execute();
            return $this->getCartByUserId($userId);
        }
        
        return $cart;
    }

    public function getCartItems($cartId)
    {
        $this->db->query('SELECT ci.*, f.name, f.price, f.image FROM cart_items ci JOIN foods f ON ci.food_id = f.id WHERE ci.cart_id = :cart_id');
        $this->db->bind(':cart_id', $cartId);
        return $this->db->resultSet();
    }

    public function addItem($cartId, $foodId, $quantity = 1)
    {
        $this->db->query('SELECT * FROM cart_items WHERE cart_id = :cart_id AND food_id = :food_id');
        $this->db->bind(':cart_id', $cartId);
        $this->db->bind(':food_id', $foodId);
        $existingItem = $this->db->single();
        
        if ($existingItem) {
            $this->db->query('UPDATE cart_items SET quantity = quantity + :quantity WHERE id = :id');
            $this->db->bind(':id', $existingItem->id);
            $this->db->bind(':quantity', $quantity);
        } else {
            $this->db->query('INSERT INTO cart_items (cart_id, food_id, quantity) VALUES (:cart_id, :food_id, :quantity)');
            $this->db->bind(':cart_id', $cartId);
            $this->db->bind(':food_id', $foodId);
            $this->db->bind(':quantity', $quantity);
        }
        
        return $this->db->execute();
    }

    public function updateItem($itemId, $quantity)
    {
        $this->db->query('UPDATE cart_items SET quantity = :quantity WHERE id = :id');
        $this->db->bind(':id', $itemId);
        $this->db->bind(':quantity', $quantity);
        return $this->db->execute();
    }

    public function removeItem($itemId)
    {
        $this->db->query('DELETE FROM cart_items WHERE id = :id');
        $this->db->bind(':id', $itemId);
        return $this->db->execute();
    }

    public function clearCart($cartId)
    {
        $this->db->query('DELETE FROM cart_items WHERE cart_id = :cart_id');
        $this->db->bind(':cart_id', $cartId);
        return $this->db->execute();
    }

    public function getCartTotal($cartId)
    {
        $this->db->query('SELECT SUM(ci.quantity * f.price) as total FROM cart_items ci JOIN foods f ON ci.food_id = f.id WHERE ci.cart_id = :cart_id');
        $this->db->bind(':cart_id', $cartId);
        $result = $this->db->single();
        return $result->total ?: 0;
    }
}
