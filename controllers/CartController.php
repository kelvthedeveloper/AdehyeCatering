<?php
namespace Controllers;

use App\Controller;
use Helpers\Session;
use function Helpers\redirect;

class CartController extends Controller
{
    public function index()
    {
        if (!Session::isLoggedIn('customer')) {
            redirect('login');
        }
        
        $cartModel = $this->model('Cart');
        $cart = $cartModel->getCartByUserId(Session::get('user_id'));
        $cartItems = $cartModel->getCartItems($cart->id);
        $total = $cartModel->getCartTotal($cart->id);
        
        $data = [
            'cartItems' => $cartItems,
            'total' => $total,
            'title' => 'Shopping Cart'
        ];
        
        $this->view('customer/cart', $data);
    }

    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (!Session::isLoggedIn('customer')) {
                echo json_encode(['success' => false, 'message' => 'Please login first']);
                exit;
            }
            
            $foodId = isset($_POST['food_id']) ? (int)$_POST['food_id'] : 0;
            
            $cartModel = $this->model('Cart');
            $cart = $cartModel->getCartByUserId(Session::get('user_id'));
            
            if ($cartModel->addItem($cart->id, $foodId)) {
                echo json_encode(['success' => true]);
            } else {
                echo json_encode(['success' => false]);
            }
        }
        exit;
    }

    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (!Session::isLoggedIn('customer')) {
                redirect('login');
            }
            
            $itemId = (int)$_POST['item_id'];
            $quantity = (int)$_POST['quantity'];
            
            $cartModel = $this->model('Cart');
            $cartModel->updateItem($itemId, $quantity);
            
            redirect('customer/cart');
        }
    }

    public function remove()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (!Session::isLoggedIn('customer')) {
                redirect('login');
            }
            
            $itemId = (int)$_POST['item_id'];
            
            $cartModel = $this->model('Cart');
            $cartModel->removeItem($itemId);
            
            redirect('customer/cart');
        }
    }
}
