<?php
namespace Controllers;

use App\Controller;
use Helpers\Session;
use function Helpers\redirect;

class CheckoutController extends Controller
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
        
        if (count($cartItems) == 0) {
            redirect('customer/cart');
        }
        
        $userModel = $this->model('User');
        $user = $userModel->findById(Session::get('user_id'));
        
        $data = [
            'cartItems' => $cartItems,
            'total' => $total,
            'user' => $user,
            'title' => 'Checkout'
        ];
        
        $this->view('customer/checkout', $data);
    }

    public function process()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (!Session::isLoggedIn('customer')) {
                redirect('login');
            }
            
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            
            $cartModel = $this->model('Cart');
            $orderModel = $this->model('Order');
            $paymentModel = $this->model('Payment');
            
            $cart = $cartModel->getCartByUserId(Session::get('user_id'));
            $cartItems = $cartModel->getCartItems($cart->id);
            $total = $cartModel->getCartTotal($cart->id);
            
            $orderData = [
                'user_id' => Session::get('user_id'),
                'total_amount' => $total,
                'delivery_address' => trim($_POST['delivery_address']),
                'delivery_date' => trim($_POST['delivery_date'])
            ];
            
            $orderId = $orderModel->create($orderData);
            
            if ($orderId) {
                foreach ($cartItems as $item) {
                    $orderModel->addItem($orderId, $item->food_id, $item->quantity, $item->price);
                }
                
                $paymentModel->create([
                    'order_id' => $orderId,
                    'amount' => $total,
                    'payment_method' => 'paystack',
                    'transaction_id' => uniqid(),
                    'status' => 'completed'
                ]);
                
                $cartModel->clearCart($cart->id);
                
                Session::set('success', 'Order placed successfully!');
                redirect('customer/orders');
            } else {
                Session::set('error', 'Something went wrong!');
                redirect('checkout');
            }
        }
    }
}
